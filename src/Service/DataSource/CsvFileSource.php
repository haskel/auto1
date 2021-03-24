<?php

namespace App\Service\DataSource;

use App\Service\DataSource\Constant\FieldType;
use Psr\Cache\CacheItemPoolInterface;
use RuntimeException;

class CsvFileSource implements SourceInterface
{
    private const DEFAULT_DELIMITER = ",";

    private string $filePath;

    private string $cacheKey;

    private CacheItemPoolInterface $cache;

    private string $delimiter;

    public function __construct(
        string $filePath,
        CacheItemPoolInterface $cache,
        string $delimiter = self::DEFAULT_DELIMITER
    ) {
        if (!file_exists($filePath)) {
            throw new RuntimeException("File '{$filePath}' not found");
        }

        $this->filePath = $filePath;
        $this->cacheKey = sprintf("file.%s", md5($this->filePath));
        $this->cache = $cache;
        $this->delimiter = $delimiter;
    }

    public function load(string $idFieldName, array $types = [], bool $cache = true): array
    {
        if ($cache && $this->cache->hasItem($this->cacheKey)) {
            return $this->cache->getItem($this->cacheKey)->get();
        }

        $items = $this->parseFile($idFieldName, $types);

        $cacheItem = $this->cache->getItem($this->cacheKey);
        $cacheItem->set($items);
        $this->cache->save($cacheItem);

        return $items;
    }

    public function parseFile(string $idFieldName, array $types = []): array
    {
        $data = explode("\n", file_get_contents($this->filePath));

        $keys = str_getcsv(array_shift($data), $this->delimiter);
        $keys = array_map("strtolower", array_filter($keys));

        $items = [];
        foreach ($data as $row) {
            if (trim($row) === "") {
                continue;
            }

            $values = str_getcsv($row, $this->delimiter);

            if (count($values) !== count($keys)) {
                continue;
            }

            $item = array_combine($keys, $values);
            $item = $this->castRowTypes($item, $types);

            $id = strtolower(trim($idFieldName));
            $items[(int) $item[$id]] = $item;
        }

        return $items;
    }

    private function castRowTypes(array $item, array $types): array
    {
        foreach ($types as $fieldName => $type) {
            $normalizedFieldName = strtolower($fieldName);
            if (!isset($item[$normalizedFieldName]) || !is_scalar($item[$normalizedFieldName])) {
                continue;
            }

            $value = $item[$normalizedFieldName];

            switch ($type) {
                case FieldType::INT:
                    $item[$normalizedFieldName] = (int) $value;
                    break;
                case FieldType::FLOAT:
                    $item[$normalizedFieldName] = (float) $value;
                    break;
                case FieldType::STRING:
                    /** @psalm-suppress PossiblyInvalidCast */
                    $item[$normalizedFieldName] = (string) $value;
                    break;
                case FieldType::ARRAY:
                    if (!is_string($value)) {
                        break;
                    }
                    $item[$normalizedFieldName] = array_map("trim", explode(",", $value));
                    break;
            }
        }

        return $item;
    }
}
