<!DOCTYPE html>
<html lang="en">
<head>
<title>Dala Agencies </title>
<meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

 	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css" />
  <link rel="stylesheet" href="assets/style.css"/>
  <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script src="assets/bootstrap/js/bootstrap.js"></script>
  <script src="assets/script.js"></script>



<!-- Owl stylesheet -->
<link rel="stylesheet" href="assets/owl-carousel/owl.carousel.css">
<link rel="stylesheet" href="assets/owl-carousel/owl.theme.css">
<script src="assets/owl-carousel/owl.carousel.js"></script>
<!-- Owl stylesheet -->


<!-- slitslider -->
    <link rel="stylesheet" type="text/css" href="assets/slitslider/css/style.css" />
    <link rel="stylesheet" type="text/css" href="assets/slitslider/css/custom.css" />
    <script type="text/javascript" src="assets/slitslider/js/modernizr.custom.79639.js"></script>
    <script type="text/javascript" src="assets/slitslider/js/jquery.ba-cond.min.js"></script>
    <script type="text/javascript" src="assets/slitslider/js/jquery.slitslider.js"></script>
<!-- slitslider -->

</head>

<body>


<!-- Header Starts -->
<div class="navbar-wrapper">

        <div class="navbar-inverse" role="navigation">
          <div class="container">
            <div class="navbar-header">


              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>

            </div>


            <!-- Nav Starts -->
            <div class="navbar-collapse  collapse">
              <ul class="nav navbar-nav navbar-right">
               <li class="active"><a href="index.php">Home</a></li>
                <li ><a href="about.php">About</a></li>
                <li><a href="agents.php">Agents</a></li>         
                <li><a href="blog.php">Blog</a></li>
                <li><a href="contact.php">Contact</a></li>
              </ul>
            </div>
            <!-- #Nav Ends -->

          </div>
        </div>

    </div>
<!-- #Header Starts -->





<div class="container">

<!-- Header Starts -->
<div class="header">
 <a href="index.php"><img src="images/dala1.png" alt="DALA Realestate"></a> 

              <ul class="pull-right">
                <li><a href="sale.php"><b>Buy </b></a></li>       
                <li><a href="contact.php"><b>Sell</b></a></li>
                <li><a href="rent.php"><b>Rent</b></a></li>
              </ul>
</div>
<!-- #Header Starts -->
</div>


<script>
  document.addEventListener('DOMContentLoaded', function () {
    // Get the current page filename
    const currentPage = window.location.pathname.split('/').pop();

    // Remove 'active' class from all links initially
    const allLinks = document.querySelectorAll('.nav.navbar-nav.navbar-right li');
    allLinks.forEach(link => link.classList.remove('active'));

    // Find the link that corresponds to the current page and add 'active' class
    const currentLink = document.querySelector(`.nav.navbar-nav.navbar-right li a[href="${currentPage}"]`);
    if (currentLink) {
      currentLink.parentNode.classList.add('active');
    }
  });
</script>

</body>
</html>