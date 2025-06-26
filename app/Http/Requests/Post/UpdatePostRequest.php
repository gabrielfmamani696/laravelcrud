<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
        // (new CreatePostRequest())->rules(): 
        // estariamos sacando las reglas del create, o sea su validacion
        return (new CreatePostRequest())->rules();
        /* 
        ahora, en caso de necesitar otras validaciones para el update, pues se deben crear otras y ya
         */
    }
}
