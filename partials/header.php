<!-- get page and action from the url -->
<?php $page = isset($_GET['page']) ? $_GET['page'] : "home";
$action = isset($_GET['action']) ? $_GET['action'] : "index"; ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= isset($title) ? $title : "Stamp Collecting Home" ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <style>
    .footer {
        position: absolute;
        bottom: 0;
        width: 100vw;
        line-height: 60px; /* Vertically center the text there */
        background-color: #f5f5f5;
    }
    #sticky {
        width:100vw;
        position:fixed;    /*Here's what sticks it*/
        bottom:0;          
        left:0;            
        border-top: 1px solid #eee;
        /* box-shadow:0 -1px 18px;  */
    }

    #map { width: 100vw; height: 92vh; }
    #mapWrapper{
        height:100%;
    }
    
    </style>
</head>
<body>
   
    <header>
        <!-- Fixed navbar -->
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item <?php if($page=="home" || $homepage=="index"){ ?>active<?php } ?>">
                        <a class="nav-link" href="index.php?page=home">Home</a>
                    </li>
                    <li class="nav-item <?php if($page=="map"){ ?>active<?php } ?>">
                        <a class="nav-link" href="index.php?page=map">Map </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>