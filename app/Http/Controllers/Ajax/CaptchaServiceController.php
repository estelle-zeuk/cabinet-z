<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mews\Captcha\Captcha;

class CaptchaServiceController extends Controller
{
    public function capthcaFormValidate(Request $request)
    {
            $rules = ['captcha' => 'required|captcha'];
            $validator = validator()->make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json(['success'=>false, 'message'=> 'Captcha not correct. Refresh again']);
            } else {
                return response()->json(['success'=>true]);
            }
    }

    public function reloadCaptcha()
    {
        try{
            return response()->json(['success'=>true, 'captcha'=> captcha_img()]);
        }catch (\Exception $e){
            return response()->json(['success'=>false, 'captcha'=> 'An error occurred loading captcha. Refresh again']);
        }
    }
}
