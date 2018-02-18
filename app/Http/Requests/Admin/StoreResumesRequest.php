<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreResumesRequest extends FormRequest
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
            'first_name' => 'required',
            'email' => 'required|email',
            'code' => 'numeric',
            'mobile_number' => 'max:2147483647|required|numeric',
            'pancard' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'educational_qualification' => 'required',
            'primary_skills' => 'required',
            'sub_skills' => 'required',
            'work_experience_years' => 'required',
            'work_experience_months' => 'required',
            'relevant_experience' => 'required',
            'notice_period' => 'required',
            'prefered_location' => 'required',
            'current_ctc_lacks' => 'required',
            'current_ctc_thousands' => 'required',
            'expected_ctc_lacks' => 'required',
            'expected_ctc_thousands' => 'required',
            'upload_resume' => 'required',
        ];
    }
}
