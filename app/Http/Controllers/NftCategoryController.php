<?php

namespace App\Http\Controllers;

use App\Models\NftCategory;
use App\Http\Requests\StoreNftCategoryRequest;
use App\Http\Requests\UpdateNftCategoryRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class NftCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $nftcategories = NftCategory::all();
        return view('category.index')->with('nftcategories', $nftcategories);
//        dd('ok');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
//        return view('bank-transfer.create', compact('bankAccount'));
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNftCategoryRequest $request)
    {
        dd('ok');
    }

    /**
     * Display the specified resource.
     */
    public function show(NftCategory $nftCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NftCategory $nftCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNftCategoryRequest $request, NftCategory $nftCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NftCategory $nftCategory)
    {
        //
    }
}
