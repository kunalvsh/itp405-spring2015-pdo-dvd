<?php

if (!isset($_GET['title'])) {
	header('Location: index.php');
}

?>

<!DOCTYPE html> 
<html>
<head>

	<title>DVD Search</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="search.css">

</head>


<body>

<?php

$request = $_GET['title'];

$host = 'itp460.usc.edu';
$dbname = 'dvd';
$user = 'student';
$password = 'ttrojan';


$pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

$sql = "
	SELECT title, genre_name, format_name, rating_name
	FROM dvds
	INNER JOIN genres
	ON dvds.genre_id = genres.id
	INNER JOIN formats
	ON dvds.format_id = formats.id
	INNER JOIN ratings
	ON dvds.rating_id = ratings.id
	WHERE title LIKE ?
";

// $sql = "
// 	SELECT title, artist_name, genre
// 	FROM songs
// 	INNER JOIN artists
// 	ON songs.artist_id = artists.id
// 	INNER JOIN genres
// 	ON songs.genre_id = genres.id
// 	WHERE artist_name LIKE ?
// ";

$statement = $pdo->prepare($sql);
$like = '%' . $request . '%';
$statement->bindParam(1, $like);
$statement->execute();
$dvds = $statement->fetchAll(PDO::FETCH_OBJ);
//var_dump($dvds);

?>
<h1> Results </h1>
<p align= "center"> <a href = "search.php">back to search</a></p>
<div class = "container results-table">
	<?php if (count($dvds) < 1): ?>
		<h3>Sorry, no DVDs for what you searched.<br>
		Try <a href="index.php">searching</a> again.</h3>

	<?php else : ?>
		<table class="table table-bordered table-hover">
			<tr>
				<th>Title</th>
				<th>Genre</th>
				<th>Format</th>
				<th>Rating</th>
			</tr>
			<?php foreach($dvds as $dvd): ?>	
				<tr>
					<td><?php echo $dvd->title ?></td>
					<td><?php echo $dvd->genre_name ?></td>
					<td><?php echo $dvd->format_name ?></td>
					<td><a href = "ratings.php?r=<?php echo $dvd->rating_name ?>"><?php echo $dvd->rating_name ?></a></td>
				</tr>
			<?php endforeach ?>
		</table>


	<?php endif; ?>
</div>

</body>