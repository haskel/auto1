<?php

namespace App\Service\DataSource;

interface SourceInterface
{
    /**
     * @param string $idFieldName Field that will be used to identify item by id
     * @param array  $types       List of fields and types in format ["fieldName" => FieldType::INT]
     * @param bool   $cache      Use cache or not
     *
     * @return array
     */
    public function load(string $idFieldName, array $types = [], bool $cache = false): array;
}
