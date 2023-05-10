<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\CmsPage;
class CmsPageRequest extends FormRequest
{
    
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|unique:cms_pages,name|max:255',
            'content' => 'required|string',
            'type' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'  => __('title field is required.'),
            'name.unique'  => __('title name is already exists.'),
            'content.required'  => __('content is required'),
            'type.required'  => __('Page type is required'),
        ];
    }
}
