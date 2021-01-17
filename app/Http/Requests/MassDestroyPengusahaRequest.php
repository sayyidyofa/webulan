<?php

namespace App\Http\Requests;

use App\Models\Pengusaha;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPengusahaRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('pengusaha_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:pengusahas,id',
        ];
    }
}
