<!-- get page and action from the url -->
<?php $page = $_GET['page']; if (isset($_GET['action'])) { $action= $_GET['action'];} ?>

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
    width: 100%;
    line-height: 60px; /* Vertically center the text there */
    background-color: #f5f5f5;
}
#sticky {
    width:100%;
    position:fixed;    /*Here's what sticks it*/
    bottom:0;          
    left:0;            
    border-top: 1px solid #eee;
    /* box-shadow:0 -1px 18px;  */
}

/* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
 html { height: 100vh; }
  body { height: 100vh; margin: 0px; padding: 0px }
  #container { width: 100vw; height: 100vh; }
  #map { width: 100vw; height: 100vh; }
  #mapWrapper{
          height:100vh;
      }
.col, .col-1, .col-10, .col-11, .col-12, .col-2, .col-3, .col-4, .col-5, .col-6, .col-7, .col-8, .col-9, .col-auto, .col-lg, .col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-auto, .col-md, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-auto, .col-sm, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-auto, .col-xl, .col-xl-1, .col-xl-10, .col-xl-11, .col-xl-12, .col-xl-2, .col-xl-3, .col-xl-4, .col-xl-5, .col-xl-6, .col-xl-7, .col-xl-8, .col-xl-9, .col-xl-auto {
    position: relative;
    width: 100%;
    min-height: 1px;
    padding-right: 0; 
    padding-left: 0;
}

ul {
    list-style: none;
}

      
ul.directory li:nth-child(even){
    background-color: #eee;
}
      

ul.sideList li{
    font-size: 10px;
    color: white; 
    margin-left: -20px;
    position: relative;
}

#msg{
    color: #fff; font-size: 20px; position: absolute; top: 80px; left: 40%; opacity: 1; margin:0 auto; padding:20px; z-index: 999999; background-color: #808080;
}

#msgClose {
    float:right;
    display:inline-block;
    padding:2px 15px;
    color:#fff;
}

#msgClose:hover {
    float:right;
    display:inline-block;
    padding:2px 15px;
    color:#000;
}

.bold{
    font-size: 14px;
    font-weight: bolder;
}

.nodata{
    width: 100vw;
    height: 100vh;
    margin: -45px 0 0 0px !important;
    padding: 0 !important;
    background-image: url(includes/images/no-data.jpg);
    background-repeat: no-repeat;
    background-size: contain;
    position: absolute;
    top:0;
    left: 0;
}

#over_map {color: #fff; font-weight: 500; text-transform: uppercase; position: absolute; top: 80px; right: 0px; padding:20px; z-index: 999999;  background-color: #808080;}
#over_map:hover {color: #000;}

/* The side navigation menu */
.sidenav {
    height: 88.5vh; /* height */
    width: 0; /* 0 width - change this with JavaScript */
    position: fixed; /* Stay in place */
    z-index: 1; /* Stay on top */
    top: 30px; /* Stay at the top */
    left: 0;
    background-color: #808080; /* Black*/
    overflow-x: hidden; /* Disable horizontal scroll */
    padding-top: 80px; /* Place content 60px from the top */
    transition: 0.5s; /* 0.5 second transition effect to slide in the sidenav */
}

/* The navigation menu links */
.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #fff;
    display: block;
    transition: 0.3s;
}

/* When you mouse over the navigation links, change their color */
.sidenav a:hover {
    color: #f1f1f1;
}

/* Position and style the close button (top right corner) */
.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}
.sidenav .closebtn:hover {
    color: black;
}
/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
@media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
    .sidenav a {font-size: 18px;}
}

    </style>
</head>
<body>
   
    <header>
        <!-- Fixed navbar -->
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
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