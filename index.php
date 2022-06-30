<?php
// include function file
require_once'function.php';

//Deletion
if(isset($_GET['del']))
    {
// Geeting deletion row id
$rid=$_GET['del'];
$deletedata=new DB_con();
$sql=$deletedata->delete($rid);
if($sql)
{
// Message for successfull insertion
echo "<script>alert('Record deleted successfully');</script>";
echo "<script>window.location.href='index.php'</script>";
}
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Contact Form </title>
    <link rel="icon" type="image/x-icon" href="images/signup-img.jpg">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- datatable -->
 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://getbootstrap.com/dist/js/bootstrap.min.js"></script>
<!-- datatable -->
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
</head>
<body>
<div class="container">
<div class="row">
<div class="col-md-12">
<center><h3>Student contact Form</h3> </center>
<a href="insert.php"><button class="btn btn-warning">Add Deatails</button></a><hr />

<div class="table-responsive" > 

<table id="simple_table" class="table table-bordered table-striped">
<thead>
<th>#</th>
<th>Name</th>
<th>Father Name</th>

<th>Gender</th>
<th>Date Of Birth</th>
<th>Course</th>

<th>Email</th>
<th>Contact</th>
<th>Address</th>

<th>Action</th>

</thead>
<tbody>
 <?php
 $fetchdata=new DB_con();
  $sql=$fetchdata->fetchdata();
  $cnt=1;
  while($row=mysqli_fetch_array($sql))
  {
  ?>
    <tr>
    <td><?php echo htmlentities($cnt);?></td>
    <td><?php echo htmlentities($row['Name']);?></td>
    <td><?php echo htmlentities($row['FatherName']);?></td>

    <td><?php echo htmlentities($row['Gender']);?></td>
    <td><?php echo htmlentities($row['DOB']);?></td>
    <td><?php echo htmlentities($row['Course']);?></td>

    <td><?php echo htmlentities($row['EmailId']);?></td>
    <td><?php echo htmlentities($row['ContactNumber']);?></td>
    <td><?php echo htmlentities($row['Address']);?></td>


 
   
    <td>
        <a href="read.php?id=<?php echo htmlentities($row['id']);?>"><button class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-eye-open"></span></button></a>


     <a href="update.php?id=<?php echo htmlentities($row['id']);?>"><button class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-pencil"></span></button></a>

     <a href="index.php?del=<?php echo htmlentities($row['id']);?>"><button class="btn btn-danger btn-xs" onClick="return confirm('Do you really want to delete');"><span class="glyphicon glyphicon-trash"></span></button></a>
     </td>
    </tr>
<?php
// for serial number increment
$cnt++;
} ?>
</tbody>
</table>
</div>
</div>
</div>
</div>

</body>
<script type="text/javascript">

$('table').DataTable();

</script>
</html>

