<?php
// include database connection file

require_once'function.php';
// Object creation
$insertdata=new DB_con();
if(isset($_POST['insert']))
{
// Posted Values
$name=$_POST['name'];
$fname=$_POST['fathername'];

$gender=$_POST['gender'];
$dob=$_POST['dob'];
$course=$_POST['course'];

$emailid=$_POST['emailid'];
$contactno=$_POST['contactno'];
$address=$_POST['address'];



// print_r($_POST);exit();
//Function Calling
$sql=$insertdata->insert($name,$fname,$gender,$dob,$course,$emailid,$contactno,$address);
if($sql)
{
// Message for successfull insertion
echo "<script>alert('Record inserted successfully');</script>";
echo "<script>window.location.href='index.php'</script>";
}
else
{
// Message for unsuccessfull insertion
echo "<script>alert('Something went wrong. Please try again');</script>";
echo "<script>window.location.href='index.php'</script>";
}
}
   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));


      
      $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 1707606016){
         $errors[]='File size must be excately 400 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"images/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }
   }
?>



<!-- 9952799477 -->




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Registration Form</title>
    <link rel="icon" type="image/x-icon" href="images/signup-img.jpg">


    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- date format -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
    <link type="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker3.min.css"/>

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">


</head>
<body>
    <div class="main">
        <div class="container">
            <div class="signup-content">
                <div class="signup-img">
                    <img src="images/signup-img.jpg" alt=""    style="height:99.3%" ;>
                </div>
                <div class="signup-form">
                    <form method="POST" class="register-form" id="register-form">
                        <h2>student registration form</h2>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="name">Name :</label>
                                <input class="allowtypes" type="text" name="name" id="name" required/>
                            </div>
                            <div class="form-group">
                                <label for="fathername">Father Name :</label>
                                <input class="allowtypes" type="text" name="fathername" id="father_name" required/>
                            </div>
                        </div>

                        <div class="form-radio">
                            <label for="gender" class="radio-label">Gender :</label>
                            <div class="form-radio-item">
                                <input type="radio" name="gender" id="male" value="male" checked>
                                <label for="male">Male</label>
                                <span class="check"></span>
                            </div>
                            <div class="form-radio-item">
                                <input type="radio" name="gender" value="female" id="female">
                                <label for="female">Female</label>
                                <span class="check"></span>
                            </div>
                        </div>
                        <div class="form-group" id="datepicker">
                            <label for="birth_date">Date Of Birth :</label>
                            <input type="text"  name="dob" data-bind="value: startDate, event: {change: savePerishableDate}" id="date" placeholder="dd/mm/yyyy" />

                        </div>
                        <div class="form-group">
                            <label for="address">Address :</label>
                            <textarea class="form-control" name="address" rows="3" cols="69" id="address"required></textarea>
                            <!-- <input type="text" name="address" rows="50" cols="69" required/> -->
                        </div>
                        <div class="form-group">
                            <label for="course">Course :</label>
                            <div class="form-select">
                                <select name="course" id="course">
                                    <option value=""></option>
                                    <option value="BCA">BCA</option>
                                    <option value="B.Sc (CS)">B.Sc (CS)</option>
                                    <option value="BA(Tamil)">BA(Tamil)</option>
                                </select>
                                <span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                            <label for="email">Email ID :</label>
                            <input type="email" name="emailid" id="email"required/>
                            </div>
                            <div class="form-group">
                                <label for="city">Contactno :</label>
                               <input type="text" name="contactno" id="number" maxlength="10" required="true" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="email">File :</label>
                            <input type="file" accept="image/*" name="image" id="upload" />
                        </div>

                        <div class="form-submit">
                            <input type="submit" value="Reset All" class="submit" name="reset" id="reset" />
                            <input type="submit" value="Submit Form" class="submit" name="insert" id="submit" />
                        </div>


                    </form>
                </div>
            </div>
        </div>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript"  src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>


</body>
<script type="text/javascript">
    $(document).ready(function() {
        
            $("#date").datepicker({
                format: "dd/mm/yyyy",
                language: "fr",
                changeMonth: true,
                changeYear: true
            });
        
        $(".allowtypes").keypress(function (e) {
            var keyCode = e.keyCode || e.which;
 
            $("#lblError").html("");
 
            //Regex for Valid Characters i.e. Alphabets.
            var regex = /^[A-Za-z]+$/;
 
            //Validate TextBox value against the Regex.
            var isValid = regex.test(String.fromCharCode(keyCode));
            if (!isValid) {
                $("#lblError").html("Only Alphabets allowed.");
            }
            return isValid;
        });

  $("#number").inputFilter(function(value) {
    return /^\d*$/.test(value);    // Allow digits only, using a RegExp
  },"Only digits allowed");
  });

  $('#date').blur(function(){
    var s= $('#date').val();
    var dateRegex = '^(0[1-9]|1[012])[\/\-](0[1-9]|[12][0-9]|3[01])[\/\-](19|20)\d\d$';
    if(!dateRegex.match(s)){
        $("#msgDOB").val("date format not valid");
        $("#msgDate").css("display","block");
    }else
    {
        $("#msgDate").css("display","none");
    }
 });

  var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
 if (testEmail.test(valueToTest))
    dsjdjbj
 else
   dfdsfsd

    $('#upload').summernote({
           height: 300,
           callbacks: {
           onImageUpload: function(image) {
                 var sizeKB = image[0]['size'] / 1000;
                 var tmp_pr = 0;
                 if(sizeKB > 200){
                    tmp_pr = 1;
                    alert("pls, select less then 200kb image.");
                 }
                 if(image[0]['type'] != 'image/jpeg' && image[0]['type'] != 'image/png'){
                    tmp_pr = 1;
                    alert("pls, select png or jpg image.");
                 }
                 if(tmp_pr == 0){
                     var file = image[0];
                     var reader = new FileReader();
                    reader.onloadend = function() {
                        var image = $('<img>').attr('src',  reader.result);
                        $('#editor').summernote("insertNode", image[0]);
                    }
                   reader.readAsDataURL(file);
                 }
              }
          }
      });

</script>


</html>

