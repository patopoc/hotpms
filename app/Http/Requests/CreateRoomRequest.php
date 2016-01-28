<?php

namespace Hotpms\Http\Requests;

use Hotpms\Http\Requests\Request;
use Illuminate\Support\Facades\Input;

class CreateRoomRequest extends Request
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
        return [
        		'id_property' => 'required | unique:rooms,id_property,null,id,room_type,' . Input::get('room_type'),    
        		//'pictures' => 'required | mimes:jpeg,jpg,bmp,png'
        ];
    }
}
