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
    <h3><u> Patient Entry </u> </h3>
    <table width="100%" border="1" style="margin-top: 3%" >

        <tr>
            <td>Patient Id</td>
            <td>Patient Name</td>
            <td>Patient Age</td>
            <td>Patient Sex</td>
            <td>Patient Address</td>
            <td>Patient City</td>
            <td>Patient Phone</td>
            <td>Patient Entry Date</td>
            <td>Patient Docter Name</td>
            <td>Patient Department Name</td>



        </tr>
        <tr>
            <?php

            include_once("connection.php");

            $result4=mysqli_query($mysqli,"select * from pat_entry ");

            while ($dep= mysqli_fetch_assoc($result4))
            {   ?>
            <td>  <?php echo  $dep['pat_id'];?> </td>
            <td>  <?php echo  $dep['pat_name'];?> </td>
            <td>  <?php echo  $dep['pat_age'];?> </td>
            <td>  <?php echo  $dep['pat_sex'];?> </td>
            <td>  <?php echo  $dep['pat_address'];?> </td>
            <td>  <?php echo  $dep['pat_city'];?> </td>
            <td>  <?php echo  $dep['pat_phone'];?> </td>
            <td>  <?php echo  $dep['pat_entry_date'];?> </td>
            <td>  <?php echo  $dep['doc_name'];?> </td>
            <td>  <?php echo  $dep['department_name'];?> </td>


        </tr>

        <?php }

        ?>

    </table>
    <h3> <u>Patient Checkup  </u> </h3>
    <table width="100%" border="1" style="margin-top: 3%">

        <tr>
            <td>Patient Id</td>
            <td>Patient Doctor Id</td>
            <td>Patient Diagnosis</td>
            <td>Patient Treatment</td>
            <td>Patient Status</td>
            <td>Patient Checkup Date</td>
            <td>Patient Reffered For</td>
        </tr>
        <tr>
            <?php



            $result4=mysqli_query($mysqli,"select * from pat_chkup ");

            while ($dep= mysqli_fetch_assoc($result4))
            {   ?>
            <td>  <?php echo  $dep['pat_id'];?> </td>
            <td>  <?php echo  $dep['doc_id'];?> </td>
            <td>  <?php echo  $dep['pat_diag'];?> </td>
            <td>  <?php echo  $dep['pat_treatment'];?> </td>
            <td>  <?php echo  $dep['pat_states'];?> </td>
            <td>  <?php echo  $dep['pat_chkup_date'];?> </td>
            <td>  <?php echo  $dep['Reffered_for'];?> </td>

        </tr>

        <?php }

        ?>

    </table>
    <h3> <u>Patient Admit</u> </h3>
    <table width="100%" border="1" style="margin-top: 3%" >

        <tr>
            <td>Patient Id</td>
            <td>Patient Advance Pay</td>
            <td>Method of Payment</td>
            <td>Patient Room No</td>
            <td>Patient Department Name</td>
            <td>Patient Admit Date</td>
            <td>Patient Initial Condition</td>
            <td>Patient Diagnosis</td>
            <td>Patient Treatment</td>
            <td>No of Doctor </td>
            <td>Patient Attendant Name </td>


        </tr>
        <tr>
            <?php
            $result4=mysqli_query($mysqli,"select * from pat_admit  ");

            while ($dep= mysqli_fetch_assoc($result4))
            {   ?>

            <td>  <?php echo  $dep['pat_id'];?> </td>
            <td>  <?php echo  $dep['adv_pay'];?> </td>
            <td>  <?php echo  $dep['mode_of_pay'];?> </td>
            <td>  <?php echo  $dep['room_no'];?> </td>
            <td>  <?php echo  $dep['department_name'];?> </td>
            <td>  <?php echo  $dep['pat_admit_date'];?> </td>
            <td>  <?php echo  $dep['initial_cond'];?> </td>
            <td>  <?php echo  $dep['diag'];?> </td>
            <td>  <?php echo  $dep['treatment'];?> </td>
            <td>  <?php echo  $dep['no_doc_treatment'];?> </td>
            <td>  <?php echo  $dep['attendant_name'];?> </td>

        </tr>
        <?php }
        ?>
    </table>
    <h3> <u>Regular Patient</u> </h3>
    <table width="100%" border="1" style="margin-top: 3%" >

        <tr>
            <td>Patient Id</td>
            <td>Patient Date of Visit</td>
            <td>Patient Diagnosis</td>
            <td>Patient Treatment</td>
            <td>Patient Medicine Recommendation</td>



        </tr>
        <tr>
            <?php
            $result4=mysqli_query($mysqli,"select * from pat_reg  ");

            while ($dep= mysqli_fetch_assoc($result4))
            {   ?>

            <td>  <?php echo  $dep['pat_id'];?> </td>
            <td>  <?php echo  $dep['date_of_visit'];?> </td>
            <td>  <?php echo  $dep['diag'];?> </td>
            <td>  <?php echo  $dep['treatment'];?> </td>
            <td>  <?php echo  $dep['med_rec'];?> </td>


        </tr>
        <?php }
        ?>
    </table>
    <h3> <u> Patient Operation</u> </h3>
    <table width="100%" border="1" style="margin-top: 3%" >

        <tr>
            <td>Patient Id</td>
            <td>Patient Date of Operation</td>
            <td>Patient Department Name</td>
            <td>Patient Doctor Id</td>
            <td>No Of Doctor</td>
            <td>Operation Theater Number</td>
            <td>Type Of Operation</td>
            <td>Treatment Advice</td>



        </tr>
        <tr>
            <?php
            $result4=mysqli_query($mysqli,"select * from pat_opr  ");

            while ($dep= mysqli_fetch_assoc($result4))
            {   ?>

            <td>  <?php echo  $dep['pat_id'];?> </td>
            <td>  <?php echo  $dep['date_of_operation'];?> </td>
            <td>  <?php echo  $dep['department_name'];?> </td>
            <td>  <?php echo  $dep['doc_id'];?> </td>
            <td>  <?php echo  $dep['no_of_doc'];?> </td>
            <td>  <?php echo  $dep['no_of_opr_theater'];?> </td>
            <td>  <?php echo  $dep['type_of_operation'];?> </td>
            <td>  <?php echo  $dep['treatment_advice'];?> </td>


        </tr>
        <?php }
        ?>
    </table>


<h3> <u> Room Details</u> </h3>
<table width="100%" border="1" style="margin-top: 3%" >

    <tr>
        <td>Room Number</td>
        <td>Room Type</td>
        <td>Room Status</td>
        <td>Charges Per Day</td>


    </tr>
    <tr>
        <?php
        $result4=mysqli_query($mysqli,"select * from room_detail  ");

        while ($dep= mysqli_fetch_assoc($result4))
        {   ?>

        <td>  <?php echo  $dep['room_no'];?> </td>
        <td>  <?php echo  $dep['room_type'];?> </td>
        <td>  <?php echo  $dep['room_status'];?> </td>
        <td>  <?php echo  $dep['charges_per_day'];?> </td>

    </tr>
    <?php }
    ?>
</table>
</form>