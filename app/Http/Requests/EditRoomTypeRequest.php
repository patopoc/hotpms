<?php

namespace Hotpms\Http\Requests;

use Hotpms\Http\Requests\Request;
use Illuminate\Routing\Route;

class EditRoomTypeRequest extends Request
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
        		'name' => 'required | unique:rates,name,'. $this->route->getParameter('room_types'),
        		'id_property' => 'required',
        		'id_service_plan' => 'required',
        		'id_rate' => 'required',
        		'id_facilities_plan' => 'required',
        		'id_bed_type' => 'required',        		
        ];
    }
    
    public function messages()
    {
    	return [
    			'name.required' => 'A Name is required',
    			'id_property.required'  => 'A Property is required',
    			'id_service_plan.required' => 'A Service plan is required',
    			'id_rate.required' => 'A Rate is required',
    			'id_facilities_plan.required' => 'A Facility plan is required',
    			'id_bed_type.required' => 'A Bed type is required',
    	];
    }
}
