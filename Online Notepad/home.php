<!doctype html>
<html lang="en">


  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Online Notepad!</title>
    <style>
        
        @font-face {
            font-family: dock11;
            src:url(heavy_dock11.otf);
        }

        .emboss-txt {
            
            position: relative;
            font-size: 180px;
            font-family: dock11;
            letter-spacing: 5px;
            color:rgb(207,207,207);
            
        }

        .emboss-txt::after {
            content: "ONLINE NOTEPAD";
            font-size: 180px;
            letter-spacing: 5px;
            position: absolute;
            font-family: dock11;
            text-shadow: 0px 0px 100px rgba(11,124,199,0.5);
            top:0;
            left:0;
            animation: cycle 10s linear infinite;
            }
        

        @keyframes cycle {
            0% { text-shadow: 0px 0px 100px rgba(11,124,199,0.5);}
            20% { text-shadow: 0px 0px 100px rgba(168,11,199,0.5);}
            40% { text-shadow: 0px 0px 100px rgba(11,199,96,0.5);}
            60% { text-shadow: 0px 0px 100px rgba(199,11,11,0.5);}
            80% { text-shadow: 0px 0px 100px rgba(199,96,11,0.5);}
            }



    </style>

  </head>
  <body style="background-color: grey;">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Online Notepad</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
  <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
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
  </div>
</nav>

<div style="text-align: center; color:white;">
    <br>
    <h1>Hello there! You have come to the right place for taking notes <img src="pen_img.png" style="width: 32px; height:32px"></h1>    
    
</div>
    <center><div class="emboss-txt">ONLINE NOTEPAD</div></center>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
