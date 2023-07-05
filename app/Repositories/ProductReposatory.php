<?php
namespace App\Repositories;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Utils\ImageUpload;

class ProductReposatory implements ReposatoryInterface
{

    public $product;
    public $category;
    public function __construct(Product $product ,Category $category)
    {
        $this->product=$product;
        $this->category=$category;

    }

    public function addColor($product, $params)
    {
        $product->productColor()->createMany($params['colors']);
    }
    public function store($params) {

        $product= $this->product->Create($params);
        $images=[];
        if (isset($params['images'])) {
            # code...
            $i=0;
            foreach($params['images'] as $key =>$value){
                $images[$i]['image']=ImageUpload::uploadImage($value);
                $images[$i]['product_id']=$product->id;
                $i++;
            }
        }

        $product->images()->createMany($images);
    //    $x= ProductImage::create($images);
    //     dd($x);
        return $product;
    }


    // public function uploadMultibleImages($images,$product){
    //     $images=[];
    //     if (isset($params['images'])) {
    //         # code...
    //         $i=0;
    //         foreach($params['images'] as $key =>$value){
    //             $images[$i]['image']=ImageUpload::uploadImage($value);
    //             $images[$i]['product_id']=$product->id;
    //             $i++;
    //         }
    //     }


    //     return $images;
    // }

    public function getById($id , $childrenCount=false){
        $query= $this->product->where('id',$id);
        if($childrenCount){
            $query->withCount('child');
        }
       return $query->firstOrFail();
    }

}
