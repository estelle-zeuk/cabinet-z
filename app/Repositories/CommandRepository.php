<?php
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 17/07/2018
 * Time: 15:12
 */

namespace App\Repositories;


use App\Models\Command;

/**
 * Class CommandRepository
 * @package App\Repositories
 */

class CommandRepository extends ResourceRepository{

    /**
     * CommandRepository constructor.
     * @param Command $command
     */
    public function __construct( Command $command) {
        $this->model = $command;
    }

    public function getAll(){
        return $this->model->get();
    }

}
