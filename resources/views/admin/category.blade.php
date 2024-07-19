<!DOCTYPE html>
<html>
  <head> 
  @include('admin.css')
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
  
  table{
      width:500px;
      text-align: center;
      border:1px solid #fff;
      margin:auto;
      margin-top: 50px;
  }
  th{
    font-size:15px;
    font-weight: bold;
    color:#fff;
   

  }
  td{
    font-size:12px;
    font-weight: bold;
    color:yellowgreen;
   
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
            <div class="cat">
               <form method="post" action="{{url('admin/category_name')}}">
                @csrf
                <div>
                    <input type="text" name="category_name">
                    <input type="submit" value="Add Category" class="btn btn-warning">
                </div>
               </form>
               </div>
               <div class="table">
                <table>
                    <thead>
                        <tr>
                            <th>Category_Name</th>
                            <th>Delete</th>
                        </tr>
                        <tbody>
                            @foreach($data as $data)
                            <tr>
                                <td>{{$data->category_name}}</td>
                                <td><form action="{{ url('delete', $data->id) }}" method="post">
                                  @csrf
                                  @method('DELETE')                                  
                                    <button type="submit" class="btn btn-danger fw-bold" onclick="confirmation(event)">Delete</button>
                                </form></td>
                                <td> <form action="{{url('edit', $data->id)}}" method="get">
                                  @csrf
                                    <button type="submit" class="btn btn-info fw-bold">Edit</button>
                                </form>
                                
                                </td>
                              
                            </tr>
                           
                            @endforeach
                            
                        </tbody>
                    </thead>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- <script>
        function confirmation(e){
          e.preventDefault();
          let urlToDirect = this.currentTarget.getAttribute(action);
          swal({
            icon:'warning',
            buttons:true,
            title:"Are you sure to delete?",
            text:"This delete will be permanent",
            dangerMode:true
          })
          .then((willCancel) => {
            if(willCancel){
              window.location.action = urlToDirect;
            }
          })
        }
     </script>
  </body> -->
</html>