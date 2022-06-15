<?php
/**
 * Created by PhpStorm.
 * User: chopgwe
 * Date: 18/04/2017
 * Time: 14:25
 */

namespace App\Repositories;

use App\Models\User;

class UserRepository extends ResourceRepository {

    /**
     * @param User $user
     */
    public function __construct(User $user) {
        $this->model = $user;
    }

    public function getAll(){

      return $this->model->get();
    }


    public function getByName($user){
        $result = $this->model->where('username',$user)
                        ->first();

        return $result;
    }

    public function getCode($code,$user_id){
        $result = $this->model->where('code',$code)->where('id',$user_id)->first();
        return $result;
    }

    public function getByCodeAndEmail($code,$email){
        $result = $this->model->where('code',$code)->where('email',$email)->first();
        return $result;
    }

    public function getUser($tableAttribute,$value){
        $result = $this->model->with('region','country')
                               ->where($tableAttribute,$value)
                               ->first();

        return $result;
    }

    public function getUserByCategory($category){

        $result = $this->model->where('status',$category)
                                ->get();
        return $result;
    }

    public function getUserByEmail($email){
        $result = $this->model->where('email',$email)->first();
        return  $result;
    }
}