<?php

namespace App\Http\Requests;

use App\Models\ProdukUnggulan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreProdukUnggulanRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('produk_unggulan_create');
    }

    public function rules()
    {
        return [
            'nama'      => [
                'string',
                'required',
            ],
            'deskripsi' => [
                'string',
                'nullable',
            ],
            'usaha_id'  => [
                'required',
                'integer',
            ],
        ];
    }
}
