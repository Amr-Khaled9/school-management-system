<?php

namespace App\Repository;

interface LibraryRepositoryInterface
{
    public function store($request);
    public function update($request);
    public function delete($request);
}
