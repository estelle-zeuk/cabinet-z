<?php
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 17/07/2018
 * Time: 15:12
 */

namespace App\Repositories;


use App\Models\ContactUs;

/**
 * Class CityRepository
 * @package App\Repositories
 */

class ContactUsRepository extends ResourceRepository{

    /**
     * RenderVousRepository constructor.
     * @param ContactUs $contactUs
     */
    public function __construct( ContactUs $contactUs) {
        $this->model = $contactUs;
    }

    public function getAll(){
        return $this->model->get();
    }

}