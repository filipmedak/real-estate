<?php
  require_once("includes/dbh.inc.php");
?>

<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Real Estate Site</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/adminPanel.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

</head>

<body>
    <!-- Navigation -->

    <!-- Navigation !END! -->


    <!-- <div class="outer">
        <div class="inner-fixed ">
            <nav class="admin-nav container">
                <ul class="admin-list d-flex justify-content-around flex-column flex-lg-row">
                <?php
                // $adminOptions=scandir("includes/adminInc");
                // unset($adminOptions[0]);
                // unset($adminOptions[1]);
                // foreach ($adminOptions as $key => $value) {
                //   $item=rtrim($value, ".php");
                //   echo '<li class="nav-item"><a class="text-white p-0 d-block h-100 text-center" href="adminPanel.php?p='.$item.'">'.$item.'</a></li>';
                // }
              ?>
                </ul>
              </nav>
              <div class="burgerIcon d-flex flex-column align-items-center justify-content-around">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
              </div>
        </div>

            <div class="content container">
          


      </div>    

      </div> -->


    <nav class="navbar-custom">
        <div class="container h-100">
            <div class="navbar h-100 ">
                <h4 class="text-white m-0 d-xl-none d-inline">Admin Panel</h4>
                <ul class="navbar-list d-xl-flex d-none">
                    <?php
                $adminOptions=scandir("includes/adminInc");
                unset($adminOptions[0]);
                unset($adminOptions[1]);
                foreach ($adminOptions as $key => $value) {
                  $item=rtrim($value, ".php");
                  echo '<li class="nav-item"><a class="nav-link" href="adminPanel.php?p='.$item.'">'.$item.'</a></li>';
                }
              ?>
                </ul>
                <div class="burger-menu d-xl-none d-block">
                    <div class="line"></div>
                    <div class="line"></div>
                    <div class="line"></div>
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        <?php
            if (isset($_GET["p"])) {
              $file='includes/adminInc/'.$_GET["p"].'.php';
              include $file;  
            }
?>
    </div>

    <!-- END -->


    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <script>
    let burgerDropdown = document.querySelector(".burger-menu");
    let navbarListMobile = document.querySelector(".navbar-list");
    let navbar = document.querySelector(".navbar-custom");

    burgerDropdown.addEventListener("click", function() {
        navbarListMobile.classList.toggle("navbar-show");
        navbarListMobile.classList.toggle("d-none");
    });
    </script>
</body>

</html>