<?php
session_start();

include 'connection_check.php';

if ($_SESSION) {

if(isset($_GET['id'])) {
	$id = mysqli_real_escape_string($conn, $_GET['id']);
	$sql = "SELECT * FROM uploads WHERE id = $id";
	$result = mysqli_query($conn, $sql);
	$my_array = mysqli_fetch_assoc($result);
	$like = $my_array['countlike'];
	$like = $like + 1;
	$your = $my_array['name'];
	$title = $my_array['title'];
	$email = $my_array['email'];
	$description = $my_array['description'];
	$image_1 = $my_array['image_1'];
	$image_2 = $my_array['image_2'];
	$image_3 = $my_array['image_3'];
	$precautions = $my_array['precautions'];
	$ingredients = $my_array['ingredients'];
	$created_at = $my_array['created_at'];
	$sqli = "REPLACE INTO uploads (id, title, ingredients, email, description, name, image_1, image_2, image_3 ,precautions, countlike, created_at) VALUES(
	'$id', '$title', '$ingredients','$email', '$description', '$your', '$image_1', '$image_2', '$image_3', '$precautions', '$like', '$created_at')";


		/////////////////////////////////////////////////////////////////////////////////
	//echo "$_SESSION[id]";
	if(isset($_GET['id'])) {
	$post_id = mysqli_real_escape_string($conn, $_GET['id']);
	}
	//echo "$_SESSION[id]";
	//echo "$post_id";

	///////////////////////////////////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$sql_countlike = " SELECT * FROM countlike WHERE userid ='$_SESSION[id]' AND postid = '$post_id'";
	
	$select_result = mysqli_query($conn, $sql_countlike);
 	$array = mysqli_fetch_array($select_result);

 	if ($array['checked']==0) {

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////



	$sql_INSERT = "UPDATE countlike SET checked='1' WHERE userid='$_SESSION[id]' AND postid= '$post_id'";
	$result_insert = mysqli_query($conn, $sql_INSERT);

	/////////////////////////////////////////////////////////////////////////////////


	$result_1 = mysqli_query($conn, $sqli);
	header("Location: details.php?id=$id");
}
}
}
	?>

	<!DOCTYPE html>
	<html>
	<head>
		<title>Feedback</title>
		  <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <!--Import Google Icon Font-->
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	</head>
	<body>
		
		<div class="row"></div>
		<div class="row"></div>
		<div class="row">
			<div class="col s12 m4 l4"></div>
			<div class="col s12 m4 l4">
				<div class="card white">
					<div class="card-content center">
						<p>Sorry! To like a post you must be logged in!</p>
						<p>If you are logged in the problem maybe because you tried to like the same post more than once.</p>
						
					</div>
				</div>
			</div>

			
		</div>

		<div class="row"></div>

		<div class="row">
			<div class="col s12 m4 l4"></div>
			<div class="col s12 m4 l4 center">
				
						<a href="index.php"><i class=" material-icons grey-text ">reply</i></a>
					</div>
			
		</div>

	<!-- 	<?php include '../footer.php' ?> -->
	
	</body>
	</html>



