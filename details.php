
<?php
 
session_start();
//include 'header.php';

$my_array = "";
	include 'connection_check.php';
$globalid = "";
if(isset($_GET['id'])) {
	$id = mysqli_real_escape_string($conn, $_GET['id']);
	$globalid = $id;
	$sql = "SELECT * FROM uploads WHERE id = $id";
	$result = mysqli_query($conn, $sql);
	$my_array = mysqli_fetch_assoc($result);
	mysqli_free_result($result);
	$title = htmlspecialchars($my_array['title']);

	$bool = 2;
}
?>

<!DOCTYPE html>

<html lang="en" >

<head>

  <meta charset="UTF-8">

  <title>MeltingPot</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap" rel="stylesheet">



<style>

@import url(https://fonts.googleapis.com/css?family=Montserrat);

html, body {

  overflow: hidden;

  font-size: 40px;

}



.content-title {

  font-size: 10px;

}



.background {

  background-size: cover;

  background-repeat: no-repeat;

  background-position: center center;

  overflow: hidden;

  will-change: transform;

  -webkit-backface-visibility: hidden;

          backface-visibility: hidden;

  height: 130vh;

  position: fixed;

  width: 100%;

  -webkit-transform: translateY(30vh);

          transform: translateY(30vh);

  -webkit-transition: all 1.2s cubic-bezier(0.22, 0.44, 0, 1);

  transition: all 1.2s cubic-bezier(0.22, 0.44, 0, 1);

}

.background:before {

  content: "";

  position: absolute;

  width: 100%;

  height: 100%;

  top: 0;

  left: 0;

  right: 0;

  bottom: 0;

  background-color: rgba(0, 0, 0, 0.3);

}

.background:first-child {

   background-image: url(<?php if ($my_array['image_1']) {               
                	echo "images_1/".$my_array['image_1']." ";
                } else echo "details/background2.jpg";
                ?>);

  -webkit-transform: translateY(-15vh);

          transform: translateY(-15vh);

}

.background:first-child .content-wrapper {

  -webkit-transform: translateY(15vh);

          transform: translateY(15vh);

}

.background:nth-child(2) {

  background-image: url(<?php if ($my_array['image_2']) {               
                	echo "images_2/".$my_array['image_2']." ";
                } else echo "details/background2.jpg";
                ?>);

}

.background:nth-child(3) {

  background-image: url(<?php if ($my_array['image_3']) {               
                	echo "images_3/".$my_array['image_3']." ";
                } else echo "details/background2.jpg";
                ?>);

}



/* Set stacking context of slides */

.background:nth-child(1) {

  z-index: 3;

}



.background:nth-child(2) {

  z-index: 2;

}



.background:nth-child(3) {

  z-index: 1;

}



.content-wrapper {

  height: 100vh;

  display: -webkit-box;

  display: flex;

  -webkit-box-pack: center;

          justify-content: center;

  text-align: center;

  -webkit-box-orient: vertical;

  -webkit-box-direction: normal;

          flex-flow: column nowrap;

  color: #fff;

  font-family: 'Indie Flower', cursive;

  text-transform: uppercase;

  -webkit-transform: translateY(40vh);

          transform: translateY(40vh);

  will-change: transform;

  -webkit-backface-visibility: hidden;

          backface-visibility: hidden;

  -webkit-transition: all 1.7s cubic-bezier(0.22, 0.44, 0, 1);

  transition: all 1.7s cubic-bezier(0.22, 0.44, 0, 1);

}

.content-title {

  font-size: 12vh;

  line-height: 1.4;

}



.background.up-scroll {

  -webkit-transform: translate3d(0, -15vh, 0);

          transform: translate3d(0, -15vh, 0);

}

.background.up-scroll .content-wrapper {

  -webkit-transform: translateY(15vh);

          transform: translateY(15vh);

}

.background.up-scroll + .background {

  -webkit-transform: translate3d(0, 30vh, 0);

          transform: translate3d(0, 30vh, 0);

}

.background.up-scroll + .background .content-wrapper {

  -webkit-transform: translateY(30vh);

          transform: translateY(30vh);

}



.background.down-scroll {

  -webkit-transform: translate3d(0, -130vh, 0);

          transform: translate3d(0, -130vh, 0);

}

.background.down-scroll .content-wrapper {

  -webkit-transform: translateY(40vh);

          transform: translateY(40vh);

}

.background.down-scroll + .background:not(.down-scroll) {

  -webkit-transform: translate3d(0, -15vh, 0);

          transform: translate3d(0, -15vh, 0);

}

.background.down-scroll + .background:not(.down-scroll) .content-wrapper {

  -webkit-transform: translateY(15vh);

          transform: translateY(15vh);

}


</style>

<!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <!--Import Google Icon Font-->
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> 




</head>

<body>

<!-- partial:index.partial.html -->

<div >

  <section class="background">

    <div class="content-wrapper">   

      <p class="content-subtitle"> 

      	<span><a href="index.php">Home</a></span>
      	<span><a href="myindex.php">CookBook</a></span> 

<?php if ($_SESSION != NULL) { ?>

         <span><a href="add.php">Add</a></span> 
         <span><a href="signout.php">Log Out</a></span>

         <?php }?>
        		

        <?php if ($_SESSION == NULL) { ?>
        <span> <a href="cookbooksign.php">Sign Up / Log In</a></span> 

        <?php } ?>

      <p class="content-title"><?php echo htmlspecialchars($my_array['title'])?></p>

      <p class="content-subtitle">Ingredients
      	<p>
      	<ol>
            <?php foreach (explode('/', $my_array['ingredients']) as $mying) { ?>
            <li><?php echo htmlspecialchars($mying)?></li>
            <?php } ?>
        </ol>
        <p>

          <!-- <br>

          Spinach

          <br>

          Lettuce

          <br>

          Tomatoes

          <br>

          Spinach
          ///////////////////////////////////////////
           background-image: url(<?php if ($my_array['image_1']) {               
                	echo "images_1/".$my_array['image_1']." ";
                }?>);
                ////////////////////////////////////////////////////

          <br>

          Lettuce

          <br>

          Tomatoes

          <br>

          Spinach

          <br>

          Lettuce

          <br>

          Tomatoes -->

      

    </div>

  </section>

  <section class="background">

    <div class="content-wrapper">

      <p class="content-title">Procedure</p>

      <p class="content-subtitle"><?php echo htmlspecialchars($my_array['description']);?>

      </p>

    </div>

  </section>

  <section class="background">

    <div class="content-wrapper">

      <p class="content-title">Precautions</p>

      <p class="content-subtitle"><?php echo htmlspecialchars($my_array['precautions']);?></p>
      <br>

      <br>
      <div class="row">

      			<?php 
      			if ($_SESSION) {
      			$sql_countlike = " SELECT * FROM countlike WHERE userid ='$_SESSION[id]' AND postid = '$globalid'";
 				$select_result = mysqli_query($conn, $sql_countlike);
 				$array = mysqli_fetch_array($select_result);
      			if (!$array) {
      				$sql_countlike_INSERT = "INSERT INTO countlike (userid, postid) VALUES ('$_SESSION[id]', '$globalid')";
      				$insert_result = (mysqli_query($conn, $sql_countlike_INSERT)); ?>
      				<!-- <div class="col s12 m12 l12 center"> --> 
      		  			<a class="btn-floating btn waves-effect waves-light red" id="countlike" name="countlike"
      		  			href="countlike.php?id=<?php echo $globalid?>"><i class="material-icons">favorite</i></a>
      			    </div>
      			<?php } else { 
      				if ($array['checked']==1) { ?>
      					<!-- <div class="col s12 m12 l12 center"> -->
      		  				<a class="btn-floating btn disabled waves-effect waves-light red" id="countlike" name="countlike"
      		  				href="myindex.php?id=<?php echo $globalid?>"><i class="material-icons">favorite</i></a>
      					</div>
      					<div class="row"></div>
      					<p class="indigo-text">Thank you for liking the post!</p>
      		    <?php } else { ?>
      						<!-- <div class="col s12 m12 l12 center">  -->
      		  					<a class="btn-floating btn waves-effect waves-light red" id="countlike" name="countlike"
      		  					href="countlike.php?id=<?php echo $globalid?>"><i class="material-icons">favorite</i></a>
      						</div>
      		 	<?php }
      			}
      			}?>
      		</div>

    </div>

  </section>

</div>

<!-- partial -->

  <script src='https://cdnjs.cloudflare.com/ajax/libs/lodash.js/3.10.1/lodash.min.js'></script>

<script src='https://code.jquery.com/jquery-2.1.4.min.js'></script><script  src="./details/details.js"></script>



</body>

</html>