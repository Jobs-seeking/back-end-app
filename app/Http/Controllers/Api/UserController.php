<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return UserResource::collection(User::orderBy('id', 'desc')->get());
    }
    public function getAllCompany()
    {
        return UserResource::collection(User::where("role", "company")->orderBy('id','desc')->get());
    }
    public function getCompanyById($id)
    {
        return new UserResource(User::where("role", "company")->where("id", $id)->orderBy('id','desc')->first());
    }
    public function getAllStudent()
    {
        return UserResource::collection(User::where("role", "student")->orderBy('id','desc')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|string|unique:users',
            'password' => 'required',
            'name' => 'string',
            'gender' => 'in:male,female',
            'level' => 'in:second-year student,third-year student',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'dateOfBirth' => 'date',
            'phone' => 'phone',
            'description' => 'string|min:10',
            'address' => 'string',
            'status' => 'in:active,inactive',
            'role' => 'required|in:company,student',
        ]);
        $user = User::create(array_merge(
            $request->only('email', 'name', 'gender', 'dateOfBirth', 'phone', 'description', 'address', 'status'),
            [
                'password' => Hash::make($request->password),
                "role"=> $request->role ?? "student",
                'image' => $request->image ? URL::to('/').'/storage/'.$request->file('image')->store('image/users', 'public') : null
            ]
        ));
        return new UserResource($user);
    }

    /**
     * Login to user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required'
        ]);
        $user = User::where('email', $request->email)->get();
        if ($user->count() > 0) {
            if (Hash::check($request->password, $user[0]->password)) {
                return response()->json(array("message" => 'Login successful!', "data" => $user[0]));
            }
        }
        return response()->json(['message' => "Failed to login!"], 401);
    }

    // public function login()
    // {
    //     $credentials = request(['email', 'password']);

    //     if (! $token = auth()->attempt($credentials)) {
    //         return response()->json(['error' => 'Unauthorized'], 401);
    //     }

    //     return $this->respondWithToken($token);
    // }

    /**
     * Display the specified resource.
     *
     * @param  User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return new UserResource($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'email' => 'email|string|unique:users',
            'name' => 'string',
            'gender' => 'in:male,female',
            'level' => 'in:second-year student,third-year student',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'dateOfBirth' => 'date',
            'description' => 'string|min:10',
            'address' => 'string',
            'status' => 'in:active,inactive',
            'role' => 'in:company,student',
        ]);

        $user->update(array_merge(
            $request->only('email', 'name', 'gender', 'dateOfBirth', 'phone', 'description', 'address', 'status'),
            [
                'password' => Hash::make($request->password),
                "role"=> $request->role ?? "student",
                'image' => $request->image ? URL::to('/').'/storage/'.$request->file('image')->store('image/users', 'public') : null
            ]
        ));
        return new UserResource($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
    }
}
