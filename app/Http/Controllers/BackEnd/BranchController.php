<?php

namespace App\Http\Controllers\BackEnd;

use App\Repositories\BranchesRepository;
use App\Repositories\CityRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BranchController extends Controller
{
    /**
     * @var CityRepository
     */
    private $cityRepository;

    /**
     * @var BranchesRepository 
     */
    private $branchesRepository;

    /**
     * BranchController constructor.
     * @param BranchesRepository $branchesRepository
     * @param CityRepository $cityRepository
     */
    public function __construct( BranchesRepository $branchesRepository, CityRepository $cityRepository)
    {
        $this->middleware('auth');
        $this->branchesRepository = $branchesRepository;
        $this->cityRepository = $cityRepository;
    }

    public function index()
    {
        $branches = $this->branchesRepository->getAll();

        return view('admin.branch.index',compact('branches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.branch.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->post();

        try{
             $this->branchesRepository->store($inputs);

            $response = redirect(route('branch.index'))->with(['status'=>'success','message'=>__('message.crud.create-success-info',['name'=>'Branch'])]);
        }catch (\Exception $e){
            $response = redirect(route('branch.index'))->with(['status'=>'danger','message'=>__('message.crud.create-error-info',['name'=>'Branch'])]);
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
        $branch = $this->branchesRepository->getById($id);
        if(!$branch){
            return  redirect(route('branch.index'))->with(['status'=>'info','message'=>__('message.branch.branch-not-found-info')]);
        }
        return view('admin.branch.edit',compact('branch'));
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
        $branch = $this->branchesRepository->getById($id);

        if(!$branch){
            return  redirect(route('branch.index'))->with(['status'=>'danger','message'=>__('message.branch.branch-not-found-info')]);
        }


        try{
            $inputs = $request->post();

            $this->branchesRepository->update($id,$inputs);

            $response = redirect(route('branch.index'))->with(['status'=>'success','message'=>__('message.crud.edit-success-info',['name'=>'Branch'])]);
        }catch (\Exception $e){
            $response = redirect(route('branch.index'))->with(['status'=>'danger','message'=>__('message.branch.edit-error-info',['name'=>'Branch'])]);

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
        $branch = $this->branchesRepository->getById($id);

        if(!$branch){
            return  redirect(route('branch.index'))->with(['status'=>'danger','message'=>__('message.branch.branch-not-found-info')]);
        }

        try{
            $this->branchesRepository->destroy($id);

            $response = redirect(route('branch.index'))->with(['status'=>'success','message'=>__('message.branch.delete-success-info')]);
        }catch (\Exception $e){
            $response = redirect(route('branch.index'))->with(['status'=>'danger','message'=>__('message.branch.delete-info-info')]);

        }
        return $response;
    }
}
