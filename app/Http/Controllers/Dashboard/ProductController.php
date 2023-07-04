<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Products\ProdectStoreRequest;
use App\Models\Category;
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
    //    $mainProducts=$this->product->getMainproduct();
       // $mainCategories=(new pr$productService)->getMainpr$product();
       // $mainCategories=pr$product::where('prodect_id',0)->orWhere('prodect_id',null)->get();
       $products=Product::paginate(10);
    //    dd($products);
       return view('dashboard.products.index',compact('products'));
   }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        // dd(' products create');
        $categories=Category::all();
        // dd($categories);
        return view('dashboard.products.create',compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProdectStoreRequest $request)
    {
        //
        dd($request);

        $product=$this->product->store($request->validated());
        return redirect()->route('dashboard.products.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //

        dd(' products show');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product=$this->product->getById($id);
        // $product=Product::where('id',$id)->get();
        $categories=Category::all();
        // dd($categories,$product);
        return view('dashboard.products.edite',compact('product','categories'));

    }




    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $this->product->update($id,$request->all());
        return redirect()->route('dashboard.products.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Product::find($id)->delete();
        return redirect()->route('dashboard.products.index');


    }
}
