<?php

namespace App\Http\Controllers;

use App\Products;
use App\ProductType;
use App\ProductImg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;




class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product_list = products::with('product_Type')->get();;
        // $Types = productType::all();
        // $product_list = productType::with('product')->get();
        // dd($product_list);

        return view('admin.product.index', compact('product_list'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product_types = ProductType::all();

        return view('admin.product.create',compact('product_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $files = $request->file('mutiple_images');
        // ProductType::create($request->all());
        // return redirect()->route('product.index');
        $requsetData = $request->all();
        // dd($requsetData);
        //單一檔案
        if($request->hasFile('img')) {
            $file = $request->file('img');
            $path = $this->fileUpload($file,'product');
            $requsetData['img'] = $path;
        }

        $new_product =  Products::create($requsetData);
        $new_product_id = $new_product->id;

        //多個檔案
        if($request->hasFile('imgs'))
        {
            $files = $request->file('imgs');
            foreach ($files as $file) {
                //上傳圖片
                $path = $this->fileUpload($file,'product_imgs');
                //新增資料進DB
                $product_img = new ProductImg;
                $product_img->product_id = $new_product_id;
                $product_img->img = $path;
                $product_img->save();
            }
        }

        return redirect('/admin/product');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Products::find($id);
        dd($product->productImgs);
        $product_types = ProductType::all();

        return view('admin.product.edit',compact('products','product_type'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
