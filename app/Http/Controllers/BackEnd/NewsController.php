<?php

namespace App\Http\Controllers\Backend;

use App\Repositories\ErrorManagerRepository;
use App\Repositories\NewsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;

class NewsController extends Controller
{
    /**
     * @var NewsRepository
     */
    private $newsRepository;
    /**
     * @var ErrorManagerRepository
     */
    private $errorManagerRepository;


    /**
     * NewsController constructor.
     * @param NewsRepository $newsRepository
     * @param ErrorManagerRepository $errorManagerRepository
     */
    public function __construct( NewsRepository $newsRepository, ErrorManagerRepository $errorManagerRepository)
    {

        $this->newsRepository = $newsRepository;
        $this->errorManagerRepository = $errorManagerRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $news = $this->newsRepository->getAllBE();

        return view('admin.news.index',compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create');
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

        $image = $request->file('image');
        $document = $request->file('document');

        $inputs['user_created_id'] = $user->id;
        $inputs['code'] = $this->documentName($inputs['type']);


        try{
            $response =  \DB::transaction(function () use ($document,$image,$inputs){
                //Saving logo in logo repository
                if($image){
                        $newName = time().'-'.$inputs['code'].'.'.$image->getClientOriginalExtension();
                        $destinationPath = public_path('/frontend/images/publications/');
                        $image->move($destinationPath, $newName);
                        $inputs['images'] = $newName;
                }

                if($document){
                        $documentName = time().'-'.$inputs['code'].'.'.$document->getClientOriginalExtension();
                        $destinationPath = public_path('/documents');
                        $document->move($destinationPath, $documentName);
                        $inputs['document'] = $documentName;
                }

                //Preparing image data

                $this->newsRepository->store($inputs);
                return  redirect(route('news.index'))->with(['status'=>'success','message'=>'Publication créée avec succès']);
            });
            return $response;

        }catch (\Exception $e){
            $error = ['id'=>\Str::random(50), 'action'=> 'Update', 'message'=> $e->getMessage(), 'code'=> $e->getCode(), 'feature'=> 'Creating publication'];
            $this->errorManagerRepository->store($error);
            dd($e);
            $response = redirect(route('news.index'))->with(['status'=>'danger','message'=>'Erreur lors de création de publication']);
        }

        return $response;
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function show($id)
    {
        $news = $this->newsRepository->getById($id);

        if(!$news){
            return redirect(route('news.index'))->with(['status'=>'danger','message'=>__('message.crud.not-found-info',['name'=>__('labels.news.index')])]);
        }

        return view('admin.news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $news = $this->newsRepository->getById($id);

        if(!$news){
            return redirect(route('news.index'))->with(['status'=>'danger','message'=>'Publication introuvable']);
        }

        $images = json_decode($news->images);

        return view('admin.news.edit',compact('images','news'));
    }

    public function update(Request $request, $id)
    {

        $user = \Auth::user();
        $inputs = $request->post();

        $image = $request->file('image');
        $document = $request->file('document');

        $inputs['user_updated_id'] = $user->id;

        try{
            $response =  \DB::transaction(function () use ($id,$document,$image,$inputs){
                //Saving logo in logo repository
                if($image){
                    $newName = time().'-'.$inputs['code'].'.'.$image->getClientOriginalExtension();
                    $destinationPath = public_path('/frontend/images/publications/');
                    $image->move($destinationPath, $newName);
                    $inputs['images'] = $newName;
                }

                if($document){
                    $documentName = time().'-'.$inputs['code'].'.'.$document->getClientOriginalExtension();
                    $destinationPath = public_path('/documents');
                    $document->move($destinationPath, $documentName);
                    $inputs['document'] = $documentName;
                }

                //Preparing image data

                $this->newsRepository->update($id,$inputs);
                return  redirect(route('news.index'))->with(['status'=>'success','message'=>'Publication a été mise en jour avec succès']);
            });
            return $response;

        }catch (\Exception $e){
            $error = ['id'=>\Str::random(50), 'action'=> 'Publication', 'message'=> $e->getMessage(), 'code'=> $e->getCode(), 'feature'=> 'updating publication'];
            $this->errorManagerRepository->store($error);
            $response = redirect(route('news.index'))->with(['status'=>'danger','message'=>'Erreur lors de mise en jour de publication']);
        }

        return $response;
    }

    public function destroy($id)
    {
        $news = $this->newsRepository->getById($id);

        if($news->is_published == 1){
            return  redirect(route('news.index'))->with(['status'=>'info','message'=>'Can\'t delete event that is already published or active']);
        }

        if(!$news){
            return  redirect(route('news.index'))->with(['status'=>'danger','message'=>__('message.news.news-not-found-info')]);
        }

        try{
            $this->newsRepository->destroy($id);

            $response = redirect(route('news.index'))->with(['status'=>'success','message'=>__('message.news.delete-success-info')]);
        }catch (\Exception $e){
            $response = redirect(route('news.index'))->with(['status'=>'danger','message'=>'Can\'t delete news because it\'s already linked to donations or other links. Check with administration']);

        }
        return $response;
    }


    public function publish($id){

        $user = \Auth::user();
        $inputs = ['is_published'=>1,'user_updated_id'=>$user->id];
        $news = $this->newsRepository->getById($id);

        if(!$news){
            return  redirect(route('news.index'))->with(['status'=>'danger','message'=>__('message.news.event-not-found-info')]);
        }
        try{
            $this->newsRepository->update($id,$inputs);
            $response = redirect(route('news.index'))->with(['status'=>'success','message'=>__('message.news.published-success',['name'=>__('labels.news.index')])]);
        }catch (\Exception $exception){
            $response = redirect(route('news.index'))->with(['status'=>'danger','message'=>__('message.news.error-info',['name'=>__('labels.news.index')])]);
        }

        return $response;
    }

    public function unPublish($id){

        $user = \Auth::user();
        $inputs = ['is_published'=>0];
        $inputs['user_updated_id'] = $user->id;

        $news = $this->newsRepository->getById($id);

        if(!$news){
            return  redirect(route('news.index'))->with(['status'=>'danger','message'=>__('message.news.event-not-found-info')]);
        }
        try{
            $this->newsRepository->update($id,$inputs);
            $response = redirect(route('news.index'))->with(['status'=>'success','message'=>__('message.news.un-published-success',['name'=>__('labels.news.index')])]);
        }catch (\Exception $exception){
            $response = redirect(route('news.index'))->with(['status'=>'danger','message'=>__('message.news.error-info',['name'=>__('labels.news.index')])]);
        }

        return $response;
    }


    public function eventDetails($code){
        $event = getTableSelfCondition('news','code',$code,true);
        if(!$event){
            return abort('404');
        }
        $images = json_decode($event->images);

        $description_en = is_array(json_decode($event->description_en))? $this->arrayToHtml(json_decode($event->description_en)): $event->description_en;
        $description_fr = is_array(json_decode($event->description_fr))? $this->arrayToHtml(json_decode($event->description_fr)): $event->description_fr;
        return view('frontend-2.pages.news-details',compact('description_en','description_fr','images','event'));
    }


    public function documentName($type){
        switch ($type){
            case 0:
                    return generateCode('NEWS-','news','code');
            break;

            case 1:
                return generateCode('ART-','news','code');
            break;

            case 2:
                return generateCode('OUV-','news','code');
            break;

            case 3:
                return generateCode('FB-','news','code');
            break;

            default:
                return generateCode('other-','news','code');
            break;
        }
    }
}
