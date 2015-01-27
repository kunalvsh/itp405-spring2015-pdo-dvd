<!DOCTYPE html>
<html>
<head>
	<title>DVD Search</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="search.css">

</head>


<body>

<form action="search.php" method="get">
<div class = "container">
	<div class = "row search-bar">
		<h1>DVD Search</h1>
		<div class="col-xs-4 col-xs-offset-4">
			<div class="input-group">
			      <input type="text" class="form-control" placeholder="dvd title" name = "title">
			      <span class="input-group-btn">
			        <button class="btn btn-default" type="submit">
			        	<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
			        </button>
			      </span>
			</div>
		</div>
	</div>
</div>

</form>


</body>
</html>