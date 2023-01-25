<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaidRequest extends FormRequest
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
            'claim_client_id'=>'required|int',
            'summa'=>'required|int'
        ];
    }
}
