<?php

namespace App\Http\Controllers\BackEnd;

use App\Repositories\FaqRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FaqController extends Controller
{
    /**
     * @var FaqRepository
     */
    private $faqRepository;

    /**
     * FaqController constructor.
     * @param FaqRepository $faqRepository
     */
    public function __construct( FaqRepository $faqRepository)
    {
        $this->faqRepository = $faqRepository;
    }

    public function index()
    {
        $faqs = $this->faqRepository->getAll(1);
        return view('admin.faq.index',compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.faq.create');
    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $inputs = $request->post();
        $inputs['user_created_id'] = \Auth::user()->id;
        try{
             $this->faqRepository->store($inputs);

             $response = redirect(route('faq.index'))->with(['status'=>'success','message'=>__('message.faq.create-success-info')]);
        }catch (\Exception $e){

             $response = redirect(route('faq.index'))->with(['status'=>'danger','message'=>__('message.faq.create-error-info')]);
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
     * @param $id
     * @return $this|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function edit($id)
    {
        $faq = $this->faqRepository->getById($id);

        if(!$faq){
            return  redirect(route('faq.index'))->with(['status'=>'info','message'=>__('message.faq.faq-not-found-info')]);
        }
        return view('admin.faq.edit',compact('faq'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $faq = $this->faqRepository->getById($id);

        if(!$faq){
            return  redirect(route('faq.index'))->with(['status'=>'danger','message'=>__('message.faq.faq-not-found-info')]);
        }

        try{
            $inputs = $request->post();
            $inputs['user_updated_id'] = \Auth::user()->id;
            $this->faqRepository->update($id,$inputs);

            $response = redirect(route('faq.index'))->with(['status'=>'success','message'=>__('message.faq.edit-success-info')]);
        }catch (\Exception $e){
            $response = redirect(route('faq.index'))->with(['status'=>'danger','message'=>__('message.faq.edit-error-info')]);
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
        $faq = $this->faqRepository->getById($id);

        if(!$faq){
            return  redirect(route('faq.index'))->with(['status'=>'info','message'=>__('message.faq.faq-not-found-info')]);
        }

        try{
            $this->faqRepository->destroy($id);

            $response = redirect(route('faq.index'))->with(['status'=>'success','message'=>__('message.faq.delete-success-info')]);
        }catch (\Exception $e){
            $response = redirect(route('faq.index'))->with(['status'=>'danger','message'=>__('message.faq.delete-error-info')]);
        }
        return $response;
    }
}
