<div class="regular">
    <div class="container-regular">
        <div class="main-heading">
            <h1>OUR REGULAR FOOD</h1>
            <p>Some of our special food menu is given here. these are what people order more. if you want you can order from here.</p>
        </div>
    <div class="container">

        <div class="reg-card">
            {!! Toastr::message() !!}
            
            
            
            @foreach ($product_regular as $product)
                
            <form action="{{ url('add_cart',$product->id) }}" method="POST">
                @csrf
            <div class="card-regular">
                <img src="product/{{ $product->image }}" alt="">
                <div class="contant">
                    <h4>{{ $product->title }}</h4>
                    <p>{{ $product->description }}</p>
                </div>
                <span class="num" style="padding-bottom: 20px">
                    <input  style="margin-bottom: 20px" name="quantity" style="width: 100px" type="number" min="1" value="1">
                </span>
                <div class="info">
                    <button style="border: 0ch; background-color: #f8f9fb;"><a>${{ $product->price }}</a></button>
                    <button  style="border: 0ch; background-color: #f8f9fb;"><a>Buy Now</a></button>
                </div>
            </div>
            </form>
            @endforeach

        </div>
        <span style="padding-top: 20px;">
                     
                  
            {!! $product_regular->withQueryString()->links('pagination::bootstrap-5') !!}
            
         </span>
    </div>
    </div>
</div>