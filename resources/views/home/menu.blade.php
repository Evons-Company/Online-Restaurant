    
    
    @include('home.header2')
        <!-- end header -->
        <!-- Start menu-card -->
        
        <div class="menu-card">
            <div class="container">
                <div class="main-heading">
                    <h1>MENU</h1>
                </div>
                <div class="card-wrapper">
                    {!! Toastr::message() !!}

                    @foreach ($products as $product)
                    
                    <div class="box">
                        <form action="{{ url('add_cart',$product->id) }}" method="POST">
                            @csrf
                        <div class="image-box">
                            
                            <img src="product/{{ $product->image }}" alt="">
                        </div>
                        <h3>{{ $product->title }}</h3>
                        <div class="info">
                            <div class="str-num">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <span class="num">
                                    ({{ $product->category }})
                                </span>
                                <span class="num">
                                    <input name="quantity" style="width: 100px" type="number" min="1" value="1">

                                </span>
                                <h4>${{ $product->price }}</h4>
                            </div>
                            
                            <div class="prag">
                                <button style="background-color: #84b74e; border: 0;" type="submit" ><i class="fa-solid fa-cart-shopping" style="color: white;"></i></button>
                            </div>
                        </div>
                        </form>
                    </div>
                    
                    @endforeach
                    
                </div>
                <span style="padding-top: 20px;">
                     
                  
                    {!! $products->withQueryString()->links('pagination::bootstrap-5') !!}
                    
                 </span>
            </div>
        </div>
        <!-- End menu-card -->


    <!-- start footer -->
    @include('home.footer')

