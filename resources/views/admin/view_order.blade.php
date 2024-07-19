<!DOCTYPE html>
<html>
  <head> 
  @include('admin.css')
  <style>
    .order_table {
        display: flex;
        align-items: center;
        justify-content: center;
        margin-top: 20px;
    }
    table {
        width:700px;
        text-align: center;
    }
    thead{
        padding:10px;
        background-color: orange;
        color:#222;
       
    }
    th,td{
       
        text-align: center;
        
    }
    td {
        border:1px solid aqua;
        padding:10px;
    }
    tbody {
        border:1px solid aqua;
        text-align: center;
        color:#fff;
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
               <div class="order_table">
                <table>
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>name</th>
                            <th>rec_address</th>
                            <th>user_id</th>
                            <th>product_id</th>
                            <th>status</th>
                            <th>check status</th>
                            <th>Download pdf</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $data)
                        <tr>
                            <td>{{$data->id}}</td>
                            <td>{{$data->name}}</td>
                            <td>{{$data->rec_address}}</td>
                            <td>{{$data->user_id}}</td>
                            <td>{{$data->product_id}}</td>
                            @if($data->status == "on the way")
                            <td><span style="color:yellow">{{$data->status}}</span></td>
                            @endif
                            <td>
                                <a href="{{url('on_the_way',$data->id)}}" class="btn btn-primary">On the way</a>
                                <a href="{{url('delivered',$data->id)}}" class="btn btn-success">Delivered</a>
                            </td>
                            <td><a href="{{url('download_pdf',$data->id)}}" class="btn btn-secondary">Download Pdf</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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