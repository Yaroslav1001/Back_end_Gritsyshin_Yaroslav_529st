<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index() {

        $users = user::all();

        return view('register.index', compact('users'));
    }

//    public function register(Request $request)
//    {
//        // валидация данных формы
//        $validatedData = $request->validate([
//            'email' => 'required|email|max:255|unique:user',
//            'password' => 'required|min:8',
//        ]);
//
//        // создание нового пользователя
//        $user = user::create([
//            'email' => $validatedData['email'],
//            'password' => Hash::make($validatedData['password']),
//        ]);
//
//        //перенаправление пользователя
//
//        return redirect('/login');
//    }
}

