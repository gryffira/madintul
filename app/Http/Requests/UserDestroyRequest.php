<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\Request;

class UserDestroyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return !($this->route('admin') == config('cms.default_user_id') ||
            $this->route('admin') == auth()->user()->id);
        
    }

    public function forbiddenResponse()
    {
        return redirect()->route('admin.index')->with('message', 'Anda tidak dapat menghapus Super Admin atau akun anda sendiri');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
