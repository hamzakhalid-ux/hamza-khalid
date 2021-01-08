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

<div style="margin: 20% 20% 0% 30%">

    <h1>
        Welcome to Hospital Management System
    </h1>


</div>

</body>
</html>