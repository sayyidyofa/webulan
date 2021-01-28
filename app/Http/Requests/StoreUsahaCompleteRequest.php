<?php


namespace App\Http\Requests;


use Gate;
use Illuminate\Foundation\Http\FormRequest;

class StoreUsahaCompleteRequest extends FormRequest
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
            'sosmed_acc' => 'sometimes|array',
            'vendor' => 'required_with:sosmed_acc|array',
            'produk_nama' => 'sometimes|string',
            'produk_deskripsi' => 'nullable|string',
            'foto_.*' => 'sometimes|array'
        ];
    }
}