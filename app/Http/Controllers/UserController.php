<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserCollection;
use App\Http\Resources\UserReSource;
use App\Models\UserInfo;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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

    public function onLogin (Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);
        if ($validator->fails())
        {
            return response()->json(['error' => "Login is not successful!"], 401);
        }

        $user = UserInfo::where('email', $request->email)->get();
        if($user->count() > 0)
        {
            return response()->json(array("successful"=>1, ":data"=>$user[0]));
        }
        return response()->json(['error' => "Login is not successful!"], 401);
    }

    public function onRegister(Request $request){
         $validator = Validator::make($request->all(), [
             'name' => 'required',
             'email' => 'required|email|unique:users',
             'password' => 'required',
             'confirm_password' => 'required|same:password',
         ]);
         if ($validator->fails()) {
             return response()->json(['error'=>$validator->errors()], 401);
         }

         $postArray = [
             'name'      => $request->name,
             'email'     => $request->email,
             'password'  => Hash::make($request->password),
             'remember_token' => $request->token,
             'created_at'=> Carbon::now('Asia/Da_Nang'),
             'updated_at'=>Carbon::now('Asia/Da_Nang'),
         ];
          $user = User::create($postArray);
         return Response()->json(array("success"=> 1,"data"=>$postArray ));

    }

    public function getToken(Request $request) {
        $token = $request->session()->token();
        $token = csrf_token();
        return response()->json(array("token"=>$token));
    }
}
