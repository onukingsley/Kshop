<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if ($this->user()!= null){
            if ($this->user()->usertype == 1 || $this->user()->shop){
                return true;
            }
        }
        else{
            return false;
        }

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' =>[ 'required'],
            'description' => ['required'],
            'category_id' => ['required'],
            'shop_id' => ['required'],
            'image' => ['required'],
            'price' => ['required'],
            'quantity' => ['required'],
            'discount_price' => ['required'],
        ];
    }
}
