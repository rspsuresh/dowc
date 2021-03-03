<?php
// include database connection file
require_once'dbconfig.php';
if(isset($_POST['insert']))
{
// Posted Values  
    $year=$_POST['year'];
    $make=$_POST['make'];
    $model=$_POST['model'];
    $mileage=$_POST['milaege'];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $state=$_POST['state'];
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// Query for Insertion
    $sql="INSERT INTO quick_response(year_c,make,model,mileage,fname,lname,email,phone,state_c) 
VALUES(:yearc,:make,:model,:mileage,
:fname,:lname,:email,:phone,:statec)";
//Prepare Query for Execution
    $query = $dbh->prepare($sql);
// Bind the parameters
    $query->bindParam(':yearc',$year,PDO::PARAM_STR);
    $query->bindParam(':make',$make,PDO::PARAM_STR);
    $query->bindParam(':model',$model,PDO::PARAM_STR);
    $query->bindParam(':mileage',$mileage,PDO::PARAM_INT);
    $query->bindParam(':fname',$fname,PDO::PARAM_STR);
    $query->bindParam(':lname',$lname,PDO::PARAM_STR);
    $query->bindParam(':email',$email,PDO::PARAM_STR);
    $query->bindParam(':phone',$phone,PDO::PARAM_STR);
    $query->bindParam(':statec',$state,PDO::PARAM_STR);
// Query Execution
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();
    if($lastInsertId)
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>PHP Get Quick Response  </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <link href="style.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="form_main">
                <h4 class="heading">Get Your Quick Response</h4>
                <div class="form">
                    <form name="insertrecord" method="post">
                        <div class="form-group">
                            <select class="form-control" name="year" id="year" required>
                                <option>Select Year</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="make" id="make" onchange="formodel(this.value)" rel="stylesheet">
                                <option>Select Make</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="model" id="model" required>
                                <option>Select Model</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="number" required="" name="milaege"
                                   placeholder="Vehicle Mileage(Optional)"  class="txt">
                        </div>
                        <h4 class="heading">Your Contact Information</h4>
                        <div class="form-group">
                            <input type="text" required="" placeholder="First Name" name="fname" class="txt">
                        </div>
                        <div class="form-group">
                            <input type="text" required="" placeholder="Last Name"  name="lname" class="txt">
                        </div>
                        <div class="form-group">
                            <input type="email" required placeholder="Email" name="email">
                        </div>
                        <div class="form-group">
                            <input type="text" maxlength="10" required placeholder="Phone" value="" name="phone" class="txt">
                        </div>
                        <div class="form-group">
                            <select name="state" class="form-control" id="state">
                                <option>Select State</option>
                                <option value="1">TN</option>
                                <option value="2">kerala</option>
                                <option value="3">Andra</option>
                                <option value="4">Gujarat</option>
                                <option value="4">Kolkata</option>
                            </select>
                        </div>
                        <input type="submit" name="insert" value="Submit" class="btn btn-info">
                    </form>
                </div>
            </div>
        </div
    </div>
</div>
</body>
</html>
<script type="text/javascript">
    var yearurl='https://qasc-api.dowc.com/rest/getYears';
    var makeurl='https://qasc-api.dowc.com/rest/getMakes';
    var modelurl='https://qasc-api.dowc.com/rest/getModels';
    $(function (){
        $('select,input').addClass('form-control');
        foryears();
        formake();
    })
    function  foryears(){
        $.ajax({
            type: "GET",
            url: yearurl,
            cache: false,
            success: function(data){
                responseplacer(data,'year');
            }
        });
    }
    function formake(){
        $.ajax({
            type: "GET",
            url: makeurl,
            cache: false,
            success: function(data){
                $("#model").append('');
                responseplacer(data,'make');
            }
        });
    }
    function formodel(make){
        $.ajax({
            type: "POST",
            url: modelurl,
            data: {make : make},
            cache: false,
            success: function(data){
                responseplacer(data,'model');
            }
        });
    }
    function  responseplacer(data,idplace){
        let optionstr='';
        $.each(data, function(key,value) {
            optionstr+=`<option value='${value}'>${value}</option>`
        });
        $("#"+idplace).append(optionstr);
    }
</script>