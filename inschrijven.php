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
				<li><a href="locaties.html">Locaties</a></li>
				<li><a href="opleidingen.html">Opleidingen</a></li>
				<li><a href="inschrijven.php">Inschrijven</a></li>
				<li><a href="schoolinfo.html">Over de school</a></li>
				
				<li><a href="fotos.html">Foto's</a></li>
			</ul>

			<ul id="nav-mobile" class="side-nav">
				<li><a href="index.html">Home</a></li>
				<li><a href="locaties.html">Locaties</a></li>
				<li><a href="opleidingen.html">Opleidingen</a></li>
				<li><a href="inschrijven.php">Inschrijven</a></li>
				<li><a href="schoolinfo.html">Over de school</a></li>
				<li><a href="fotos.html">Foto's</a></li>
			</ul>

			<a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
		</div>
	</nav>

	<br><br><div class="container">
		<center><h1>Inschrijven</h1>
			<h4>Hier kun je je inschrijven voor onze opleidingen, doe het snel nu het nog kan!</h4></center><br><br>
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

				<div class="card white">
					<div class="card-content black-text">
						<span class="card-title">Inschrijfformulier</span>
						<p>
							<div class="row">
								<form class="col s12" method = "POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
									<div class="row">
										<div class="input-field col s6">
											<input placeholder="Hans Jansen" id="name" type="text" class="validate" required>
											<label for="name">* Volledige naam</label>
											<span class = "error"><?php echo $nameErr;?></span>
										</div>
										<div class="input-field col s6">
											<input placeholder="Hans123@gmail.com" id="email" type="email" class="validate" required>
											<label for="email">* E-mail: </label>
											<span class = "error"><?php echo $emailErr;?></span>
										</div>
									</div>

									
									<div class="row">
										<div class="input-field col s12">
											<input placeholder="0612345678" id="course" type="text">
											<label for="course">Telefoon nummer</label>
											<span class = "error"><?php echo $websiteErr;?></span>
										</div>
									</div>

									<div class="row">
										<div class="input-field col s12">
											<textarea id="opmerkingen" name="text" class="materialize-textarea" data-length="256"></textarea>
											<label for="opmerkingen">Eventuele opmerkingen</label>
										</div>
									</div>

									* Geslacht:
									<p>
										<input name="gender" type="radio" id="test1" value="vrouw" checked />
										<label for="test1">Vrouw</label>
									</p>
									<p>
										<input name="gender" type="radio" id="test2" value="man"/>
										<label for="test2">Man</label>
									</p>
									<span class = "error"><?php echo $genderErr;?></span>
									<br><br>* Opleiding:
									<p>
										<input name="subject[]" type="radio" id="test3" value="Informatica" checked />
										<label for="test3">Informatica</label>
									</p>
									<p>
										<input name="subject[]" type="radio" id="test4" value="Werktuigbouwkunde"/>
										<label for="test4">Werktuigbouwkunde</label>
									</p>
									<br><br>
									<span class = "error">* <?php echo "Hiermee geef je aan akkoord te gaan met onze Terms of agreement (verplicht)<br>";?></span>
									<span class = "error">* Verplicht veld.</span>
								</form>
							</p>
						</div>
						<div class="card-action">
							<input class="btn waves-effect waves-light" type = "submit" name = "Versturen" value = "Versturen">
							<?php if(!isset($_POST['checked'])){ }?>
						</div>
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
			</div>

			<footer class="page-footer blue">
				<div class="container">
					<div class="row">

						<div class="col l4 s12">
							<h5 class="white-text">Locaties</h5>
							<ul>
								<li><a class="white-text" href="locaties.html">Locaties bekijken.</a></li>
							</ul>
						</div>

						<div class="col l4 s12">
							<h5 class="white-text">Studeren bij Zwolle hogeschool</h5>
							<ul>
								<li><a class="white-text" href="inschrijven.php">Inschrijven</a></li>
								<li><a class="white-text" href="schoolinfo.html">Meer info</a></li>
								<li><a class="white-text" href="fotos.html">Foto's</a></li>
							</ul>
						</div>

						<div class="col l4 s12">
							<h5 class="white-text">Over Zwolle hogeschool</h5>
							<ul>
								<li><a class="white-text" href="schoolinfo.html">Meer informatie</a></li>
							</ul>
						</div>

					</div>
				</div>

				<div class="footer-copyright">
					<div class="container">
						Made by <a class="blue-text text-lighten-3" href="#!">Knymams</a>
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
			<script type="text/javascript">
				$(document).ready(function() {
					$('input#input_text, textarea#textarea1').characterCounter();
				});
			</script>
		</body>
		</html>
