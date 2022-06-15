<?php
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 17/07/2018
 * Time: 15:12
 */

namespace App\Repositories;


use App\Models\Command;
use App\Models\CommandLines;

/**
 * Class CommandLineRepository
 * @package App\Repositories
 */

class CommandLineRepository extends ResourceRepository{

    /**
     * CommandLineRepository constructor.
     * @param CommandLines $commandLines
     */
    public function __construct( CommandLines $commandLines) {
        $this->model = $commandLines;
    }

    public function getAll(){
        return $this->model->get();
    }

}
