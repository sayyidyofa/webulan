<?php


namespace App\Http\Requests;


use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Validator;

class StoreUsahaCompleteRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('usaha_create');
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
            'sosmed_acc' => 'sometimes|array',
            'vendor' => 'required_with:sosmed_acc|array',
            'produk_nama' => 'sometimes|array',
            'produk_deskripsi' => 'nullable|array',
            'foto_.*' => 'sometimes|array'
        ];
    }

    public function withValidator(Validator $validator) {
        if ($validator->fails()) {
            collect($this->all())->filter(fn ($v, $k) => strpos($k, 'foto_') !== false)->each(function (array $item) {
                foreach ($item as $filename) {
                    Storage::disk('temporary')->delete($filename);
                }
            });
        }
    }
}