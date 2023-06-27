<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Service\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $product;

    public function __construct(ProductService $product)
    {
        $this->product = $product;
    }

   public function index()
   {
       //
       $mainProducts=$this->product->getMainproduct();
       // $mainCategories=(new pr$productService)->getMainpr$product();
       // $mainCategories=pr$product::where('prodect_id',0)->orWhere('prodect_id',null)->get();
       $products=Product::paginate(10);
       return view('dashboard.products.index',compact('mainProducts','products'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
    }
}
