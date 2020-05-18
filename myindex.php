<?php
	session_start();
	include 'connection_check.php';
	//$sql = 'SELECT * FROM hub ORDER BY created_at DESC'; //not needed 
	$sql = 'SELECT * FROM uploads ORDER BY created_at DESC';
	$result = mysqli_query($conn, $sql);
	$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC); //returns as associated array
	mysqli_free_result($result);
	//mysqli_close($conn);

	$sql_1 = 'SELECT * FROM users';
	$result_1 = mysqli_query($conn, $sql_1);
	$pizzas_1 = mysqli_fetch_all($result_1, MYSQLI_ASSOC); //returns as associated array
	mysqli_free_result($result_1);
	//mysqli_close($conn);
	//print_r($pizzas);

	$toggle = 10;
?>

<!DOCTYPE html>

<html lang="en" >

<head>

  <meta charset="UTF-8">

  <title>CodePen - Bootstrap Timeline</title>

  <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap" rel="stylesheet">

  <link rel='stylesheet' href='https://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css'><link rel="stylesheet" href="./feed/feed.css">


  <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <!--Import Google Icon Font-->
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">



</head>

<body>

<!-- partial:index.partial.html -->

<div class="container">

    <div class="page-header">

        <h1 id="timeline">
        	<a href="index.php">Home</a>
        	<a href="myindex.php">CookBook</a>


        <?php if ($_SESSION != NULL) { ?>

         <span><a href="add.php">Add</a></span> 
         <span><a href="signout.php">Log Out</a></span>

         <?php }?>
        		

        <?php if ($_SESSION == NULL) { ?>
        <span> <a href="cookbooksign.php">Sign Up / Log In</a></span> 

        <?php } ?>


    			



    			 </h1>

        <br>

        <h1 id="timeline">Feed</h1>



        <?php if ($_SESSION != NULL) { ?> 
		<h2 class="grey-text" id="timeline"><?php echo $_SESSION["name"]?></h2>
 		<?php } ?> 







    </div>



    <ul class="timeline">

    	<?php foreach ($pizzas as $pizza) { 
		?> 




    <?php if ($toggle==10) { ?>

        <li>

          <div class="timeline-badge danger"><i class="glyphicon glyphicon-heart"><?php echo htmlspecialchars($pizza['countlike']);?></i></div>

          <div class="timeline-panel">

            <div class="timeline-heading">

              <h4 class="timeline-title"><?php echo htmlspecialchars($pizza['title']);?></h4>

              <p><large class="text-muted"><?php echo htmlspecialchars($pizza['name']);?></large></p>

            </div>

            <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i></small><?php echo htmlspecialchars($pizza['created_at']);?></p>




            <div class="timeline-body">

              
                <p>
                <ol>
                  <?php foreach (explode('/', $pizza['ingredients']) as $mying) { ?>
                  <li><?php echo htmlspecialchars($mying)?></li>
                  <?php } ?>
                  
                </ol>
                <p>
              
             <!--  <p><?php //echo htmlspecialchars($pizza['ingredients']);?></p> -->
              <h6><?php echo htmlspecialchars($pizza['description']);?></h6>
              <h6 class="red-text"><?php echo htmlspecialchars($pizza['precautions']);?></h6>

                <br>


                <div class="row">
                  <div class="col s12 m12 l12">
                      <div class="card">
                        <div class="card-image">

                <!--  <img src="feed/mash.jpg" alt=""> -->
                <?php if ($pizza['image_1']) {               
                	echo "<img src='images_1/".$pizza['image_1']."' >";
                } elseif ($pizza['image_2']) {
                	echo "<img src='images_2/".$pizza['image_2']."' >";
                } elseif ($pizza['image_3']) {
                	echo "<img src='images_3/".$pizza['image_3']."' >";
                }
                ?>
              </div>
              </div>
                  </div>
                </div>
                

                 <br>

                 <br>

                 <button class="more"><a href="details.php?id=<?php echo $pizza['id']?>">See More</a></button>

            </div>

          </div>

        </li>


    <?php 
    $toggle=20;
	} else {?>





	<?php //elseif ($toggle==20) { ?>

        <li class="timeline-inverted">

            <div class="timeline-badge danger"><i class="glyphicon glyphicon-heart"><?php echo htmlspecialchars($pizza['countlike']);?></i></div>

            <div class="timeline-panel">

              <div class="timeline-heading">

                <h4 class="timeline-title"><?php echo htmlspecialchars($pizza['title']);?></h4>

                <p><large class="text-muted"><?php echo htmlspecialchars($pizza['name']);?></large></p>

              </div>
              <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i></small><?php echo htmlspecialchars($pizza['created_at']);?></p>


              <div class="timeline-body">


              
                <p>
                <ol>
                <?php foreach (explode('/', $pizza['ingredients']) as $mying) { ?>
                  <li><?php echo htmlspecialchars($mying)?></li>
                <?php } ?>
                  
                </ol>
                <p>
             

              <!-- <p><?php //echo htmlspecialchars($pizza['ingredients']);?></p> -->
              <h6><?php echo htmlspecialchars($pizza['description']);?></h6>
              <h6 class="red-text"><?php echo htmlspecialchars($pizza['precautions']);?></h6>

                  <br>

                   <!-- <img src="feed/steak.jpg" alt=""> -->


                   <div class="row">
                  <div class="col s12 m12 l12">
                      <div class="card">
                        <div class="card-image">

                <?php if ($pizza['image_1']) {               
                	echo "<img src='images_1/".$pizza['image_1']."' >";
                } elseif ($pizza['image_2']) {
                	echo "<img src='images_2/".$pizza['image_2']."' >";
                } elseif ($pizza['image_3']) {
                	echo "<img src='images_3/".$pizza['image_3']."' >";
                }
                ?>
                </div>
              </div>
                  </div>
                </div>

                   <br>

                   <br>

                   <button class="more"><a href="details.php?id=<?php echo $pizza['id']?>">See More</a></button>

              </div>

            </div>

          </li>

    <?php 
    $toggle=10;
		} 

	}
	?>
</ul>



  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

</body>

</html>