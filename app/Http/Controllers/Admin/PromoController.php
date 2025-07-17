<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\Bids_pack;

class PromoController extends Controller
{
  public function index()
  {

    $bids_pack = Bids_pack::all();
    return view('backend.bids_pack.promo', ['bids_packs' => $bids_pack]);
  }
}
