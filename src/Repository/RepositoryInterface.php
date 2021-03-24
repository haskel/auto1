<?php

namespace App\Repository;

interface RepositoryInterface
{
    public function findOneById(int $id);

    public function findBy(array $criteria, array $sort = []): array;

    public function findAll(array $sort = []): array;
}
