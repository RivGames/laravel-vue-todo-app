<?php

namespace App\Http\Requests\Todo;

use App\TodoCreateDto;
use Illuminate\Foundation\Http\FormRequest;

class StoreTodoRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required','min:3','max:20'],
            'body' => ['required','min:5','max:255'],
        ];
    }

    public function getDto(): TodoCreateDto
    {
        return new TodoCreateDto($this->get('title'),$this->get('body'),auth()->id());
    }
}
