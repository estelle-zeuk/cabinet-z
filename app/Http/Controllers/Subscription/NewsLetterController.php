<?php

namespace App\Http\Controllers\Subscription;

use App\Repositories\NewsletterRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsLetterController extends Controller
{
    /**
     * @var NewsletterRepository
     */
    private $newsletterRepository;

    /**
     * NewsLetterController constructor.
     * @param NewsletterRepository $newsletterRepository
     */
    public function __construct(NewsletterRepository $newsletterRepository)
    {

        $this->newsletterRepository = $newsletterRepository;
    }

    public function subscribe(Request $request){

        try{
            $subscribed = $this->newsletterRepository->getByEmail($request->post()['email']);

            if($subscribed){
                $arrResult =  response()->json([
                    'response' => 'info',
                    'message' => __('message.newsletter.already-added-info',['email'=>$request->post()['email']]),
                ]);
            }else{
                $this->newsletterRepository->store($request->post());
                $arrResult =  response()->json([
                    'response' => 'success',
                    'message' => __('message.newsletter.added-info-success',['email'=>$request->post()['email']]),
                ]);
            }
        }catch (\Exception $exception){
            $arrResult =  response()->json([
                                        'response' => 'error',
                                        'message' => $exception->getMessage(),
                                    ]);
        }

        return $arrResult;
    }
}
