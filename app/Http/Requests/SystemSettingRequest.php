<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Settings;
class SystemSettingRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'system_name' => 'nullable|string|max:30',
            'email' => 'nullable|email|max:50',
            'email1' => 'nullable|email|max:50',
            'phone' => 'nullable|string|min:10|max:10',
            'contact' => 'nullable|string|min:10|max:10',
            'address' => 'nullable|string|max:50',
            'address1' => 'nullable|string|max:50',
            'opening_hr' => 'nullable|string|max:50',
            'facebook' => 'nullable|url|max:255',
            'twitter' => 'nullable|url|max:255',
            'linkedin' => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',
            'website' => 'nullable|url|max:255',
            'github' => 'nullable|url|max:255',
            'mail_transport' => 'nullable|string|max:255',
            'mail_host' => 'nullable|string|max:255',
            'mail_port' => 'nullable|integer',
            'mail_username' => 'nullable|string|max:255',
            'mail_password' => 'nullable|string|max:255',
            'mail_encryption' => 'nullable|string|max:255',
            'mail_from' => 'nullable|email|max:255',
            'mail_from_name' => 'nullable|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'system_name.max' => 'The Opening Hours may not be greater than :max characters.',
            'email.email' => 'Please enter a valid email address for Email.',
            'email.max' => 'The Email may not be greater than :max characters.',
            'email1.email' => 'Please enter a valid email address for Email1.',
            'email1.max' => 'The Email1 may not be greater than :max characters.',
            'phone.max' => 'The Phone Number may not be greater than :max characters.',
            'contact.max' => 'The Contact may not be greater than :max characters.',
            'address.max' => 'The Address may not be greater than :max characters.',
            'address1.max' => 'The Address1 may not be greater than :max characters.',
            'opening_hr.max' => 'The Opening Hours may not be greater than :max characters.',
            'facebook.url' => 'The Facebook field must be a valid URL.',
            'twitter.url' => 'The Twitter field must be a valid URL.',
            'linkedin.url' => 'The LinkedIn field must be a valid URL.',
            'instagram.url' => 'The Instagram field must be a valid URL.',
            'website.url' => 'The Website field must be a valid URL.',
            'github.url' => 'The GitHub field must be a valid URL.',
            'mail_transport.max' => 'The mail transport field cannot be longer than :max characters.',
            'mail_host.max' => 'The mail host field cannot be longer than :max characters.',
            'mail_port.integer' => 'The mail port field must be an integer.',
            'mail_username.max' => 'The mail username field cannot be longer than :max characters.',
            'mail_password.max' => 'The mail password field cannot be longer than :max characters.',
           'mail_encryption.max' => 'The mail encryption field cannot be longer than :max characters.',
           'mail_from.email' => 'The mail from field must be a valid email address.',
           'mail_from.max' => 'The mail from field cannot be longer than :max characters.',
           'mail_from_name.max' => 'The mail from name field cannot be longer than :max characters.',
        ];
    }
}
