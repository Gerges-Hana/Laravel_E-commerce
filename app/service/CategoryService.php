<?php

namespace App\Service;

use App\Models\Category;
use App\Utils\ImageUpload;
use GuzzleHttp\Promise\Create;

class CategoryService
{


    public function getMainCategory()
    {
        return Category::where('prodect_id',0)->orWhere('prodect_id',null)->get();
        // return Category::whereNull('parent_id')->get();
    }

    public function store($params) {

        $params['parent_id']=$params['parent_id']??0;
        if(isset($params['image'])){
            $params['image']=ImageUpload::uploadImage($params['image']);
        }
        // dd($params);
        return Category::Create($params);
    }



    public function getById($id , $childrenCount=false){
        // dd($id);
        $query= Category::where('id',$id);
        if($childrenCount){
            $query->withCount('child');
        }
       return $query->firstOrFail();
    }

    public function update($id,$params) {

        $category =$this->getById($id);
        $params['parent_id']=$params['parent_id']??0;
        if(isset($params['image'])){
            $params['image']=ImageUpload::uploadImage($params['image']);
        }
        // dd($params);
        return $category->update($params);
    }
}
