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
        .mySlides {display:none;}
        .tab-content {
            border: 10px solid white;
            border-decoration:shadow;

        }
    </style>
</head>
<body  style="background-color:white;">
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



<form method="post" name="form1" enctype="multipart/form-data" style="margin-top: 3%">
    <h3><u> Department Available </u> </h3>
    <table width="100%" border="1" style="margin-top: 3%" >

        <tr>
            <td>Department name</td>
            <td>Department location</td>
            <td>Department facality</td>



        </tr>
        <tr>
            <?php

            include_once("connection.php");

            $result4=mysqli_query($mysqli,"select * from department ");

            while ($dep= mysqli_fetch_assoc($result4))
            {   ?>
                <td>  <?php echo  $dep['department_name'];?> </td>
                <td>  <?php echo  $dep['department_location'];?> </td>
                <td>  <?php echo  $dep['department_fac'];?> </td>


        </tr>

            <?php }

            ?>

    </table>
    <h3> <u>Regular Doctors </u> </h3>
    <table width="100%" border="1" style="margin-top: 3%">

        <tr>
            <td>Doctor ID(start with DR)</td>
            <td>Doctor name</td>
            <td>Doctor Qualifaction</td>
            <td>Doctor address</td>
            <td>Doctor phone number</td>
            <td>Doctor Salary</td>
            <td>Doctor joining date</td>




        </tr>
        <tr>
            <?php



            $result4=mysqli_query($mysqli,"select * from doc_reg ");

            while ($dep= mysqli_fetch_assoc($result4))
            {   ?>
            <td>  <?php echo  $dep['doc_id'];?> </td>
            <td>  <?php echo  $dep['doc_name'];?> </td>
            <td>  <?php echo  $dep['doc_quali'];?> </td>
            <td>  <?php echo  $dep['doc_address'];?> </td>
            <td>  <?php echo  $dep['doc_phone'];?> </td>
            <td>  <?php echo  $dep['doc_salary'];?> </td>
            <td>  <?php echo  $dep['doc_joining'];?> </td>

        </tr>

        <?php }

        ?>

    </table>
    <h3> <u>Doctors On-Call</u> </h3>
    <table width="100%" border="1" style="margin-top: 3%" >

        <tr>
            <td>Doctor ID(start with DC)</td>
            <td>Doctor name</td>
            <td>Doctor Qualifaction</td>
            <td>Doctor address</td>
            <td>Doctor Phone</td>
            <td>Doctor fee per call</td>
            <td>Doctor payment due</td>



        </tr>
        <tr>
            <?php



            $result4=mysqli_query($mysqli,"select * from doc_on_call  ");

            while ($dep= mysqli_fetch_assoc($result4))
            {   ?>

            <td>  <?php echo  $dep['doc_id'];?> </td>
            <td>  <?php echo  $dep['doc_name'];?> </td>
            <td>  <?php echo  $dep['doc_quali'];?> </td>
            <td>  <?php echo  $dep['doc_address'];?> </td>
            <td>  <?php echo  $dep['doc_phone'];?> </td>
            <td>  <?php echo  $dep['doc_fpc'];?> </td>
            <td>  <?php echo  $dep['doc_payment_due'];?> </td>

        </tr>

        <?php }

        ?>

    </table>
</form>