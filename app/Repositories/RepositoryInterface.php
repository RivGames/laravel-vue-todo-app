<?php

namespace App\Repositories;

interface RepositoryInterface
{
    public function findById($id);

    public function findAll();

    public function create(array $data);

    public function update(array $data, $id);

    public function delete($id);
}
