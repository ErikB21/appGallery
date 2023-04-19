<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Validation\Rule;

class UserFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->isAdmin();
        // return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        
        $id = $this->user ? $this->user->id : null;
        $emailRule = $id ? Rule::unique('users')->ignore($id) : Rule::unique('users');
        return [
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => [
                'required','string','email','max:255',
                $emailRule,
            ],
            'user_role' => Rule::in(['user', 'admin']),
        ];
    }

    public function messages(){
        $messages = [
            'name.required' => 'Il nome è obbligatorio!',
            'name.unique' => 'Il nome è gia esistente!',
            'surname.required' => 'Il cognome è obbligatorio!',
            'surname.unique' => 'Il cognome è gia esistente!',
            'email.required' => 'L\'email è obbligatoria!',
            'email.unique' => 'L\'email è gia esistente!',
            'user_role.required' => 'Il ruolo è obbligatorio!',
        ];

        return $messages;
    }
}
