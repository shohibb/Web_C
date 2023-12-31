<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $this->validate($request, [
            'name' => "string|required|max:255",
            'email' => "required|string|max:255|unique:" . User::class,
            'password' => "string|required|min:6",

        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        $token = $user->createToken('myAppToken');

        return response()->json(['message' => 'Register successful', 'token' => $token->plainTextToken]);
    }

    public function getAllUsers()
    {
        try {
            $users = User::all();
            return response()->json(['message' => 'Success', 'data' => $users], 200);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }
}
