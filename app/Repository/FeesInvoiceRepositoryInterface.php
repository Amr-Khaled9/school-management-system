<?php

namespace App\Repository;

interface FeesInvoiceRepositoryInterface
{
    public function show( $id);
    public function index();
    public function store($request);

}
