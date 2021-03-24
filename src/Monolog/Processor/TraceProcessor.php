<?php

namespace App\Monolog\Processor;

use Symfony\Component\HttpFoundation\RequestStack;

/**
 * Puts trace-id and parent-id into extra data of a log record
 * @see https://www.w3.org/TR/trace-context/
 */
class TraceProcessor
{
    private RequestStack $requestStack;

    private string $traceId;

    private string $traceLogId;

    private string $parentId;

    private string $parentLogId;

    public function __construct(
        RequestStack $requestStack,
        string $traceId,
        string $traceLogId,
        string $parentId,
        string $parentLogId
    ) {
        $this->requestStack = $requestStack;
        $this->traceId = $traceId;
        $this->traceLogId = $traceLogId;
        $this->parentId = $parentId;
        $this->parentLogId = $parentLogId;
    }

    public function processRecord(array $record): array
    {
        $request = $this->requestStack->getCurrentRequest();

        if (!$request) {
            return $record;
        }

        $traceId = $request->headers->get($this->traceId);
        if ($traceId) {
            $record['extra'][$this->traceLogId] = $traceId;
        }

        $parentId = $request->headers->get($this->parentId);
        if ($parentId) {
            $record['extra'][$this->parentLogId] = $parentId;
        }

        return $record;
    }
}
