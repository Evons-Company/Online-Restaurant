

@include('home.header2')


        <!-- end header -->

        <!-- Start form -->
        <div class="contact">
            <div class="container">
                <div class="form">
                    
                    {!! Toastr::message() !!}

                    <div class="content">
                        <h2>Request A Discount</h2>
                    </div>
                    <form action="{{ route('add.contact') }}" method="post">
                        @csrf
                        <input type="text" class="input" placeholder="Your name" name="name">
                        <input type="email" class="input" placeholder="Your Email" name="email">
                        <input type="text" class="input" placeholder="Your phone" name="phone">
                        <textarea placeholder="Tell Us About Your Needs" class="input" name="title"></textarea>
                        <input type="submit" value="send">
                    </form>
                </div>
            </div>
        </div>
        <!-- End form -->

        <!-- start footer -->

    @include('home.footer')
        
