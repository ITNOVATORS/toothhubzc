<?php $page='calendar'; include '../../include/header.php'; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <title>Calendar </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../../images/logo.png" type="image/png" sizes="16x16">
    <link rel="stylesheet" href="../../css/header.css">
    <link rel="stylesheet" href="../../css/style-patients.css">
    <link rel="stylesheet" href="../../css/main-container.css">
    <link rel="stylesheet" href="../../css/fontawesome/css/all.css" >
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/modal-style.css">
    <link rel="stylesheet" href="patients-style.css">
    <script type="text/javascript" src="../../jquery/jquery-3.6.0.js"></script>
    <script type="text/javascript" src="../../bootstrap/js/bootstrap.min.js"></script>

 
    
	</style>
	
	
</head>
<body style="background-color: #000000;">
  <div class="main-container"><h3>Calendar</h3></div>
  <body>
    
  <?php
require_once './library/config.php';
require_once './library/functions.php';

checkFDUser();

$content = 'views/dashboard.php';
$pageTitle = 'Event Management';
$script = array();

require_once 'include/template.php';
?>
  
</body>
</html>
