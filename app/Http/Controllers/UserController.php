<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserCollection;
use App\Http\Resources\UserReSource;
use App\Models\UserInfo;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return UserReSource::collection(UserInfo::paginate(10));
    }

    public function show($id)
    {
        return new UserReSource(UserInfo::findOrFail($id));
    }

    public function create(Request $request)
    {
        $user = UserInfo::create($request->all());

        return response()->json($user, 201);
    }

    public function update(Request $request, UserInfo $user)
    {
        $user->update($request->all());

        return response()->json($user, 200);
    }

    public function delete(UserInfo $user)
    {
        $user->delete();

        return response()->json(null, 204);
    }
}
