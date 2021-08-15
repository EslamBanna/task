<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class Task extends Controller
{
    public function index(){
        $users = User::get();
        return view('layouts.task',compact('users'));
    }

    public function store(Request $request){
        User::create([
            'name' => $request->name
        ]);
        //todo
    }
}
