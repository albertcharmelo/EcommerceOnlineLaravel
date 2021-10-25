<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Newsletter;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;
    

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'provincia' => ['required', 'string', 'max:255'],
            'ciudad' => ['required', 'string', 'max:255'],
            'telefono' => ['required','string','min:10','max:12'],
            'direccion' => ['required', 'string', 'max:255'],
            'RNC' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'agree'=>['accepted'],
            'suscriber'=>[],

            
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {   
        
        if ($data['suscriber'] == 'SI') {
            Newsletter::subscribe($data['email'], ['FNAME'=> $data['name'], 'LNAME'=>$data['lname'],'PHONE'=>'+1'+$data['telefono'],'ADDRESS'=>$data['direccion']]);

        }
                
         


        return User::create([
            'name' => $data['name'],
            'lname' => $data['lname'],
            'provincia' => $data['provincia'],
            'ciudad' => $data['ciudad'],
            'telefono'=>'+1 '.$data['telefono'],
            'rol_id'=>2,
            'direccion' => $data['direccion'],
            'email' => $data['email'],
            'RNC' => $data['RNC'],
            'suscriber' => $data['suscriber'],
            'password' => Hash::make($data['password']),
            
        ]);

        
    }
}
