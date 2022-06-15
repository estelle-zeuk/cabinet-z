<?php
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 17/07/2018
 * Time: 15:12
 */

namespace App\Repositories;

use App\Models\Newsletter;

class NewsletterRepository extends ResourceRepository{

    /**
     * NewsletterRepository constructor.
     * @param Newsletter $newsletter
     */
    public function __construct(Newsletter $newsletter) {
        $this->model = $newsletter;
    }

    public function getAll(){
        return $this->model->get();
    }

    public function getByEmail($email){
        return $this->model->where('email',$email)->first();
    }
}