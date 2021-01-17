<?php

namespace App\Http\Requests;

use App\Models\ProdukUnggulan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyProdukUnggulanRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('produk_unggulan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:produk_unggulans,id',
        ];
    }
}
