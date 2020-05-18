<?php 
  session_start();
	include 'connection_check.php';
	$title = $ingredients = $description = $precautions = $image_1 = $msg_1 = $msg_2 = $msg_3 = $image_2 = 
  $image_3 ='';
	$errors = array('title'=>'','ingredients' =>'' , 'description' => '', 'precautions' => '', 'image_1' => '', 'image_2' => '', 'image_3' => '');

	 if(isset($_POST['submit'])) {
//////////////////////////////////////////////////////////////////////////////////////////////////
    if ($_FILES['image_1']['name']) {
     $image_1 = rand().$_FILES['image_1']['name'];   
   } else {
     $image_1 = $_FILES['image_1']['name'];
   }
     $target_1 = "images_1/".basename($image_1);
     if (move_uploaded_file($_FILES['image_1']['tmp_name'], $target_1)) {
       $msg_1 = "Image uploaded successfully";
     }else{
      $msg_1 = "Failed to upload image";
    }
//////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////

    if ($_FILES['image_2']['name']) {
      $image_2 = rand().$_FILES['image_2']['name'];
    } else {
      $image_2 = $_FILES['image_2']['name'];
    }
        
     $target_2 = "images_2/".basename($image_2);
     if (move_uploaded_file($_FILES['image_2']['tmp_name'], $target_2)) {
       $msg_2 = "Image uploaded successfully";
     }else{
      $msg_2 = "Failed to upload image";
    }
//////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////

    if ($_FILES['image_3']['name']) {
      $image_3 = rand().$_FILES['image_3']['name'];
    } else {   
      $image_3 = $_FILES['image_3']['name'];
    }
     $target_3 = "images_3/".basename($image_3);
     if (move_uploaded_file($_FILES['image_3']['tmp_name'], $target_3)) {
       $msg_3 = "Image uploaded successfully";
     }else{
      $msg_3 = "Failed to upload image";
    }
//////////////////////////////////////////////////////////////////////////////////////////////////
	 	if(empty($_POST['title'])) {
	 		$errors['title'] = 'A title is needed <br />';
	 	} 
	 	 else {
	 	    $title = $_POST['title']; 		
	 	}
    if(empty($_POST['ingredients'])) {
      $errors['ingredients'] = 'Ingredients are needed <br />';
    } 
     else {
        $ingredients = $_POST['ingredients'];     
    }
	 	if(empty($_POST['description'])) {
	 		$errors['description'] = 'A description is needed <br />';
	 	} 
	 	 else {
	 			$description = $_POST['description'];	
	 	 }

	 	if(array_filter($errors)){

	 	} else {
	 		$title = mysqli_real_escape_string($conn, $_POST['title']);
	 		$description = mysqli_real_escape_string($conn, $_POST['description']);
      $precautions = mysqli_real_escape_string($conn, $_POST['precautions']);
      $your = $_SESSION["name"];
      $email = $_SESSION["email"];

	 		$sql = "INSERT INTO uploads (title, ingredients, description, precautions, image_1, image_2, image_3, name, email) VALUES('$title', '$ingredients', '$description', '$precautions','$image_1', '$image_2', '$image_3', '$your', '$email')";


	 		if(mysqli_query($conn, $sql)) {
	 			//header("Location: myindex.php?id=$id");
        //echo "successfully uploaded!";
        header("Location: myindex.php");
	 		} else {
	 			echo "error".mysqli_error($conn);
	 		}
	 		}
	 	}
	 
	 ?>

<!DOCTYPE html>

<html lang="en" >

<head>

  <meta charset="UTF-8">

  <title>Upload your Recipe</title>

  <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap" rel="stylesheet">

  <meta name="viewport" content="width=device-width, initial-scale=1"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

<link rel='stylesheet' href='https://cdn.jsdelivr.net/foundation/5.5.0/css/foundation.css'>

<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:300,400'>

<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css'><link rel="stylesheet" href="./add/upload.css">


<!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <!--Import Google Icon Font-->
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">



</head>

<body>

<!-- partial:index.partial.html -->

<header class="m-main-header"></header>

<div class="row">

  <div class="small-12 small-centered medium-8 columns">

    <div class="panel m-panel shadow">

      <div class="row collapse">

        <div class="small-12 columns">

          <header class="form-header">

              <h3>




                <span><a href="index.php">Home</a></span> 
                <span><a href="myindex.php">CookBook</a></span> 

                <?php if ($_SESSION != NULL) { ?>

         
         <span><a href="signout.php">Log Out</a></span>

         <?php }?> 


                 <?php if ($_SESSION == NULL) { ?>
        <span> <a href="cookbooksign.php">Sign Up / Log In</a></span> 

        <?php } ?>


                

              

              <?php if ($_SESSION != NULL) { ?>

      <h5 class="center grey-text lighten-2"><?php echo $_SESSION["name"]?></h5>
<?php } ?>

              <br>

            

            <h4 class="grey-text">

              Upload your Recipe!

            </h4>

          </header>

        </div>

      </div>

      <div class="row">

        <div class="small-12 columns">





          <!-- /////////////////////////////////////////// -->

          <?php if ($_SESSION != NULL) { ?>

          <form method="POST" action="add.php" enctype="multipart/form-data">

            <div class="row">

              <div class="small-4 columns">

                <p class="notice">

                  Title

                </p>

              </div>

              <div class="small-8 columns">

                <div class="form-group-material">
<!-- //////////////////////////////////////////////////////// -->
                  <input id="title" type="text" class="validate" name="title" 
                  placeholder="Please give a title"
                  value="<?php echo $title; ?>">
                    <div class="red-text"><?php echo $errors['title']; ?></div>
                    <label for="title"></label>
<!-- //////////////////////////////////////////////////////// -->


                </div>

              </div>

            </div>



            <div class="row">

                <div class="small-4 columns">

                  <p class="notice">

                    <p>Ingredients</p>
                    <!-- <p class="grey-text">*Please separate each ingredient with a ' / '</p> -->


                  </p>

                </div>

                <div class="small-8 columns">

                  <div class="form-group-material">
<!-- //////////////////////////////////////////////////////////// -->
                    <input id="ingredients" type="text" class="validate" name="ingredients" 
                    placeholder="Please separate each ingredient with a ' / '"
                    value="<?php echo $ingredients; ?>" >
                    <div class="red-text"><?php echo $errors['ingredients']; ?></div>
                    <label for="ingredients"></label>
<!-- //////////////////////////////////////////////////////////// -->
                  </div>

                </div>

              </div>



              <div class="row">

                <div class="small-4 columns">

                  <p class="notice">

                    Procedure

                  </p>

                </div>

                <div class="small-8 columns">

                  <div class="form-group-material">
<!-- ////////////////////////////////////////////// -->
                    <input id="description" type="text" class="validate" name="description" 
                    placeholder="Please give procedure/description"

                    value="<?php echo $description; ?>">
                    <div class="red-text"><?php echo $errors['description']; ?></div>
                    <label for="description"></label>
<!-- //////////////////////////////////////////////// -->
                  </div>

                </div>

              </div>



              <div class="row">

                <div class="small-4 columns">

                  <p class="notice">

                    Precautions

                  </p>

                </div>

                <div class="small-8 columns">

                  <div class="form-group-material">
<!-- ////////////////////////////////////////////////////// -->

                    <input id="precautions" type="text" class="validate" name="precautions" 
                    placeholder="Please give precautions (optional)"
                    value="<?php echo $precautions; ?>">

                    <div class="red-text"><?php echo $errors['precautions']; ?></div>
                    
<!-- //////////////////////////////////////////// -->
                  </div>

                </div>

              </div>







            <div class="row">

              <div class="small-12  columns">

               <!--  <button><div> <input type="hidden" name="size" value="1000000"> </div>
    <div>
      <input type="file" name="image_1">
    </div>Upload Photo (1)</button> -->

    <!-- <div class="btn waves-light brown lighten-2">Browse<i class="material-icons white-text right">attach_file</i>
                          <input type="file" name="image_1">
                        </div> -->

                        <p>
                      <div class = "file-field input-field">
                        <div class="btn waves-light brown lighten-2">Browse<i class="material-icons white-text right">attach_file</i>
                          <input type="file" name="image_1" name="comment">
                        </div>

                        <div class = "file-path-wrapper">
                          <div class="red-text"><?php echo $errors['image_1']; ?></div>

                               <input class = "file-path validate" type = "text"
                                  />
                          </div>
                      </div>
                                                 
                                 
                             </p>






                             <p>
                      <div class = "file-field input-field">
                        <div class="btn waves-light brown lighten-2">Browse<i class="material-icons white-text right">attach_file</i>
                          <input type="file" name="image_2" name="comment">
                        </div>

                        <div class = "file-path-wrapper">
                          <div class="red-text"><?php echo $errors['image_2']; ?></div>

                               <input class = "file-path validate" type = "text"
                                  />
                          </div>
                      </div>
                                                 
                                 
                             </p>








                             <p>
                      <div class = "file-field input-field">
                        <div class="btn waves-light brown lighten-2">Browse<i class="material-icons white-text right">attach_file</i>
                          <input type="file" name="image_3" name="comment">
                        </div>

                        <div class = "file-path-wrapper">
                          <div class="red-text"><?php echo $errors['image_3']; ?></div>

                               <input class = "file-path validate" type = "text"
                                  />
                          </div>
                      </div>
                                                 
                                 
                             </p>

              </div>
            </div>

            <!-- </div>

            <div class="row">

                <div class="small-12 small-push-2 columns">

                  <button><div> <input type="hidden" name="size" value="1000000"> </div>
    <div>
      <input type="file" name="image_2">
    </div>Upload Photo (2)</button>

                </div>

              </div>

              <div class="row">

                <div class="small-12 small-push-3 columns">

                  <button><div> <input type="hidden" name="size" value="1000000"> </div>
    <div>
      <input type="file" name="image_3">
    </div>Upload Photo (3)</button>

                </div>

              </div> -->

              <div class="row">

                <div class="small-12 small-push-4 columns">

                  <!-- <button>Submit Your Recipe</button> -->
                  <!-- ///////////////////////////////////// -->

                   <p>
                              
                              <button class="btn-small waves-light blue-text indigo lighten-5 " name="submit" type="submit">Upload<i class="material-icons blue-text right">send</i></button>
                             </p>

                </div>

              </div>

          </form>


          <?php }  else { ?>
          <p class="red-text center"><?php echo "To add you must be logged in"; ?></p>
        <?php } ?>













        </div>

      </div>

    </div>

  </div>

</div>

<!-- partial -->

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src=".add/upload.js"></script>



</body>

</html>