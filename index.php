<?php require_once 'layouts/header.php'?>

<br>
<h1 class="text-center text-primary title">Alas Thrifts</h1><br>
<div class="bd-example">
  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner bg-dark">
      <div class="carousel-item active">
      <center><a href="snapback.php"><img src="img/raiders.jpg" class="d-block w-20" alt="..."></a></center>
        <div class="carousel-caption d-none d-md-block">
          <h5>First slide label</h5>
          <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
        </div>
      </div>
      <div class="carousel-item">
      <center><img src="img/raiders.jpg" class="d-block w-20" alt="..."></center>
        <div class="carousel-caption d-none d-md-block">
          <h5>Second slide label</h5>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
      </div>
      <div class="carousel-item">
      <center><img src="img/raiders.jpg" class="d-block w-20" alt="..."></center>
        <div class="carousel-caption d-none d-md-block">
          <h5>Third slide label</h5>
          <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
<br><br>
<div class="section_2 mx-auto"><br><br>
  <h1 class="text-center title">Don't forget to wear your gear</h1><br>
  <div class="container">
    <div class="row">
        <div class="col-md">
          <h3 class="sub-title">Vintage Snapback</h3 class="sub-title">
            <div class="card" style="width: 18rem;">
                <img src="img/eazy-e.jpg" class="card-img-top " alt="image" id="section_2_img">
            </div>
        </div>

        <div class="col-md">
          <h3 class="sub-title">Vintage Jersey</h3 class="sub-title">
              <div class="card" style="width: 18rem;">
                  <img src="img/jordan.jpg" class="card-img-top " alt="image" id="section_2_img">
              
              </div>
        </div>

        <div class="col-md">
          <h3 class="sub-title">Vintage Sneakers</h3 class="sub-title">
               <div class="card" style="width: 18rem;">
                  <img src="img/vans.jpg" class="card-img-top " alt="image" id="section_2_img">
               </div>
        </div>
    </div>
   </div>
</div>


<?php require_once 'layouts/footer.php'?>