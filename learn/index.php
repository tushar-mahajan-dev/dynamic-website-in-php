<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dynamic Website</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
  
<!-----navbar---->
<nav class="navbar navbar-expand-lg sticky-top" style="background-color: #e3f2fd;">
  <div class="container-fluid">
    <a class="navbar-brand" href="#home">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 justify-content-center flex-grow-1 pe-3">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#home">HOME</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#about">ABOUT</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#contact">CONTACT</a>
        </li>
        
        
      </ul>
      
    </div>
  </div>
</nav>


<!------banner---->
<section id="home">
<div id="carouselExampleCaptions" class="carousel slide">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="james-adams-x0rJ-rzX7S8-unsplash.jpg" class="d-block w-100" alt="...">
      <div class="d-sm-block">
        <h1>First slide label</h1>
        <p>Some representative placeholder content for the first slide.</p>
      </div>
    </div>
</div>
</section>


<!----about---->
<section id="about" style="background-color: #f0ffff;">
<div class="container text-left pt-5 pb-5">
  <div class="row align-items-center">
    <div class="col-sm-6">
      <h1>ABOUT</h1>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat, soluta tenetur. Debitis architecto, nobis deleniti similique laborum repudiandae culpa quisquam.</p>
      <br>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat, soluta tenetur. Debitis architecto, nobis deleniti similique laborum repudiandae culpa quisquam.</p>
      <br>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat, soluta tenetur. Debitis architecto, nobis deleniti similique laborum repudiandae culpa quisquam.</p>
      <br>
    </div>
    <div class="fade-in-img col-sm-6">
      <img src="james-adams-x0rJ-rzX7S8-unsplash.jpg" class="d-block w-100" alt="">
    </div>
  </div>
</div>
</section>


<!----Projects--->
<section id="projects" style="background-color: #e2e2e2;">
<div class="container text-center pt-5 pb-5">
  <div class="row align-items-center">
    <h1>PROJECTS</h1>
    <div class="fade-in-image col-sm-4 mt-4">
    <img src="james-adams-x0rJ-rzX7S8-unsplash.jpg" class="d-block w-100" alt="">
    </div>
    <div class="fade-in-image col-sm-4 mt-4">
    <img src="james-adams-x0rJ-rzX7S8-unsplash.jpg" class="d-block w-100" alt="">
    </div>
    <div class="fade-in-image col-sm-4 mt-4">
    <img src="james-adams-x0rJ-rzX7S8-unsplash.jpg" class="d-block w-100" alt="">
    </div>
  </div>
</div>
</section>

<!---contact--->
<section id="contact" style="background-color: #addfff;">
<div class="container text-left pt-5 pb-5">
  <div class="row align-items-center">
    <h1>CONTACT</h1>
    <div class="col-sm-6">
    <img src="james-adams-x0rJ-rzX7S8-unsplash.jpg" class="d-block w-100" alt="">
    </div>

    <div class="col-sm-6">
<form method="post" action="">
    <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Name</label>
  <input type="text" class="form-control" name="name" id="exampleFormControlInput1" placeholder="Type Your Name..." required> 
</div>

    <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Email address</label>
  <input type="email" class="form-control" name="email" id="exampleFormControlInput1" placeholder="name@example.com">
</div>

<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Phone</label>
  <input type="tel" class="form-control" name="phone" id="exampleFormControlInput1" placeholder="Type Your Phone Number...">
</div>

<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Message</label>
  <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="3" placeholder="Type Message Here..."></textarea>
</div>

<div class="d-grid gap-2">
  <button class="btn btn-primary" name="submit" id="submitBtn" type="submit">SUBMIT</button>
</div>
    </div>
  </div>
</form>
</div>

<?php
$host = "localhost";
$username="root";
$password="";
$dbname="abs";

$conn = new mysqli($host, $username, $password, $dbname);

if($conn->connect_error){
  die("connection failed:" .$conn->connect_error);
}

$name = $email = $phone = $message ="";
if($_SERVER["REQUEST_METHOD"]==="POST"){
  if(isset($_POST["name"])){
    $name=$_POST["name"];
  }

  if(isset($_POST["email"])){
    $email=$_POST["email"];
  }

  if(isset($_POST["phone"])){
    $phone=$_POST["phone"];
  }

  if(isset($_POST["message"])){
    $message=$_POST["message"];
  }

  $sql = "INSERT INTO ab(name, phone, email, message)VALUES('$name', '$phone', '$email', '$message')";

  if($conn->query($sql)===true){
    echo '<script>
    document.getElementById("submitBtn").innerHTML="Message Sent";
    document.getElementById("submitBtn").disabled = true;
    document.getElementById("successMessage").classList.remove("hidden");
    </script>';
  }
  else{
    echo "Error:" .$sql."<br>".$conn->error;
  }
}
$conn->close();
?>

</section>


<!---footer--->
<section id="footer" style="background-color: #e3f2fd;"> 
<div class="container text-center pt-3">
  <div class="row align-items-center">
    <div class="col">
      <p>Copyright@All Rights Reserved 2023</p>
    </div>
  </div>
</div>
</section>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
  if(window.history.replaceState)
  {
    window.history.replaceState(null, null, window.location.href);
  }
  </script>
</html>