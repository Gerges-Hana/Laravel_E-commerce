<?php

namespace App\Service;

use App\Repositories\ProductReposatory;
use App\Utils\ImageUpload;

class ProductService{

    public $productRepository;
    public function __construct(ProductReposatory $repo)
    {
        $this->productRepository=$repo;
    }



    public function store($params) {

        $params['parent_id']=$params['parent_id']??0;
        if(isset($params['image'])){
            $params['image']=ImageUpload::uploadImage($params['image']);
        }

        return $this->productRepository->store($params);
    }



    public function getById($id , $childrenCount=false){
        // dd($id);
        return $this->productRepository->getById($id,$childrenCount=false);

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
