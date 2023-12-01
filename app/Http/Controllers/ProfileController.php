<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditProfileRequest;
use App\Models\Article;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Throwable;

class ProfileController extends Controller
{
    public function get_data(): JsonResponse
    {
        $user = Auth::user();
        $userWithSummary = $user->load('summary');

        return response()->json([
            'data' => $userWithSummary
        ]);
    }

    public function edit(EditProfileRequest $request)
    {
        try {
            $user = Auth::user();

            $data = $request->validated();

            if ($request->hasFile('photo_profile')) {
                if ($user->photo_profile) {
                    Storage::delete($user->photo_profile);
                }
                $data['photo_profile'] = $request->file('photo_profile')->store();
            }

            $user->update([
                'email' => $user->email,
                'first_name' => $data['first_name'] ?? $user->first_name,
                'last_name' => $data['last_name'] ?? $user->last_name,
                'photo_profile' => $data['photo_profile'] ?? $user->photo_profile,
                'password' => $user->password
            ]);

            return response()->json([
                'message' => 'success update profile',
            ]);
        } catch (Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to edit profile',
                'exception' => $th
            ]);
        }
    }
}
