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

        $eth_address = $request->input('eth_address');

        $user = User::firstOrCreate(['eth_address' => $eth_address]);

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
        $eth_address = $request->eth_address;
        dd($eth_address);

        $user = User::where('eth_address', $eth_address)->first();

        $token = $user->createToken('PAT')->plainTextToken;

        return response()->json(['access_token' => $token, 'user' => $user]);
    }

}
