<!DOCTYPE html>
<html>

<head>
@include('home.css')
<style>
    .table_cart{
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 20px 0;
    }
    table {
        border:1px solid #000;
        text-align: center;
        
    }
    thead{
        background-color: orange;
        color:black;
        padding:10px;

    }
    th {
        padding:10px;
    }
    td {
        border:1px solid #000;
        padding:10px;
    }
    h2{
        text-align: center;
        font-size: 15px;
        font-weight:400;
    }
    h2 span{
        font-size: 20px;
        font-weight:600
    }
    .rec_details{
        margin-right:35px;
    }
    form div {
        margin:10px 0;
    }
    label {
        width:150px;
    }
    form div input {
        width:300px;
        height:40px;
        padding-left:10px;
    } 
    textarea {
        width:300px;
        padding-left:10px;
    }
</style>
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
      @include('home.header')
    <!-- end header section -->
    <!-- slider section -->

  
   <div class="table_cart">


     <div class="rec_details">
        <form method="post" action="{{url('confirm_order')}}">
            @csrf
            <div>
                <label>Receiver Name</label>
                <input type="text" name="name" value="{{Auth::user()->name}}">
            </div>
            <div>
                <label>Receiver Address</label>
                <textarea name="address">{{Auth::user()->address}}</textarea>
            </div>
            <div>
                <label>Receiver Number</label>
                <input type="text" name="number" value="{{Auth::user()->number}}">
            </div>
            <input type="submit" class="btn btn-primary fw-bold" value="Order Now">
        </form>
     </div>
    <table>
        <thead>
            <tr>
                </tr>
                <th>id</th>
                <th>Name</th>
                <th>Address</th>
                <th>Product Title</th>
                <th>Quantity</th>
                <th>Price</th>
              </tr>
         <?php
         $value = 0;
         ?>
        </thead>
        <tbody>
    @foreach($cart as $cart)
      <tr>
        <td>{{$cart->id}}</td>
        <td>{{$cart->name}}</td>
        <td>{{$cart->address}}</td>
        <td>{{$cart->product_title}}</td>
        <td>{{$cart->quantity}}</td>
        <td>{{$cart->price}}</td>

        <?php
          $value = $value + $cart->price;
        ?>
       
      </tr>
    
    @endforeach
    </tbody>
    </table>
      
   </div>
   <h2>The total value of Cart is <span>${{$value}}</span></h2>

   

  <!-- info section -->

  @include('home.footer')
</body>

</html>