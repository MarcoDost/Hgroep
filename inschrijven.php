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
                <a href="https://sidoi.nl/school/zwollehogeschool/" class="brand-logo center">
                    <img src="img/zwollehogeschoolicowit.png" width="55" style="vertical-align: middle;margin-bottom:5px;">
                </a>

                <ul class="hide-on-med-and-down">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="#">Locaties</a></li>
                    <li><a href="#">Opleidingen</a></li>
                    <li><a href="#">Open dagen</a></li>
                </ul>

                <ul class="right hide-on-med-and-down">
                    <li><a href="#"><i class="material-icons right">search</i>Zoeken</a></li>
                </ul>					

                <ul id="nav-mobile" class="side-nav">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Locaties</a></li>
                    <li><a href="#">Opleidingen</a></li>
                    <li><a href="#">Open dagen</a></li>
                </ul>

                <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
            </div>
        </nav>

        <div class="main">
            <h1>Inschrijven</h1>
            <p>Hier kun je je inschrijven voor onze opleidingen, doe het snel nu het nog kan!</p>
            <form method="post">
            <?php
                $nameErr = $emailErr = $genderErr = $websiteErr = "";
                $name = $email = $gender = $class = $course = $subject = "";

                if ($_SERVER["REQUEST_METHOD"] == "POST") 
                    {
                       if (empty($_POST["name"])) 
                       {
                          $nameErr = "Naam is verplicht";
                       }
                       else
                       {
                          $name = test_input($_POST["name"]);
                       }

                       if (empty($_POST["email"])) 
                       {
                          $emailErr = "Email is verplicht";
                       }
                       else 
                       {
                          $email = test_input($_POST["email"]);

                          // checkt of het email adres geldig is ingevuld
                          if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
                          {
                             $emailErr = "Ongeldig email adres"; 
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
                          $genderErr = "Verplicht";
                       }
                       else 
                       {
                          $gender = test_input($_POST["gender"]);
                       }

                       if (empty($_POST["subject"])) 
                       {
                          $subjectErr = "U moet 1 of meer selecteren";
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

          <h3>Inschrijfformulier</h3>

          <p><span class = "error">* verplicht veld.</span></p>
        <div class="formulier">
          <form method = "POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
             <table>
                <tr>
                   <td>Volledige naam:</td>
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
                   <td>Telefoon:</td>
                   <td> <input type = "text" name = "course">
                      <span class = "error"><?php echo $websiteErr;?></span>
                   </td>
                </tr>

                <tr>
                   <td>Geslacht:</td>
                   <td>
                    <p>
                        <input name="gender" type="radio" id="test1" value="vrouw" checked />
                        <label for="test1">Vrouw</label>
                    </p>
                    <p>
                        <input name="gender" type="radio" id="test1" value="man"/>
                        <label for="test1">Man</label>
                    </p>
                      <span class = "error">* <?php echo $genderErr;?></span>
                   </td>
                </tr>

                <tr>
                   <td>Opleiding:</td>
                   <td>
                    <p>
                        <input name="subject[]" type="radio" id="test1" value="Informatica" checked />
                        <label for="test1">Informatica</label>
                    </p>
                    <p>
                        <input name="subject[]" type="radio" id="test1" value="Werktuigbouwkunde"/>
                        <label for="test1">Werktuigbouwkunde</label>
                    </p>
                    <br>
                   </td>
                </tr>
                <tr>
                    <td>Eventuele opmerkingen:</tb><br>
                    <td><textarea name="text" cols="60" rows="5"></textarea></td>
                </tr>

                <tr>
                   <td>
                      <input type = "submit" name = "Versturen" value = "Versturen">
                   </td>
                </tr>
                
                <tr>
                   <span class = "error">* <?php echo "Hiermee geef je aan akkoord te gaan met onze Terms of agreement (verplicht)";?></span>
                   <?php if(!isset($_POST['checked'])){ }?>
                </tr>
             </table>
          </form>
        </div>
            <?php
                if(isset($_POST['Versturen'])){
                    echo "<h2>Het volgende is bij ons ontvangen:</h2>";
                    echo ("<p>Volledige naam: $name</p>");
                    echo ("<p>Email: $email</p>");
                    echo ("<p>Telefoon: $course</p>");
                    echo ("<p>Geslacht: $gender</p>");
                    if(isset($_POST['subject'])){
                        for($i = 0; $i < count($subject); $i++) 
                        {
                            echo ("Opleiding: ". $subject [$i]);
                        }
                    }
                }
            ?>
        </div>

        <footer class="page-footer blue">
            <div class="container">
                <div class="row">

                    <div class="col l3 s12">
                        <h5 class="white-text">Locaties</h5>
                        <ul>
                            <li><a class="white-text" href="#!">Zwolle</a></li>
                            <li><a class="white-text" href="#!">Emmen</a></li>
                            <li><a class="white-text" href="#!">Assen</a></li>
                            <li><a class="white-text" href="#!">Meppel</a></li>
                        </ul>
                    </div>

                    <div class="col l3 s12">
                        <h5 class="white-text">Studeren bij Zwolle hogeschool</h5>
                        <ul>
                            <li><a class="white-text" href="#!">Aanmelden, hoe doe je dat?</a></li>
                            <li><a class="white-text" href="#!">Studeren, wat kost dat?</a></li>
                            <li><a class="white-text" href="#!">Studeren met een functiebeperking</a></li>
                            <li><a class="white-text" href="#!">Studeren en topsport</a></li>
                            <li><a class="white-text" href="#!">Werken en Studeren</a></li>
                            <li><a class="white-text" href="#!">Ervaringen van studenten</a></li>
                        </ul>
                    </div>

                    <div class="col l3 s12">
                        <h5 class="white-text">Over Zwolle hogeschool</h5>
                        <ul>
                            <li><a class="white-text" href="#!">Organisatie</a></li>
                            <li><a class="white-text" href="#!">Vacatures en stages</a></li>
                            <li><a class="white-text" href="#!">Kwaliteit en accreditatie</a></li>
                        </ul>
                    </div>

                    <div class="col l3 s12">
                        <h5 class="white-text">Info voor</h5>
                        <ul>
                            <li><a class="white-text" href="#!">Alumni</a></li>
                            <li><a class="white-text" href="#!">Ouders</a></li>
                            <li><a class="white-text" href="#!">Decanen</a></li>
                            <li><a class="white-text" href="#!">Zakendoen met DZH</a></li>
                        </ul>
                    </div>

                </div>
            </div>

            <div class="footer-copyright">
                <div class="container">
                    Made by <a class="blue-text text-lighten-3" href="https://sidoi.nl/">Sidoi</a>
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
