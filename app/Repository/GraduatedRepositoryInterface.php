<?php

namespace App\Repository;

interface GraduatedRepositoryInterface
{
public function index();
public function create();
public function softdelete($request);
}
