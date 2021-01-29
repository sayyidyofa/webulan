<?php


namespace App\Http\Controllers;


use App\Models\Usaha;
use Illuminate\Routing\Controller as BaseController;

class FrontController extends BaseController
{
    public function usahaList() {
        $usahas = Usaha::all();

        return view('front.usaha.index', compact('usahas'));
    }

    public function usahaShow(Usaha $usaha) {
        $usaha->load('pengusaha', 'usahaMediaSosials', 'usahaProdukUnggulans');

        return view('front.usaha.show', compact('usaha'));
    }
}