<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ApiLoginController {
    public function login (Request $request) {
        $data = json_decode($request->getContent (), true);

        $validator = Validator::make ($request->json ()->all (), [
            'email' => ['required', 'email', 'string'],
            'password' => ['required', 'min:5', 'max:32', 'string'],
        ]);

        if ($validator->fails ()) {
            return response ()->json (['error' => $validator->errors()], 401);
        }

        $user = User::where('email', $data['email'])->first();

        if (!$user || !Hash::check($data['password'], $user->password)) {
            return response ()->json (['error' => 'Auth failed.'], 401);
        }

        return (response ()->json ([
            'token' => $user->createToken('api')->plainTextToken
        ],
            200)
        );
    }
}
