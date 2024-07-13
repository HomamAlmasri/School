<?php
namespace App\Services;

use App\Http\Requests\loginRequest;
use App\Interfaces\AuthServiceInterface;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthService 
{
    public function login(loginRequest $request){
        $credentials = $request->validated();
        if(Auth::attempt($credentials)){
            $user = Auth::user();
            $token = $user->createToken('SchoolManagementSystem')->accessToken;
            return $token;
        }
        return null;

    }

  public function register(array $data){

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'role' => $data['role'],
        ]);
        $token = $user->createToken('SchoolManagementSystem')->accessToken;
        return $token;
    }

}