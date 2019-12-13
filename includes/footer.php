<?php 

//footer

echo '
<!-- Footer -->
    <footer>
        <div id="footer" class="pt-5 pb-2 font-weight-bolder">
          <div id="footerSection1" class="ml-5 mr-5">
            <a href="#"><p>Real Estate</p></a>
            <a href="#"><p>Profile</p></a>
            <a href="#"><p>Services</p></a>
            <a href="#"><p>Contact</p></a>
            <a href="#"><p>Terms</p></a>
          </div>
          <div id="footerSection2" class="ml-5 mr-5">
            <h4 class="text-center">FIRM d.o.o</h4>
            <p><i class="fas fa-map-marked-alt"></i>Vukovarska ul. 150</p>
            <p><a href="tel:+3952738765"><i class="fas fa-phone-volume"></i>Info: +395 273 8765</a></p>
            <p><a href="mailto:firma@mail.com"><i class="far fa-envelope"></i>firma@mail.com</a></p>
          </div>
          <div id="footerSection3" class="ml-5 mr-5 text-center">
            <form action="https://www.enformed.io/808pr7ew" class="contact_form">
            <div class="form-group">
                <input name="name" type="text" required class="form-control feedback-input" placeholder="Name" />
                <input name="email" type="text" required class="form-control feedback-input" placeholder="Email" />
                <textarea name="text" class="form-control feedback-input" placeholder="Contact us"></textarea>
              <input type="submit" class="form-group" value="Send" />
            </div>
          </div>
        </div>
        <div id="footerBottom" class="text-center pt-4 pb-3 font-weight-bolder">
          <p>FIRM d.o.o by LeffeCake</p>
        </div>
      </footer>
      <!-- END -->
      <div class="login-reg-window">
        <div class="login-reg-popup">
            <div>
              <h3>SIGN IN</h3>
              <h3>REGISTER</h3>
            </div>
            <form class="form-signin">
            <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
            <div class="checkbox mb-3">
              <label>
                <input type="checkbox" value="remember-me"> Remember me
              </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2017-2019</p>
          </form>
        </div>
      </div>

      <!-- JavaScript -->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
      <script src="js/main.js"></script>
      <script>
          AOS.init();
      </script>
    
    </body>
</html>';

?>