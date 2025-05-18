<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>404 Not Found</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Montserrat:wght@400;600&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="404-style.css" />

    <script
      src="https://kit.fontawesome.com/a076d05399.js"
      crossorigin="anonymous"
    ></script>
    <style>
        * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body,
html {
  height: 100%;
  font-family: "Montserrat", sans-serif;
  background: radial-gradient(circle at center, #d80000, #8b0000);
  color: white;
  display: flex;
  justify-content: center;
  align-items: center;
  text-align: center;
  position: relative;
  overflow: hidden;
}

body::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-image: radial-gradient(
    rgba(255, 255, 255, 0.03) 1px,
    transparent 1px
  );
  background-size: 40px 40px;
  pointer-events: none;
  z-index: 0;
}

.container {
  max-width: 700px;
  position: relative;
  z-index: 1;
}

h1 {
  font-size: 120px;
  font-weight: 800;
}

p {
  font-size: 18px;
  margin: 20px 0;
  font-weight: 600;
}

.buttons {
  margin: 30px 0;
}

.btn,
.btn-outline {
  text-decoration: none;
  padding: 10px 25px;
  border-radius: 30px;
  margin: 0 10px;
  font-weight: 600;
  transition: 0.3s ease;
}

.btn {
  background-color: white;
  color: #c60000;
}

.btn-outline {
  border: 2px solid white;
  color: white;
}

.btn:hover {
  background-color: #eee;
}

.btn-outline:hover {
  background-color: white;
  color: #c60000;
}

.socials {
  margin-top: 20px;
}

.socials a {
  color: white;
  margin: 0 10px;
  font-size: 18px;
  transition: 0.3s;
}

.socials a:hover {
  color: #ffcccc;
}

    </style>
  </head>
  <body>
    <div class="container">
      <h1>404</h1>
      <p>
        Halaman tidak tersedia karena anda tidak memiliki akses, kembali
        kehalaman home
      </p>
      <div class="buttons">
        <a href="/" class="btn">Go Home</a>
        <a href="/contact" class="btn-outline">Contact Us</a>
      </div>
      <div class="socials">
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-pinterest-p"></i></a>
        <a href="#"><i class="fab fa-google-plus-g"></i></a>
      </div>
    </div>
    <script
      src="https://kit.fontawesome.com/a076d05399.js"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
