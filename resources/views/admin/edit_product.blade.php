<!DOCTYPE html>
<html>
  <head> 
  @include('admin.css')
  <style>
    .product_design{
        display: flex;
        align-items: center;
        justify-content: center;
        margin:auto;
        margin-top: 50px;
        
    }
    h2 {
        font-size:25px;
        color:#fff;
        padding-bottom:15px;
    }
    label{
        font-size:15px;
        color:#fff;
        width:250px;
    }
    form div{
        margin-bottom:10px;
    }
    textarea,form select{
        width:400px;
        
    }
    input[type="text"]{
        width:400px;
        height:40px;
        padding-left:10px;
    }
    form select {
        height:40px;
    }
    textarea {
        padding-left:10px;
    }
  </style>
  </head>
  <body>
  @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
           <div class="product_design">
              
             <form action="{{url('update_product',$category->id)}}" method="post" enctype="multipart/form-data">
                @csrf
             <h2> Add Products</h2>
                <div>
                    <label>Title</label>
                    <input type="text" name="title" value="{{$category->title}}">
                </div>
                <div>
                    <label>Description</label>
                    <textarea name="description">{{$category->description}}</textarea>
                </div>
                <div>
                    <label>Price</label>
                    <input type="text" name="price" value="{{$category->price}}">
                </div>
                <div>
                    <label>Category</label>
                   <select name="category">
                   
                    <option>Select a Category</option>
                    @foreach($data as $data)
                    <option value="{{$data->category_name}}">{{$data->category_name}}</option>
                    @endforeach
                   
                   </select>
                </div>
                <div>
                    <label>Quantity</label>
                    <input type="text" name="quantity" value="{{$category->quantity}}">
                </div>
                <div>
                    <label>Current Image</label>
                    <img src="/products/{{$category->image}}" alt="" width="200">
                </div>
                <div>
                    <label>Image</label>
                    <input type="file" name="image">
                </div>
                <input type="submit" class="btn btn-success fw-bold" value="Update Product">
             </form>
           </div>
          </div>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="{{asset('admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('admincss/js/front.js')}}"></script>
  </body>
</html>