<?php
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 17/07/2018
 * Time: 15:12
 */

namespace App\Repositories;

use App\Models\Region;


class RegionRepository extends ResourceRepository{

    /**
     * RegionRepository constructor.
     * @param Region $region
     */
    public function __construct(Region $region) {
        $this->model = $region;
    }

    public function getAll(){
        return $this->model->get();
    }

}