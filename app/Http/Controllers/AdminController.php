<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin;
class AdminController extends Controller
{
    public function login(){
        return view('backend.admin.login');
    }

    public function register(){
        return view('backend.admin.register');
    }

    public function registration(Request $request){
        $validator = Validator::make($request->all(), []);
        if ($validator->fails()){
            return Response()->json(array(
                'status'    => 401,
                'errors'    => $validator->errors()->all()
            ));
        }
        
        $admin = new Admin();
        $admin->firstName = $request->firstName;
        $admin->lastName = $request->lastName;
        $admin->email = $request->email;
        $admin->password = $request->password;
        if($admin->save()){
            return Response()->json([
                'status'    => 200,
                'message'   => 'User Registration Successfully'
            ]);
        }else{
            return Response()->json([
                'status'    => 402,
                'message'   => 'Something went wrong. Please try again.'
            ]);
        }

    }
}
