<?php

namespace App\Http\Controllers\promotions;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePromotionRequest;
use App\Models\Promotion;
use App\Repository\PromotionRepositoryInterface;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    public $promotion;
    public function __construct(PromotionRepositoryInterface $promotion)
    {
        $this->promotion = $promotion;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grades = $this->promotion->index();
        return view('students.promotions.index',compact('grades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $promotions= $this->promotion->create();
        return view('students.promotions.management',compact('promotions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePromotionRequest $request)
    {
        return $this->promotion->store($request);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id, Request $request)
    {
    return $this->promotion->destroy($id,$request);
    }

    public function manage()
    {

    }
}
