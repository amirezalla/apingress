<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class UsersController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    

    public function signup(Request $request)
    {

        $data = $request->validate([
            'eth_address' => 'required|string|max:255',
        ]);
        dd($data);
        

        // $data['password'] = bcrypt($data['password']);

        $user = User::firstOrCreate(['eth_address' => $data['eth_address']], $data);

        // If the user was recently created
        if ($user->wasRecentlyCreated) {
            return response()->json([
                'code' => 201,
                'message' => 'User registered successfully!',
                'user' => $user
            ], 201);  // HTTP status code 201 means "Created"
        } else {
            return response()->json([
                'code' => 409,
                'message' => 'User already exists with this eth_address.',
                'user' => $user
            ], 409);  // HTTP status code 409 means "Conflict"
        }
    }

    public function login(Request $request)
    {
        $request->validate([
            'eth_address' => 'required'
        ]);

        $credentials = $request->only(['eth_address']);

        if (!Auth::attempt($credentials)) {
            throw ValidationException::withMessages([
                'eth_address' => ['The provided credentials are incorrect.'],
            ]);
        }

        $user = User::where('eth_address', $request->email)->first();

        $token = $user->createToken('Personal Access Token')->plainTextToken;

        return response()->json(['access_token' => $token, 'user' => $user]);
    }

}
