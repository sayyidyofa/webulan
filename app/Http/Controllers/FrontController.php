<?php


namespace App\Http\Controllers;


use App\Models\Usaha;
use App\Models\Pengusaha;
use App\Models\ProdukUnggulan;
use App\Models\Dokumentasi;
use Illuminate\Routing\Controller as BaseController;

class FrontController extends BaseController
{
    public function usahaList()
    {
        $usahas = Usaha::all();
        $pengusaha = Pengusaha::all();
        $dokumentasi = Dokumentasi::all();

        return view('front.usaha.index', compact('usahas', 'pengusaha', 'dokumentasi'));
    }

    public function usahaShow(Usaha $usaha)
    {
        $usaha->load('pengusaha', 'usahaMediaSosials', 'usahaProdukUnggulans');

        return view('front.usaha.show', compact('usaha'));
    }
}
