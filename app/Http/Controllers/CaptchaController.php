<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class CaptchaController extends Controller
{
    public function index() {
        return view('index');
    }

    public function capthcaFormValidate(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'username' => 'required',
            'captcha' => 'required|captcha'
        ]);
        User::create($validatedData);
    }

    public function reloadCaptcha() {
        return response()->json(['captcha' => captcha_img()]);
    }
}