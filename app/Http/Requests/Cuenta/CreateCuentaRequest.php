<?php

namespace App\Http\Requests\Cuenta;

use App\Http\Requests\Request;

class CreateCuentaRequest extends Request
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
     * @return array
     */
    public function rules()
    {
        return [
            'banco' => 'required',
            'sucursal' => 'required',
            'numero_cuenta' => 'required|unique_with:bank_accounts,sucursal',
        ];
    }
}
