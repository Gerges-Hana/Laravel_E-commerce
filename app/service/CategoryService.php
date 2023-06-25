<?php

namespace App\Service;

use App\Models\Category;
use App\Repositories\CategoryRepository;
use App\Utils\ImageUpload;
use GuzzleHttp\Promise\Create;


class CategoryService
{

    public $categoryRepository;
    public function __construct(CategoryRepository $repo)
    {
        $this->categoryRepository=$repo;
    }

    public function getMainCategory()
    {
        return $this->categoryRepository->getMainCategory();
        // return Category::where('prodect_id',0)->orWhere('prodect_id',null)->get();
        // return Category::whereNull('parent_id')->get();
    }

    public function store($params) {

        $params['parent_id']=$params['parent_id']??0;
        if(isset($params['image'])){
            $params['image']=ImageUpload::uploadImage($params['image']);
        }

        return $this->categoryRepository->store($params);
    }



    public function getById($id , $childrenCount=false){
        // dd($id);
        return $this->categoryRepository->getById($id,$childrenCount=false);

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
