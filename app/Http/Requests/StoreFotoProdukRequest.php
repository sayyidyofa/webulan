<?php

namespace App\Http\Requests;

use App\Models\FotoProduk;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreFotoProdukRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('foto_produk_create');
    }

    public function rules()
    {
        return [
            'produk_unggulan_id' => [
                'required',
                'integer',
            ],
            'foto.*'             => [
                'required',
            ],
        ];
    }
}
