<?php

namespace App\Http\Controllers;

use App\Models\Nft;
use App\Models\NftCategory;
use Illuminate\Http\Request;

class VitrinaController extends Controller
{
    public function index()
    {

        $nfts = Nft::all();
        return view('vitrina.index')->with('nfts', $nfts);
//        dd('ok');
    }
}
