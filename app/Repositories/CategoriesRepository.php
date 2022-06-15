<?php
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 17/07/2018
 * Time: 15:12
 */

namespace App\Repositories;

use App\Models\Categories;

/**
 * Class CategoriesRepository
 * @package App\Repositories
 */

class CategoriesRepository extends ResourceRepository{

    /**
     * CategoriesRepository constructor.
     * @param Categories $categories
     */
    public function __construct(Categories $categories) {
        $this->model = $categories;
    }

    public function getAll(){
        return $this->model->get();
    }

    public function getAllWithDependence(){
        return $this->model->with('question')->get();
    }

    public function getAllWithoutDependence(){
        return $this->model->get();
    }
}
