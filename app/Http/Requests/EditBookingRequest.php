<?php

namespace Hotpms\Http\Requests;

use Hotpms\Http\Requests\Request;
use Illuminate\Routing\Route;

class EditBookingRequest extends Request
{
	private $route;
	public function __construct(Route $route){
		$this->route= $route;
	}
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
        		'ci' => 'required',        		    
        		'email' => 'required',
        		'check_in' => 'required',
        		'check_out' => 'required',
        		'id_room_type' => 'required',
        		'rate_plan' => 'required',        		
        ];
    }
    
    public function messages()
    {
    	return [
    			'ci.required' => 'A CI is required',
    			'email.required'  => 'An Email is required',
    			'check_in.required' => 'The Check In is required',
    			'check_out.required' => 'The Check Out is required',
    			'id_room_type.required' => 'A Room is required',
    			'rate_plan.required' => 'A Rate is required',
    	];
    }
}
