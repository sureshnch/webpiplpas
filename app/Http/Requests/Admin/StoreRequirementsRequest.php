<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequirementsRequest extends FormRequest
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
            'customer_name' => 'required',
            'job_id' => 'max:2147483647|required|numeric',
            'job_title' => 'required',
            'job_type' => 'required',
            'location' => 'required',
            'industry' => 'required',
            'job_function' => 'required',
            'closing_date' => 'required|date_format:'.config('app.date_format'),
            'positions' => 'max:2147483647|required|numeric',
            'experience_from_years' => 'required',
            'experience_from_months' => 'required',
            'experience_to_years' => 'required',
            'experience_to_months' => 'required',
            'salary_range' => 'required',
            'availabity' => 'required',
            'referal_fee' => 'max:2147483647|required|numeric',
            'point_of_contact' => 'required',
            'email' => 'required|email',
            'code' => 'numeric',
            'phone_number' => 'max:2147483647|required|numeric',
            'assigned_to_users' => 'required',
            'assigned_to_users.*' => 'exists:users,id',
        ];
    }
}
