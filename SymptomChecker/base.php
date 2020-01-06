

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Find Doctor</title>
    <style>

    	 #map {
        height: 60%;
        width: 100%;
        padding-top: 30%;
        border-top: 30%;
        border-color: #0000;
    }

    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="{%static 'symptomChecker/images/image.png'%}" width="70px " height="70px">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav mx-auto">
                <a class="nav-item nav-link " href="{%url 'symptomChecker'%}">Home <span
                        class="sr-only">(current)</span></a>
                <a class="nav-item nav-link active" href="#">Find Doctors</a>
                <a class="nav-item nav-link" href="#">Price Comparator</a>
                <!--<a class="nav-item nav-link " href="#" tabindex="-1" aria-disabled="true">Disabled</a>-->
            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav mx-auto">
                <a class="nav-item nav-link active" href="#">
                    <img src="{%static 'symptomChecker/images/icons8-facebook-48.png'%}" width="30px " height="30px">
                </a>
                <a class="nav-item nav-link" href="#">
                    <img src="{%static 'symptomChecker/images/icons8-instagram-48.png'%}" width="30px " height="30px">
                </a>
                <a class="nav-item nav-link" href="#">
                    <img src="{%static 'symptomChecker/images/icons8-linkedin-48.png'%}" width="30px " height="30px">
                </a>
                <a class="nav-item nav-link" href="#">
                    <img src="{%static 'symptomChecker/images/icons8-twitter-48.png'%}" width="30px " height="30px">
                </a>

            </div>
        </div>
    </div>
</nav>
<div class="size">
    <div id="map"></div>
     <div  style="position: relative; font-size: 20px;" id="details_div"></div> 
  </div>
  <div style=" list-style-image: url('assets/images/logo.png');"></div>
 <script>


      function display_details(loc1){

        for (var i = 0; i < loc1.length; i++) {

          var details = document.getElementById('details_div').innerHTML;

         
          document.getElementById('details_div').innerHTML = details + "<div style='border: solid; width: 60%; margin: auto;'><img src='assets/images/free-map-icon-13.jpg' align = 'middle' ><div style=' display: inline ; font-size: 20px'> <b>" + loc1[i].name + "</b></div> <div style='padding-left: 45px; display:  block;'>"+ loc1[i].Address + "</div><div style='padding-left: 45px; display: block;'> " + loc1[i].phno + " </div></div><br>";
        

        }

      }
    
      // Note: This example requires that you consent to location sharing when
      // prompted by your browser. If you see the error "The Geolocation service
      // failed.", it means you probably did not give permission for the browser to
      // locate you.
      var map, infoWindow;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -34.397, lng: 150.644},
          zoom: 15
        });

        var loc1 = [];
        loc1.push({lat: 19.1604 ,lng: 72.9955, name: "Dr. Asodekar", Address: "5 Vamanrao Pai Marg, Navi Mumbai, Mumbai Urban Agglomerate, Maharashtra, 400708 Sector 3, Sector 2, Airoli Navi Mumbai India", phno:"Contact no: 9234567890 "});
        loc1.push({lat: 19.1602 ,lng: 72.9956, name:"Dr. Bakle", Address: "Navi Mumbai Sector 3, Mumbai Urban Agglomerate, Maharashtra, 400708 Sector 3, Airoli Navi Mumbai India",phno:"Contact no: 7234567897 "});
        loc1.push({lat: 19.161 ,lng: 72.996, name: "Dr. Chaudhari", Address: "Navi Mumbai Sector 2, Mumbai Urban Agglomerate, Maharashtra, 400708 Sector 2, Airoli Navi Mumbai India",phno:"Contact no: 9864567892 "});
        loc1.push({lat: 19.163 ,lng: 72.9956, name: "Dr. Patil", Address: "Navi Mumbai Sector 20, Mumbai Urban Agglomerate, Maharashtra, 400708 Sector 20, Sector 2, Airoli Navi Mumbai India",phno:"Contact no: 8976417890 "});
        loc1.push({lat: 19.1656 ,lng: 72.9956, name: "Dr. Sharma", Address: "Navi Mumbai Secor 20A, Mumbai Urban Agglomerate, Maharashtra, 400708 Secor 20A, Airoli Navi Mumbai India",phno:"Contact no: 9874567894 "});
        loc1.push({lat: 19.165 ,lng: 72.99, name: "Dr.Asthana", Address: "Airoli Village Marg, Navi Mumbai Sector 1A, Mumbai Urban Agglomerate, Maharashtra, 400708 Sector 1A, Sector 1, Airoli Navi Mumbai India",phno:"Contact no: 8976543220 "});
        loc1.push({lat: 19.1601119 ,lng: 72.99227, name: "Avdhoot Hospital", Address: "Sector-19, AiroliNavi Mumbai, Maharashtra 400708 India",phno:"Contact no: 8975463219 "});
         loc1.push({lat: 19.156985 ,lng: 72.997731, name: "Indravati Hospital & Research Centre", Address: "Sector 3K, Behind NMMT Bus Depot, Airoli(W) Sector 3, Airoli Navi Mumbai, Maharashtra 400708 India",phno:"Contact no: 8745666798 " });

        

        infoWindow = new google.maps.InfoWindow;


          var marker = [];
        for(j=0; j<loc1.length;j++){
          marker = new google.maps.Marker({position: loc1[j], map: map});
          google.maps.event.addListener(marker, 'click', (function(marker,j) {
            return function(){
            infoWindow.setContent(loc1[j].name,);
            infoWindow.open(map, marker);
          }
          })(marker, j));
        }

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

            infoWindow.setPosition(pos);
            infoWindow.setContent('You are here');
             marker = new google.maps.Marker({position: pos, map: map, icon:'assets/images/marker.png' });
            infoWindow.open(map);
            map.setCenter(pos);
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
        display_details(loc1);
      }

      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAjBC78Pdm4IFsWhmis5M1h7VSGus2m8IU&callback=initMap">
    </script>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>