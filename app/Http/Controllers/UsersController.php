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


        $user = User::where('eth_address', $eth_address)->first();

        $token = $user->createToken('PAT')->plainTextToken;

        return response()->json(['access_token' => $token, 'user' => $user]);
    }
    
    public function logout(Request $request)
    {
    // Get the currently authenticated user's tokens
    $request->user()->tokens->each(function ($token, $key) {
        $token->delete();
    });

    return response()->json('Logged out successfully', 200);

    }


    public function profile(Request $request)
    {
        return response()->json($request->user());
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'bio' => 'nullable',
        ]);

        $request->user()->update($request->all());
        
        return response()->json(['message' => 'Profile updated successfully']);
    }

    public function uploadImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();
          
        $request->image->move(storage_path('profiles'), $imageName);
    
        $request->user()->update(['image_url' => '/storage/profiles/'.$imageName]);
    
        return response()->json(['message' => 'Image uploaded successfully']);
    }

    public function uploadCover(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();
          
        $request->image->move(storage_path('profiles'), $imageName);
    
        $request->user()->update(['cover_url' => '/storage/profiles/'.$imageName]);
    
        return response()->json(['message' => 'Cover uploaded successfully']);
    }





}
