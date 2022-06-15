<?php
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 17/07/2018
 * Time: 15:12
 */

namespace App\Repositories;

use App\Models\Post;

/**
 * Class PostRepository
 * @package App\Repositories
 */

class PostRepository extends ResourceRepository{


    /**
     * PostRepository constructor.
     * @param Post $post
     */
    public function __construct(Post $post) {
        $this->model = $post;
    }

    public function getAll(){
        return $this->model->with('department')->get();
    }

    public function getActivePost($status){
        return $this->model->where('status',$status)->get();
    }

    public function getByIdWithDepartment($id){
        return $this->model->with('department')->where('id',$id)->first();
    }
}