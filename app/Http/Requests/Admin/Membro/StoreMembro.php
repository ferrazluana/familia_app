<?php

namespace App\Http\Requests\Admin\Membro;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreMembro extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.membro.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'nome' => ['required', 'string'],
            'data_nascimento' => ['required', 'string'],
            'celular' => ['nullable', 'string'],
            'endereco' => ['nullable', 'string'],
            'estado_civil' => ['nullable'],
            'batizado' => ['required', 'boolean'],
            'lider' => ['required', 'boolean'],
            'pastor' => ['required', 'boolean'],
            'personalidade' => ['nullable'],
            'linguagem_amor' => ['nullable'],
            'enabled' => ['required', 'boolean'],
            
        ];
    }

    /**
    * Modify input data
    *
    * @return array
    */
    public function getSanitized(): array
    {
        $sanitized = $this->validated();

        //Add your code for manipulation with request data here

        return $sanitized;
    }
}
