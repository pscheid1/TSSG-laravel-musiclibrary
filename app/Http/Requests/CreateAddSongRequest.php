<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateAddSongRequest extends Request {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;  // allow everyone for now.
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'CATALOGNUM' => 'required|unique:musiclibraries|min:1|max:10',
            'TITLE' => 'required|min:4|max:24',
            'DESCRIPTION' => 'required'
        ];
    }

}
