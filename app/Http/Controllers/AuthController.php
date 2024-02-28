<?php 

// user controller for the user authentication
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
  /**
   * Register a user
   */
  public function register(Request $request)
  {
    $fields = $request->validate([
      'name' => 'required|string',
      'email' => 'required|string',
      'user' => 'required|string',
      'password' => 'required|string'
    ]);

    $user = User::create([
      'name' => $fields['name'],
      'email' => $fields['email'],
      'user' => $fields['user'],
      'password' => bcrypt($fields['password'])
    ]);

    return response()->json($user, 201);
  }

  /**
   * Login a user
   */
  public function login(Request $request)
  {
    $fields = $request->validate([
      'user' => 'required|string',
      'password' => 'required|string'
    ]);

    $credentials = request(['user', 'password']);
    if (!auth()->attempt($credentials)) {
      return response()->json([
        'message' => 'The given credentials were invalid.'
      ], 422);
    }

    $user = User::where('user', $fields['user'])->first();

    $token = $user->createToken('token')->plainTextToken;

    return response()->json([
      'user' => $user,
      'token' => $token
    ]);
  }
}
