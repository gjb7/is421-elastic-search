<?php
	require 'Autoloader.php';
	spl_autoload_register('autoloader');
	new classes\app();
?>
<!DOCTYPE html>
<html>
	<head>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">

		<link rel="stylesheet" type="text/css" href="css/styles.css">

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    		<script src="js/elasticsearch.min.js"></script>
   	 	<script src="js/tweets.js"></script>

	</head>
	<body>

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Elasticsearch</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.php?page=classes\searchtext">Search by String</a></li>
            <li><a href="index.php?page=classes\searchuser">Search by String and User</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

	<?php if(empty($_GET)) { ?>
    <div class="container">

      <div class="starter-template">
        <h1>Elasticsearch Project</h1>
        <p class="lead">For this project you need to create an application that periodically retrieves tweets (once every minute) from the public timeline of twitter and then store these tweets inside elastic search.  You then need to create a page that has a search text input field that allows someone to search the tweets.  The results page for the search should have at least one filter that allows the end user to limit the search results to display only the selected tweet author.</p>
      </div>

    </div><!-- /.container -->
    <?php } ?>
    <footer class="footer">
    	<div class="container">
    		<p class="muted-text">Elasticsearch project by Grant and Giuseppe</p>
    	</div>
    </footer>
</html>