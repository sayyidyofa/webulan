<?php

namespace App\Http\Requests;

use App\Models\Usaha;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateUsahaRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('usaha_edit');
    }

    public function rules()
    {
        return [
            'nib'    => [
                'regex:/^[0-9]+$/',
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
            'alamat'  => [
                'string',
                'required',
            ],
            'maps'  => [
                'string',
                'nullable',
            ],
            'kegiatan'     => [
                'string',
                'nullable',
            ],
        ];
    }
}
