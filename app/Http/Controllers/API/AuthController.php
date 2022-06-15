<?php

namespace App\Http\Controllers\API;

use App\Repositories\CategoriesRepository;
use App\Repositories\LevelRepository;
use App\Repositories\QuestionRepository;
use App\Repositories\UserRepository;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;


class AuthController extends Controller
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    public $loginAfterSignUp = true;
    /**
     * @var QuestionRepository
     */
    private $questionRepository;
    /**
     * @var LevelRepository
     */
    private $levelRepository;
    /**
     * @var CategoriesRepository
     */
    private $categoriesRepository;


    /**
     * AuthController constructor.
     * @param CategoriesRepository $categoriesRepository
     * @param UserRepository $userRepository
     * @param QuestionRepository $questionRepository
     * @param LevelRepository $levelRepository
     */
    public function __construct(CategoriesRepository $categoriesRepository, UserRepository $userRepository, QuestionRepository $questionRepository, LevelRepository $levelRepository)
    {
        $this->userRepository = $userRepository;
        $this->questionRepository = $questionRepository;
        $this->levelRepository = $levelRepository;
        $this->categoriesRepository = $categoriesRepository;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function register(Request $request)
    {

        try{
            $data = $request->input();
            $data['password'] = Hash::make($data['password']);
            $data['code'] = substr(str_shuffle("0123456789"), 0, 5);
            $destinationEmail = $data['email'];

            $user = $this->userRepository->store($data);

            Mail::send('mail.account-verification', compact('data'), function($message) use($destinationEmail) {
                $message->to($destinationEmail)->subject('Vérification de compte');
            });
            //Mail::to($data['email'])->send(new SendMail($data,'mail.account-verification'));
            return response([
                'success'=>true,
                'message' => __('auth.email-verification-mail-message'),
                'user' => $user,
            ]);
            /* if ($this->loginAfterSignUp) {
                      return $this->login($request);
                  }*/

        }catch (\Exception $e) {
            dd($e);
            // something went wrong whilst attempting to encode the token
            return response([
                'success'=>false,
                'message' => __('auth.sign-up-error'),
                'error' => $e,
            ],408);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (!$token = \JWTAuth::attempt($credentials)) {
            return response([
                'success'=>false,
                'error' => $credentials,
                'msg' => __('auth.failed')
            ], 422);
        }

        $user = auth()->user();

        if(!$user->email_verified_at){
            return response()->json([
                'success'=> true,
                'user' => $user,
                'message' => __('message.verify-account-info'),
            ]);
        }
        $questions = $this->questionRepository->getPublishedQuestions(1);
        $levels = $this->levelRepository->getAll();
        $categories = $this->categoriesRepository->getAll();
        return response()->json([
            'success'=> true,
            'token' => $token,
            'user' => $user,
            'levels' => $levels,
            'categories' => $categories,
            'questions' => $questions,
        ]);
    }

    public function codeVerification(Request $request)
    {
        $inputs = $request->only('code','user_id');

        try{
            $user = $this->userRepository->getCode($inputs['code'],$inputs['user_id']);

            if(!$user){
                return response()->json([
                    'success'=>false,
                    'message'=>__('message.confirmation-code-error')
                ],425);
            }
            $this->userRepository->update($user->id,['verified'=>0,'email_verified_at'=>Carbon::now()->format('Y-m-d H:i:s')]);
            $questions = $this->questionRepository->getPublishedQuestions(1);
            $levels = $this->levelRepository->getAll();
            $categories = $this->categoriesRepository->getAll();

            $user = $this->userRepository->getCode($inputs['code'],$inputs['user_id']);

            return response()->json([
                'success'=>true,
                'questions'=>$questions,
                'levels'=>$levels,
                'categories'=>$categories,
                'user'=>$user,
                'token'=>Str::random(120),
                'message'=>__('message.confirmation-code-success')
            ],200);

        }catch (\Exception $exception){
            return response()->json([
                'success'=>false,
                'message'=>__('message.code-processing-error')
            ],500);
        }
    }

    public function resendCode(Request $request){
        $email = $request->only('email');
        $user = $this->userRepository->getUserByEmail($email);
        $data['code'] = substr(str_shuffle("0123456789"), 0, 5);
        try{
            if(!$user){
                return response([
                    'success'=>false,
                    'message' => __('auth.user-not-found'),
                ],423);
            }
            Mail::to($email)->send(new SendMail($data,'mail.account-verification'));
            return response([
                'success'=>true,
                'message' => __('auth.email-verification-mail-message'),
            ],200);
        }catch (\Exception $exception){
            $exception->
            return response([
                'success'=>false,
                'message' => __('message.code-resending-error'),
            ],420);
        }
    }

    public function user(Request $request)
    {

        $this->validate($request, [
            'token' => 'required'
        ]);

        $user = JWTAuth::authenticate($request->token);
        return response([
            'success'=> true,
            'data' => $user
        ]);
    }

    /**
     * Log out
     * Invalidate the token, so user cannot use it anymore
     * They have to relogin to get a new token
     *
     * @param Request $request
     */

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function logout(Request $request) {
        $this->validate($request, ['token' => 'required']);

        try {
            JWTAuth::invalidate($request->input('token'));
            return response([
                'success' => true,
                'msg' => 'You have successfully logged out.'
            ]);
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response([
                'success'=>false,
                'msg' => 'Failed to logout, please try again.'
            ]);
        }
    }

    public function refresh()
    {
        return response([
            'success'=> true,
            'token'=>auth()->refresh()
        ]);
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function createNewToken($token){
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user()
        ]);
    }
}
