<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InboxController extends Controller
{
    public function index()
    {
        return view('teachers.inbox');
    }
}
