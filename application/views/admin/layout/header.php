<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>Jules Raynal</title>

	<link rel="stylesheet" type="text/css" href="http://localhost/adraynaline/assets/css/dashboard.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/adraynaline/assets/css/<?php echo PAGE_CSS ?>.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/adraynaline/assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/adraynaline/assets/css/bootstrap-theme.min.css">
</head>
<body>
1 -edito
2 -campaign
3 -test
4 -autres
<?php 
if ($this->session->flashdata('result') != ''): 
  echo '<p id="mr">';
    echo $this->session->flashdata('result'); 
    echo '</p>';
endif;
 ?>