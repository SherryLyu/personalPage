<?php 
    require_once'config.php';
    $con = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    $name = trim($_POST['name']);
    $content = trim($_POST['content']);
    if((isset($name) === false || $name != '') && 
       (isset($content) === false || $content != '')){
        $time = date("Y-m-d H:i:s");
        $sql = "INSERT INTO discussion(NAME, COMMENT, TIME) VALUES('".$name."', '".$content."', '".$time."')";
        $con->query($sql);
    }
    $query = "SELECT* FROM discussion";
    $data = $con->query($query);
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Welcome to Sherry's Page</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Gamja%20Flower" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Permanent%20Marker" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Baloo%20Tammudu" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/business-casual.min.css" rel="stylesheet">

  </head>

  <body>

    <h1 class="site-heading text-center text-white d-none d-lg-block">
      <span class="site-heading-upper text-primary mb-3">Discussion Board!</span>
      <span class="site-heading-lower">Let me know what you think!</span>
    </h1>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
      <div class="container">
        <a class="navbar-brand text-uppercase text-expanded font-weight-bold d-lg-none" href="#">Sherry's World</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav mx-auto">
            <li class="nav-item px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="index.html">Home
                <span class="sr-only">(current)</span> <i class="fa fa-cloud"></i>
              </a>
            </li>
            <li class="nav-item px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="about.html">About <i class="fa fa-hand-o-left"></i></a>
            </li>
            <li class="nav-item px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="professional.html">Professional <i class="fa fa-laptop"></i></a>
            </li>
            <li class="nav-item active px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="comment.php">Comment <i class="fa fa-comments-o"></i></a>
            </li>
            <li class="nav-item px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="contact.php">Contact <i class="fa fa-connectdevelop"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <section class="page-section cta">
      <div class="container">
        <div class="well">
            <h4>Talk to me (smiley face):</h4>
            <form action="comment.php" method="post">
                <div class="row">
                    <div class="form-group col-lg-4">
                        <label>Name*:</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                </div>
            
                <div class="form-group">
                    <label>Comment*:</label>
                    <textarea class="form-control" rows="3" name="content"></textarea>
                </div> 
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
			<?php
                while($row = mysqli_fetch_array($data)){
                    //Comment
                    echo "<hr style=\"border: solid #ddd; border-width: 1px 0 0; clear: both; margin: 10px 0 10px; height: 0;\">";
                    echo "<div>";
                    echo "<h4><i class=\"fa fa-hand-o-right\"></i> ".$row['NAME']." ";
                    echo "<small>".$row['TIME']."</small>";
                    echo "</h4>";
                    echo "<h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                    echo $row['COMMENT'];    
                    echo "</h4>";                
                    echo "</div>";
                }
            ?>
        </div>
    </div>
    </section>

    <footer class="footer text-faded text-center py-5">
      <div class="container">
        <p class="m-0 small">Copyright &copy; Siyun(Sherry) Lyu 2018</p>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

  <!-- Script to highlight the active date in the hours list -->
  <script>
    $('.list-hours li').eq(new Date().getDay()).addClass('today');
  </script>

</html>
