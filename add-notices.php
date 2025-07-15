<?php session_start();
//error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['nbid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $category = $_POST['category'];
    $admin_id = $_SESSION['nbid'];
    $sql = "INSERT INTO notices (category, title, content, created_by) VALUES (?, ?, ?, ?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param('sssi', $category, $title, $content, $admin_id);
    $stmt->execute();
    echo "<script>alert('Notice  added successfully');</script>"; 
    echo "<script>window.location.href = 'manage-notices.php'</script>";      
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Notice Board System | Add Notice</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <?php include_once('includes/sidebar.php');?>
   
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <?php include_once('includes/header.php');?>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                          
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Add</strong> New Notice
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
     

    <div class="row form-group">
        <div class="col col-md-3">
            <label for="text-input" class=" form-control-label">Category</label>
        </div>
        <div class="col-12 col-md-9">
            <select name="category" class="form-control" required>
                <option value="">select</option>
                <?php
                $ret=mysqli_query($con,"select * from tblcategory order by categoryName ");
                $cnt=1;
                while ($row=mysqli_fetch_array($ret)) {
                ?>
                <option value="<?php  echo $row['categoryName'];?>"><?php  echo $row['categoryName'];?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="row form-group">
        <div class="col col-md-3">
            <label for="text-input" class=" form-control-label">Notice Title</label>
        </div>
        <div class="col-12 col-md-9">
            <input type="text" id="title" name="title" placeholder="Notice Title" class="form-control" required="">                                        
        </div>
    </div>
    <div class="row form-group">
        <div class="col col-md-3">
            <label for="email-input" class=" form-control-label">Notice Description</label>
        </div>
        <div class="col-12 col-md-9">
            <textarea id="content" name="content" placeholder="Notice Description" class="form-control" required="" rows="5"></textarea>                                                
        </div>
    </div>
                                            
    <div class="card-footer">
        <p style="text-align: center;">
            <button type="submit" name="submit" id="submit" class="btn btn-primary btn-sm">Submit</button>
        </p>                                    
    </div>
  </form>
</div>
                                   
</div>
                       
</div>
                        
</div>
               
 
<?php include_once('includes/footer.php');?>
   </div> </div>
            </div>
        </div>
</div>
    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->
<?php }  ?>