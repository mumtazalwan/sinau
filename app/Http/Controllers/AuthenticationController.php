<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Throwable;

class AuthenticationController extends Controller
{
    public function login(LoginRequest $request)
    {
        (object) $user = User::where('email', $request->email)->first();

        if (!$user){
            return response()->json([
                'exception' => 'user not found'
            ]);
        }

        if (!$user->password === $request->password){
            return response()->json([
                'exception' => 'wrong password'
            ]);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'success create account',
            'access token' => $token,
        ]);
    }

    public function create_account(RegisterRequest $request): JsonResponse
    {
        $data = $request->validated();
        $data['password'] = Hash::make($request['password']);

        DB::beginTransaction();

        try {
            (object) $user = User::create($data);
            $token = $user->createToken('auth_token')->plainTextToken;

            DB::commit();

            return response()->json([
                'message' => 'success create account',
                'access token' => $token,
            ]);
        } catch (Throwable $th) {
            DB::rollBack();

            return response()->json([
                'message' => $th
            ]);
        }
    }

    public function google_auth(Request $request): JsonResponse
    {
        $user = Socialite::driver('google')->stateless()->userFromToken($request->token);

        $userFromDb = User::firstOrCreate(
            ['email' => $user->getEmail()],
            [
                'first_name' => $user->offsetGet('given_name'),
                'last_name' => $user->offsetGet('family_name'),
                'photo_profile' => $user->getAvatar(),
                'birth_date' => $request->birth_date
            ]
        );

        $token = $userFromDb->createToken('auth_token')->plainTextToken;
        return response()->json([
            'message' => 'success getting in',
            'access token' => $token,
        ]);
    }
}
