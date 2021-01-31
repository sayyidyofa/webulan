<?php

namespace App\Http\Requests;

use App\Models\Pengusaha;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePengusahaRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('pengusaha_edit');
    }

    public function rules()
    {
        return [
            'nama'    => [
                'string',
                'required',
            ],
        ];
    }
}
