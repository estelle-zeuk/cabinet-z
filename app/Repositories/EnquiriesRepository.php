<?php

namespace App\Repositories;

use App\Models\Enquiries;

/**
 * Class EnquiriesRepository
 * @package App\Repositories
 */

class EnquiriesRepository extends ResourceRepository{


    /**
     * EnquiriesRepository constructor.
     * @param Enquiries $enquiries
     */
    public function __construct(Enquiries $enquiries) {
        $this->model = $enquiries;
    }

    public function getAll(){
        return $this->model->get();
    }


}
