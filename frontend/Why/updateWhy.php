
<html>
<head>
<meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Medilab Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

<link rel="stylesheet" href="..\assets\css\style.css">

<!-- Favicons -->
<link href="../assets/img/favicon.png" rel="icon">
<link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">


 <!-- Vendor CSS Files -->
 <link href="../vassets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <script src="why.js"></script>
</head>
<body>
<main id="main">

<?php

if(isset($_GET['serviceID']))
{
    $sid=$_GET['serviceID'];
    ?>
<!-- ======= Why Us Section ======= -->
<section id="why-/us" class="why-us">
   <div class="navbar-translate">
        <a class="navbar-brand" href="../admin.php" style="font-size:x-large;">
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
                      if($sid==$key)
                      {?>
                        <div class="col-xl-4 d-flex align-items-stretch">
                        <div class="icon-box mt-4 mt-xl-0">
                          <form id="whyForm" onsubmit="updateWhy(event);">
                              Card Positi: 
                               <select name="order" id="order">
                              <?php 
                              $position=5;
                                  $i=1;
                                  while($i<=$position){ ?>
                                  <option value="<?php echo $i; ?>"><?php echo $i; $i++; ?></option> 
                              <?php } ?>
                              <option value="<?php echo $i; ?>" selected><?php echo $i; $i++; ?></option> 
                               </select><br><br>
                              Icon:
                                <select name="icon" id="icon">
                                    <option value="bx-question-mark" selected>Question Mark</option>
                                    <option value="bx-receipt">List</option>
                                    <option value="bx-cube-alt">Cube</option>
                                    <option value="bx-images">Images</option>
                                    <option value="bx-bar-chart">Bar Chart</option>
                                    <option value="bx-book">Book</option>
                                    <option value="bx-brain">Brain</option>
                                    <option value="bx-calculator">Calculator</option>
                                    <option value="bx-certification">Certification</option>
                                    <option value="bx-lock-alt">Lock</option>
                                    <option value="bx-timer">Timer</option>
                                </select><br><br>
                                <input type="text" name="origKey" id="origKey" value="<?=$row['header'];?>" hidden><br><br>
                                <input type="text" name="header" id="header" value="<?=$row['header'];?>"><br><br>
                                <input type="text" name="content" id="content" value="<?=$row['description'];?>"><br><br>
      
                                  <button type="submit" class="more-btn">Update Card</button>
                              
                          </form>
                          
                        </div>
                      </div> 
                      <?php } else {
                      $i++;
                        ?>
                      <div class="col-xl-4 d-flex align-items-stretch">
                        <div class="icon-box mt-4 mt-xl-0">
                          <i class="bx <?=$row['icon']?>" ></i>
                          <h4><?=$row['header'];?></h4>
                          <p><?=$row['description']?></p>
                          <div class="content1 text-center">
                          <form method="GET" action="updateWhy.php">
                            <button class="more-btn" onclick="document.location='updateWhy.php'" 
                              name="order" value="<?php echo $row['order'] ?>">Edit<i class="bx bx-edit" style="margin: 0; font-size: 14px;"></i></button>
                          </form>
                          
                          <a href="deleteWhy.php?serviceID=<?=$key?>">
                          <button class="more-btn">Delete <i class="bx bxs-trash" style="margin: 0; font-size: 14px;"></i></button>
                          </a>
                          </div> 
                        </div>
                      </div> 
                <?php } }  ?>
              </div>
            </div><!-- End .content-->
            </div>
          </div>
          </div>
        </div>

      </div>
    </section><!-- End Why Us Section -->
    <?php } ?>
</main>
</body>
