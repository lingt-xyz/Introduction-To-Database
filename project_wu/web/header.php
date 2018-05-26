<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="dashboard.css" rel="stylesheet">
    <style>
	html {
	  position: relative;
	  min-height: 100%;
	}
	body {
	  margin-bottom: 60px; /* Margin bottom by footer height */
	}
	.footer {
	  position: absolute;
	  bottom: 0;
	  width: 100%;
	  height: 60px; /* Set the fixed height of the footer here */
	  line-height: 60px; /* Vertically center the text there */
	  background-color: #f5f5f5;
	  text-align: center;
	}
    </style>
    <title><?php echo $title ?></title>
  </head>
  <body>
	<section class="jumbotron text-center">
		<div class="container">
	  	<h1 class="jumbotron-heading"><a href="/index.php">COMP 353 Databases</a></h1>
	  	<p class="lead text-muted"><?php echo $sub_title ?></p>
		</div>
	</section>
