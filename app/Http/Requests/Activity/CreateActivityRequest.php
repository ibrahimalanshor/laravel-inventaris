<?php

namespace App\Http\Requests\Activity;

use App\Services\StuffService;

use Illuminate\Foundation\Http\FormRequest;

class CreateActivityRequest extends FormRequest
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

        $rules = [
            'type' => 'required|in:masuk,keluar',
            'total' => 'required|integer',
            'supplier_id' => 'required|exists:suppliers,id',
            'stuff_id' => 'required|exists:stuffs,id'
        ];

        if ($this->type === 'keluar') {
            $rules['total'] = 'required|integer|max:'.$stock;
        }

        return $rules;

    }
}
