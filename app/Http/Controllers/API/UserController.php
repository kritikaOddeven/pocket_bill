<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class UserController extends Controller
{
    public $successStatus = 200;
    /**
     * login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        // dd('ds');
        $validator = Validator::make($request->all(), [
            'email'    => 'required|max:255',
            'password' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            return $this->apiResponse(false, "Invalid Data.", $validator->errors(), null, 400);
        }

        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user          = Auth::user();
            $data['token'] = $user->createToken('MyApp')->accessToken;
            // return response()->json(['success' => $success], $this-> successStatus);
            return $this->apiResponse(true, "Login Successfull.", null, $data, 200);
        } else {
            // return response()->json(['error'=>'Unauthorised'], 401);
            return $this->apiResponse(false, "Invalid Credentials.", null, null, 401);
        }
    }
    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'       => 'required',
            'email'      => 'required|unique:users',
            'password'   => 'required',
            'c_password' => 'required|same:password',
        ]);
        if ($validator->fails()) {
            return $this->apiResponse(false, "Invalid Data.", $validator->errors(), null, 401);
        }
        $input             = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user              = User::create($input);
        $success['token']  = $user->createToken('MyApp')->accessToken;
        // $success['name'] =  $user->name;
        // return response()->json(['success'=>$success], $this-> successStatus);
        return $this->apiResponse(true, "Register Successfull.", null, $success, 200);
    }
    /**
     * details api
     *
     * @return \Illuminate\Http\Response
     */
    public function details()
    {
        $user = Auth::user();
        // $user = User::all();
        return $this->apiResponse(true, "Details Get Successfully.", null, $user, 200);
        // return response()->json(['success' => $user], $this-> successStatus);
    }
}
