<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>De zwolle hogeschool - Inschrijven</title>
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />

        <!-- CSS  -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    </head>

    <body>
        <nav class="blue" role="navigation">
		<div class="nav-wrapper container">
			<a href="index.html" class="brand-logo">
				<img src="img/zwollehogeschoolicowit.png" width="55" style="vertical-align: middle;margin-bottom:5px;">
			</a>

               <ul class="right hide-on-med-and-down">
				<li><a href="index.html">Home</a></li>
				<li><a href="locaties.html">Locations</a></li>
				<li><a href="opleidingen.html">Courses</a></li>
				<li><a href="inschrijven.php">Apply</a></li>
                                <li><a href="schoolinfo.html">College information</a></li>
				<li><a href="fotos.html">Pictures</a></li>
			</ul>

			<ul id="nav-mobile" class="side-nav">
				<li><a href="index.html">Home</a></li>
				<li><a href="locaties.html">Locations</a></li>
				<li><a href="opleidingen.html">Courses</a></li>
				<li><a href="inschrijven.html">Apply</a></li>
				<li><a href="schoolinfo.html">College information</a></li>
				<li><a href="fotos.html">Pictures</a></li>
			</ul>

                <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
            </div>
        </nav>

        <div class="main">
            <h1>Apply</h1>
            <p>Here you can apply for our courses, act fast while you still can!</p>
            <form method="post">
            <?php
                $nameErr = $emailErr = $genderErr = $websiteErr = "";
                $name = $email = $gender = $class = $course = $subject = "";

                if ($_SERVER["REQUEST_METHOD"] == "POST") 
                    {
                       if (empty($_POST["name"])) 
                       {
                          $nameErr = "Name is mandatory";
                       }
                       else
                       {
                          $name = test_input($_POST["name"]);
                       }

                       if (empty($_POST["e-mail"])) 
                       {
                          $emailErr = "e-mail is mandatory";
                       }
                       else 
                       {
                          $email = test_input($_POST["e-mail"]);

                          // checkt of het email adres geldig is ingevuld
                          if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
                          {
                             $emailErr = "Invalid email address"; 
                          }
                       }

                       if (empty($_POST["course"])) {
                          $course = "";
                       }
                       else 
                       {
                          $course = test_input($_POST["course"]);
                       }

                       if (empty($_POST["class"])) 
                       {
                          $class = "";
                       }
                       else 
                       {
                          $class = test_input($_POST["class"]);
                       }

                       if (empty($_POST["gender"])) 
                       {
                          $genderErr = "Mandatory";
                       }
                       else 
                       {
                          $gender = test_input($_POST["gender"]);
                       }

                       if (empty($_POST["subject"])) 
                       {
                          $subjectErr = "Select at least one";
                       }
                       else 
                       {
                          $subject = $_POST["subject"];	
                       }
                    }

                function test_input($data) {
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                    return $data;
                }
            ?>

          <h3>Application form</h3>

          <p><span class = "error">* Mandatory field.</span></p>
        <div class="formulier">
          <form method = "POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
             <table>
                <tr>
                   <td>Full name:</td>
                   <td><input type = "text" name = "name">
                      <span class = "error">* <?php echo $nameErr;?></span>
                   </td>
                </tr>
                <br>
                <tr>
                   <td>E-mail: </td>
                   <td><input type = "text" name = "email">
                      <span class = "error">* <?php echo $emailErr;?></span>
                   </td>
                </tr>

                <tr>
                   <td>Phone:</td>
                   <td> <input type = "text" name = "course">
                      <span class = "error"><?php echo $websiteErr;?></span>
                   </td>
                </tr>

                <tr>
                   <td>Gender:</td>
                   <td>
                    <p>
                        <input name="gender" type="radio" id="test1" value="vrouw" checked />
                        <label for="test1">Female</label>
                    </p>
                    <p>
                        <input name="gender" type="radio" id="test2" value="man"/>
                        <label for="test2">Male</label>
                    </p>
                      <span class = "error">* <?php echo $genderErr;?></span>
                   </td>
                </tr>

                <tr>
                   <td>Course:</td>
                   <td>
                    <p>
                        <input name="subject[]" type="radio" id="test3" value="Informatica" checked />
                        <label for="test3">Information technology</label>
                    </p>
                    <p>
                        <input name="subject[]" type="radio" id="test4" value="Werktuigbouwkunde"/>
                        <label for="test4">Mechanical engineering</label>
                    </p>
                    <br>
                   </td>
                </tr>
                <tr>
                    <td>Optional remarks:</tb><br>
                    <td><textarea name="text" cols="60" rows="5"></textarea></td>
                </tr>

                <tr>
                   <td>
                      <input type = "submit" name = "Versturen" value = "Submit">
                   </td>
                </tr>
                
                <tr>
                   <span class = "error">* <?php echo "Herewith you choose to accept our Terms of agreement (mandatory)";?></span>
                   <?php if(!isset($_POST['checked'])){ }?>
                </tr>
             </table>
          </form>
        </div>
            <?php
                if(isset($_POST['Versturen'])){
                    echo "<h2>We've received the folloeing information:</h2>";
                    echo ("<p>Full name: $name</p>");
                    echo ("<p>E-mail: $email</p>");
                    echo ("<p>Phone: $course</p>");
                    echo ("<p>Gender: $gender</p>");
                    if(isset($_POST['subject'])){
                        for($i = 0; $i < count($subject); $i++) 
                        {
                            echo ("Course: ". $subject [$i]);
                        }
                    }
                }
            ?>
        </div>

        <footer class="page-footer blue">
            <div class="container">
                <div class="row">

                    <div class="col l3 s12">
                        <h5 class="white-text">Locations</h5>
                        <ul>
                            <li><a class="white-text" href="#!">Zwolle</a></li>
                            <li><a class="white-text" href="#!">Emmen</a></li>
                            <li><a class="white-text" href="#!">Assen</a></li>
                            <li><a class="white-text" href="#!">Meppel</a></li>
                        </ul>
                    </div>

                    <div class="col l3 s12">
                        <h5 class="white-text">Study at Zwolle hogeschool</h5>
                        <ul>
                            <li><a class="white-text" href="#!">How to apply?</a></li>
                            <li><a class="white-text" href="#!">How much will the course cost?</a></li>
                            <li><a class="white-text" href="#!">Studying with a handicap</a></li>
                            <li><a class="white-text" href="#!">Study and top sport</a></li>
                            <li><a class="white-text" href="#!">Work and Study</a></li>
                            <li><a class="white-text" href="#!">Student experiences</a></li>
                        </ul>
                    </div>

                    <div class="col l3 s12">
                        <h5 class="white-text">About Zwolle hogeschool</h5>
                        <ul>
                            <li><a class="white-text" href="#!">Organisation</a></li>
                            <li><a class="white-text" href="#!">Vacancies and internships</a></li>
                            <li><a class="white-text" href="#!">Quality and credit</a></li>
                        </ul>
                    </div>

                    <div class="col l3 s12">
                        <h5 class="white-text">Information for</h5>
                        <ul>
                            <li><a class="white-text" href="#!">Alumni</a></li>
                            <li><a class="white-text" href="#!">Parents</a></li>
                            <li><a class="white-text" href="#!">Deans</a></li>
                            <li><a class="white-text" href="#!">Business with DZH</a></li>
                        </ul>
                    </div>

                </div>
            </div>

            <div class="footer-copyright">
                <div class="container">
                    Made by <a class="blue-text text-lighten-3" href="https://sidoi.nl/">Knymams</a>
                </div>
            </div>
        </footer>

        <!--  Scripts-->
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="js/materialize.js"></script>
        <script src="js/init.js"></script>
        <script type="text/javascript">$("button").click(function () {
                $('html,body').animate({scrollTop: $(".second").offset().top}, 'slow');
            });</script>
    </body>
</html>
