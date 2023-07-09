    @include('home.header2')

        <!-- end header -->
        {!! Toastr::message() !!}
        
        <!-- Start form -->
        <form action="{{ url('cash_order') }}" method="POST" class="form-shop">
            @csrf
            <div class="container">
                <div class="box-shop">
                    {{-- لازم تتحط برا الفور ايتش --}}
                    <?php $totalprice = 0; ?>
                    {{-- ------ --}}
                    @foreach ($carts as $cart)
                        

                    <div class="box">
                        <img src="product/{{ $cart->image }}" alt="">
                        <div class="info">
                            <h2>{{ $cart->product_title }}</h2>
                            <p>{{ $cart->description }}</p>
                            <label for="">Quantity :</label>
                            <input type="text" name="quantity"  value="{{ $cart->quantity }}">
                            <div class="links">
                                <ul>
                                    <li>
                                        <a onclick="confirmation(event)" href="{{ url('delete_cart' , $cart->id) }}" >
                                            Delete<span class="icon_close"></span>
                                        </a>
                                    </li>
                                    {{-- <li><a href="#">Save for another time</a></li>
                                    <li><a href="#">sharing</a></li> --}}
                                </ul>
                            </div>
                        </div>
                        <h3>price $<span>{{ $cart->total_price }}.00</span></h3>
                    </div>
                    
                                {{-- لازم تتحط جوا الفور ايتش --}}
                                <?php $totalprice = $totalprice + $cart->total_price; ?>
                                {{-- ------- --}}

                    @endforeach
                    
                </div>

                <div class="contact">
                    <div class="container">
                        <div class="form">
                            
                            
        
                            <div class="content">
                                <h2>Compleate this data</h2>
                            </div>
                            {{-- <form action="{{ route('add.contact') }}" method="post"> --}}
                                {{-- @csrf --}}
                                <input style="width: 400px" type="text" class="input" placeholder="Your Name" name="name">
                                <input style="width: 400px" type="text" class="input" placeholder="Your Phone" name="phone">
                                <input style="width: 400px" type="text" class="input" placeholder="Your Address" name="address">
                                {{-- <input type="text" class="input" placeholder="Your phone" name="phone">
                                <textarea placeholder="Tell Us About Your Needs" class="input" name="title"></textarea>
                                <input type="submit" value="send"> --}}
                            {{-- </form> --}}
                        </div>
                    </div>
                </div>

                <div class="total">
                    
                    <h3>المجموع ${{ $totalprice }}.00</h3>
                    <button>ORDER
                    </button>
                </div>
            </div>
        </form>
        <!-- End form -->

    <!-- start footer -->
        @include('home.footer')
    <!-- End footer -->
</body>
</html>