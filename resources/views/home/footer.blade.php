
<!-- start footer -->
<footer>
   <div class="container">
       <div class="box">
           <h3><a href="">Menu</a></h3>
           <ul style="padding-left: 0;">
               <li><a href="">Home</a></li>
               <li><a href="">Why choose</a></li>
               <li><a href="">Special Menu</a></li>
               <li><a href="">Regular Food</a></li>
               <li><a href="">Special Chef's</a></li>
           </ul>
       </div>
       <div class="box">
           <h3><a href="">Help</a></h3>
           <ul style="padding-left: 0;">
               <li><a href="">privacy</a></li>
               <li><a href="">Terms & Condition</a></li>
               <li><a href="">Policy</a></li>
           </ul>
       </div>
       <div class="box">
           <h3><a href="contact.html" target="_blank">contact</a></h3>
           <ul style="padding-left: 0;">
               <li><a href="">+123 456 789</a></li>
               <li><a href="">info@Foodied.com</a></li>
               <li><a href="">12345,New York, USA</a></li>
           </ul>
       </div>
       <div class="box">
           <h3><a href="">Subscribe Our Newsletter</a></h3>
           <form action="">
               <input type="email" placeholder="Enter Your Email">
               <input type="submit" value="Subscribe">
           </form>
       </div>
   </div>
</footer>

<script src="{{ asset('home/js/bootstrap.bundle.min.js') }}" ></script>

   {{-- بيعمل اسكرول وبيرجع لنفس المكان تاني بعد الريفريش --}}
   <script>
    document.addEventListener("DOMContentLoaded", function(event) { 
        var scrollpos = localStorage.getItem('scrollpos');
        if (scrollpos) window.scrollTo(0, scrollpos);
    });
 
    window.onbeforeunload = function(e) {
        localStorage.setItem('scrollpos', window.scrollY);
    };
 </script>
 
<!-- End footer -->
</body>
</html>