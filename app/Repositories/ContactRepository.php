<?php
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 17/07/2018
 * Time: 15:12
 */

namespace App\Repositories;


use App\Models\Command;
use App\Models\Contact;

/**
 * Class ContactRepository
 * @package App\Repositories
 */

class ContactRepository extends ResourceRepository{

    /**
     * ContactRepository constructor.
     * @param Contact $contact
     */
    public function __construct( Contact $contact) {
        $this->model = $contact;
    }

    public function getAll(){
        return $this->model->get();
    }
    public function getByEmailOrPhone($email,$phone){
        return $this->model->where('email',$email )->orWhere('phone',$phone)->first();
    }

}
