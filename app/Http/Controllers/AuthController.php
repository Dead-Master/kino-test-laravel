<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8']
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        Auth::login($user);

        return redirect('/');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8']
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        $credentials = $request->only('name', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('/');
        }

        //todo здесь можно сделать проверку на наличие такого пользователя, на верность пароля и отдавать это вообще не в виде json
        return response()->json(['error' => 'user not found/bad password'], 404);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function token(Request $request)
    {
        $user = Auth::user();
        if(!$user){
            return redirect('/login');
        }

        $user->tokens()->delete();
        return response()->json(['token' => $user->createToken($user->name)->plainTextToken]);
    }

}
