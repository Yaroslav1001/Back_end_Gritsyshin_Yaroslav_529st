<?php

namespace App\Http\Controllers;

use App\Models\comments;
use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GuestBookController extends Controller
{
    public function index() {

        $comments = comments::all();

        return view('guestbook', compact('comments'));
    }
    public function store()
    {
        $data = request()-> validate([
            'name' => 'string',
            'email' => 'string',
            'text' => 'string',
            'date' => '',
        ]);
        comments::create($data);
        return redirect()->route('guestbook.index');
    }
}
