<?php
// declare(strict_types=1);
namespace App\Repositories;

use App\Models\Category;

class CategoryRepository{

    public $category;
    public function __construct(Category $category)
    {
        $this->category=$category;
    }

    public function getMainCategory()
    {
        return $this->category->where('prodect_id',0)->get();
        // return Category::whereNull('parent_id')->get();
    }


    public function store($params) {


        return $this->category->Create($params);
    }

    public function getById($id , $childrenCount=false){
        $query= $this->category->where('id',$id);
        if($childrenCount){
            $query->withCount('child');
        }
       return $query->firstOrFail();
    }

    

}
