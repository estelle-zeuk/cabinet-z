<?php
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 17/07/2018
 * Time: 15:12
 */

namespace App\Repositories;


use App\Models\Testimony;

/**
 * Class TestimonyRepository
 * @package App\Repositories
 */

class TestimonyRepository extends ResourceRepository{

    /**
     * ApproachRepository constructor.
     * @param Testimony $testimony
     */
    public function __construct(Testimony $testimony) {
        $this->model = $testimony;
    }

    public function getAll(){
        return $this->model->get();
    }

    public function getPublishedState($status){
        return $this->model->where('is_published',$status)->get();
    }
}