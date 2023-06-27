<?php
namespace App\Repositories;

use App\Models\Category;
use App\Models\Product;

class ProductReposatory implements ReposatoryInterface
{

    public $product;
    public $category;
    public function __construct(Product $product ,Category $category)
    {
        $this->product=$product;
        $this->category=$category;

    }

    public function store($params) {


        return $this->product->Create($params);
    }

    public function getById($id , $childrenCount=false){
        $query= $this->product->where('id',$id);
        if($childrenCount){
            $query->withCount('child');
        }
       return $query->firstOrFail();
    }

}
