<html>
<head>
<meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Medilab Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

<link rel="stylesheet" href="..\assets\css\style.css">
<link rel="stylesheet" href="..\assets\css\demo.css">

<!-- Favicons -->
<link href="../assets/img/favicon.png" rel="icon">
<link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">


 <!-- Vendor CSS Files -->
<link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

<style>
  .content1 .more-btn 
  {
    padding: 6px 30px 8px 30px;
    border-radius: 50px;
    transition: all ease-in-out 0.4s;
    font-size: medium;
    background: lightblue;
    color: #1977cc;
  }
  .content1 i
  {
    padding: 0px;
    font-size: 14px;
  }
  .content1 .more-btn:hover {
    color: #1977cc;
  background: whitesmoke;
}
</style>
</head>
<body>
<main id="main">
<!-- ======= Why Us Section ======= -->
<section id="why-us" class="why-us">
  <div class="navbar-translate">
        <a class="navbar-brand" href="../admin/admin.php" style="font-size:x-large;">
          Admin Site </a>
  </div>
  <div class="container">      
        
        <div class="row">          
          <div class="col-lg-4 d-flex align-items-stretch">

          </div>
          
          <div class="col-lg-8 d-flex align-items-stretch">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
              <?php 
                    include('../../api/public/dbcon.php');

                    $ref_table="whyMedilab";
                    $fetchdata = $database->getReference($ref_table)->getValue();
                    $i=0;
              
                    foreach($fetchdata as $key=>$row)
                    {
                      $i++;
                        ?>
                      <div class="col-xl-4 d-flex align-items-stretch">
                        <div class="icon-box mt-4 mt-xl-0">
                          <i class="bx <?=$row['icon']?>" ></i>
                          <h4><?=$row['header'];?></h4>
                          <p><?=$row['description']?></p>
                          <div class="content1 text-center">
                          
                          <a href="updateWhy.php?serviceID=<?=$key?>">
                          <button class="more-btn">Edit<i class="bx bx-edit" style="margin: 0; font-size: 14px;"></i></button>
                          </a>
                          
                          <a href="deleteWhy.php?serviceID=<?=$key?>">
                          <button class="more-btn">Delete <i class="bx bxs-trash" style="margin: 0; font-size: 14px;"></i></button>
                          </a>
                          </div> 
                        </div>
                      </div> 
                <?php  }  ?>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0 bx-flashing-hover"  onclick="document.location='insertWhy.php'">
                    <i class="bx bx-plus-circle"></i>
                    <h4>Add Card</h4>
                  </div>
                </div> 
              </div>
            </div><!-- End .content-->
            
          </div>

          
        </div>

      </div>
            
    </section><!-- End Why Us Section -->
</main>
</body>