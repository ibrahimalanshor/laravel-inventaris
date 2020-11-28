<?php

namespace App\Http\Requests\Loan;

use App\Services\StuffService;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLoanRequest extends FormRequest
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
    public function rules(StuffService $stuff)
    {
        $stock = $stuff->getStock($this->stuff_id);

        return [
            'name' => 'required|string',
            'loan_date' => 'required|date',
            'return_date' => 'required|date|after:'.$this->loan_date,
            'status' => 'required|boolean',
            'stuff_id' => 'required|exists:stuffs,id',
            'total' => 'required|integer|max:'.$stock,
            'condition' => 'required|string'
        ];
    }
}
