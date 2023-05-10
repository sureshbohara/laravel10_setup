<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class PermissionRequest extends FormRequest
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
        $required = $this->permission ? '' : 'required';
        return [
            'permission'      => 'required',
            'role_id'         => 'required',
        ];
    }


     public function messages()
    {
        return [
            'permission.required'  => __('Permission field is required.'),
            'role_id.required'  => __('Role is required.'),
        ];
    }
}
