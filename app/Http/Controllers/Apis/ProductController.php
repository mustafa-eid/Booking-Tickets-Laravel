<?php

namespace App\Http\Controllers\Apis;

use App\Models\Brand;
use App\Models\Party;
use App\Models\Product;
use App\Http\traits\media;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\traits\ApiTrait;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePartyRequest;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    use media, ApiTrait;

    public function index()
    {
        //get locale language now
        $language = App::getLocale();
        //get products by language
        $products = Product::select('id', 'name_'.$language.' As name', 'desc_'.$language.' As desc', 'price', 'code', 'quantity', 'subcategory_id', 'brand_id', 'status', )->get();
        return $this->Data(compact('products'), __('message.all'));
    }

    public function create()
    {
        $brands = Brand::all();
        $subcategories = Subcategory::select('id', 'name_en')->get();
        return $this->Data(compact('brands', 'subcategories'));
    }

    public function store(StoreProductRequest $request)
    {
        $PhotoName = $this->uploade_image($request->image, 'products');
        $data = $request->except('image');
        $data['image'] = $PhotoName;

        //create party in database by eloquent
        Product::create($data);
        return $this->SuccessMessage('product created seccessfully', 201, );
    }

    public function edit($id) 
    {
        $product = Product::findOrFail($id);
        $brands = Brand::all();
        $subcategories = Subcategory::select('id', 'name_en')->get();
        return $this->Data(compact('product', 'brands', 'subcategories'));
    }

    public function update(Request $request, $id) 
    {
        $data = $request->except('image', '_method');

        //if image exists => upload it
        if($request->has('image')){
            //delete old image from server
            $old_Image_Name = Product::find($id)->image;
            $image_path = public_path('/dist/img/products/') . $old_Image_Name;
            $this->delete_image($image_path);

            //Upload image to '/dist/img/products'
            $PhotoName = $this->uploade_image($request->image, 'products');

            //add image name to array
            $data['image'] = $PhotoName;
        }

        //update this product in database
        Product::where('id', $id)->update($data);

        return $this->SuccessMessage('product updated seccessfully');
    }

    public function destroy($id) 
    {
        $product = Product::find($id);
        if($product){
            //delete old image from server
            $old_Image_Name = $product->image;
            $image_path = public_path('/dist/img/products/') . $old_Image_Name;
            $this->delete_image($image_path);

            //delete this product from database
            Product::where('id', $id)->delete();
            return $this->SuccessMessage('product deleted seccessfully');
        }else{
            return $this->ErrorMessage(['id'=>'the id is invalid'] ,'the given data was invalid', 422);
        }
    }
}
