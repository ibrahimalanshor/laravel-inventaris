<?php

namespace App\Http\Requests\Loan;

use App\Services\StuffService;

use Illuminate\Foundation\Http\FormRequest;

class DeleteLoanRequest extends FormRequest
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
            'stuff_id' => 'required|exists:stuffs,id',
            'total' => 'required|max:'.$stock
        ];
    }
}
