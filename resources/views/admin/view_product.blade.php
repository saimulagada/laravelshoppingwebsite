<!DOCTYPE html>
<html>
  <head> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js">
  @include('admin.css')
  <style>
    .product_deg{
        display:flex;
        align-items: center;
        justify-content: center;
        margin:0 auto;
        margin-top:50px;
        text-align: center;
    }
    table {
        border:1px solid #fff;
        text-align: center;
        
    }
    th {
        font-size:20px;
        color:#fff;
        font-weight: bold;
        background-color: skyblue;
        padding:10px;
    }
    td {
        font-size:15px;
        color:#fff;
        border: 1px solid yellow;
        padding:10px;
    }
    .input {
      margin:10px 0;

    }
    input[type="search"]{
      width:300px;
      height:39px;
      padding-left: 10px;
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
            <div class="input">
              <form method="get" action="{{url('product_search')}}">
                @csrf
                <input type="search" name="search">
                <input type="submit" class="btn btn-warning fw-bold" value="Search">
              </form>
            </div>
            <div class="product_deg">
                <table>
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>quantity</th>
                            <th>Image</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($product as $products)
                        <tr>
                            <td>{{$products->title}}</td>
                            <td>{!!Str::limit($products->description,20)!!}</td>
                            <td>{{$products->price}}</td>
                            <td>{{$products->category}}</td>
                            <td>{{$products->quantity}}</td>
                            <td>
                                <img src="products/{{$products->image}}" width="120" height="120" alt="product_image">
                            </td>
                            <td><a href="{{url('edit_product',$products->id)}}" class="btn btn-info fw-bold">Edit</a></td>
                            <td><a href="{{url('delete_product',$products->id)}}" class="btn btn-danger fw-bold">Delete</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="product_deg">
              {{$product->onEachSide(1)->links()}}
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