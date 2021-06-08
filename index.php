<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Medilab Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/icon for header.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <style>
    #map {
      height: 600px;
      width: 600px;
    }
  </style>

  <!-- =======================================================
  * Template Name: Medilab - v2.1.1
  * Template URL: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- NAVBAR JQUERY -->
  <div id='navbar'>
      
  </div>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-none d-lg-flex align-items-center fixed-top">
    <div class="container d-flex">
      <div class="contact-info mr-auto">
        <i class="icofont-envelope"></i> <a href="mailto:contact@example.com">phrisctcm@gmail.com</a>
        <i class="icofont-phone"></i> +65 1234 1234
        <i class="icofont-google-map"></i> 80 Stamford Rd, SG
      </div>
      <div class="social-links">
        <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
        <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
        <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
        <a href="#" class="skype"><i class="icofont-skype"></i></a>
        <a href="#" class="linkedin"><i class="icofont-linkedin"></i></i></a>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="index.php"> PhrisFoo TCM</a></h1>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="index.php">Home</a></li>
          <li><a href="#doctors">Practitioners</a></li>
          <li><a href="#services">Treatments</a></li>
          <li><a href="#location">Locate Us</a></li>
        </ul>
      </nav>
      <!--nav-menu -->

      <a href="appointment.php" class="appointment-btn scrollto">Make an Appointment</a>

    </div>
  </header>
  <!--End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container">
      <h1>Welcome to PhrisFoo TCM</h1>
      <h2>We are a team of certified TCM practitioners aiming to give you the best treatments</h2>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container">

        <div class="row">
          <div class="col-lg-4 d-flex align-items-stretch">
            <div class="content">
              <h3>Why Choose PhrisFoo TCM?</h3>
              <p>
                Helmed by highly experienced Practitioners, PhrisFoo has focused on providing the finest TCM treatment. Only the highest quality of Chinese medicine and herbs are used in our store.<br><br>
                Our motto is to treat patients with "Love, Service, Professionalism, and Sincerity". 
              </p>
            </div>
          </div>
          <div class="col-lg-8 d-flex align-items-stretch">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-receipt"></i>
                    <h4>Step 1</h4>
                    <p>Browse through our homepage to learn more about our practitioners and treatment</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-cube-alt"></i>
                    <h4>Step 2</h4>
                    <p>Click on Make an Appointment button in our navigation bar</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-images"></i>
                    <h4>Step 3</h4>
                    <p>Fill in the Make Appointment form accordingly</p>
                  </div>
                </div>
              </div>
            </div><!-- End .content-->
          </div>
        </div>

      </div>
    </section><!-- End Why Us Section -->

    <!-- ======= Practitioners Section ======= -->
    <section id="doctors" class="doctors">
      <div class="container">

        <div class="section-title">
          <h2>Practitioners</h2>
        </div>

        <div class="row" id='practitioners'>

        </div>

      </div>
    </section><!-- End Practitioners Section -->

    <!-- ======= Treatments Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title">
          <h2>Treatments</h2>
        </div>

        <div class="row" id='treatments'>
          
        </div>
      </div>
    </section><!-- End Treatments Section -->

    <!-- ======= Location Section ======= -->
    <section class="location">
      <div class="section-title">
        <h2 id="location">Locate Us</h2>
      </div>
    <div class='row'>
      <div class='col-md-2'></div>
      <div class='col-md-7' id='map'></div>
      <div class='col-md-3' >
        <div class='row'>
          <div class='col-md-10' id='right-panel'></div>
        </div>
      </div>
    </div>
    <br>
    <div class='row' style='align-items: center;'>
      <div class='col-md-3'></div>
      <div class='col-md-6' style='text-align:center; padding: 30px;'> 
        <button id='driving' class='btn btn-primary m-1'>Get Direction (Driving)</button>  
        <button id='transit' class='btn btn-primary m-1'>Get Direction (Transit)</button>
        <button id='walking' class='btn btn-primary m-1'>Get Direction (On-foot)</button>
      </div>
      <div class='col-md-3'></div>
    </div>
  </section><!-- End Location Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <div id='footer'>

  </div>
  
  <div id="preloader"></div>
  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script>
      var map, infoWindow;
        function initMap() {
            const directionsRenderer = new google.maps.DirectionsRenderer();
            const directionsService = new google.maps.DirectionsService();
            map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: 1.2975488, lng: 103.8494183},
            zoom: 15
            });
            var center = {lat: 1.2975488, lng: 103.8494183}
            
            infoWindow = new google.maps.InfoWindow;
            infoWindow.setPosition(center);
            infoWindow.setContent("We're here!")
            infoWindow.open(map)
            map.setCenter(center)
            if (navigator.geolocation){
            navigator.geolocation.getCurrentPosition(function(position){
              localStorage.lat = position.coords.latitude;
              localStorage.lng = position.coords.longitude;
            })
          } 
            // info window is the one showing "Location found" message
            // infoWindow = new google.maps.InfoWindow;
            // infoWindow.setPosition(center);
            // infoWindow.open(map)
            // map.setCenter(center)
            // this attempts to get user permission to access location
            // Try HTML5 geolocation.
            // if (navigator.geolocation) {
            //     navigator.geolocation.getCurrentPosition(function(position) {
            //     var pos = {
            //     lat: position.coords.latitude,
            //     lng: position.coords.longitude
            //     };
            //     localStorage.lat = pos.lat
            //     localStorage.lng = pos.lng
            //     // set user position to infoWindow
            //     infoWindow.setPosition(pos);
            //     infoWindow.open(map);
            //     map.setCenter(pos);
            // }, function() {
            //     handleLocationError(true, infoWindow, map.getCenter());
            // });
            // } else { // error handling
            // // Browser doesn't support Geolocation
            // handleLocationError(false, infoWindow, map.getCenter());
            // }
            directionsRenderer.setMap(map);
            directionsRenderer.setPanel(document.getElementById("right-panel"));
            const control = document.getElementById("floating-panel");
            map.controls[google.maps.ControlPosition.TOP_CENTER].push(control);

            const onClickHandlerDriving = function () {
                localStorage.travelmode = "DRIVING"
                calculateAndDisplayRoute(directionsService, directionsRenderer);
            };
            const onClickHandlerTransit = function () {
                localStorage.travelmode = "TRANSIT"
                calculateAndDisplayRoute(directionsService, directionsRenderer);
            };
            const onClickHandlerWalking = function () {
                localStorage.travelmode = "WALKING"
                calculateAndDisplayRoute(directionsService, directionsRenderer);
            };
            document.getElementById('driving').addEventListener('click', onClickHandlerDriving)
            document.getElementById('transit').addEventListener('click', onClickHandlerTransit)
            document.getElementById('walking').addEventListener('click', onClickHandlerWalking)

           
        }

        function calculateAndDisplayRoute(directionsService, directionsRenderer){
          
          directionsService.route({
              origin: new google.maps.LatLng(localStorage.lat, localStorage.lng),
              destination: '80 Stamford Rd Singapore 178902',
              travelMode: google.maps.TravelMode[localStorage.travelmode],
          },
          (response, status) => {
            if (status === "OK"){
              directionsRenderer.setDirections(response);
            }
            else{
              window.alert("You'll have to enable your location service :)")
            }
          }
          )
        }
    </script>
  <!-- FOOTER -->
  <script>
    $(function(){
      $("#footer").load("footer.php");
    });

  </script>

  <script>
    // PRACTITIONERS
    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          var data = JSON.parse(this.responseText);
          var practitioner_data = data.practitioners
          for (each_p in practitioner_data){
            var practitioner_id = practitioner_data[each_p].PractitionerID;
            var name = practitioner_data[each_p].NAME;
            var title = practitioner_data[each_p].TITLE;
            var gender = practitioner_data[each_p].GENDER;
            var degrees = practitioner_data[each_p].degree;
            var languages = practitioner_data[each_p].language;
            var d_degree = degrees[0];
            var d_language = languages[0];

            if (gender == 'M'){
              var d_gender = "Male";
              var img = "assets/img/doctors/doctor-m.svg"
            }
            else{
              var d_gender = "Female";
              var img = "assets/img/doctors/doctor-f.svg"
            }

            for (var i = 1; i< degrees.length; i++){
              d_degree += ", " + degrees[i];
            }

            for (var i = 1; i< languages.length; i++){
              d_language += ", " + languages[i];
            }

            document.getElementById('practitioners').innerHTML += `
            <div class="col-lg-6">
              <div class="member d-flex align-items-start">
                <div class="pic"><img src=${img} class="img-fluid" alt=""></div>
                <div class="member-info">
                  <h4>${name}</h4>
                  <span>${title}</span>
                  <p>${d_gender}</p>
                  <p></p>
                  <div>
                    Degrees: ${d_degree}<br>
                    Languages: ${d_language}
                  </div>
                  <div class="social">
                    <a href=""><i class="ri-twitter-fill"></i></a>
                    <a href=""><i class="ri-facebook-fill"></i></a>
                    <a href=""><i class="ri-instagram-fill"></i></a>
                    <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
                <br>
                <div class="appointment d-flex justify-content-start">
                  <a href="appointment.php?practid=${practitioner_id}" class="appointment-btn ml-0">Make Appointment</a>                
                </div>
              </div>
            </div>`
          }
        } 
    };
    request.open("GET", "http://localhost:5111/get_practitioners_details", false);
    request.send();

    // TREATMENTS
    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {

          var data = JSON.parse(this.responseText);
          var treatments = data.data.treatments;
          for (treatment in treatments){
            var treatment_id = treatments[treatment].treatmentid;
            var title = treatments[treatment].title;
            var pricing = treatments[treatment].pricing;
            document.getElementById('treatments').innerHTML += `
            <div class="col-lg-4 col-md-6 mt-4">
              <div class="icon-box">
                <div class="icon"><i class="icofont-heart-beat"></i></div>
                <h4>${title}</h4>
                <p>$${pricing}</p>
              </div>
            </div>`
          }
          // window.location.replace(window.location.href)
        } 
    };
    request.open("GET", "http://localhost:5004/treatment", false);
    request.send();


  </script>
  <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8u38EUjKCiU2zETv4G2JWAC1rx1-WUVw&callback=initMap&libraries=&v=weekly">
  </script>

  </body>

</html>