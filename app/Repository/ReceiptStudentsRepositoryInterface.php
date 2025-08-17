<?php

namespace App\Repository;

interface ReceiptStudentsRepositoryInterface
{
    public function store($request);
    public function update($request);
    public function destroy($request);


}
