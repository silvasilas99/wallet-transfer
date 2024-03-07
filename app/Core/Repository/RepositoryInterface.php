<?php

namespace App\Core\Repository;

interface RepositoryInterface
{
    public function insert(array $data);

    public function update(string $id, array $data);

    public function findById(string $id);

    public function all();
}
