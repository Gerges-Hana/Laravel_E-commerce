<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\categories\categoryStoreRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Service\CategoryService;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     protected $category;

     public function __construct(CategoryService $category)
     {
         $this->category = $category;
     }

    public function index()
    {
        //
        $mainCategories=$this->category->getMainCategory();
        // $mainCategories=(new CategoryService)->getMainCategory();
        // $mainCategories=Category::where('prodect_id',0)->orWhere('prodect_id',null)->get();
        $categories=Category::paginate(10);
        return view('dashboard.categories.index',compact('mainCategories','categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(categoryStoreRequest $request)
    {
        //
        // dd($request->all());
        $this->category->store($request->validated());
        return redirect()->route('dashboard.categories.index')->with('success','تمت الاضافه بنجاح');
    }

    // public function(){}
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        dd($id,'show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        dd($id,'edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        dd($id,'destroy');
    }
    public function delete(string $id)
    {
        //

        Category::find($id)
        ->delete();

    return  redirect('/');
    //    $category=Category::where('id',$id)->get();
    // //    dd($category->id);
    //     $category->delete(); // يتم حذف الفئة بشكل ناعم
    //     return redirect('/categories')->with('success', 'تم حذف الفئة بنجاح.');
    }
}
