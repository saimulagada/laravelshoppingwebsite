<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Flasher\Toastr\Prime\ToastrInterface;
use App\Models\Products;
use App\Models\Orders;
use Barryvdh\DomPDF\Facade\Pdf;

class CategoryController extends Controller
{
    public function category(){
        $data = Category::all();
        return view('admin.category',compact('data'));
    }
    public function add_category(Request $request){

        $categories = new Category;
        $categories->category_name = $request['category_name'];
        $categories->save();
        toastr()->timeOut(10000)->closeButton()->success('Category added successfully');
        return redirect()->back();

    }

    public function delete($id)
    {
    $category = Category::findOrFail($id);
    $category->delete();
    toastr()->timeOut(10000)->closeButton()->success('Category Deleted successfully');
    return redirect()->back();


    }
    public function edit($id){
        $data = Category::findOrFail($id);
        return view('admin.edit_category',compact('data'));
    }
    public function update(Request $request, $id){
          $data = Category::findOrFail($id);
          $data->category_name = $request['category_name'];
          $data->save();
          toastr()->timeOut(10000)->closeButton()->success('Category Updated successfully');
          return redirect('/admin/category_name');
    }
    public function add_product(){
        $category = Category::all();
        return view('admin.add_product',compact('category'));
    }
    public function include_product(Request $request){
       $data = new Products;
       $data->title = $request['title'];
       $data->description=$request['description'];
       $data->price=$request['price'];
       $data->category=$request['category'];
       $data->quantity=$request['quantity'];
       $image = $request->image;
       if($image){
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('products',$imageName);
        $data->image = $imageName;
       }
       $data->save();
       toastr()->timeOut(10000)->closeButton()->success('Product Added successfully');
       return redirect()->back();
    }
    function view_product(){
        $product = Products::paginate(2);
        return view('admin.view_product',compact('product'));
    }
    function delete_product($id){
        $data = Products::findOrFail($id);
        $image_path = public_path('products/'.$data->image);
        if(file_exists($image_path)){
            unlink($image_path);
        }
        $data->delete();
        toastr()->timeOut(10000)->closeButton()->success('Product Deleted successfully');
        return redirect()->back();
    }
    public function edit_product($id){
        $data = Category::all();
        $category = Products::find($id);
        return view('admin.edit_product',compact('category','data'));
    }
    public function update_product(Request $request,$id){
        $data = Products::find($id);
        $data->title = $request['title'];
        $data->description=$request['description'];
        $data->price=$request['price'];
        $data->category=$request['category'];
        $data->quantity=$request['quantity'];
        $image = $request->image;
        if($image){
         $imageName = time().'.'.$image->getClientOriginalExtension();
         $request->image->move('products',$imageName);
         $data->image = $imageName;
        }
        $data->save();
        toastr()->timeOut(10000)->closeButton()->success('Product Updated successfully');
        return redirect()->back();
    }
    public function product_search(Request $request){
        $search = $request->search;
        $product = Products::where('title','LIKE','%'.$search.'%')->orWhere('category','LIKE','%'.$search.'%')->paginate(2);
        return view('admin.view_product',compact('product'));
    }
    public function view_orders(){
        $data = Orders::all();
        return view('admin.view_order',compact('data'));
    }
    public function on_the_way($id){
        $data = Orders::find($id);

       
            $data->status = "on the way";
            $data->save();
      
        return redirect()->back();
    }
    public function delivered($id){
        $data = Orders::find($id);

        if($data->status == "in progress"){
            $data->status = "Delivered";
            $data->save();
        }
        return redirect()->back();
    }
    public function download_pdf($id){
        $data = Orders::find($id);
        $pdf = Pdf::loadView('admin.invoice',compact('data'));
        return $pdf->download('admin.invoice.pdf');
    }
}
