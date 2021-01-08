
<?php

include_once("connection.php");

if(isset($_POST['Submit2'])) {
    $dpname = $_POST['dpname'];
    $dplocation = $_POST['dplocation'];
    $dpfac = $_POST['dpfac'];
    $dcid = $_POST['dcid'];
    $dcname = $_POST['dcname'];
    $dcqual = $_POST['dcqual'];
    $dcadr = $_POST['dcadr'];
    $dcphone = $_POST['dcphone'];
    $dcfpc = $_POST['dcfpc'];
    $dcpd = $_POST['dcpd'];

    $drname = $_POST['drname'];
    $drqual = $_POST['drqual'];
    $drphone = $_POST['drphone'];
    $drsalary = $_POST['drsal'];
    $dradr = $_POST['dradr'];
    $drjd = $_POST['drjd'];
    if(empty($dpname)) {
        if (empty($dpname)) {
            echo "<font color='red'>Department name field is empty.</font><br/>";
        }

    }else{
        $result = mysqli_query($mysqli, "INSERT INTO all_doctors(doc_id, department_name) 
        VALUES('$dcid','$dpname')");
        $result = mysqli_query($mysqli, "INSERT INTO department(department_name, department_location, department_fac) 
        VALUES('$dpname','$dplocation','$dpfac')");

    }


    if (substr($dcid, 0, 2) === "DC" || substr($dcid, 0, 2) === "DR") {


        if (substr($dcid, 0, 2) === "DC")
        {
            if( empty($dcname) || empty($dcqual) || empty($dcphone) ||empty($dcfpc) || empty($dcpd) || empty($dcadr))
                {
                if (empty($dcname)) {
                    echo "<font color='red'>Doctor name field is empty.</font><br/>";
                }
                if (empty($dcqual)) {
                    echo "<font color='red'>Doctor qualification field is empty.</font><br/>";
                }
                if (empty($dcphone)) {
                    echo "<font color='red'>Doctor phone field is empty.</font><br/>";
                }
                if (empty($dcfpc)) {
                    echo "<font color='red'>Doctor fee per call field is empty.</font><br/>";
                }
                if (empty($dcpd)) {
                    echo "<font color='red'>Doctor pay due field is empty.</font><br/>";
                }
                if (empty($dcadr)) {
                    echo "<font color='red'>Doctor address field is empty.</font><br/>";
                }
                echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
            }else{

                $result = mysqli_query($mysqli, "INSERT INTO doc_on_call(doc_id,doc_name,	doc_quali,doc_address,doc_phone,doc_fpc,doc_payment_due ) 
        VALUES('$dcid','$dcname','$dcqual','$dcadr','$dcphone','$dcfpc','$dcpd')");

            }

        }

        if (substr($dcid, 0, 2) === "DR") {

            if(empty($drname) ||empty($drqual) || empty($drphone) || empty($dradr) || empty($drsalary) || empty($drjd))
            {
                if (empty($drname)) {
                    echo "<font color='red'>Doctor name field is empty.</font><br/>";
                }
                if (empty($drqual)) {
                    echo "<font color='red'>Doctor qualfication field is empty.</font><br/>";
                }
                if (empty($drphone)) {
                    echo "<font color='red'>Doctor phone field is empty.</font><br/>";
                }
                if (empty($dradr)) {
                    echo "<font color='red'>Doctor address field is empty.</font><br/>";
                }
                if (empty($drsalary)) {
                    echo "<font color='red'>Doctor salary field is empty.</font><br/>";
                }
                if (empty($drjd)) {
                    echo "<font color='red'>Doctor joining date field is empty.</font><br/>";
                }
                echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";



            }
            else
            {
                $result = mysqli_query($mysqli, "INSERT INTO doc_reg(doc_id,doc_name,	doc_quali,doc_address,doc_phone,doc_salary,doc_joining ) 
        VALUES('$dcid','$drname','$drqual','$dradr','$drphone','$drsalary','$drjd')");
            }

            }







    }
}



?>



<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">


    <style>
        #menu ul{
            list-style:none;
            margin : 0px px 0px 250px;
        }
        #menu ul li{
            width:300px;
            height:23px;
            background-color:aqua;
            border:none;
            text-align:center;
            padding-top:50x;
            float: left;
        }
        #menu ul li a{
            color:white;
            text-decoration:none;
            padding-right:5px;
            text-align:center;
        }
        .linee{
            display: inline-block;
            margin : 20px 0px 0px 0px;
        }

    </style>
</head>
<body>

<div class="row" >
    <div class="col-md-6" >
        <a href="Home.php"> <h2>HOSPITAL MANAGEMENT SYSTEM</h2></a>
    </div>
    <div class="col-md-6 linee" >
        <img style="margin : 0px 0px 0px 300px;" src="Img/facebook.png" width="30" height="30">
        <img  src="Img/phone.png" width="30" height="30">
        <img  src="Img/twitter.png" width="30" height="30">
        <img  src="Img/instagram.png" width="30" height="30">
        <img  src="Img/youtube.png" width="30" height="30">

    </div>
</div>
<div class="row" style="background-color:aqua">
    <div class="col-md-12"  >
        <div id="menu" >
            <ul>

                <li> <a href="Home.php"> <b style="color: black"> Home</b> </li>
                <li> <a href="docform.php" > <b style="color: black">Add Doctors</b> </li>
                <li> <a href="Docview.php"> <b style="color: black">View Doctors </b></li></a>
                <li> <a href="ptform.php"> <b style="color: black">Add Patient </b></li></a>
                <li> <a href="PTview.php"> <b style="color: black">View Patient</b></li></a>

            </ul>

        </div>
    </div>

</div>




<h3><u>Doctor Form</u></h3>
<form method="post" name="form1" enctype="multipart/form-data">
    <table width="100%" border="0" >
        <tr>
            <td style="text-align: center"><h4><u>Department</u></h4></td>
        </tr>
        <tr>
            <td>Department name</td>
            <td><input type="text" name="dpname"></td>
        </tr>
        <tr>
            <td>Department location</td>
            <td><input type="text" name="dplocation"></td>
        </tr>
        <tr>
            <td>Department facality</td>
            <td><input type="text" name="dpfac"></td>
        </tr>
        <tr>
            <td style="text-align: center"><h4><u>Doctor on call Infofmation</u></h4></td>
        </tr>
        <tr>
            <td>Doctor ID(start with 'DR' or 'DC')</td>
            <td><input type="text" name="dcid"></td>
        </tr>
        <tr>
            <td>Doctor name</td>
            <td><input type="text" name="dcname"></td>
        </tr>
        <tr>
            <td>Doctor Qualifaction</td>
            <td><input type="text" name="dcqual"></td>
        </tr>
        <tr>
            <td>Doctor address</td>
            <td><input type="text" name="dcadr"></td>
        </tr>
        <tr>
            <td>Doctor phone number</td>
            <td><input type="number" name="dcphone"></td>
        </tr>
        <tr>
            <td>Doctor fee per call</td>
            <td><input type="text" name="dcfpc"></td>
        </tr>
        <tr>
            <td>Doctor payment due</td>
            <td><input type="date" name="dcpd"></td>
        </tr>


        <tr>
            <td style="text-align: center"> <h4><u>Regular doctor Infofmation</u></h4></td>
        </tr>
        <tr>
            <td>Doctor name</td>
            <td><input type="text" name="drname"></td>
        </tr>
        <tr>
            <td>Doctor Qualifaction</td>
            <td><input type="text" name="drqual"></td>
        </tr>
        <tr>
            <td>Doctor phone number</td>
            <td><input type="number" name="drphone"></td>
        </tr>
        <tr>
            <td>Doctor Salary</td>
            <td><input type="text" name="drsal"></td>
        </tr>
        <tr>
            <td>Doctor Address</td>
            <td><input type="text" name="dradr"></td>
        </tr>
        <tr>
            <td>Doctor joining date</td>
            <td><input type="date" name="drjd"></td>
        </tr>



        <tr>
            <td></td>
            <td><input type="submit" name="Submit2" value="submit"></td>
        </tr>
    </table>
</form>
</body>
</html>






