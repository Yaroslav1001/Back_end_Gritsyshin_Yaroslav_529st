<?php

namespace App\Http\Controllers;

use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\user;


class LoginController extends Controller
{
    public function index()
    {

        return view('login');
    }

//    public function login(Request $request)
//    {
//        // Валидация данных формы
//        $validatedData = $request->validate([
//            'email' => 'required|email|max:255',
//            'password' => 'required',
//        ]);
//
//        // Попытка аутентификации пользователя
//        if (Auth::attempt(['email' => $validatedData['email'], 'password' => $validatedData['password']])) {
//            // Аутентификация успешна
//            return redirect('/admin');
//        } else {
//            // Неверные учетные данные
//            return back()->withErrors([
//                'email' => 'Неверные учетные данные.',
//            ]);
//        }
//    }
}

