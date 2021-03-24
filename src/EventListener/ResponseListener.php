<?php

namespace App\EventListener;

use App\Dto\ErrorResponse;
use App\Dto\ValidationError;
use App\Dto\ValidationErrorResponse;
use App\Exception\PublicException;
use App\Exception\ValidationException;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\ConstraintViolation;

/**
 * Serializes response to json and prepares public exception message
 */
class ResponseListener
{
    private SerializerInterface $serializer;

    private bool $showFullError;

    private LoggerInterface $logger;

    public function __construct(string $env, SerializerInterface $serializer, LoggerInterface $logger)
    {
        $this->serializer = $serializer;
        $this->logger = $logger;
        $this->showFullError = strtolower($env) === 'dev';
    }

    public function onKernelView(ViewEvent $event): void
    {
        $response = $this->serializer->serialize($event->getControllerResult(), "json");
        $event->setResponse(new JsonResponse($response, Response::HTTP_OK, [], true));
    }

    public function onKernelException(ExceptionEvent $event): void
    {
        $exception = $event->getThrowable();
        $errorId = sprintf("%s-%s", random_int(0, (int) 10e7), microtime(true));
        $payload = new ErrorResponse($exception->getMessage(), $errorId);

        if (!$exception instanceof PublicException && !$this->showFullError) {
            $this->logger->error(
                $exception->getMessage(),
                [
                    "trace" => $exception->getTrace(),
                    "errorId" => $errorId,
                ]
            );

            $payload = new ErrorResponse(sprintf("Something went wrong. Error ID: %s", $errorId), $errorId);
        }

        if ($exception instanceof ValidationException) {
            $errors = [];
            /** @var ConstraintViolation $error */
            foreach ($exception->getErrors() as $error) {
                $errors[] = new ValidationError((string) $error->getMessage(), $error->getPropertyPath());
            }

            $payload = new ValidationErrorResponse($exception->getMessage(), $errors);
        }

        $response = new JsonResponse($this->serializer->serialize($payload, "json"), Response::HTTP_BAD_REQUEST, [], true);

        if ($exception instanceof HttpExceptionInterface) {
            $response->setStatusCode($exception->getStatusCode());
            $response->headers->replace($exception->getHeaders());
        }

        $event->setResponse($response);
    }
}
