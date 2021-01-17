<?php

namespace App\Http\Requests;

use App\Models\Pengusaha;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePengusahaRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('pengusaha_create');
    }

    public function rules()
    {
        return [
            'nama'    => [
                'string',
                'required',
            ],
            'user_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
