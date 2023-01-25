<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GraphClientRequest extends FormRequest
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
            'client_id'=>'required|int',
            'credit_product_id'=>'required|int',
            'claim_client_id'=>'required|int',

        ];
    }
}
