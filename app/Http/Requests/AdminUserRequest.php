<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Admin;
class AdminUserRequest extends FormRequest
{
    
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'name' => 'required|string|max:30',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|string|min:6',
            'address' => 'required|string|max:30',
            'type' => 'required|string|in:admin,user',
            'mobile_number' => 'required|string|max:10',
            'gender' => 'required',
            'user_post' => 'required|string|max:30',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'twitter' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'bio' => 'nullable|string|min:10|max:500',
        ];
    }

      public function messages(){
        return [
            'name.required' => 'The name field is required.',
            'name.max' => 'The name may not be greater than :max characters.',
            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'The email address has already been taken.',
            'password.required' => 'Please enter your password.',
            'password.min' => 'Your password must be at least 6 characters long.',
            'type.required' => 'The type field is required.',
            'type.in' => 'Please select a valid user type.',
            'facebook.url' => 'Please enter a valid URL for the Facebook field.',
            'instagram.url' => 'Please enter a valid URL for the Instagram field.',
            'twitter.url' => 'Please enter a valid URL for the Twitter field.',
            'linkedin.url' => 'Please enter a valid URL for the LinkedIn field.',
            'bio.required' => 'Please enter a text.',
            'bio.min' => 'Your text must be at least 10 characters long.',
            'bio.max' => 'Your text must not exceed 500 characters.',
        ];
    }

}
