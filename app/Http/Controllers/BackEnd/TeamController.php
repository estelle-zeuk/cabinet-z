<?php

namespace App\Http\Controllers\BackEnd;

use App\Repositories\ErrorManagerRepository;
use App\Repositories\TeamRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Image;

class TeamController extends Controller
{
    /**
     * @var TeamRepository
     */
    private $teamRepository;
    /**
     * @var ErrorManagerRepository
     */
    private $errorManagerRepository;

    /**
     * TeamController constructor.
     * @param TeamRepository $teamRepository
     * @param ErrorManagerRepository $errorManagerRepository
     */
    public function __construct( TeamRepository $teamRepository, ErrorManagerRepository $errorManagerRepository)
    {
        $this->teamRepository = $teamRepository;
        $this->errorManagerRepository = $errorManagerRepository;
    }

    public function index()
    {
        $team =  $this->teamRepository->getAll();

        return view('admin.team.index',compact('team'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.team.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $inputs = $request->post();
        $avatar = $request->file('avatar');

        try{
            $response =  \DB::transaction(function () use ($avatar,$inputs){
                if($avatar){
                    $memberImage = time() . str_replace(' ','', strtolower($inputs['full_name']) ). '.' . $avatar->getClientOriginalExtension();
                    //Updating company logo table
                    $inputs['avatar'] = $memberImage;
                    $destinationPath = public_path('/frontend/images/');
                    $avatar->move($destinationPath, $memberImage);
                    $this->teamRepository->store($inputs);
                }else{
                    $this->teamRepository->store($inputs);
                }
                return redirect(route('team.index'))->with(['status'=>'success','message'=>__('Membre ajouter avec succés!')]);
            });

         return $response;
        }catch (\Exception $e){
            $error = ['id'=>Str::random(50), 'action'=> 'Team', 'message'=> $e->getMessage(), 'code'=> $e->getCode(), 'feature'=> 'Team member registration'];
            dd($e);
            $this->errorManagerRepository->store($error);
         return redirect(route('team.index'))->with(['status'=>'danger','message'=>__('Erreur se produite lors d\'ajoute du membre!')]);
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $member = $this->teamRepository->getById($id);
        if(!$member){
            return  redirect(route('team.index'))->with(['status'=>'info','message'=>__('message.team-member-not-found-info')]);
        }
        $data = ['label_en'=>'Biliograpie (En)' ,'label_fr'=> 'Biliograpie (Fr)', 'description_en'=> $member->description_en, 'description_fr'=> $member->description_fr];

        return view('admin.team.edit',compact('member','data'));
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
        $member = $this->teamRepository->getById($id);

        if(!$member){
            return  redirect(route('team.index'))->with(['status'=>'danger','message'=>__('message.branch.branch-not-found-info')]);
        }

        $inputs = $request->post();
        $avatar = $request->file('avatar');

        try{
            $response =  \DB::transaction(function () use ($id, $avatar,$inputs){
                if($avatar){
                    $memberImage = time() . str_replace(' ','', strtolower($inputs['full_name']) ). '.' . $avatar->getClientOriginalExtension();

                    //Updating company logo table
                    $inputs['avatar'] = $memberImage;
                    $this->teamRepository->update($id, $inputs);

                    //Saving worker in worker repository
                    Image::make($avatar)->resize(600, 600)->save(public_path('/frontend/images/' . $memberImage));
                }else{
                    unset($inputs['avatar']);
                
                    $this->teamRepository->update($id,$inputs);
                }

                return redirect(route('team.index'))->with(['status'=>'success','message'=>__('Membre a été mise en jours avec succés!')]);
            });

            return $response;
        }catch (\Exception $e){
            dd($e);
            $error = ['id'=>Str::random(50), 'action'=> 'Team Update', 'message'=> $e->getMessage(), 'code'=> $e->getCode(), 'feature'=> 'Team update member registration'];

            $this->errorManagerRepository->store($error);
            return redirect(route('team.index'))->with(['status'=>'danger','message'=>__('Erreur se produite lors d\'ajoute du membre!')]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = $this->teamRepository->getById($id);

        if(!$member){
            return  redirect(route('team.index'))->with(['status'=>'danger','message'=>__('Membre introuvable!!!')]);
        }

        try{
            $this->teamRepository->destroy($id);

            $response = redirect(route('team.index'))->with(['status'=>'success','message'=>__('Suppression éffectué avec succés!!!')]);
        }catch (\Exception $e){
            $response = redirect(route('team.index'))->with(['status'=>'danger','message'=>__('Erreur lors de suppression!!!')]);
        }
        return $response;
    }

    public function publish($id){
        $inputs = ['status'=>1];

        try{
            $this->teamRepository->update($id,$inputs);
            $response = redirect(route('team.index'))->with(['status'=>'success','message'=>'Publié avec succés']);
        }catch (\Exception $e){
            $error = ['id'=>Str::random(50), 'action'=> 'Team Update', 'message'=> $e->getMessage(), 'code'=> $e->getCode(), 'feature'=> 'Team update member registration'];

            $this->errorManagerRepository->store($error);
            $response = redirect(route('team.index'))->with(['status'=>'danger','message'=>'Erreur de publication']);
        }

        return $response;
    }

    /**
     * @param $id
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function unPublished ($id){
        $inputs = ['status'=>0];

        try{
            $this->teamRepository->update($id,$inputs);
            $response = redirect(route('team.index'))->with(['status'=>'success','message'=>'Non Publié avec succés']);
        }catch (\Exception $e){
            $error = ['id'=>Str::random(50), 'action'=> 'Team Update', 'message'=> $e->getMessage(), 'code'=> $e->getCode(), 'feature'=> 'Team update member registration'];

            $this->errorManagerRepository->store($error);
            $response = redirect(route('team.index'))->with(['status'=>'danger','message'=>'Erreur de publication']);
        }

        return $response;
    }
}
