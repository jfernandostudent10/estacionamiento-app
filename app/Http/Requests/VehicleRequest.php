<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehicleRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
			'vehicle_type' => 'required|string',
			'plate' => 'required|string',
			'disabled_person' => 'required',
			'has_conadis_distinctive' => 'required',
			'application_date' => 'required',
			'is_approved' => 'required',
			'user_id' => 'required',
        ];
    }
}
