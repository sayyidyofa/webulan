<?php

namespace App\Http\Requests;

use App\Models\Usaha;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreUsahaRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('usaha_create');
    }

    public function rules()
    {
        return [
            'id'    => [
                'required',
                'integer',
                'min:1',
                'max:2147483647',
                'unique:usahas,id',
            ],
            'nama'         => [
                'string',
                'required',
            ],
            'brand'        => [
                'string',
                'required',
            ],
            'pengusaha_id' => [
                'required',
                'integer',
            ],
            'deskripsi'    => [
                'string',
                'required',
            ],
            'kategori'     => [
                'string',
                'required',
            ],
            'kontak'       => [
                'string',
                'required',
            ],
            'alamat_maps'  => [
                'string',
                'required',
            ],
            'kegiatan'     => [
                'string',
                'nullable',
            ],
        ];
    }
}
