<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: login.php");
    exit();
}


$request_row = $_POST['id'];

require_once("config.php");

$row = mysqli_fetch_array(mysqli_query($conn, "select * from blog where id='$request_row'"));

$copy_content = 0;

if(isset($_POST['copy_content']))
{
    $copy_content = 1;
}

?>


<html>
    <head>
        <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title><?php echo $row[1]; ?></title>
    </head>
    <body>
        <br><br>
        <div class="content container">
            <h1> <?php echo $row[1]; ?> </h1><hr><br>
                <?php echo $row[2]; ?>
            <!-- <input id = "main_content" type="hidden" value = "<?php echo $row[2]; ?>"> -->
        <br><hr><br><br>

        <script>
            let x = <?php echo $copy_content?>;
            if(x=='1')
            {
                myFunction();
            }

            function myFunction() {
            /* Get the text field */
            var copyText = document.getElementById("main_content");

            /* Select the text field */
            copyText.select();

            /* Copy the text inside the text field */
            //navigator.clipboard.writeText(copyText.value);
            document.execCommand("Copy");

            /* Alert the copied text */
            alert("Copied the text: " + copyText.value);
            }

        </script>

        <form action="welcome1.php" method="POST">
            <!-- <input type = "hidden" name = "id" value = "<?php echo $row[0]; ?>" /> -->
            <button type="submit" class="btn btn-primary" name="go_back">Go Back</button>
        </form>
        
        <form action="" method="POST">
            <input type = "hidden" name = "id" value = "<?php echo $row[0]; ?>" />
            <button type="submit" class="btn btn-primary" name="copy_content">Copy Content</button>
        </form>
        </div>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
