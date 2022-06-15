<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Repositories\ErrorManagerRepository;
use App\Repositories\ServiceRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Image;

class ServicesController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $userRepository;
    /**
     * @var ServiceRepository
     */
    private $serviceRepository;
    /**
     * @var ErrorManagerRepository
     */
    private $errorManagerRepository;


    /**
     * ServicesController constructor.
     * @param ErrorManagerRepository $errorManagerRepository
     * @param ServiceRepository $serviceRepository
     * @param UserRepository $userRepository
     */
    public function __construct(ErrorManagerRepository $errorManagerRepository, ServiceRepository $serviceRepository, UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
        $this->serviceRepository = $serviceRepository;
        $this->errorManagerRepository = $errorManagerRepository;
    }

      public function index(){
            $services = $this->serviceRepository->getAll();

            return view('admin.service.index', compact('services'));
      }

      public function create(){
          $data = ['label_en'=>'Description détaillée (En)','label_fr'=>'Description détaillée (Fr)'];

          return view('admin.service.create', compact('data'));
      }

     public function store(Request $request){
         $inputs = $request->post();
         $document = $request->file('document');
         $image = $request->file('image');
         $inputs['code'] = str_replace(' ','-',$inputs['title_fr']);
         $inputs['code'] = str_replace('/','-',$inputs['code']);
         $inputs['code'] = strtolower(str_replace('--','-',$inputs['code']));

         try{
             $response =  \DB::transaction(function () use ($document,$image,$inputs){
                 if($image){
                     $newName = time().'-service.'.$image->getClientOriginalExtension();
                     $inputs['avatar'] = $newName;
                     $destinationPath = public_path('/frontend/images/');
                     $image->move($destinationPath, $newName);
                     $inputs['image'] = $newName;
                 }

                 if($document){
                     $documentName = time().'-service.'.$document->getClientOriginalExtension();
                     $destinationPath = public_path('/documents');
                     $document->move($destinationPath, $documentName);
                     $inputs['document'] = $documentName;
                 }

                 //Preparing image data
                 $this->serviceRepository->store($inputs);
                 return  redirect(route('service.index'))->with(['status'=>'success','message'=>'Service créée avec succès']);
             });
             return $response;

         }catch (\Exception $e){
             $error = ['id'=>\Str::random(50), 'action'=> 'Service Creation', 'message'=> $e->getMessage(), 'code'=> $e->getCode(), 'feature'=> 'Service Creation'];
             $this->errorManagerRepository->store($error);
             $response = redirect(route('service.index'))->with(['status'=>'danger','message'=>'Erreur lors de création de service']);
         }

         return $response;
     }

    public function edit($id){
        $service = $this->serviceRepository->getById($id);

        if(!$service){
            return redirect(route('service.index'))->with(['status'=>'danger','message'=>'Service introuvable']);
        }

        $data = ['label_en'=>'Description détaillée (En)','label_fr'=>'Description détaillée (Fr)'];
        $data['description_en'] = $service->description_en;
        $data['description_fr'] = $service->description_fr;

        return view('admin.service.edit', compact('data','service'));
    }

    public function update(Request $request, $id)
    {

        $user = \Auth::user();
        $inputs = $request->post();
        $inputs['code'] = str_replace(' ','-',$inputs['title_en']);
        $inputs['code'] = str_replace('/','-',$inputs['code']);
        $inputs['code'] = strtolower(str_replace('--','-',$inputs['code']));
        $image = $request->file('image');
        $document = $request->file('document');
        $inputs['user_updated_id'] = $user->id;

        try{
            $response =  \DB::transaction(function () use ($id,$document,$image,$inputs){
                //Saving logo in logo repository
                if($image){
                    $newName = time().'-service.'.$image->getClientOriginalExtension();
                    Image::make($image)->resize(371,255)->save(public_path('/frontend/images/services/'.$newName));
                    $inputs['image'] = $newName;
                }

                if($document){
                    $documentName = time().'-service.'.$document->getClientOriginalExtension();
                    $destinationPath = public_path('/documents');
                    $document->move($destinationPath, $documentName);
                    $inputs['document'] = $documentName;
                }

                //saving updated data

                $this->serviceRepository->update($id,$inputs);
                return  redirect(route('service.index'))->with(['status'=>'success','message'=>'Service a été mise en jour avec succès']);
            });
            return $response;

        }catch (\Exception $e){
            $error = ['id'=>Str::random(50), 'action'=> 'Update', 'message'=> $e->getMessage(), 'code'=> $e->getCode(), 'feature'=> 'Services update member registration'];
            $this->errorManagerRepository->store($error);
            $response = redirect(route('service.index'))->with(['status'=>'danger','message'=>'Erreur lors de mise en jour de service']);
        }

        return $response;
    }

    public function show($id){
        $service = $this->serviceRepository->getById($id);

        if(!$service){
            return redirect(route('service.index'))->with(['status'=>'danger','message'=>'Service introuvable']);
        }

        return view('admin.service.show', compact('service'));
    }

    public function destroy($id)
    {
        $news = $this->serviceRepository->getById($id);

        if($news->is_published == 1){
            return  redirect(route('service.index'))->with(['status'=>'info','message'=>'Can\'t delete event that is already published or active']);
        }

        if(!$news){
            return  redirect(route('service.index'))->with(['status'=>'danger','message'=>__('message.news.news-not-found-info')]);
        }

        try{
            $this->serviceRepository->destroy($id);

            $response = redirect(route('service.index'))->with(['status'=>'success','message'=>__('message.news.delete-success-info')]);
        }catch (\Exception $e){
            $response = redirect(route('service.index'))->with(['status'=>'danger','message'=>'Can\'t delete news because it\'s already linked to donations or other links. Check with administration']);

        }
        return $response;
    }

    public function publish($id){

        $user = \Auth::user();
        $inputs = ['is_published'=>1,'user_updated_id'=>$user->id];
        $news = $this->serviceRepository->getById($id);

        if(!$news){
            return  redirect(route('service.index'))->with(['status'=>'danger','message'=>'Service introuvable!']);
        }
        try{
            $this->serviceRepository->update($id,$inputs);
            $response = redirect(route('service.index'))->with(['status'=>'success','message'=>'Service publié avec succés!']);
        }catch (\Exception $exception){
            $response = redirect(route('service.index'))->with(['status'=>'danger','message'=>'Un erreur se produit lors de traitement de vos requete']);
        }

        return $response;
    }

    public function unPublished ($id){

        $user = \Auth::user();
        $inputs = ['is_published'=>0];
        $inputs['user_updated_id'] = $user->id;

        $news = $this->serviceRepository->getById($id);

        if(!$news){
            return  redirect(route('service.index'))->with(['status'=>'danger','message'=>'Service introuvable!']);
        }
        try{
            $this->serviceRepository->update($id,$inputs);
            $response = redirect(route('service.index'))->with(['status'=>'success','message'=>'Service de-publié avec succés!']);
        }catch (\Exception $exception){
            $response = redirect(route('service.index'))->with(['status'=>'danger','message'=>'Un erreur se produit lors de traitement de vos requete']);
        }

        return $response;
    }
}

