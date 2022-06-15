<?php

namespace App\Http\Controllers\BackEnd;

use App\Repositories\UserRepository;
use App\Repositories\WorkersRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var WorkersRepository
     */
    private $workersRepository;

    /**
     * UserController constructor.
     * @param UserRepository $userRepository
     * @param WorkersRepository $workersRepository
     */
    public function __construct( UserRepository $userRepository, WorkersRepository $workersRepository)
    {
        $this->middleware('auth');
        $this->userRepository = $userRepository;
        $this->workersRepository = $workersRepository;
    }

    public function index()
    {
        $employees = $this->userRepository->getAll();

        return view('admin.users.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = $this->workersRepository->getEmployeeByStatus(1);

        return view('admin.users.create', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = \Auth::user();
        $inputs = $request->post();
        $inputs['user_created_id'] = $user->id;

        $usernameCheck = $this->userRepository->getUserByUsername($inputs['username']);

        if($usernameCheck){
           return redirect(route('user.index'))->with(['status'=>'danger','message'=>__('message.administration.username-exist-error-info',['username'=>$inputs['username']])]);
        }

        $employee = $this->workersRepository->getById($inputs['employee']);

        $senderName = $employee->name. ' '.$employee->surname;
        $subject = __('message.mails.account-creation');
        $destinationEmail = $employee->email;
        $inputs['name']= $employee->name. ' '.$employee->surname;

        try{
            $response =  \DB::transaction(function () use ($inputs,$employee,$senderName,$destinationEmail,$subject){

             $userInputs = [
                           'username'=>$inputs['username'],
                           'password'=> \Hash::make($inputs['password']),
                           'workers_id'=>$inputs['employee'],
                           'status' => 1,
                           'role'=>$inputs['role'],
                           'user_created_id'=>$inputs['user_created_id'],
                ];

                $this->userRepository->store($userInputs);

                \Mail::send('admin.mails.user', ['inputs'=>$inputs], function($message) use($senderName,$destinationEmail,$subject) {
                    $message->to($destinationEmail,$senderName)->subject($subject);
                });

                return redirect(route('user.index'))->with(['status'=>'success','message'=>__('message.administration.create-success-info',['name'=>$employee->name.' '.$employee->surname,'email'=>$employee->email])]);
            });

            return $response;

        }catch (\Exception $e){
            dd($e);
            $response = redirect(route('user.index'))->with(['status'=>'danger','message'=>__('message.administration.create-error-info',['name'=>$inputs['name'].' '.$inputs['surname']])]);

        }
        return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employees = $this->workersRepository->getEmployeeByStatus(1);
        $user = $this->userRepository->getUserBYId($id);

        if(!$user){
            return  redirect(route('user.index'))->with(['status'=>'info','message'=>__('message.administration.user-not-found-info')]);
        }

        return view('admin.users.edit',compact('user','employees'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = $this->userRepository->getById($id);
        $userAuth = \Auth::user();
        $inputs = $request->post();
        $inputs['user_updated_id'] = $userAuth->id;
        unset($inputs['password']);

        if(!$user){
            return  redirect(route('user.index'))->with(['status'=>'danger','message'=>__('message.administration.user-not-found-info')]);
        }

        try{
            $response =  \DB::transaction(function () use ($id,$inputs/*,$employee,$senderName,$destinationEmail,$subject*/){

                $this->userRepository->update($id,$inputs);
/*
                \Mail::send('admin.mails.user', ['inputs'=>$inputs], function($message) use($senderName,$destinationEmail,$subject) {
                    $message->to($destinationEmail,$senderName)->subject($subject);
                });*/

                return redirect(route('user.index'))->with(['status'=>'success','message'=>__('message.administration.edit-user-success-info',['username'=>$inputs['username']])]);
            });

            return $response;

        }catch (\Exception $e){
            dd($e);
            $response = redirect(route('user.index'))->with(['status'=>'danger','message'=>__('message.administration.create-error-info',['name'=>$inputs['name'].' '.$inputs['surname']])]);

        }
        return $response;
    }

    public function disableUser($id)
    {
        $user = $this->userRepository->getById($id);

        if(!$user){
            return  redirect(route('user.index'))->with(['status'=>'danger','message'=>__('message.administration.user-not-found-info')]);
        }

        try{
             $this->userRepository->update($id,['status'=>0]);

            $response = redirect(route('user.index'))->with(['status'=>'success','message'=>__('message.administration.disabling-user-success-info',['username'=>$user->username])]);

        }catch (\Exception $e){

            $response = redirect(route('user.index'))->with(['status'=>'danger','message'=>__('message.administration.disabling-user-error-info',['username'=>$user->username])]);

        }
        return $response;
    }

    public function enableUser($id)
    {
        $user = $this->userRepository->getById($id);

        if(!$user){
            return  redirect(route('user.index'))->with(['status'=>'danger','message'=>__('message.administration.user-not-found-info')]);
        }

        try{
             $this->userRepository->update($id,['status'=>1]);

            $response = redirect(route('user.index'))->with(['status'=>'success','message'=>__('message.administration.enabling-user-success-info',['username'=>$user->username])]);

        }catch (\Exception $e){

            $response = redirect(route('user.index'))->with(['status'=>'danger','message'=>__('message.administration.enabling-user-error-info',['username'=>$user->username])]);

        }
        return $response;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $worker = $this->workersRepository->getById($id);

        if(!$worker){
            return  redirect(route('workers.index'))->with(['status'=>'danger','message'=>__('message.workers.branch-not-found-info')]);
        }

        try{
            $this->workersRepository->destroy($id);

            $response = redirect(route('workers.index'))->with(['status'=>'success','message'=>__('message.workers.delete-success-info',['name'=>$worker->name.' '.$worker->surname])]);
        }catch (\Exception $e){
            $response = redirect(route('workers.index'))->with(['status'=>'danger','message'=>__('message.workers.delete-info-info',['name'=>$worker->name.' '.$worker->surname])]);

        }
        return $response;
    }
}
