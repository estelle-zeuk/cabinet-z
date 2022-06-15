<?php

namespace App\Http\Controllers\BackEnd;


use App\Repositories\HistoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HistoryController extends Controller
{
    /**
     * @var HistoryRepository
     */
    private $historyRepository;

    /**
     * HistoryController constructor.
     * @param HistoryRepository $historyRepository
     */
    public function __construct(HistoryRepository $historyRepository)
    {

        $this->historyRepository = $historyRepository;
    }

    public function index()
    {
        $history = $this->historyRepository->getAll();

        return view('admin.history.index',compact('history'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.history.create');
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

            $this->historyRepository->store($inputs);

            $response = redirect(route('history.index'))->with(['status'=>'success','message'=>__('message.history.create-success-info')]);
        }catch (\Exception $e){
            $response = redirect(route('history.index'))->with(['status'=>'danger','message'=>__('message.history.create-error-info')]);

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
        $history = $this->historyRepository->getById($id);

        if(!$history){
            return  redirect(route('history.index'))->with(['status'=>'info','message'=>__('message.history.history-not-found-info')]);
        }
        return view('admin.history.edit',compact('history'));
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
        $history = $this->historyRepository->getById($id);

        if(!$history){
            return  redirect(route('history.index'))->with(['status'=>'danger','message'=>__('message.history.history-not-found-info')]);
        }

        try{
            $inputs = $request->post();

            $this->historyRepository->update($id,$inputs);

            $response = redirect(route('history.index'))->with(['status'=>'success','message'=>__('message.history.edit-success-info')]);
        }catch (\Exception $e){
            $response = redirect(route('history.index'))->with(['status'=>'danger','message'=>__('message.history.edit-error-info')]);

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
        $history = $this->historyRepository->getById($id);

        if(!$history){
            return  redirect(route('history.index'))->with(['status'=>'danger','message'=>__('message.history.history-not-found-info')]);
        }

        try{
            $this->historyRepository->destroy($id);

            $response = redirect(route('history.index'))->with(['status'=>'success','message'=>__('message.history.delete-success-info')]);
        }catch (\Exception $e){
            $response = redirect(route('history.index'))->with(['status'=>'danger','message'=>__('message.history.delete-error-info',['name'=>$history->name])]);

        }
        return $response;
    }
}
