<!DOCTYPE html>
<html>

<head>
@include('home.css')
<style>
    #product {
        display: flex;
        align-items: center;
        justify-content: center;
        margin:40px 0;
    }
</style>
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
      @include('home.header')
    <!-- end header section -->
    <!-- slider section -->

 

    <!-- end slider section -->
  </div>
  <div class="row" id="product">
       
        <div class="col-md-8">
          <div class="box">
            
              <div class="img-box">
                <img width="400"src="/products/{{$data->image}}" alt="">
              </div>
              <div class="detail-box">
                <h6>
                  Name : {{$data->title}}
                </h6>
                <h6>
                  Price
                  <span>
                    {{$data->price}}
                  </span>
                </h6>
              </div>
              <div class="detail-box">
               
                  Category : {{$data->category}}
                
                
                 
                  <p>
                    {{$data->description}}
</p>
               
              </div>
             
             
           
          </div>
        </div>
  </div>







  <!-- info section -->

  @include('home.footer')
</body>

</html>