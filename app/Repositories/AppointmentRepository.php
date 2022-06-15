<?php
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 17/07/2018
 * Time: 15:12
 */

namespace App\Repositories;

use App\Models\Appointment;

/**
 * Class AppointmentRepository
 * @package App\Repositories
 */

class AppointmentRepository extends ResourceRepository{
    /**
     * @param Appointment $appointment
     */
    public function __construct(Appointment $appointment) {
        $this->model = $appointment;
    }

    public function getAll(){
        return $this->model->get();
    }



}

