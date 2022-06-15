<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Repositories\FaqRepository;
use App\Repositories\NewsletterRepository;
use App\Repositories\NewsRepository;
use App\Repositories\ServiceRepository;
use App\Repositories\TeamRepository;
use App\Repositories\EnquiriesRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * @var UserRepository  updates
     */
    private $userRepository;
    /**
     * @var TeamRepository
     */
    private $teamRepository;
    /**
     * @var ServiceRepository
     */
    private $serviceRepository;
    /**
     * @var EnquiriesRepository
     */
    private $enquiriesRepository;
    /**
     * @var NewsRepository
     */
    private $newsRepository;
    /**
     * @var ProductRepository
     */
    private $productRepository;
    /**
     * @var NewsletterRepository
     */
    private $newsletterRepository;


    /**
     * HomeController constructor.
     * @param NewsletterRepository $newsletterRepository
     * @param NewsRepository $newsRepository
     * @param UserRepository $userRepository
     * @param EnquiriesRepository $enquiriesRepository
     * @param TeamRepository $teamRepository
     * @param ServiceRepository $serviceRepository
     * @param ProductRepository $productRepository
     */
    public function __construct(NewsletterRepository $newsletterRepository, NewsRepository $newsRepository, UserRepository $userRepository, EnquiriesRepository $enquiriesRepository, TeamRepository $teamRepository, ServiceRepository $serviceRepository, ProductRepository $productRepository)
    {
        $this->userRepository = $userRepository;
        $this->teamRepository = $teamRepository;
        $this->enquiriesRepository = $enquiriesRepository;
        $this->newsRepository = $newsRepository;
        $this->newsletterRepository = $newsletterRepository;
    }

    public function index()
    {

    }

    public function hubsCommunale(){
        return view('frontend.hubs-communales');
    }
    public function welcome(){
        return view('layouts.coming-soon');
    }

    public function joinUs(Request $request){
        if(strtolower($request->method()) == 'post'){
            $post = $request->post();
            $checkMembership = $this->teamRepository->getByEmail($post['email']);
            if($checkMembership){
                return back()->with([
                    'status'=>'info',
                    'message'=>'Adhésion deja enregistrée (Email déjà utiliser)!'
                ]);
            }
            try{
               $feedback = DB::transaction(function () use ($post){
                   $senderName = $post['surname'].', '. $post['name'];//'La Fédération Un Million de Marcheurs';
                   $destinationEmail =$post['email'];//companyInfo()->email;
                   $subject = 'Notification d\'adhesion';
                    $this->teamRepository->store($post);
                    Mail::send('mail.join-notification', ['inputs'=>$post], function($message) use($senderName,$destinationEmail,$subject) {
                        $message->to($destinationEmail,$senderName)->subject($subject);
                    });
                    return back()->with([
                        'status'=>'success',
                        'message'=>'Adhésion enregistrée avec succès. Nous vous avons envoyé la confirmation par un e-mail'
                    ]);
                });
                return $feedback;
            }catch (\Exception $exception){
                dd($exception);
                return back()->with([
                    'response'=>'error',
                    'message'=>$exception->getMessage(),
                ]);
            }
        }
        return view('frontend.join-us');
    }

    public function contactUs(){
        return view('frontend.contact');
    }
    public function donate(){
        return view('frontend.donate');
    }
    public function organisation(){
        return view('frontend.equipe');
    }
    public function manifeste(){
        return view('frontend.manifeste');
    }
    public function aboutUs(){
        return view('frontend.about-us');
    }
    public function statuts(){
        return view('frontend.statuts');
    }

    public function dashboard(){
        $services = $this->serviceRepository->getAll();
        $publishedServices = $this->serviceRepository->getPublishedServices(1);
        $team = $this->teamRepository->getAll();
        $publishedTeam = $this->teamRepository->getPublishedServices(1);
        $enquiries = $this->enquiriesRepository->getAll();
        return view('admin.dashboard',compact('publishedTeam','team','services','publishedServices','enquiries'));
    }

    public function profile(){
        return view('admin.profile');
    }

    public function requestDocument(Request $request){
        if($request->method() == 'GET'){
            return view('frontend.document-request-form');
        }
        $post = $request->post();
        $senderName = $post['name'];
        $destinationEmail = 'coumayeclaudeceleste@yahoo.fr';
        $subject = $post['subject'];
        try{
            \Mail::send('mail.request-doc', ['inputs'=>$post], function($message) use($senderName,$destinationEmail,$subject) {
                $message->to($destinationEmail,$senderName)->subject($subject);
            });
            return response()->json([
                'response'=>'success',
                'message'=>'Message envoyé avec succés!!!'
            ],200);
        }catch (\Exception $exception){
            return response()->json([
                'response'=>'error',
                'message'=>$exception->getMessage(),
                'responseText'=>'Erreur lors d\'envoi du mail. Veuillez réessayer ou appelez le numéro  <a href="tel:+(237) 694 175 065 "> +(237) 694 175 065 </a> !!!'
                //'message'=>$exception->getMessage()
            ],301);
        }
    }

    public function aboutMe(){
        $images = [];
        for($i = 2; $i <= 29; $i++):
            $images[] = 'gallery-'.$i.'.jpeg';
        endfor;
        $services = $this->serviceRepository->getPublishedServices(1);
        $news = $this->newsRepository->getArticleAndOuvrage(1);
        return view('frontend.about-me',compact('news','services','images'));
    }

    public function myTeam(){
        $teamMembers = $this->teamRepository->getByState(1);
        return view('frontend.team',compact('teamMembers'));
    }

    public function teamMember($name){

        $member = $this->teamRepository->getByName($name);

        return view('frontend.team-details',compact('member'));
    }

    public function myServices(){

        return view('frontend.services');
    }

    public function myNews($name){
        try{
            $info = $this->serviceRepository->getByCode($name);
            return view('frontend.blog-details',compact('info'));
        }catch(\Exception $e){
            abort('404');
        }
    }

    public function newListing(){

            return view('frontend.blog');
    }

    public function myPublications(){
        $news = $this->newsRepository->getArticleAndOuvrage(1);
        return view('frontend.publications',compact('news'));
    }

    public function serviceDetails($name){
        $service = $this->serviceRepository->getByCode($name);

        return view('frontend.service-detail',compact('service'));
    }


    public function enquiry(Request $request){
        $post = $request->post();

        $senderName= $post['name'];
        $subject = isset($post['subject'])? $post['subject']:"Contactez Moi";
        $destinationEmail = companyInfo()->email;
        try{

            if(isset($post['newsletter'])){
                $email = $this->newsletterRepository->getByEmail($post['email']);
                if($email){
                    return back()->with([
                        'status'=>'success',
                        'message'=>'Contact déjà inscrit'
                    ]);
                }
                $this->newsletterRepository->store($post);
                return back()->with([
                    'status'=>'success',
                    'message'=>'Contact enregistrer avec succès'
                ]);
            }
            $this->enquiriesRepository->store($request->post());

            Mail::send('mail.contact-us', ['inputs'=>$post], function($message) use($senderName,$destinationEmail,$subject) {
                $message->to($destinationEmail,$senderName)->subject($subject);
            });
            return back()->with([
                'status'=>'success',
                  'message'=>'Message envoyé avec succés'
            ]);
        }catch (\Exception $exception){
            if(isset($post['newsletter'])){
                return back()->with([
                    'status'=>'false',
                    'message'=>'Erreur lors d\'enregistrement de contact'
                ]);
            }

            return response()->json([
                'status'=>'success',
                'response'=>$exception->getMessage(),
                'message'=>'Message not sent'
            ]);
        }
    }

    public function clearConfig()
    {
        try {
            Artisan::call('view:clear');
            Artisan::call('cache:clear');
            Artisan::call('route:clear');
            Artisan::call('config:clear');
            $message = 'Application cache, configuration cleared successfully!';
            $view = view('errors.configuration', compact('message'));
        } catch (\Exception $exception) {
            $message = 'Error occurred clearing configuration' . $exception->getMessage();
            $view = view('errors.configuration', compact('message'));
        }

        return $view;
    }
}
