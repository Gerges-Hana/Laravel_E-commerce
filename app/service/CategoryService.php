<?php

namespace App\Service;

use App\Models\Category;
use GuzzleHttp\Promise\Create;

class CategoryService
{


    public function getMainCategory()
    {
        return Category::where('prodect_id',0)->orWhere('prodect_id',null)->get();
        // return Category::whereNull('parent_id')->get();
    }

    public function store($params) {

        return Category::Create($params);
        dd($params);
    }
}
