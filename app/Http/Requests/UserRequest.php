<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        switch($this->method())
        {
            case 'GET':
            case 'DELETE':
            {
                return [];
            }
            case 'POST':
            {
                return [
                    'name' => 'required',
                    'user' => 'required|unique:users',
                    'password' => 'required|min:6'
                ];
            }
            case 'PUT':
            {
                return [
                    'name' => 'required',
                    'user' => 'required|unique:users,usuario,'.$this->all()['id']
                ];
            }
            case 'PATCH':
            default:break;
        }
        
    }
}
