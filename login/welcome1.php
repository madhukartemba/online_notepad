<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: login.php");
}

require_once("config.php");


if(isset($_POST['delete']))
{
    $request_row = $_POST['id'];

    require_once("config.php");

    if(mysqli_query($conn, "delete from blog where id='$request_row'"))
    {
        echo "<h1 style='font-family:verdana;'> Successfully deleted the note with ID: $request_row </h1>";
    }
    else
    {
        echo "<h1 style='font-family:verdana;'> Error occured while deleting note with ID: $request_row </h1>";
    }

    header("refresh: 3; url=welcome1.php");
}
else if(isset($_POST["add_to_list"]))
{
    require_once('config.php');
    
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $desc = mysqli_real_escape_string($conn, $_POST['content']);

    if(!empty($title) && !empty($desc))
    {
        $id = $_SESSION['id'];
        $sql = "insert into blog (article_title, article_content, user_id) values('$title', '$desc', '$id');";
        $exec = mysqli_query($conn, $sql);
        
        if(!$exec)
        {
            redirectToWelcome("failedToSubmitData");
        }
        else
        {
            redirectToWelcome("successfullySubmitted");
        }


    }
    else
    {
        redirectToWelcome("titleOrDescEmpty");
    }

}

function redirectToWelcome($msg="invalidRequest")
{
    echo "<h1 style = 'text_align:center; font-size:100px; font-family:verdana; color: green;'> $msg </h1>";
    header("refresh:1; url=welcome1.php?".$msg);
}


?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Online Notepad!</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Online Notepad</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="register.php">Register</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>

      
     
    </ul>

  <div class="navbar-collapse collapse">
  <ul class="navbar-nav ml-auto">
  <li class="nav-item active">
        <a class="nav-link" href="#"> <img src="https://bpng.subpng.com/dy/1f7d738c047597b9d94688f90b9df0c0/L0KzQYm3UsE6N6FniZH0aYP2gLBuTgNmaV5oeeJ9YXnxPcToifxwel54gNt5LXPvecG0ggJ1NaRyed51LYDofrj8if4ua51uiNN7dIOwRbKBgsNkO5RoUdU8OUaxRIKCVsE0P2Y2TaMEMEe3Q4e7WMI3PF91htk=/kisspng-sea-captain-sailor-ship-clip-art-small-penguin-cliparts-5a8b3c3cc9c396.4196137515190743648264.png" style="height:40px; width=40px"> <?php echo "Welcome ". $_SESSION['username']?></a>
      </li>
  </ul>
  </div>
</nav>

<div class="container mt-4">
<h3><?php echo "Welcome ". $_SESSION['username']?>! You can take notes now!</h3>
<hr>

</div>


<div>

    <form action="" method="POST">
        <div class="container">
        
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" aria-describedby="emailHelp" name='title'>
            <div id="emailHelp" class="form-text">Choose a good title! </div>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="content" id="description" ></textarea>
        </div>

        <button type="submit" class="btn btn-primary" id="add" name="add_to_list">Add to list</button>

    </form>

    <br><br><br><BR><h1>Your notes:</h1><br><hr><br>

    <?php
        $id = $_SESSION['id'];
        $rows = mysqli_query($conn, "select * from blog where user_id='$id'order by date_published desc");
        $count = 1;
        while($row = mysqli_fetch_array($rows))
        {

    ?>
        
        <h2 > <?php echo $count++ ?>.   <?php echo $row[1]; ?> </h2><br>
        <h5> Date: <?php echo $row[3]; ?> </h5><br>

        
        <form action="" method="POST">
            <input type = "hidden" name = "id" value = "<?php echo $row[0]; ?>" />
            <button style="float: right; background-color: #f44336;" type="submit" class="btn btn-primary" id="delete" name="delete">Delete</button>
        </form>


        <form action="details.php" method="POST">
            <input type = "hidden" name = "id" value = "<?php echo $row[0]; ?>" />
            <button type="submit" class="btn btn-primary" id="add" name="open_details">Open</button>
        </form>

        <br>


        <br><hr><br>
    
    <?php
        }

    ?>

    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <hr>


    <script src="http://localhost:80/ckeditor/ckeditor.js"></script>
    <script>
      CKEDITOR.replace('content');

    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>


</div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
