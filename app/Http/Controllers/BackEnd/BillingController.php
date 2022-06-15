<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Repositories\CommandLineRepository;
use App\Repositories\CommandRepository;
use App\Repositories\ContactRepository;
use App\Repositories\ErrorManagerRepository;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Image;

class BillingController extends Controller
{
    /**
     * @var ErrorManagerRepository
     */
    private $errorManagerRepository;
    /**
     * @var ProductRepository
     */
    private $productRepository;
    /**
     * @var ContactRepository
     */
    private $contactRepository;
    /**
     * @var CommandLineRepository
     */
    private $commandLineRepository;
    /**
     * @var CommandRepository
     */
    private $commandRepository;

    /**
     * BillingController constructor.
     * @param ErrorManagerRepository $errorManagerRepository
     * @param ProductRepository $productRepository
     * @param ContactRepository $contactRepository
     * @param CommandLineRepository $commandLineRepository
     * @param CommandRepository $commandRepository
     */
    public function __construct(ErrorManagerRepository $errorManagerRepository,
                                                    ProductRepository $productRepository,
                                                    ContactRepository $contactRepository,
                                                    CommandLineRepository $commandLineRepository,
                                                    CommandRepository $commandRepository){
        $this->errorManagerRepository = $errorManagerRepository;
        $this->productRepository = $productRepository;
        $this->contactRepository = $contactRepository;
        $this->commandLineRepository = $commandLineRepository;
        $this->commandRepository = $commandRepository;
    }

    public function billing(Request $request)
    {
       $inputs = $request->post();
        try{
            $response =  DB::transaction(function () use ($inputs){
                $contactInfo = $this->contactRepository->getByEmailOrPhone($inputs['email'],$inputs['phone']);
                if(!$contactInfo){
                    $contactInfo = $this->contactRepository->store($inputs);
                }
                $commandInputs = ['contact_id'=>$contactInfo->id,'references'=>generateCode('VP'.date('Y').'-','command','references'),'date'=>now()];
                $this->commandRepository->store($commandInputs);
           /*     foreach($items as $item){
                    $product = $this->productRepository->getByCode($item[0]);
                    $commandLines = ['command_id'=>$command->id,'product_id'=>$product->id,'quantity'=>$item[1]];
                    $this->commandLineRepository->store($commandLines);
                }*/
                $senderName= $inputs['name'];
                $subject = 'Demande de devis';
                $destinationEmail = companyInfo()->email;
                Mail::send('mail.command', ['inputs'=>$inputs], function($message) use($senderName,$destinationEmail,$subject) {
                    $message->to($destinationEmail,$senderName)->subject($subject);
                });
                //Preparing image data
                return back()->with([
                    'status' => 'success',
                    'message' =>__('Devis envoyé avec succès!!!'),
                ]);
               /* return response()->json([
                    'success' => true,
                    'message' =>__('Devis envoyé avec succès!!!'),
                ]);*/
            });
            return $response;

        }catch (\Exception $e){
            $error = ['id'=>Str::random(50), 'action'=> 'Demande de devis', 'message'=> $e->getMessage(), 'code'=> $e->getCode(), 'feature'=> 'Command passer'];
            $this->errorManagerRepository->store($error);
         /*   return response()->json([
                'success' => false,
                'message' =>__('Erreur lors de traitement de votre requete. Si ca persiste veuillez appeler notre service via les contacts du site. Merci d\'avance!!!'),
            ]);*/
            return back()->with([
                'status' => 'danger',
                'message' =>__('Erreur lors de traitement de votre requete. Si ca persiste veuillez appeler notre service via les contacts du site. Merci d\'avance!!!'),
            ]);
        }
    }

    public function itemsListing(Request $request)
    {
       $inputs = $request->post();
       $articles = json_decode($inputs['item']);
            try {
                $view = view('extension.cart-items',compact('articles'))->render();
                return response()->json(['success'=>true,'items'=>$view]);
            }catch (\Exception $e) {
                dd($e);
                return response()->json(['success'=>false,'message'=>'Erreur lors de traitement!!!']);
            }
    }


}

