
<?php
// include function file
include_once("function.php");
//Object
$updatedata=new DB_con();
if(isset($_POST['update']))
{
// Get the userid
$userid=intval($_GET['id']);
// Posted Values
$name=$_POST['name'];
$fname=$_POST['fathername'];

$gender=$_POST['gender'];
$dob=$_POST['dob'];
$course=$_POST['course'];

$emailid=$_POST['emailid'];
$contactno=$_POST['contactno'];
$address=$_POST['address'];
//Function Calling
$sql=$updatedata->update($name,$fname,$gender,$dob,$course,$emailid,$contactno,$address,$userid);
// Mesage after updation
echo "<script>alert('Record Updated successfully');</script>";
// Code for redirection
echo "<script>window.location.href='index.php'</script>";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Registration Form</title>
    <link rel="icon" type="image/x-icon" href="images/GYRTH.jpg">


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
<?php
// Get the userid
$userid=intval($_GET['id']);
$onerecord=new DB_con();
$sql=$onerecord->fetchonerecord($userid);
$cnt=1;
while($row=mysqli_fetch_array($sql))
  {
  ?>

                    <form name="insertrecord" method="post" class="register-form" id="register-form">
                        <h2>student registration form</h2>
                          <div class="form-row">
                            <div class="form-group">
                                <label for="name">Name :</label>
                                <input type="text" class="allowtypes" name="name" id="name" value="<?php echo htmlentities($row['Name']);?>" required/>
                            </div>
                            <div class="form-group">
                                <label for="fathername">Father Name :</label>
                                <input type="text" class="allowtypes" name="fathername" value="<?php echo htmlentities($row['FatherName']);?>" id="father_name" required/>
                            </div>
                        </div>

                        <div class="form-radio">
                            <label for="gender" class="radio-label">Gender :</label>
                            <div class="form-radio-item">
                                <input type="radio" name="gender" id="male" value="male" <?php if ($row['Gender'] == 'male') {?>checked<?php } ?>>
                                <label for="male">Male</label>
                                <span class="check"></span>
                            </div>
                            <div class="form-radio-item">
                                <input type="radio" name="gender" value="female" id="female" <?php if ($row['Gender'] == 'female') {?>checked<?php } ?>>
                                <label for="female">Female</label>
                                <span class="check"></span>
                            </div>
                        </div>
                        <div class="form-group" id="datepicker">
                            <label for="birth_date">DOB :</label>
                            <input type="text"  name="dob" data-bind="value: startDate, event: {change: savePerishableDate}" id="date" placeholder="dd/mm/yyyy" value="<?php echo htmlentities($row['DOB']);?>"/>
                        </div>
                        

                        <div class="form-group">
                            <label for="address">Address :</label>
                            <textarea class="form-control" name="address" rows="3" cols="69" id="address" required><?php echo htmlentities($row['Address']);?></textarea>
                        
                            <!-- <input type="text" name="address" rows="50" cols="69" required/> -->
                        </div>


                        <div class="form-group">
                            <label for="course">Course :</label>
                            <div class="form-select">

                                <select name="course" id="course" >
                                    <option value=""></option>
                                    <option value="BCA" <?php if ($row['Course'] == 'BCA') {?>selected='selected'<?php } ?>>BCA</option>
                                    <option value="B.Sc (CS)" <?php if ($row['Course'] == 'B.Sc (CS)') {?>selected='selected'<?php } ?>>B.Sc (CS)</option>
                                    <option value="BA(Tamil)" <?php if ($row['Course'] == 'BA(Tamil)') {?>selected='selected'<?php } ?>>BA(Tamil)</option>
                                </select>
                             
                                <span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                            <label for="email">Email ID :</label>
                            <input type="email" name="emailid" id="email" value="<?php echo htmlentities($row['EmailId']);?>" />
                            </div>
                            <div class="form-group">
                                <label for="city">Contactno :</label>
                               <input type="text" name="contactno" id="number" maxlength="10" value="<?php echo htmlentities($row['ContactNumber']);?>" required onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
                            </div>
                        </div>



                        <?php } ?>

                        <div class="form-submit">
                            <input type="submit" name="update" value="Update">
                        </div>

                     <div class="form-submit">
                        <a href="index.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i>Go Back</a>
                                            </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>


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

function mailValidation(val) {
    var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;

    if (!expr.test(val)) {
        $('#errEmail').text('Please enter valid email.');
    }
    else {
        $('#errEmail').hide();
    }
}
</script>
</html>

