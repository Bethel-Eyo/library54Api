<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\AdminRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller{
    public $adminRepo;

    public function __construct(AdminRepository $adminRepo){
        $this->adminRepo = $adminRepo;
    }
    
    public function register(Request $request){
        //validate incoming request 
        $this->validate($request, [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:admins',
            'password' => 'required|confirmed',
        ]);

        return $this->adminRepo->createAccount($request->all());
    }

    public function login(Request $request)
    {
          //validate incoming request 
        $this->validate($request, [
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only(['email', 'password']);

        if (! $token = Auth::attempt($credentials)) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    public function test(){
        //echo 'We there';
        return $this->adminRepo->tester();
    }
}