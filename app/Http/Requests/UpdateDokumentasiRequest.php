<?php

namespace App\Http\Requests;

use App\Models\Dokumentasi;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDokumentasiRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('dokumentasi_edit');
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
            ]
        ];
    }
}
