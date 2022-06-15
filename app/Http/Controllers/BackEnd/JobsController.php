<?php

namespace App\Http\Controllers\BackEnd;

use App\Repositories\CityRepository;
use App\Repositories\DepartmentRepository;
use App\Repositories\JobsRepository;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class JobsController extends Controller
{
    /**
     * @var JobsRepository
     */
    private $jobsRepository;
    /**
     * @var PostRepository
     */
    private $postRepository;
    /**
     * @var DepartmentRepository
     */
    private $departmentRepository;
    /**
     * @var CityRepository
     */
    private $cityRepository;

    /**
     * JobsController constructor.
     * @param JobsRepository $jobsRepository
     * @param PostRepository $postRepository
     * @param DepartmentRepository $departmentRepository
     * @param CityRepository $cityRepository
     */
    public function __construct( JobsRepository $jobsRepository, PostRepository $postRepository, DepartmentRepository $departmentRepository, CityRepository $cityRepository)
    {
        $this->middleware('auth');
        $this->jobsRepository = $jobsRepository;
        $this->postRepository = $postRepository;
        $this->departmentRepository = $departmentRepository;
        $this->cityRepository = $cityRepository;
    }

    public function index()
    {
        $jobs = $this->jobsRepository->getAll();

        return view('admin.jobs.index',compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $positions = $this->postRepository->getActivePost(1);
        $locations = $this->cityRepository->getAll();
        $departments = $this->departmentRepository->getActiveDepartment(1);
        return view('admin.jobs.create',compact('positions','locations','departments'));
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


        try{
            $this->jobsRepository->store($inputs);

           $response = redirect(route('jobs.index'))->with(['status'=>'success','message'=>__('message.job.create-success-info')]);

        }catch (\Exception $exception){
            $response = redirect(route('jobs.index'))->with(['status'=>'danger','message'=>__('message.job.create-error-info')]);
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
        $job = $this->jobsRepository->getJobWithRelationsById($id);
        $responsibilities = json_decode($job->responsibilities);
        $requirements = json_decode($job->requirements);
        if(!$job){
            return redirect(route('jobs.index'))->with(['status'=>'danger','message'=>__('message.job.job-not-found')]);
        }

        return view('admin.jobs.show',compact('job','requirements','responsibilities'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $job = $this->jobsRepository->getJobWithRelationsById($id);

        if(!$job){
            return redirect(route('jobs.index'))->with(['status'=>'danger','message'=>__('message.job.job-not-found')]);
        }

        $positions = $this->postRepository->getActivePost(1);
        $locations = $this->cityRepository->getAll();
        $departments = $this->departmentRepository->getActiveDepartment(1);
        $responsibilities = json_decode($job->responsibilities);
        $requirements = json_decode($job->requirements);

        //dd($responsibilities,$requirements);
        return view('admin.jobs.edit',compact('positions','locations','departments','job','responsibilities','requirements'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $user = \Auth::user();
        $inputs = $request->post();
        $inputs['user_updated_id'] = $user->id;
        $job = $this->jobsRepository->getJobWithRelationsById($id);

        if(!$job){
            return redirect(route('jobs.index'))->with(['status'=>'danger','message'=>__('message.job.job-not-found')]);
        }

        //TODO Check if one can publish close job
     /*   if(!$job){
            return redirect(route('jobs.index'))->with(['status'=>'info','message'=>__('message.job.cant-update-close-')]);
        }*/

        try{

            $this->jobsRepository->update($id,$inputs);

            $response = redirect(route('jobs.index'))->with(['status'=>'success','message'=>__('message.job.update-success-info')]);

        }catch (\Exception $exception){
            $response = redirect(route('jobs.index'))->with(['status'=>'danger','message'=>__('message.job.update-error-info')]);
        }

        return $response;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getPositions()
    {
        try{
            $id = Input::get('id');
            $department = $this->departmentRepository->getByIdWithPositions($id);
           // $positions = $positions->postions;

            $department = view('admin.jobs.position',compact('department'))->render();

            return response()->json([
                'success' => true,
                'message' => $department,
            ]);
        }catch (\Exception $exception){

            return response()->json([
                'success' => false,
                'message' => __('message.job.error-loading-department')
            ]);
        }
    }

    /**
     * @param $id
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function openJob($id)
    {
        $user = \Auth::user();

        $inputs = ['user_updated_id'=>$user->id,'status'=>1];
        $job = $this->jobsRepository->getJobWithRelationsById($id);

        if(!$job){
            return redirect(route('jobs.index'))->with(['status'=>'danger','message'=>__('message.job.job-not-found')]);
        }

        //TODO Check if one can publish close job
        /*   if(!$job){
               return redirect(route('jobs.index'))->with(['status'=>'info','message'=>__('message.job.cant-update-close-')]);
           }*/

        try{
            $this->jobsRepository->update($id,$inputs);
            $response = redirect(route('jobs.index'))->with(['status'=>'success','message'=>__('message.job.open-success-info')]);

        }catch (\Exception $exception){
            $response = redirect(route('jobs.index'))->with(['status'=>'danger','message'=>__('message.job.open-error-info')]);
        }

        return $response;
    }

    /**
     * @param $id
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function closeJob($id)
    {
        $user = \Auth::user();

        $inputs = ['user_updated_id'=>$user->id,'status'=>0];
        $job = $this->jobsRepository->getJobWithRelationsById($id);

        if(!$job){
            return redirect(route('jobs.index'))->with(['status'=>'danger','message'=>__('message.job.job-not-found')]);
        }

        try{

            $this->jobsRepository->update($id,$inputs);

            $response = redirect(route('jobs.index'))->with(['status'=>'success','message'=>__('message.job.close-success-info')]);

        }catch (\Exception $exception){
            $response = redirect(route('jobs.index'))->with(['status'=>'danger','message'=>__('message.job.close-error-info')]);
        }

        return $response;
    }
}
