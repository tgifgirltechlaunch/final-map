<!-- Include Header -->
<?php include "partials/header.php"; ?>

    <!-- Begin page content -->
    <main role="main" class="container">
        <div class="row">
            <div class="col-sm-12">
                <!-- Map Info -->
                <h1><?= $welcome; ?></h1>
                <?php if(isset($fullAddress)){ ?><span> You entered: </span><?= $fullAddress; }else{ ?><span>No Data</span> <?php } ?></p>
                <div style="overflow-y: scroll; height:100px; margin-bottom: 40px;">
                    <div id="userInfo">
                        <ul class="directory">
                            <?php if(!empty($rolo)){ $index = 1; foreach($rolo as $l) { ?>
                            <li><span class="bold">#<?= $index++?></span> <?=" " . $l->fname . " " . $l->lname . " " ?><i class="fas fa-map-pin"></i>  <?= $l->address ?></li>
                            <?php } } ?>
                        </ul>
                    </div>
                </div>
                <div id="mapWrapper"><div id="map"></div></div>
            </div>
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

        locations = <?php echo json_encode($coords); ?>;
        
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 6,
            center: new google.maps.LatLng(<?= json_encode($coords[0][1]); ?>, <?= json_encode($coords[0][2]); ?>),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        var infowindow = new google.maps.InfoWindow({});

        var marker, i;

        for (i = 0; i < locations.length; i++) {
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                map: map,
                label: ""+(i+1),
            });

            google.maps.event.addListener(marker, 'mouseover', (function (marker, i) {
                return function () {
                    infowindow.setContent(locations[i][0]);
                    infowindow.open(map, marker);
                }
            })(marker, i));
            google.maps.event.addListener(marker, 'mouseout', (function (marker, i) {
                return function () {
                    infowindow.setContent(locations[i][0]);
                    infowindow.close(map, marker);
                }
            })(marker, i));
        }
    }

    
    </script>
    <!-- Include Footer -->
    <?php include "partials/footer.php"; ?>

    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAYb6Id4RgmJUwcoP6F4XAWsgB07xMN4DQ&callback=initMap"></script>
  