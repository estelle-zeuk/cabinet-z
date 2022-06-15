<?php
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 17/07/2018
 * Time: 15:12
 */

namespace App\Repositories;

use App\Models\Services;

/**
 * Class ServiceRepository
 * @package App\Repositories
 */

class ServiceRepository extends ResourceRepository{
    /**
     * ServiceRepository constructor.
     * @param Services $services
     */
    public function __construct(Services $services) {
        $this->model = $services;
    }

    public function getAll(){
        return $this->model->get();
    }

    public function getByCode($code){
        return $this->model->where('code',$code)->first();
    }

    public function getPublishedServices($state = 1){
        return $this->model->where('is_published',$state)->where('type',0)->get();
    }
    public function getPublishedNews($state = 1){
        return $this->model->where('is_published',$state)->where('type',2)->get();
    }

    /**
     * @param int $type 2 represents news
     * @return mixed
     */
    public function getByType($type = 2){
        return $this->model->where('type',$type)->get();
    }

}
