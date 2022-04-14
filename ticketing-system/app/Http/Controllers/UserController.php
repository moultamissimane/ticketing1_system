<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request){
        if(!Auh::attempt(['email'=>$request->email, 'password'=>$request->password])){
            return response()->json(['error'=>'Unauthorized'], 401);
        }

    $user = User::where('email', $request->email)->firstOrFail();

    $token = $user->createToken('MyApp')->plainTextToken;
    return response()->json([
    'access_token' => $token,
    'token_type' => 'Bearer'        
    ]);
}

public function store(Request $request)
{
    $attr = $request->validate([
        'name' => 'required|string|max: 122',
        'email' => 'required|string|email|unique:users,email',
        'password' => 'required|string|max:12'
    ]);

    $user = User::create([
        'name' => $attr['name'],
        'password' => Hash::make($attr['password']),
        'email' => $attr['email']
    ]);

    $token = $user->createToken('auth_token')->plainTextToken;

    return response()->json([
        'access_token' => $token,
        'token_type' => 'Bearer',
    ]);
}

public function show(Request $request)
{
    return $request->user();
}

public function destroy(Request $request)
{
    $request->user()->tokens()->delete();

    return [
        'message' => 'Token deleted'
    ];
}

public function question(Request $request)
{

    return DB::table('questions')
        ->join('users', 'questions.user_id', '=', 'users.id')
        ->leftJoin('responses', 'responses.question_id', '=', 'questions.id')
        ->select(['questions.id', 'questions.title', 'questions.question', 'questions.created_at', DB::raw('count(responses.question_id) as count')])
        ->where('users.id', '=', $request->user()->id)
        ->groupBy('questions.id', 'users.id', 'responses.question_id')->get();
}




}