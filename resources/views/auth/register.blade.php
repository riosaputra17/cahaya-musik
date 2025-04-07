<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8" />
    <title>Cahaya Musik Register</title>
    <link rel="stylesheet" href="{{ asset('css/auth-style.css') }}" />
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  </head>
  <body>
    <div class="bg-img">
      <div class="content">
        <header>CAHAYA MUSIK Register</header>
        <form action="{{ route('register') }}" method="POST">
          @csrf
          <div class="field">
            <span class="fa fa-user"></span>
            <input type="text" name="username" required placeholder="Username" />
          </div>
          <div class="field space">
            <span class="fa fa-user"></span>
            <input type="text" name="email" required placeholder="Email or Phone" />
          </div>
          <div class="field space">
            <span class="fa fa-lock"></span>
            <input
              type="password"
              name="password"
              class="pass-key"
              required
              placeholder="Password"
            />
            <span class="show">SHOW</span>
          </div>
          <div class="field space">
            <input type="submit" value="Register" />
          </div>
        </form>
        <div class="signup">
          Sudah Punya Akun?
          <a href="/login">Login Now</a>
        </div>
      </div>
    </div>

    <script>
      const pass_field = document.querySelector(".pass-key");
      const showBtn = document.querySelector(".show");
      showBtn.addEventListener("click", function () {
        if (pass_field.type === "password") {
          pass_field.type = "text";
          showBtn.textContent = "HIDE";
          showBtn.style.color = "#3498db";
        } else {
          pass_field.type = "password";
          showBtn.textContent = "SHOW";
          showBtn.style.color = "#222";
        }
      });
    </script>
  </body>
</html>
