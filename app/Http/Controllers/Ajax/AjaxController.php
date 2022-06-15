<?php

namespace App\Http\Controllers\Ajax;

use App\Repositories\CityRepository;
use App\Repositories\ServiceRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AjaxController extends Controller
{
    /**
     * @var CityRepository
     */
    private $cityRepository;
    /**
     * @var ServiceRepository
     */
    private $serviceRepository;

    /**
     * AjaxController constructor.
     * @param CityRepository $cityRepository
     * @param ServiceRepository $serviceRepository
     */
    public function __construct(CityRepository $cityRepository, ServiceRepository $serviceRepository)
    {
        $this->cityRepository = $cityRepository;
        $this->serviceRepository = $serviceRepository;
    }

    public function getCities($id){
        $cities = $this->cityRepository->getByRegion($id);

        if($cities){

        }

        return ;
    }

    public function moreServices(){
        $services = $this->serviceRepository->getPublishedServices(1);

        $response = view('frontend.service.ajax-more',compact('services'))->render();

        return $response;
    }

    public function searchServices(Request $request){
dd($request->post());
       if($request->post()){
           $dimensions = $request->post();
           $category = $dimensions['serviceType'];
           $serviceMinPrice = $dimensions['serviceMinPrice'];
           $serviceMaxPrice = $dimensions['serviceMaxPrice'];

           $services = $this->serviceRepository->getByCatAndPrice($category,$serviceMinPrice,$serviceMaxPrice);
       }else{
           $services = $this->serviceRepository->getPublishedServices(1);
       }

        $response = view('frontend.service.search',compact('services'));

        return $response;
    }

    public function searchAny(Request $request){

        $data = $request->post();

        if($data['reference'] == 'cities'){
            $cities = getCitiesByAnyAttribute($data['attribute'],$data['key']);

            $category = 'cities';
            return view('search.search-form-elements',compact('cities','category'));
        }

        $serviceCategories = getTableByAnyAttribute($data['reference'],$data['attribute'],$data['key']);
        $category = 'all';
        $response = view('search.search-form-elements',compact('serviceCategories','category'));

        return $response;
    }
}
