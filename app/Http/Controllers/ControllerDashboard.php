<?php

namespace App\Http\Controllers;

use App\Models\ModelUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ControllerDashboard extends Controller
{
    public function index()
    {
        $pageTitle = 'Dashboard';

        return view('dashboard', compact('pageTitle'));
    }

}
