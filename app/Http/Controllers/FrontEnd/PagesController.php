<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Repositories\ServiceRepository;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class PagesController extends Controller
{

    /**
     * @var ServiceRepository
     */
    private $serviceRepository;
    /**
     * @var ProductRepository
     */
    private $productRepository;

    /**
     * HomeController constructor.
     * @param ServiceRepository $serviceRepository
     * @param ProductRepository $productRepository
     */
    public function __construct( ServiceRepository $serviceRepository, ProductRepository $productRepository)
    {

        $this->serviceRepository = $serviceRepository;
        $this->productRepository = $productRepository;
    }

    public function services(){
        return view('frontend.services');
    }

    public function servicesDetails($code){
        $serviceDetails = $this->serviceRepository->getByCode($code);
        return view('frontend.services-details',  compact('serviceDetails'));
    }

    public function aPropos(){
        return view('frontend.apropos');
    }

    public function cart(){
        return view('frontend.cart');
    }

    public function contact(){
        return view('frontend.contact');
    }
    public function blogDetails($id){
        $info = $this->serviceRepository->getByCode($id);

        return view('frontend.blog-details', compact('info'));
    }

    public function appointment(){
        return view('frontend.appointment');
    }
    public function equipe(){
        return view('frontend.equipe');
    }
    public function blog(){
        return view('frontend.blog');
    }

    public function produitsDetails($id){
        $products = $this->productRepository->getAll();
        $product = $this->productRepository->getById($id);
        return view('frontend.produits-details', compact('product','products'));
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

