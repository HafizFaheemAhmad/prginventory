<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Category;
use App\Models\Purchase;
use App\Models\Status;
use Illuminate\Http\Request;
use App\Notifications\StockAlert;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "products";
        $products = Product::paginate(25);
        return view('products',compact('products'));
    }

    public function create(){
        $title= "Add Product";
        $categories = Category::get();
        $products = Product::get();
        $statuses = Status::get();

        return view('add-product',compact(
            'title','categories','products','statuses',
        ));
    }


    /**
     * Display a listing of expired resources.
     *
     * @return \Illuminate\Http\Response
     */
    public function expired(){
        $title = "expired Products";
        $products = Category::whereDate('expiry_date', '=', Carbon::now())->get();

        return view('expired',compact(
            'title','products'
        ));
    }

    /**
     * Display a listing of out of stock resources.
     *
     * @return \Illuminate\Http\Response
     */
    public function outstock(){
        $title = "outstocked Products";
        $products = Category::where('quantity', '<=', 0)->get();
        $product = Category::where('quantity', '<=', 0)->first();
        // auth()->user()->notify(new StockAlert($product));

        return view('outstock',compact(
            'title','products',
        ));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'Cubical_Number'=>'required',
            'Lcd_Code'=>'required',
            'Headset_Code'=>'required',
            'CPU_Detail'=>'required',
            'category'=>'required',
            'status'=>'required',
        ]);

        $res=Product::create([
            'Cubical_Number'=>$request->Cubical_Number,
            'Lcd_Code'=>$request->Lcd_Code,
            'Headset_Code'=>$request->Headset_Code,
            'CPU_Detail'=>$request->CPU_Detail,
            'category_id'=>$request->category,
            'status_id'=>$request->status,

        ]);

        $notification=array(
            'message'=>"Product has been added",
            'alert-type'=>'success',
        );
        return redirect()->route('products')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $title = "Edit Product";
        $product = Product::find($id);
        $categories = Category::get();
        $statuses = Status::get();
        return view('edit-product',compact(
            'title','product','categories','statuses'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Product $product)
    {

        $this->validate($request,[
            'Cubical_Number'=>'required',
            'Lcd_Code'=>'required',
            'Headset_Code'=>'required',
            'CPU_Detail'=>'required',
            'category'=>'required',
            'status'=>'required',

        ]);


       $product->update([
            'Cubical_Number'=>$request->Cubical_Number,
            'Lcd_Code'=>$request->Lcd_Code,
            'Headset_Code'=>$request->Headset_Code,
            'CPU_Detail'=>$request->CPU_Detail,
            'category_id'=>$request->category,
            'status_id'=>$request->status,
        ]);

        $notification=array(
            'message'=>"Product has been updated",
            'alert-type'=>'success',
        );
        return redirect()->route('products')->with($notification);
    }
    // public function update(Request $request)
    // {
    //     $this->validate($request,['name'=>'required|max:100']);
    //     $category = Category::find($request->id);
    //     $category->update([
    //         'name'=>$request->name,
    //     ]);
    //     $notification=array(
    //         'message'=>"Category has been updated",
    //         'alert-type'=>'success',
    //     );
    //     return back()->with($notification);
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $product = Product::find($request->id);
        $product->delete();
        $notification = array(
            'message'=>"Product has been deleted",
            'alert-type'=>'success',
        );
        return back()->with($notification);
    }

    public function shows(Product $product)
    {
        return view('product-show', [
            'product' => $product,
            'products' => Product::where('id', $product->id)->paginate(25)
        ]);
    }
}
