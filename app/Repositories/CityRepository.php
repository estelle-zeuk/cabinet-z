<?php
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 17/07/2018
 * Time: 15:12
 */

namespace App\Repositories;


use App\Models\City;
use App\Models\Country;

/**
 * Class CityRepository
 * @package App\Repositories
 */

class CityRepository extends ResourceRepository{


    /**
     * CityRepository constructor.
     * @param City $city
     */
    public function __construct(City $city) {
        $this->model = $city;
    }

    public function getAll(){
        return $this->model->get();
    }

    public function getByRegion($region_id){
        return $this->model->where('region_id',$region_id)->get();
    }

    public function getByCountry($id=38){
        return $this->model->where('country_id',$id)->get();
    }

}