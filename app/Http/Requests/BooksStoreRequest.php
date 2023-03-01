<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BooksStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required'],
            'avaliable_quantity' => ['numeric','required','min:0'],
            'price' => ['numeric','required','min:0']
        ];
    }

    public function messages()
    {
        return [ 
            'title.required' => 'Trường title không được để trống.',
            'avaliable_quantity.numeric' => 'Số lượng Không được để trống.',
            'avaliable_quantity.min' => 'Số lượng phải lớn hơn 0.',
            'price.numeric' => 'Trường price không được để trống.',
            'price.min' => 'Trường price phải lớn hơn 0.'
        ];
    }
}
