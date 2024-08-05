<!DOCTYPE html>

	<head>
		<title>Donate The Blood</title>
		<meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="Blood Donation Website">
        <meta name="author" content="Exceptional Programmers">

        <link rel="stylesheet" href="css/styles.css">

		<!-- Bootstrap Link CSS Files -->
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">

        <!-- Custom Link CSS Files -->
		<link rel="stylesheet" href="css/custom.css">

		<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

	</head>



<?php 
            include 'config.php';

            // session is 1 state,when user logged in then 1 session is creted to uniquely identify user by server
            // Through session 1 unique digit is assigned to each user n through that it is checked whether user is valid or dummy one
            // 1st time when user send request then server return data n link between server and user closed.When 2nd time user requests 
            // then for server now the user is new.And how it identify whether it is the user who logged in with valid email n password or dummy user.
            // For that purpose we use session.  
            session_start();
            // session is global array will active on log in with valid email n password.
            if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
                include 'usernav.php';
            }else{
                include 'navigation.php';
            }
            
?>
