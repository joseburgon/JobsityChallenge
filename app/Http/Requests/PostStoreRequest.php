<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostStoreRequest extends FormRequest
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
/*         $rules = [
            'name' => '',
            'slug' => '',
            'user_id' => 'required',
            'category_id' => '',
            'tags' => '',
            'body' => '',
            'status' => '',
        ]; */
        
        $rules = [
            'name' => 'required',
            'slug' => 'required|unique:posts,slug',
            'user_id' => 'required|integer',
            'category_id' => 'required|integer',
            'tags' => 'required|array',
            'body' => 'required',
            'status' => 'required|' . Rule::in(['DRAFT', 'PUBLISHED']),
        ];

        if($this->get('file'))
            $rules = array_merge($rules, ['file' => 'mimes: jpg, jpeg, png']);
            
        return $rules;
    }
}
