<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class RoleRequest extends FormRequest
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
        $id = $this->role ? ',' . $this->role->id : '';
        $required = $this->role ? '' : 'required';
        return [
            'name'      => 'required|unique:roles|max:20',
        ];
    }


     public function messages()
    {
        return [
            'name.required'  => __('Name field is required.'),
        ];
    }

}
