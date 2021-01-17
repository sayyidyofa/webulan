<?php

namespace App\Http\Requests;

use App\Models\FotoProduk;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateFotoProdukRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('foto_produk_edit');
    }

    public function rules()
    {
        return [
            'produk_unggulan_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
