<?php
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 17/07/2018
 * Time: 15:12
 */

namespace App\Repositories;

use App\Models\News;

/**
 * Class NewsRepository
 * @package App\Repositories
 */

class NewsRepository extends ResourceRepository{

    /**
     * NewsRepository constructor.
     * @param News $news
     */
    public function __construct( News $news) {
        $this->model = $news;
    }

    public function getAllBE($publish = null,$page=null){
        if($page){
            if($publish){
                return $this->model->with('comments')->where('is_published',$publish)->paginate($page);
            }else{
                return $this->model->with('comments')->paginate($page);
            }
        }
        if($publish){
            return $this->model->with('comments')->where('is_published',$publish)->get();
        }else{
            return $this->model->with('comments')->get();
        }
    }

    public function getAll($type = 0, $publish = null,$page=null){
        if($page){
            if($publish){
                return $this->model->with('comments')->where('is_published',$publish)->where('type',$type)->paginate($page);
            }else{
                return $this->model->with('comments')->where('type',$type)->paginate($page);
            }
        }
        if($publish){
            return $this->model->with('comments')->where('type',$type)->where('is_published',$publish)->get();
        }else{
            return $this->model->with('comments')->where('type',$type)->get();
        }
    }

    public function getLatestNews($page=null,$type=0,$published=1){
          if($page)
            $result = $this->model->with('comments')->where('type',$type)
                                   ->where('is_published',$published)
                                   ->orderBy('created_at','DESC')
                                   ->take($page)
                                   ->get();
          else{
              $result = $this->model->with('comments')/*->where('auto_publish_date','<=',date('Y-m-d'))*/
                                      ->where('type',$type)
                                      ->where('is_published',$published)
                                      ->orderBy('created_at','DESC')
                                      ->get();
          }
        return $result;
    }

    public function  getArticleById($code,$type,$status){
            $result = $this->model->with('comments')->where('code',$code)
                                    ->where('is_published',$status)
                                    ->where('type',$type)
                                    ->first();

        return $result;
    }

    public function  getByIdWithRelations($id){
        $result = $this->model->with('comments')
                                ->where('id',$id)
                                ->first();

        return $result;
    }

    public function getByName($name,$all=null){

        if($all){
            return $this->model->where('title_en', 'like', '%' . $name . '%')
                ->orWhere('code', 'like', '%' . $name . '%')
                ->orWhere('category', 'like', '%' . $name . '%')
                ->orWhere('title_fr', 'like', '%' . $name . '%')
                ->orWhere('category', 'like', '%' . $name . '%')
                ->orWhere('summary_en', 'like', '%' . $name . '%')
                ->orWhere('summary_fr', 'like', '%' . $name . '%')
                ->get();
        }
        return $this->model->with('department','worker')->where('name',$name)->first();
    }

    public function  getArticleAndOuvrage($published = null){
        if($published){
            return $this->model->where('is_published',$published)->whereBetween('type',[1,2])->get();
        }else{
            return $this->model->where('type',1)->orWhere('type',2)->get();
        }
    }
}
