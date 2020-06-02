<?php

namespace App\Repositories;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\Admin;
use App\Repositories\BaseRepository;

class AdminRepository extends BaseRepository{
    public function __construct(Admin $model) 
    {
        parent::__construct($model);
    }

    public function createAccount(array $data){
        try{
            $admin = $this->fillAndSave([
            'id' => $this->generateUuid(),
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => app('hash')->make($data['password']),
          ]);
    
          return response()->json([
            'data' => $admin,
            'message' => 'Account created successfully'
          ], 201);
          } catch (\Exception $e) {
            //return error message
            return response()->json(['message' => $e], 409);
        }
      }

      public function tester(){
          echo 'I got to repo';
      }
}