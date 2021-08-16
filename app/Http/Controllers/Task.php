<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\userList;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Validator;
use Auth;
use JWTAuth;

class Task extends Controller
{
    use GeneralTrait;


    ####### start first task ######################

    public function getAllUsers()
    {
        $users = userList::get();
        return response()->json($users);
        // return view('layouts.task', compact('users'));
    }

    public function storeUser(Request $request)
    {
        try {
            userList::create([
                'name' => $request->name
            ]);

            return response()->json(['msg' => 'addedd successfully']);
        } catch (\Exception $e) {
            return response()->json(['errMsg' => 'some thing went wrong']);
        }
    }
    ####### end first task ######################




    ####### start second task ######################
    public function index()
    {
        try {
            $users = userList::get();
            return response()->json($users);
            // return view('layouts.task',compact('users'));
        } catch (\Exception $e) {
            return $this->returnError($e->getCode(), $e->getMessage());
        }
    }

    public function login(Request $request)
    {
        try {
            $rules = [
                'email' => 'required|email|exists:users,email',
                'password' => 'required'
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                $code = $this->returnCodeAccordingToInput($validator);
                return $this->returnValidationError($code, $validator);
            }
            $cardintions = $request->only(['email', 'password']);
            $token = Auth::guard('user-api')->attempt($cardintions);
            if (!$token) {
                return $this->returnError('E001', 'not founded');
            }
            $admin = Auth::guard('user-api')->user();
            $admin->token = $token;
            return $this->returnSuccessMessage($admin);
        } catch (\Exception $e) {
            return $this->returnError($e->getCode(), $e->getMessage());
        }
    }

    public function logout(Request $request)
    {
        try {
            $token = $request->authToken;
            if ($token) {
                JWTAuth::setToken($token)->invalidate();
                return $this->returnSuccessMessage('logout successfully');
            } else {
                return $this->returnError('E205', 'some thing went wrong');
            }
            // return response()->json(['logout' => true]);
        } catch (\Exception $e) {
            return $this->returnError('E205', 'some thing went wrong');
        }
    }

    public function store(Request $request)
    {
        try {
            userList::create([
                'name' => $request->name
            ]);

            return response()->json(['msg' => 'addedd successfully']);
            //todo
        } catch (\Exception $e) {
            return response()->json(['errMsg' => 'some thing went wrong']);
        }
    }
    ####### end second task ######################

}
