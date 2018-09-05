<!-- Include Header -->
<?php include "partials/header.php"; ?>

    <!-- Begin page content -->
    <main role="main">
            <div class="col-sm-12">
                <!-- Map Info -->
                <!-- <?php if(isset($fullAddress)){ ?><h1><?= $welcome; ?></h1><p><span> You entered: </span><?= $fullAddress; }?></p> -->
                <?php if(!empty($rolo)){ ?>                  
                    
                    <div id="mapWrapper">
                        <div id="map"></div>
                        <div id="msg"><?= $msg; ?><span id="msgClose"><i class="fas fa-times-circle"></i></span></div>
                        <div id="over_map" onclick="openNav()">Directory</div>
                        <div id="mySidenav" class="sidenav">
                            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                            <div id="userInfo">
                                <ul class="sideList">
                                    <?php $index = 1; foreach($rolo as $l) { ?>
                                    <li><span class="bold">#<?= $index++?></span> <?=" " . $l->fname . " " . $l->lname . " " ?><i class="fas fa-map-pin"></i>  <?= $l->address ?></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php } else { ?><div class="nodata"></div><?php } ?>
            </div>
       
    </main>

    <!-- Footer -->
    <footer id="sticky" class="footer">
        <div class="container-fluid">
            <div id="copyright">&copy&nbspLazara Michelle, Techlaunch Student - 2018</div>
        </div>
    </footer>
    <script>
   
    function initMap() {

        locations = <?= json_encode($coords); ?>;
        
        
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 10,
            center: new google.maps.LatLng(<?= json_encode($coords[0][1]); ?>, <?= json_encode($coords[0][2]); ?>),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        var infowindow = new google.maps.InfoWindow({});

        var marker, i;

        //create markers using locations array and make label show numbers on markers
        for (i = 0; i < locations.length; i++) {
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                map: map,
                label: ""+(i+1),
            });

            //show info on hover
            google.maps.event.addListener(marker, 'mouseover', (function (marker, i) {
                return function () {
                    infowindow.setContent(locations[i][0]);
                    infowindow.open(map, marker);
                }
            })(marker, i));

            //do not show when not hovered
            google.maps.event.addListener(marker, 'mouseout', (function (marker, i) {
                return function () {
                    infowindow.setContent(locations[i][0]);
                    infowindow.close(map, marker);
                }
            })(marker, i));
        }
    }
    </script>
    <script>
        /* open and close sidebar directory */
function openNav() {
    var a = document.getElementById('mySidenav').offsetWidth;

    /* if open, close it, else Set the width of the side navigation to 250px */
    if(a > 0){closeNav();}
    else{
        document.getElementById("mySidenav").style.width = "250px";
    }
}

/* to close, set the width of the side navigation to 0 */
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}

// close message box
window.onload = function(){
    document.getElementById('msgClose').onclick = function(){
        this.parentNode.parentNode
        .removeChild(this.parentNode);
        return false;
    };
};
    </script>
    <!-- Include Footer -->
    <?php include "partials/footer.php"; ?>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD7dWZZA7rqXxvWZLgpBnhh4JXg5i-momQ&callback=initMap"></script>
  