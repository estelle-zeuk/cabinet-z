<?php
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 17/07/2018
 * Time: 15:12
 */

namespace App\Repositories;


use App\Models\City;
use App\Models\Company;
use App\Models\Country;

/**
 * Class CityRepository
 * @package App\Repositories
 */

class CompanyRepository extends ResourceRepository{


    /**
     * CityRepository constructor.
     * @param Company $company
     */
    public function __construct( Company $company) {
        $this->model = $company;
    }
    public function getAll(){
        return $this->model->first();
    }

    public function getCompanies($state){
        return $this->model->where('is_published',$state)->get();
    }

    public function getByName($name){
        $result = $this->model->whereRaw('LOWER(`service_name`) LIKE ? ',[trim($name).'%'])->first();

        return $result;
    }
}