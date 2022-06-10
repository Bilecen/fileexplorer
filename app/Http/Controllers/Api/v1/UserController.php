<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Service\UserService;
use App\Http\Resources\UserResource;
use App\Models\User;
use Cassandra\Exception\ValidationException;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    use  ValidatesRequests;
    public function userInsert(Request $request)
    {
        $userService = new UserService();
        $userService->insert($request);
        return UserResource::collection($userService->selectAll($request));
    }

    public function userUpdate(Request $request)
    {
        $userService = new UserService();
        $userService->update($request);
        return UserResource::collection($userService->selectAll($request));
    }

    public function userSelect(Request $request)
    {
        $userService = new UserService();
        return UserResource::collection($userService->selectAll($request));
    }

    public function userDelete(Request $request)
    {
        $userService = new UserService();
        return UserResource::collection($userService->delete($request));
    }

    public function  login(Request  $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        return $user->createToken($request->email)->plainTextToken;
    }
}
