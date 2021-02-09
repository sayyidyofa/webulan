<?php

namespace App\Http\Requests;

use App\Models\Dokumentasi;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDokumentasiRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('dokumentasi_create');
    }

    public function rules()
    {
        return [
            'kegiatan'    => [
                'string',
                'required',
            ],
            'foto' => [
                'file',
                'image',
                'mimes:jpeg,png,jpg',
                'max:2048',
                'required',
            ]
        ];
    }
}
