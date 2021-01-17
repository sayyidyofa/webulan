<?php

namespace App\Http\Requests;

use App\Models\MediaSosial;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMediaSosialRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('media_sosial_create');
    }

    public function rules()
    {
        return [
            'link_accname' => [
                'string',
                'required',
            ],
            'vendor'       => [
                'required',
            ],
            'usaha_id'     => [
                'required',
                'integer',
            ],
        ];
    }
}
