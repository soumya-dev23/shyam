<?php
session_start();
if(isset($_POST['save'])){
    //store the session data
    $id = $_POST['id'];
    $_SESSION['cart'][$id] = array();

    $product = array();
    $product['id'] = $_POST['id'];
    $product['username'] = $_POST['username'];
    $product['address'] = $_POST['address'];
    $product['gender'] = $_POST['gender'];


    array_push($_SESSION['cart'][$id], $product); 


    
}
//reset the form data
if(isset($_POST['reset'])){
    session_unset();
    //session_destroy();
}
?>
<html>
<head>
<title>ShyamTech Test</title>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<style>
.container{
    width:50%;
    height:30%;
    padding:20px;
}
</style>
 
</head>
<body>
   <div class="container">
     <form class="form-horizontal" action="" method="post">
     <div class="form-group">
            <label class="control-label col-sm-2" for="email">Id:</label>
            <div class="col-sm-10">
              <input type="number"  class="form-control" name="id" placeholder="Enter ID">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="email">Name:</label>
            <div class="col-sm-10">
              <input type="text"  class="form-control" name="username" placeholder="Enter Name">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="email">Address:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="address" placeholder="Enter email">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="email">Gender:</label>
            <div class="col-sm-10">
            <input type="radio" id="gender1" name="gender" value="male">
                <label for="gender1">Male</label><br>
                <input type="radio"  id="gender2" name="gender" value="female">
                <label for="gender2">Female</label><br>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" name="save" class="btn btn-success">Submit</button>
              <button type="submit" name="reset" class="btn btn-danger">Reset</button>
            </div>
          </div>
    </form>
   </div>
<br/><br/><br/><br/>
<!--End edit Model-->
<div>
<table  class="display" style="width:100%" id="emp_table" border="1">
  <thead>
  <tr>
     <th>SrNo </th>
     <th>Id </th>
     <th>Name </th>
     <th>Address </th>
     <th>Gender </th>
  </tr>
  </thead>
<tbody>
<?php 
$total = 0;
if(isset($_SESSION['cart'])){
foreach ($_SESSION['cart'] as $rows) :?>
  <tr class="item_row">
        <td><?php echo ++$total; ?></td>
        <td> <?php echo $rows[0]['id']; ?></td>
        <td> <?php echo $rows[0]['username']; ?></td>
        <td> <?php echo $rows[0]['address']; ?></td>
        <td> <?php echo $rows[0]['gender']; ?></td>
  </tr>
<?php endforeach;?>
<?php } ?>
</tbody>
</table>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  
<script>
    $(document).ready(function () {
        $('#emp_table').DataTable();
    });
</script>
</body>
</html>