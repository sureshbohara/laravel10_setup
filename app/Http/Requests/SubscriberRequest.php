<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class SubscriberRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }


       public function rules(){

        return [
            'email' => 'required|email|unique:subscribers,email',
            'name' => 'nullable|string|max:50',
        ];
    }

     public function messages(){
        return [
            'email.required' => 'Please enter your email address',
            'email.email' => 'Please enter a valid email address',
            'email.unique' => 'This email address is already registered',
            'name.string' => 'Please enter a valid name',
            'name.max' => 'The name may not be greater than :max characters',
        ];
    }
}
