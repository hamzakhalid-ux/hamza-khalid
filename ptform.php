


<?php

include_once("connection.php");

if(isset($_POST['Submit1'])) {
    //Patient Entry
    $enpatid = $_POST['enpatid'];
    $enname = $_POST['enname'];
    $enage = $_POST['enage'];
    $ensex = $_POST['ensex'];
    $enaddress = $_POST['enaddress'];
    $encity = $_POST['encity'];
    $endocname = $_POST['endocname'];
    $enphone=$_POST['enphone'];
    $endate= $_POST['endate'];
    $endpname=$_POST['endpname'];
    //Patient Checkup
    $chdiag = $_POST['chdiag'];
    $chtreat = $_POST['chtreat'];
    $chstates = $_POST['chstates'];
    $chdate = $_POST['chdate'];
    $chpattype = $_POST['chpattype'];
    $chdcid=$_POST['chdcid'];
    //Patient Admit
    $advpay = $_POST['advpay'];
    $amodepay = $_POST['amodepay'];
    $aroom= $_POST['aroom'];
    $adepart = $_POST['adepart'];
    $aadmit = $_POST['aadmit'];
    $ainitial = $_POST['ainitial'];
    $adiag = $_POST['adiag'];
    $atreat = $_POST['atreat'];
    $anftreat = $_POST['anftreat'];
    $aattname = $_POST['aattname'];
    //Patient Operation
    $opdate = $_POST['opdate'];
    $opnodc = $_POST['opnodc'];
    $opthno = $_POST['opthno'];
    $optype = $_POST['optype'];
    $opdcid = $_POST['opdcid'];
    $opdpname=$_POST['opdpname'];
    $optreatad = $_POST['optreatad'];

    //Patient Regular
    $regdate = $_POST['regdate'];
    $regdiag = $_POST['regdiag'];
    $regtreat = $_POST['regtreat'];
    $regmd = $_POST['regmd'];
    //Patient Discharge
    $distreatgiven = $_POST['distreatgiven'];
    $distreatadv = $_POST['distreatadv'];
    $dispaymade = $_POST['dispaymade'];
    $dismode = $_POST['dismode'];
    $disdate = $_POST['disdate'];
    //Room Detail

    $roomno = $_POST['roomno'];
    $roomtype = $_POST['roomtype'];
    $roomst = $_POST['roomst'];
    $roomchr = $_POST['roomchr'];













    if (substr($enpatid, 0, 2) === "PT" ) {


        if (substr($enpatid, 0, 2) === "PT")
        {
            if( empty($enname) || empty($enage) || empty($ensex) ||empty($enaddress) || empty($encity) || empty($enphone)|| empty($endate)|| empty($endocname) )
            {
                if (empty($enname)) {
                    echo "<font color='red'>Patient name field is empty.</font><br/>";
                }
                if (empty($enage)) {
                    echo "<font color='red'>Patient Age field is empty.</font><br/>";
                }
                if (empty($ensex)) {
                    echo "<font color='red'>Patient Sex field is empty.</font><br/>";
                }
                if (empty($enaddress)) {
                    echo "<font color='red'>Patient Address field is empty.</font><br/>";
                }
                if (empty($encity)) {
                    echo "<font color='red'>Patient City field is empty.</font><br/>";
                }
                if (empty($enphone)) {
                    echo "<font color='red'>Patient Phone field is empty.</font><br/>";
                }
                if (empty($endate)) {
                    echo "<font color='red'>Patient Date field is empty.</font><br/>";
                }
                if (empty($endocname)) {
                    echo "<font color='red'>Patient Doctor Name field is empty.</font><br/>";
                }
                echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
            }else{
                //heard core values


                $result = mysqli_query($mysqli, "INSERT INTO pat_entry(pat_id,	pat_name,	pat_age	,pat_sex,	pat_address	,pat_city,	pat_phone,	pat_entry_date	,doc_name,	department_name	 ) 
        VALUES('$enpatid','$enname','$enage','$ensex','$enaddress','$encity','$enphone','$endate','$endocname','$endpname')");
                $result = mysqli_query($mysqli, "INSERT INTO pat_chkup(pat_id	,doc_id	,pat_diag	,pat_treatment,	pat_states	,pat_chkup_date,Reffered_for) 
        VALUES('$enpatid','$chdcid','$chdiag','$chtreat','$chstates','$chdate','$chpattype')");

                $result = mysqli_query($mysqli, "INSERT INTO room_detail(room_no,room_type,room_status,charges_per_day) 
        VALUES('$roomno','$roomtype','$roomst','$roomchr')");

                if(substr($chstates, 0, 1) === "Y" && substr($chpattype, 0, 2) === "Op")

                {
                    $result = mysqli_query($mysqli, "INSERT INTO pat_opr(pat_id	,date_of_operation	,department_name	,doc_id,	no_of_doc	,no_of_opt_theater	,type_of_operation	,treatment_advice	) 
        VALUES('$enpatid','$opdate','$opdpname','$opdcid','$opnodc','$opthno','$optype','$optreatad')");

                }
                if(substr($chstates, 0, 1) === "N" && substr($chpattype, 0, 2) === "Re")
                {

                    $result = mysqli_query($mysqli, "INSERT INTO pat_admit(pat_id,	adv_pay,	mode_of_pay	,room_no	,department_name	,pat_admit_date	,initial_cond	,diag,	treatment	,no_doc_treatment	,attendant_name) 
        VALUES('$enpatid','$advpay','$amodepay','$aroom','$adepart','$aadmit','$ainitial','$adiag','$atreat','$anftreat','$aattname')");

                    $result2=mysqli_query($mysqli,"update room_detail set room_status='Y'where room_no='$aroom'");

                    $result = mysqli_query($mysqli, "INSERT INTO pat_reg(	pat_id	,date_of_visit	,diag	,treatment	,med_rec) 
        VALUES('$enpatid','$regdate','$regdiag','$regtreat','$regmd')");
                }


                $result = mysqli_query($mysqli, "INSERT INTO pat_dis(	pat_id	,treatment_given	,treatment_advice,	payment_made	,mode_of_pay,	date_of_discharge	) 
        VALUES('$enpatid','$distreatgiven','$distreatadv','$dispaymade','$dismode','$disdate')");

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
        .mySlides {display:none;}
        .tab-content {
            border: 10px solid white;
            border-decoration:shadow;

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


<h3><u>Patient Form</u></h3>
<form method="post" name="form1" enctype="multipart/form-data">
    <table width="100%" border="0" >








        <tr>
            <td style="text-align: center"><h4><u>Patient Entry</u></h4></td>
        </tr>
        <tr>
            <td>Patient Id</td>
            <td><input type="text" name="enpatid"></td>
        </tr>

        <tr>
            <td>Patient name</td>
            <td><input type="text" name="enname"></td>
        </tr>
        <tr>
            <td>Patient age</td>
            <td><input type="number" name="enage"></td>
        </tr>
        <tr>
            <td>Patient sex</td>
            <td> <input type="radio" name="ensex" value="M"><label for="M">Male</label>
                <input type="radio" name="ensex" value="F"><label for="F">Female</label></td>

        </tr>
        <tr>
            <td>Department Available</td>
            <td>
                <?php
                $result5=mysqli_query($mysqli,"select department_name from department ");

                while ($dpp= mysqli_fetch_assoc($result5))
                {   ?>
                    Department name:  <?php echo  $dpp['department_name'];

                }

                ?>


            </td>
        </tr>
        <tr>
            <td>Department name</td>
            <td><input type="text" name="endpname"></td>
        </tr>
        <tr>
            <td>Patient address</td>
            <td><input type="text" name="enaddress"></td>
        </tr>
        <tr>
            <td>Patient city</td>
            <td><input type="text" name="encity"></td>
        </tr>
        <tr>
            <td>Patient phone</td>
            <td><input type="number" name="enphone"></td>
        </tr>
        <tr>
            <td>Patient entry date</td>
            <td><input type="date" name="endate"></td>
        </tr>
        <tr>
            <td>Doctor Available</td>
            <td>
                <?php
                $result6=mysqli_query($mysqli,"select doc_name from doc_reg ");

                while ($dpp= mysqli_fetch_assoc($result6))
                {   ?>
                    Doctor name:  <?php echo  $dpp['doc_name'];

                }

                ?>


            </td>
        </tr>
        <tr>
            <td>Patient doctor name//doc reg sa aya gha</td>
            <td><input type="text" name="endocname"></td>
        </tr>





        <tr>
            <td style="text-align: center"><h4><u>Patient Checkup</u></h4></td>
        </tr>
        <tr>
            <td>Patient diagnosis</td>
            <td><input type="text" name="chdiag"></td>
        </tr>
        <tr>
            <td>Doctor Id Available</td>
            <td>
                <?php
                $result3=mysqli_query($mysqli,"select doc_id from all_doctors ");

                while ($doc= mysqli_fetch_assoc($result3))
                {   ?>
                    Docter Avilable:  <?php echo  $doc['doc_id'];

                }

                ?>


            </td>
        </tr>
        <tr>
            <td>Doctor Id</td>
            <td><input type="text" name="chdcid"></td>
        </tr>

        <tr>
            <td>Patient treatment</td>
            <td><input type="text" name="chtreat"></td>
        </tr>
        <tr>
            <td>Patient status</td>

            <td> <input type="radio" name="chstates" value="Y"><label for="Y">Admitted</label>
                <input type="radio" name="chstates" value="N"><label for="N">Not Admitted</label></td>
        </tr>
        <tr>
            <td>Patient Type</td>

            <td> <input type="radio" name="chpattype" value="Operation"><label for="Operation">Operation</label>
                <input type="radio" name="chpattype" value="Regular"><label for="Regular">Regular</label></td>
        </tr>
        <tr>
            <td>Patient checkup date</td>
            <td><input type="date" name="chdate"></td>
        </tr>





        <tr><td style="text-align: center"><h4><u>Patient Admit</u></h4></td></tr>

        <tr>
            <td>Advance payment</td>
            <td><input type="number" name="advpay"></td>
        </tr>
        <tr>
            <td>Mode of Payment</td>

            <td> <input type="radio" name="amodepay" value="Cheque"><label for="Cheque">Cheque</label>
                <input type="radio" name="amodepay" value="Cash"><label for="Cash">Cash</label></td>

        </tr>
        <tr>
            <td>Room Available</td>
            <td>
                    <?php
                    $result1=mysqli_query($mysqli,"select room_no from room_detail where room_status='N'");

                    while ($room= mysqli_fetch_array($result1))
                    {   ?>
                     Room Avilable:  <?php echo  $room['room_no'];

                    }

                    ?>

            </td>

        </tr>
        <tr>
            <td>Room No</td>
            <td><input type="number" name="aroom"></td>

        </tr>
        <tr>
            <td>Department Available</td>
            <td>
                <?php
                $result4=mysqli_query($mysqli,"select department_name from department");

                while ($dep= mysqli_fetch_assoc($result4))
                {   ?>
                    Department Name:  <?php echo  $dep['department_name'];

                }

                ?>


            </td>
        </tr>
        <tr>
            <td>Department name</td>
            <td><input type="text" name="adepart"></td>
        </tr>
        <tr>
            <td>Patient Admit date</td>
            <td><input type="date" name="aadmit"></td>
        </tr>
        <tr>
            <td>Initial condication</td>
            <td><input type="text" name="ainitial"></td>
        </tr>
        <tr>
            <td>Diagnosis</td>
            <td><input type="text" name="adiag"></td>
        </tr>
        <tr>
            <td>Treatment</td>
            <td><input type="text" name="atreat"></td>
        </tr>
        <tr>
            <td>NO of doctor on treatment</td>
            <td><input type="number" name="anftreat"></td>
        </tr>
        <tr>
            <td>Attendant name</td>
            <td><input type="text" name="aattname"></td>
        </tr>






        <tr>
            <td style="text-align: center"><h4><u> Patient Operation</u></h4> </td>
        </tr>
        <tr>
            <td>Date of operation</td>
            <td><input type="date" name="opdate"></td>
        </tr>
        <tr>
            <td>Docter Id Available</td>
            <td>
                <?php
                $result3=mysqli_query($mysqli,"select doc_id from all_doctors ");

                while ($doc= mysqli_fetch_assoc($result3))
                {   ?>
                    Docter Avilable:  <?php echo  $doc['doc_id'];

                }

                ?>


            </td>
        </tr>
        <tr>
            <td>Doctor Id</td>
            <td><input type="text" name="opdcid"></td>
        </tr>
        <tr>
            <td>No of doctor in operation</td>
            <td><input type="number" name="opnodc"></td>
        </tr>
        <tr>
            <td>Department Available</td>
            <td>
                <?php
                $result6=mysqli_query($mysqli,"select department_name from department ");

                while ($dppo= mysqli_fetch_assoc($result6))
                {   ?>
                    Department name:  <?php echo  $dppo['department_name'];

                }

                ?>


            </td>
        </tr>
        <tr>
            <td>Department name</td>
            <td><input type="text" name="opdpname"></td>
        </tr>
        <tr>
            <td>Operation theater number</td>
            <td><input type="number" name="opthno"></td>
        </tr>
        <tr>
            <td>Type of operation</td>
            <td><input type="text" name="optype"></td>
        </tr>
        <tr>
            <td>Treatment advice</td>
            <td><input type="text" name="optreatad"></td>
        </tr>




        <tr>
            <td style="text-align: center"><h4><u> Regular Patient</u></h4> </td>
        </tr>
        <tr>
            <td>Date of visit</td>
            <td><input type="date" name="regdate"></td>
        </tr>
        <tr>
            <td>Patient diagnoses</td>
            <td><input type="text" name="regdiag"></td>
        </tr>
        <tr>
            <td>Treatment</td>
            <td><input type="text" name="regtreat"></td>
        </tr>
        <tr>
            <td>Medicine Recommendation</td>
            <td><input type="text" name="regmd"></td>
        </tr>




        <tr>
            <td style="text-align: center"><h4><u>Patient Discharge</u></h4> </td>
        </tr>
        <tr>
            <td>Treatment Given</td>
            <td><input type="text" name="distreatgiven"></td>
        </tr>
        <tr>
            <td>Treatment Advice</td>
            <td><input type="text" name="distreatadv"></td>
        </tr>
        <tr>
            <td>Payment Made</td>
            <td><input type="text" name="dispaymade"></td>
        </tr>
        <tr>
            <td>Mode Of Pay</td>

            <td> <input type="radio" name="dismode" value="Cheque"><label for="Cheque">Cheque</label>
                <input type="radio" name="dismode" value="Cash"><label for="Cash">Cash</label></td>
        </tr>

        <tr>
            <td>Date Of Discharge</td>
            <td><input type="date" name="disdate"></td>
        </tr>




        <tr>
            <td style="text-align: center"><h4><u>Room Detail</u></h4> </td>
        </tr>
        <tr>
            <td>Room No</td>
            <td><input type="number" name="roomno"></td>
        </tr>
        <tr>
            <td>Room Type</td>

            <td> <input type="radio" name="roomtype" value="G"><label for="G">General</label>
                <input type="radio" name="roomtype" value="P"><label for="P">Private</label></td>

        </tr>
        <tr>
            <td>Room Status</td>


            <td> <input type="radio" name="roomst" value="Y"><label for="Y">Occupied</label>
                <input type="radio" name="roomst" value="N"><label for="N">Not Occupied</label></td>
        </tr>
        <tr>
            <td>Charges Per Day</td>
            <td><input type="number" name="roomchr"></td>
        </tr>

        <tr>
            <td></td>
            <td><input type="submit" name="Submit1" value="submit"></td>
        </tr>
    </table>
</form>
</body>
</html>









