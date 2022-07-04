<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: login.php");
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
        <a class="nav-link" href="#"> <img src="https://bpng.subpng.com/dy/1f7d738c047597b9d94688f90b9df0c0/L0KzQYm3UsE6N6FniZH0aYP2gLBuTgNmaV5oeeJ9YXnxPcToifxwel54gNt5LXPvecG0ggJ1NaRyed51LYDofrj8if4ua51uiNN7dIOwRbKBgsNkO5RoUdU8OUaxRIKCVsE0P2Y2TaMEMEe3Q4e7WMI3PF91htk=/kisspng-sea-captain-sailor-ship-clip-art-small-penguin-cliparts-5a8b3c3cc9c396.4196137515190743648264.png" style="height:32px; width:32px;"> <?php echo "Welcome ". $_SESSION['username']?></a>
      </li>
  </ul>
  </div>
</nav>

<div class="container mt-4">
<h3><?php echo "Welcome ". $_SESSION['username']?>! You can take notes now!</h3>
<hr>

</div>


<div>

    <div class="container">
      
      <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control" id="title" aria-describedby="emailHelp">
          <div id="emailHelp" class="form-text">Choose a good title! </div>
      </div>

      <div class="form-group">
          <label for="description">Description</label>
          <textarea class="form-control" id="description" rows="3"></textarea>
      </div>

      <br>
      <button type="submit" class="btn btn-primary" id="add">Add to list</button>
      <button type="submit" class="btn btn-primary" id="clear list" onclick="clearList()">Clear List</button>
      <br><br>

      <div id="items" class="my-4">
          <h1> Your Items </h1>

          <table class="table">
          <thead>
              <tr>
              <th scope="col">SNo</th>
              <th scope="col">Title</th>
              <th scope="col">Description</th>
              <th scope="col">Actions</th>
              </tr>
          </thead>
          <tbody id="tableBody">
          </tbody>
          </table>

      </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>


    <script>
      add = document.getElementById("add");
      add.addEventListener("click", set_and_update);

      update();
      function set_and_update()
      { 
          console.log("Setting and updating list.");
          tit = document.getElementById("title").value;
          desc = document.getElementById("description").value;

          if(tit.length == 0 || desc.length==0) return;

          if (localStorage.getItem("itemsJSON") == null) {
          itemJSONarr = [];
          itemJSONarr.push([tit, desc]);
          }
          else {
          itemJSONarr = JSON.parse(localStorage.getItem("itemsJSON"));
          itemJSONarr.push([tit, desc]);
          }
          localStorage.setItem("itemsJSON", JSON.stringify(itemJSONarr));
          update();
      }

      function update()
      {
          console.log("Updating list.");
          if(localStorage.getItem("itemsJSON")!=null)
          {
          //Now we need to show the list in the table format
          itemJSONarr = JSON.parse(localStorage.getItem("itemsJSON"));

          tableBody = document.getElementById("tableBody");
          let str = "";
          
          itemJSONarr.forEach((element, index) => {
              str =
              `
              <tr>
                  <th scope="row">${itemJSONarr.length - index}</th>
                  <td>${element[0]}</td>
                  <td>${element[1]}</td>
                  <td><button class="btn btn-primary" onclick="deleteItem(${index})">Delete</button></td>
              </tr>
              ` + str;
          });

          tableBody.innerHTML = str;


          }
      }

      function deleteItem(index)
      {
          console.log("Deleted element at index: " , itemJSONarr.length - index);
          itemJSONarr = JSON.parse(localStorage.getItem("itemsJSON"));
          itemJSONarr.splice(index, 1);
          localStorage.setItem("itemsJSON", JSON.stringify(itemJSONarr));
          update();
      }

      function clearList()
      {
          if(alert("Do you really want to clear the list?")==undefined)
          {
          console.log("Clearing the list");
          itemJSONarr = [];
          localStorage.setItem("itemsJSON", JSON.stringify(itemJSONarr));
          update();
          }
      }
    </script>

</div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
