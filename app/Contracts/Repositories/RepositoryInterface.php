<?php

namespace App\Contracts\Repositories;

interface RepositoryInterface
{
    public function all();

    public function find(string $id);

    public function select(array ...$fields);

    public function where(array ...$conditions);

    public function store(array $payload);

    public function update(string $id, array $payload);

    public function delete(string $id);
}
