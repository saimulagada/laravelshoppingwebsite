<!DOCTYPE html>
<html>
  <head> 
  @include('admin.css')
  </head>
  <style>
    .cat{
    display:flex;
    justify-content: center;
    align-items: center;
  }
  input[type="text"]{
    width:300px;
    height:40px;
    padding-left:10px;
    border-radius: 5px;

  }
  </style>
  <body>
  @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <div class="cat">
             <form action="{{url('/update', $data->id)}}" method="post">
                @csrf
                @method('POST')
                <input type="text" name="category_name" value="{{$data->category_name}}">
                <button type="submit" class="btn btn-primary fw-bold">Update</button>
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