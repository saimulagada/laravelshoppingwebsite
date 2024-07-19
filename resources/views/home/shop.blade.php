<section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Latest Products
        </h2>
      </div>
      <div class="row">
        @foreach($products as $products)
        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="box">
            
              <div class="img-box">
                <img src="products/{{$products->image}}" alt="">
              </div>
              <div class="detail-box">
                <h6>
                  {{$products->title}}
                </h6>
                <h6>
                  Price
                  <span>
                    {{$products->price}}
                  </span>
                </h6>
              </div>
              <div>
                <a href="{{url('product_details',$products->id)}}" class="btn btn-danger fw-bold">Details</a>
                   @if(Auth::user())
                   <form method="post" action="{{url('add_cart',$products->id)}}">
                    @csrf
                   <button type="submit" class="btn btn-primary mt-3">Add to Cart</button>
                   </form>
                    @else

                    <button type="submit" class="btn btn-primary mt-3"><a href="{{url('/login')}}">Add to Cart</a></button>
                    @endif
              </div>
             
           
          </div>
        </div>
        @endforeach
       
    </div>
  </section>