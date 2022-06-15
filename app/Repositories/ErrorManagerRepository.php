<?php
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 17/07/2018
 * Time: 15:12
 */

namespace App\Repositories;


use App\Models\ErrorManager;

/**
 * Class ArticleRepository
 * @package App\Repositories
 */

class ErrorManagerRepository extends ResourceRepository{

    /**
     * ErrorManagerRepository constructor.
     * @param ErrorManager $errorManager
     */
    public function __construct(ErrorManager $errorManager) {
        $this->model = $errorManager;
    }

    public function getAll(){
        return $this->model->get();
    }
}
