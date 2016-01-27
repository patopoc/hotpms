<?php

namespace Hotpms\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Hotpms\Http\Requests;
use Hotpms\Http\Controllers\Controller;
use Hotpms\User;
use Hotpms\Country;
use Hotpms\Person;
use Hotpms\Http\Requests\CreateUserRequest;

class UserController extends Controller
{
	public function __construct(){
	
		$this->middleware('access_control');
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
   		$users= User::all();
   		return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$data['properties']= \DB::table('property_settings')->lists('name','id');
    	$data['countries']= \DB::table('countries')->lists('name', 'country_code');
    	$data['roles']= \DB::table('roles')->lists('name', 'id');
        return view('admin.users.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {    	
    	if(count(Person::where('ci',$request->get('ci'))->get()) == 0){
    		Person::create([
    				'ci' => $request->get('ci'),
    				'name' => $request->get('name'),
    				'last_name' => $request->get('last_name'),
    				'email' => $request->get('email'),
    				'telephone' => $request->get('telephone'),
    				'id_country' => $request->get('id_country'),
    		]);
    	}
    	 
    	$person= Person::where('ci',$request->get('ci'))->get()->first(); 
        
        $user= User::create([
        		'id_person'=> $person->id,
        		'id_role' => $request->get('id_role'),
        		'id_property' => $request->get('id_property'),
        		'auth_key' => 'some key',
        		'username' => $request->get('username'),
        		'password' => $request->get('password'),
        		
        ]);		
        
		return \Redirect::route('admin.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $data['properties']= \DB::table('property_settings')->lists('name','id');
        $data['countries']= \DB::table('countries')->lists('name', 'country_code');
        $data['roles']= \DB::table('roles')->lists('name', 'id');
        $data['user']= $user;
		return view('admin.users.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    	$person= Person::where('ci',$request->get('ci'))->get()->first();
    	$person->fill([
    			'ci' => $request->get('ci'),
    			'name' => $request->get('name'),
    			'last_name' => $request->get('last_name'),
    			'email' => $request->get('email'),
    			'telephone' => $request->get('telephone'),
    			'id_country' => $request->get('id_country'),
    	]);
    	$person->save();
    	
        $user = User::findOrFail($id);
		$user->fill([
        		'id_person'=> $person->id,
        		'id_role' => $request->get('id_role'),
        		'id_property' => $request->get('id_property'),
        		'auth_key' => 'some key',
        		'username' => $request->get('username'),
        		'password' => $request->get('password'),
        		
        ]);
		$user->save();
		
		return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user= User::findOrFail($id);
		
		$user->delete();
		
		$message= 'El usuario ' . $user->username . ' ha sido eliminado';
		if($request->ajax()){
			return $message;
		}
		
		Session::flash('message', $message);
		
		return redirect()->route('admin.users.index');
    }
}
