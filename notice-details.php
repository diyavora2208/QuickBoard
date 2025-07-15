<?php 
include('includes/dbconnection.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Notice Board System</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
body {
    color: #566787;
    background: #f5f5f5;
    font-family: 'Roboto', sans-serif;
}
.table-responsive {
    margin: 30px 0;
}
.table-wrapper {
    width: 1250px;
    background: #fff;
	margin: 0 auto;
    padding: 20px 30px 5px;
    box-shadow: 0 0 1px 0 rgba(0,0,0,.25);
}
.table-title .btn-group {
    float: right;
}
.table-title .btn {
    min-width: 50px;
    border-radius: 2px;
    border: none;
    padding: 6px 12px;
    font-size: 95%;
    outline: none !important;
    height: 30px;
}
.table-title {
    min-width: 100%;
    border-bottom: 1px solid #e9e9e9;
    padding-bottom: 15px;
    margin-bottom: 5px;
    background: rgb(0, 50, 74);
    margin: -20px -31px 10px;
    padding: 15px 30px;
    color: #fff;
}
.table-title h2 {
    margin: 2px 0 0;
    font-size: 24px;
}
table.table {
    min-width: 100%;

}
table.table tr th, table.table tr td {
    border-color: #e9e9e9;
    padding: 12px 15px;
    vertical-align: middle;
}
table.table tr th:first-child {
    width: 40px;
}
table.table tr th:last-child {
    width: 100px;
}
table.table-striped tbody tr:nth-of-type(odd) {
    background-color: #fcfcfc;
}
table.table-striped.table-hover tbody tr:hover {
    background: #f5f5f5;
}
table.table td a {
    color: #2196f3;
}
table.table td .btn.manage {
    padding: 2px 10px;
    background: #37BC9B;
    color: #fff;
    border-radius: 2px;
}
table.table td .btn.manage:hover {
    background: #2e9c81;		
}
</style>

</head>
<body>
<div>
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6"><h2>Notice Board  <b>System</b></h2></div>
                      <div class="col-sm-6" >

                        <a href="login.php" style="float:right; color:#fff; padding-left:15px;">Admin login</a> 
<a href="index.php" style="float:right; color:#fff">Home</a> 
                      </div>
          
                </div>
            </div>
            <h4>Notice Details</h4>
            <table class="table table-striped table-hover">
           
      
    <?php $nid=intval($_GET['nid']);
$sql = "SELECT * FROM notices where status='active' and id='$nid' ORDER BY created_at DESC";
$result = $con->query($sql);
$cnt=1;
    while ($row = $result->fetch_assoc()): ?>
        <tr>
      <th style="width:200px;">Notice Category</th>
            <td><?php echo $row['category'] ?></td>
        </tr>
        <tr>
            <th>Notice title</th>
            <td><?php echo $row['title'] ?></td>
        </tr>
<tr>
            <th>Notice Details</th>
            <td><?php echo $row['content'] ?></td>
        </tr>

        <tr>
            <th>Creation Date</th>
              <td><?php echo $row['created_at'] ?></td>
          </tr>

       

  
        </tr>
    <?php $cnt++; endwhile; ?>
            </table>
        </div> 
    </div>   
</div> 
</body>
</html>                                		