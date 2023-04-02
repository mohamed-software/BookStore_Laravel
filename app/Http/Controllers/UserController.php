<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Hash as FacadesHash;
// use Illuminate\Support\Facades\Validator;
// use Illuminate\Support\Str;


class UserController extends Controller
{
    
    //register
    function register()
    {
        return view('users/register');
    }


    //save
    function save(Request $request)
    {
                //validation
                $validator=validator::make($request->all(),
                [
                    'email'=>'required|max:100|min:3',
                    'password'=>'required|max:8|min:3',
                    
                ]);
                   //if validator  
                    if($validator->fails())
                {
                    return redirect('users/register')
                    ->withErrors($validator)
                    ->withInput();
                }
        $email=$request->email;
        $password=$request->password;
       //
        $user=new User();
        $user->email=$email;
        $user->password=Hash::make($password);
        $user->save();

        return view('users/register');
    }
    


    // login 
    function login()
    {
        return view('users/login');

    }
    
    //handleLogin user
    function handleLogin(Request $request)

    {
        //validation
        $validator=validator::make($request->all(),
        [
            'email'=>'required|max:100|min:6',
            'password'=>'required|max:100|min:3',
            
        ]);
        
        //if validator  
        if($validator->fails())
        {
            return redirect('users/login')
            ->withErrors($validator)
            ->withInput();
        }

        //auth
        $cred=array('email'=>$request->email,
                'password'=>$request->password);
        
        //check
        if(Auth::attempt($cred))
        {
            return redirect('/list');

        }else{
            return "not valid email or password";

        }

    }
    function logout(){

        Auth::logout();
        return redirect('/users/login');
    }
}

?>