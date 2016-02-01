<?php

namespace Hotpms\Http\Requests;

use Hotpms\Http\Requests\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Input;

class EditPersonRequest extends Request
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
        		'ci' => 'required | unique:people,id,'. $this->route->getParameter('people'),
        		'email'=> 'required | unique:people,email,'. $this->route->getParameter('people'),        		
        ];
    }
}
