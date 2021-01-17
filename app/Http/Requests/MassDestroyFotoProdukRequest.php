<?php

namespace App\Http\Requests;

use App\Models\FotoProduk;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyFotoProdukRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('foto_produk_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:foto_produks,id',
        ];
    }
}
