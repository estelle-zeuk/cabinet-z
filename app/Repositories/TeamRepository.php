<?php
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 17/07/2018
 * Time: 15:12
 */

namespace App\Repositories;

use App\Models\Team;

/**
 * Class BranchesRepository
 * @package App\Repositories
 */

class TeamRepository extends ResourceRepository{

    /**
     * TeamRepository constructor.
     * @param Team $team
     */
    public function __construct(Team $team) {
        $this->model = $team;
    }

    public function getAll(){
        return $this->model->get();
    }

    public function getByState($status){
        return $this->model->where('status',$status)->get();
    }

    public function getByName($name){
        return $this->model->where('full_name',$name)->first();
    }

    public function getByEmail(string $email){
        return $this->model->where('email',$email)->first();
    }

    public function getPublishedServices($state){
        return $this->model->where('status',$state)->get();
    }
}
