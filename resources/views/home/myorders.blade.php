<!DOCTYPE html>
<html>

<head>
@include('home.css')
<style>
    .table_orders {
        display:flex;
        align-items: center;
        justify-content: center;
        margin: 50px 0;
    }
    table {
        text-align: center;
        width:800px;
    }
    thead {
        background-color: black;
        color:#fff;

    }
    th,td {
        border:1px solid #222;
        padding:10px;
    }
</style>
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
      @include('home.header')
    
      <div class="table_orders">
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                   
                    <th>Price</th>
                    <th>Image</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $products)
                <tr>
                    <td>{{$products->title}}</td>
                    <td>{{$products->description}}</td>
                    
                    <td>{{$products->price}}</td>
                    <td>
                        <img src="/products/{{$products->image}}" width="100" alt="">
                    </td>
                </tr>
                @endforeach
            </tbody>
            
        </table>
      </div>

  
  @include('home.footer')
</body>

</html>