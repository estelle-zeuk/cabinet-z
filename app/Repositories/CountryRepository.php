<?php
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 17/07/2018
 * Time: 15:12
 */

namespace App\Repositories;


use App\Models\Country;

/**
 * Class CountryRepository
 * @package App\Repositories
 */

class CountryRepository extends ResourceRepository{


    /**
     * CountryRepository constructor.
     * @param Country $country
     */
    public function __construct(Country $country) {
        $this->model = $country;
    }

    public function getAll(){
        return $this->model->get();
    }

}