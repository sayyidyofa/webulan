<?php


namespace App\Http\Requests;


use Gate;
use Illuminate\Foundation\Http\FormRequest;

class ImportUsahaCompleteRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('usaha_create');
    }

    public function rules()
    {
        return [
            'file' => 'required|mimes:xls,xlsx'
        ];
    }
}