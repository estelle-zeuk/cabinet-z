<?php
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 17/07/2018
 * Time: 15:12
 */

namespace App\Repositories;
use App\Models\Faq;


/**
 * Class NewsRepository
 * @package App\Repositories
 */

class FaqRepository extends ResourceRepository{

    /**
     * FaqRepository constructor.
     * @param Faq $faq
     */
    public function __construct(Faq $faq) {
        $this->model = $faq;
    }

    public function getAll($publish = null){
        if($publish){
            return $this->model->where('is_published',$publish)->get();
        }else{
            return $this->model->get();
        }
    }

}