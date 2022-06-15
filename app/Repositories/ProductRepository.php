<?php
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 17/07/2018
 * Time: 15:12
 */

namespace App\Repositories;

use App\Models\Product;

/**
 * Class ServiceRepository
 * @package App\Repositories
 */

class ProductRepository extends ResourceRepository{
    /**
     * ServiceRepository constructor.
     * @param Product $product
     */
    public function __construct(Product $product) {
        $this->model = $product;
    }

    public function getAll(){
        return $this->model->orderBy('created_at','DESC')->get();
    }

    public function getByCode($code){
        return $this->model->where('code',$code)->first();
    }

}
