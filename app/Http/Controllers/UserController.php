<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
class UserController extends Controller
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;
    
    public function __construct()
    {
        $this->middleware('auth.basic', ['show', 'index', 'store', 'update'. 'destroy']);
    }
    
    public function index(){
        if (User::all()!=null)
            return response()->json(['users' => User::all()], 200);
        else
            return response()->json(['code' => '404', 'message' => 'User objects not found'], 404);
    }
    
    public function store(Request $request)
    {
        if ($request->input('username') != null){
            if (User::where('username', $request->input('username'))->count()>0){
                return response()->json(['code' => '400', 'message' => 'Username already exists', "username" => $request->input("username")], 400);
            }
        }
        else
            return response()->json(['code' => '422', 'message' => 'Username is empty'], 422);

        if ($request->input('email') != null){
            if (User::where('email', $request->input('email'))->count()>0){
                return response()->json(['code' => '400', 'message' => 'Email already exists', "email" => $request->input("email")], 400);
            }
        }
        else
            return response()->json(['code' => '422', 'message' => 'Email is empty'], 422);

        if ($request->input('password') != null){
            $newUser = User::create($request->all());
            $newUser->password = bcrypt($request->input('password'));
            $newUser->save();
            return response()->json(['message'=>'User created successfully','user' => $newUser], 200);
        }
        else
            return response()->json(['code' => '422', 'message' => 'Password is empty'], 422);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'username' => 'required|max:255|unique:users,username,'.$id,
            'email' => 'required|email|max:255|unique:users,email,'.$id,
            'password' => 'min:6',
        ]);
        try {
            $user = User::findOrFail($id);
            $user->update($request->except(['password', 'id']));
            
            return response()->json(['code' => 200, 'message' => 'User updated successfully', 'user' => $user], 200);
        } catch (ModelNotFoundException $ex) {
            return response()->json(['code' => 404, 'message' => 'User not found', 'id' => $id], 404);
        }catch (QueryException $ex) {
            return response()->json(['code' => 400, 'message' => 'User or email already exists'], 400);
        }
    }

    public function show($id)
    {
        if (User::find($id)!=null)
            return response()->json(['users' => User::find($id)], 200);
        else
            return response()->json(['code' => '404', 'message' => 'User not found', 'id' => $id], 404);
    }

    public function destroy($id)
    {
        if (User::find($id)!=null) {
            User::destroy($id);
            return response()->json(['code' => '204', 'message' => 'User deleted successfully'], 204);
        }
        else
            return response()->json(['code' => '404', 'message' => 'User not found', 'id' => $id], 404);
    }

    public function options(){
        $headers = ['Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE'];
        return response()->make('', 200, $headers);
    }
}
