<?php

namespace App\Http\Requests;

use App\Rules\UcfirstRequired;
use Illuminate\Foundation\Http\FormRequest;

class StoreSliderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'image'       => 'required|mimes:jpg,jpeg,png|max:3000' ,
            'category_id' => 'required',
            'title.*'     => ['required','max:10',new UcfirstRequired()],
            'description.*'     => 'required',
        ];
    }

    public function messages()
    {
        return [
            'image.required' => 'Sekil xanasi doldurulmalidir',
        ];
    }

}
