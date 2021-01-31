<?php


namespace App\Http\Controllers;


use App\Models\Usaha;
use App\Models\Pengusaha;
use App\Models\ProdukUnggulan;
use Illuminate\Routing\Controller as BaseController;

class FrontController extends BaseController
{
    public function usahaList() {
        $usahas = Usaha::all();
        $pengusaha = Pengusaha::all();

        return view('front.usaha.index', compact('usahas', 'pengusaha'));
    }

    public function usahaShow(Usaha $usaha) {
        $usaha->load('pengusaha', 'usahaMediaSosials', 'usahaProdukUnggulans');
        $id_produk = $usaha->usahaProdukUnggulans[0]->id;
        // $id_produk->load('produkUnggulanFotoProduks');
        $produk = new ProdukUnggulan;
        // $foto = $id_produk->load('produkUnggulanFotoProduks');
        // dd($foto);

        return view('front.usaha.show', compact('usaha'));
    }
}