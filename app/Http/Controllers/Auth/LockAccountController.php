<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LockAccountRequest;

class LockAccountController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function lockScreen()
    {
        session(['locked' => 'true']);
        $user = \Auth::user();
        return view('auth.lock-screen',compact('user'));
    }

    public function unlock(LockAccountRequest $request)
    {
        $password = $request->post()['password'];
/*dd(\Hash::check($password, \Auth::user()->password));*/

        if(\Hash::check($password, \Auth::user()->password)){
            $request->session()->forget('locked');
            return redirect('/');
        }

        return back()->with(['status'=>'danger','message'=>'Password does not match. Please try again.']);
    }
}