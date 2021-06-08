<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Appointment Booking</title>
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


  <!-- date time -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
  <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


  
  <!-- =======================================================
  * Template Name: Medilab - v2.1.1
  * Template URL: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <style>
    option:disabled{
      background-color: lightgrey;
    }
    a:hover{
    text-decoration: none;
    }
  </style>
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

      <h1 class="logo mr-auto"><a href="index.php">PhrisFoo TCM</a></h1>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="index.php#doctors">Practitioners</a></li>
          <li><a href="index.php#services">Treatments</a></li>
          <li><a href="index.php#location">Locate Us</a></li>
        </ul>
      </nav>
    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Appointment Section ======= -->
    <section id="appointment" class="appointment section-bg">
        <div class="container" style='margin-top: 100px;'>
  
          <div class="section-title">
            <h2>Make an Appointment</h2>
            <p>PhrisFoo Premier TCM Centres</p>
            <br>
            <p>Helmed by highly experienced Practitioners with a wealth of clinical experience for complex and chronic health conditions.</p>
          </div>
  
          <!-- <form action="forms/appointment.php" method="post" role="form" class="php-email-form"> -->
            <div class="form-row">
              <div class="col-md-3 form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                <div class="validate"></div>
              </div>
              <div class="col-md-3 form-group">
                <input type="text" name="nric" class="form-control" id="nric" placeholder="Your NRIC" data-rule="minlen:9" data-msg="Please enter at least 4 chars">
                <div class="validate"></div>
              </div>
              <div class="col-md-3 form-group">
                <input type="email" autocomplete="nope" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" onfocusout="checkEmail()">
                <div class="validate"></div>
              </div>
              <div class="col-md-3 form-group">
                <input type="number" class="form-control" name="phone" id="phone" placeholder="Your Phone" max='9' data-msg="Please enter at least 4 chars">
                <div class="validate"></div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-4 form-group">
                <select name="doctor" id="doctor" class="form-control" onchange="getpractid()">
                  <option value="">Select Practitioner</option>

                </select>
                <div class="validate"></div>
              </div>
              <div class="col-md-4 form-group">
                <input type="text" name="date" onchange="check()" class="form-control datepicker" id='date'  autocomplete="off" placeholder="Appointment Date" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                <div class="validate"></div>
              </div>
              <div class="col-md-4 form-group">
                <select name="time" id="time_available" class="form-control">
                </select>
                <div class="validate"></div>
              </div>
            </div>
  
            <div class="form-group">
              <textarea class="form-control" name="message" rows="5" placeholder="Please describe your sickness or injuries" id='problem'></textarea>
              <div class="validate"></div>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="message" id='past_records' rows="5" placeholder="Please tell us if there is any past sickness/injuries that you want us to take note of and the treatement you receieved"></textarea>
              <div class="validate"></div>
            </div>
            <div style='text-align: center;'>
              Confirm your booking with a $2 deposit through paypal:
              <button class="btn btn-primary" onclick="cfm_booking()"> Book now! </button>
            </div>
            <br>
            <div style='text-align: center; color: red;'>
              <b>Note: all bookings are final and no cancellations are allowed!</b>
            </div>
            <br>
            <div style='text-align: center;' id='warning'></div>
            <!-- <div class="text-center"><button type="submit">Make an Appointment</button></div> -->
          <!-- </form> -->
  
        </div>
      </section><!-- End Appointment Section -->

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
  <!---Paypal API-->

  <!-- NAVBAR -->

  <script>
    
    // to make home button not active
    var nav_sections = $('section');
    var main_nav = $('.nav-menu, .mobile-nav');

    $(window).on('scroll', function() {
      var cur_pos = $(this).scrollTop() + 200;

      nav_sections.each(function() {
        var top = $(this).offset().top,
          bottom = top + $(this).outerHeight();

        if (cur_pos >= top && cur_pos <= bottom) {
          if (cur_pos <= bottom) {
            main_nav.find('li').removeClass('active');
          }
        }
      });
    });

    $(function(){
      $("#footer").load("footer.php");
    });
  </script>

  <!-- Time Form -->
  <script>
    var output = '';    
    function checkEmail(){
      var email = document.getElementById("email").value;
      var access_key = '3802b06969fbcc2c4c56977dae201be5';
      var email_address = email;
      var request = new XMLHttpRequest
      request.onreadystatechange = function(){
        var result = false;
        if (this.status == 200 && this.readyState == 4){
          var json = JSON.parse(this.responseText)
          var format_valid = json.format_valid;
          var mx_found = json.mx_found;
          var smtp_check = json.smtp_check;
          if (format_valid === true && mx_found === true && smtp_check === true){
              result = true
              output = '';
          }
          if (result === false){
            output = "Email inserted does not exist \n";
          }
        }
      }
      request.open("GET", 'http://apilayer.net/api/check?access_key=' + access_key + '&email=' + email_address, false)
      request.send(0)
    }
    var timings = ["Select time","08:00", "08:30", "09:00", "09:30", "10:00", "10:30", "11:00", "11:30", "12:00", "12:30", "13:00", "13:30", "14:00", "14:30", "15:00", "15:30", "16:00", "16:30", "17:00", "17:30", "18:00", "18:30", "19:00", "19:30", "20:00", "20:30", "21:00", "21:30"];
    var optionsAvailable = "";
    var i;
    text = "";
    for (i = 0; i < timings.length; i++) {
      text += "<option id='" + timings[i] + "'>" + timings[i] + " </option>" + "<br>";
    }
    document.getElementById("time_available").innerHTML = text;
    </script>

    <!-- to get the practitioner's name and put insde the html drop down -->
    

    <!-- Unavailable schedule of Practitioners -->
    <script>

      // Event listener
      //document.getElementById('date').addEventListener("click", getdate);
      function getdate(){
        var d = document.getElementById("date").value;
        var d_convert = formatDate(d);
        return d_convert;
      }

      //to receieve timing from the database according to the practitioner
      
      var list =[];
      function getpractid(){
        list = [];
        var pract_id = document.getElementById("doctor").value;
        if (pract_id == ''){
          pract_id = window.location.href.slice(window.location.href.indexOf('=') + 1, window.location.href.length)
        }
        var request = new XMLHttpRequest();

        request.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {

              var success = JSON.parse(this.responseText);
              for (item of success.data.practitioner){
                list.push(item)
              }
            } 
        };

        request.open("GET", "http://localhost:5002/unavailable-schedule/" + pract_id, true);
        request.send();
        
        document.getElementById('date').value = ''        
      }
      getpractid();
      // function to check if timing is avaialable
      function check(){
        for (timing of timings){
          document.getElementById(timing).removeAttribute('disabled')
        }
        var selected_date = getdate();
        var unavailable_time_list = [];
        for(record of list){
          let time  = record.date_and_time.slice(17,22);
          let date = formatDate(record.date_and_time.slice(4,16));

          if(date == selected_date){
            unavailable_time_list.push(time);
          }
        }

        for (unavailable_time of unavailable_time_list){
          document.getElementById(unavailable_time).setAttribute('disabled', 'disabled')
        }
      }

      //function to convert date into the format used in database
      function formatDate(date) {
          var d = new Date(date),
              month = '' + (d.getMonth() + 1),
              day = '' + d.getDate(),
              year = d.getFullYear();

          if (month.length < 2) 
              month = '0' + month;
          if (day.length < 2) 
              day = '0' + day;

          return [year, month, day].join('-');
        }
    </script>

    <!-- to input practitioner name into the drop down list -->
    <script>
      var input_pract = '';
        var request = new XMLHttpRequest();  
        request.onreadystatechange = function () {
              if (this.status == 200 && this.readyState == 4) {
                var practitioner_list = JSON.parse(this.responseText).data.practitioner;

                for(practitioner of practitioner_list){
                  let name = practitioner.NAME;
                  let id = practitioner.PractitionerID;

                  input_pract += "<option value='" + id + "'>" + name + " </option>"

                }
                document.getElementById("doctor").innerHTML += input_pract
              
              if (window.location.search.substr(1)){
                var id = window.location.search.substr(1).charAt(window.location.search.substr(1).length - 1)
                for (item of document.getElementById('doctor').getElementsByTagName('option')){
                  if (item.value == id){
                    item.selected = "selected"
                  }
                }
    }
            } 
          };

      request.open("GET", "http://localhost:5001/practitioner");
      request.send();

    </script>

<script>
  function cfm_booking(){

    var num = "1234567890";

    var name = document.getElementById("name").value;
    var nric = document.getElementById("nric").value;
    var email = document.getElementById("email").value;
    var phone = document.getElementById("phone").value;
    var doctor = document.getElementById("doctor").value;
    var seleted_date = formatDate(document.getElementById("date").value);
    var seleted_time = document.getElementById("time_available").value;
    var reason = document.getElementById("problem").value;
    

    var msg = [];


    if(name.length > 100 || name.length < 1){
      msg.push("Please check your name");
    }
    if(phone.length != 8){
      msg.push("Please check with your phone number")
    }
    if(doctor.length == " "){
      msg.push("Please select your practitioner")
    }
    if(seleted_date == "NaN-NaN-NaN"){
      msg.push("Please select the date")
    }
    if(seleted_time == 0 || seleted_time=='Select time'){
      msg.push("Please select the time" )
    }
    if(reason.length <= 0){
      msg.push("Please fill in reason for visit")
    }
    // if(ValidateEmail1(email) == false){
    //   msg.push("email is wrong")
    // }
    if(num.includes(nric[0]) == true || num.includes(nric[nric.length-1]) == true || nric.length !=9){
      msg.push("Please check your NRIC")
    }


    // function ValidateEmail1(email) {
    //   var format = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    //   return format.test(email)
    // }

    // VALIDATE EMAIL
    var access_key = '9bec1008e6a8fd80c4bc32a4aa4cb26d';
    var email_address = email;
    // $(function() {  
    //   

    //   $.ajax({
    //     async:false,
    //       url: 'http://apilayer.net/api/check?access_key=' + access_key + '&email=' + email_address,   
    //       dataType: 'jsonp',
    //       success: function(json) {

    //           // Access and use your preferred validation result objects
    //           var format_valid = json.format_valid;
    //           var mx_found = json.mx_found;
    //           var smtp_check = json.smtp_check;
    //           if (format_valid === true && mx_found === true && smtp_check === true){
    //               result = true
    //           }
    //           if (result === false){
    //             output += "email is wrong";
    //           }
    //       },
        
    //   });
    // });

   

    if(msg.length > 0){
      for(error of msg){
      output += error + "\n"
      }
      alert(output);
      window.location.reload();
    }

    if (output == ''){
      


      localStorage.nric = nric
      localStorage.name = name
      localStorage.email = email
      localStorage.phone = phone
      localStorage.practitionerid = doctor
      localStorage.past_records = document.getElementById('past_records').value
      localStorage.date_and_time = seleted_date + " " + seleted_time
      localStorage.date = seleted_date
      localStorage.time = seleted_time
      localStorage.problem = reason
      localStorage.dt = new Date();

      window.location.href = 'paypal_confirm.php'
    }
    
  }
</script>

<!-- to disable past date -->
<script>
  var date = new Date();
  date.setDate(date.getDate() +1);
  $('#date').datepicker({ 
        startDate: date
      });
</script>
<script>
  if (localStorage.someoneBooked == 1){
    localStorage.someoneBooked = 0
    alert("Sorry, someone booked the same practitioner and timing just a moment ago :(. \n Please choose another timing")
  }
  if (localStorage.name){
    document.getElementById('name').value = localStorage.name;
  }
  if (localStorage.nric){
    document.getElementById('nric').value = localStorage.nric;
  }
  if (localStorage.phone){
    document.getElementById('phone').value = localStorage.phone;
  }
  if (localStorage.problem){
    document.getElementById('email').value = localStorage.email;
  }
  if (localStorage.problem){
    document.getElementById('problem').value = localStorage.problem;
  }
  if (localStorage.past_records){
    document.getElementById('past_records').value = localStorage.past_records;
  }

</script>
<!-- added validation -->


<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>

</html>



