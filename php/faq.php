<!DOCTYPE HTML>
<html>
	<head>
		<title>Team Octocat Storefront Group Project</Title>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="../css/storefront.css">
		<script language="javascript" src="../js/cart.js"></script>
	</head>
	<body>
		<?php include "../php/header.php" ?>
		<br>
		<div class="bodywrap">
			<h1 class="herotx sub1 sub3">Frequently Asked Questions</h1>
			<h3>Common Questions:</h3>
			<ul>
				<li>
					Q: How many people are on Team Octocat?<br>
					A: Four! Brent, Azuri, Rafael, and Wajahath.
				</li><br>
				<li>
					Q: Why did you pick the name, "Team Octocat?"<br>
					A: Because we're working with GitHub and are lazy!
				</li><br>
				<li>
					Q: What inspired the Game Developer asset store?<br>
					A: Some of us are gamers who aspire to make games in the future!
				</li><br>
				<li>
					Q: Who did most of the work on this project?<br>
					A: By far: Brent! It's kind of sad, actually!
				</li><br>
				<li>
					Q: What grade do you expect to get on this project<br>
					A: Absolutely an A+. If an A++ were possible, we would expect that.
				</li><br>
				<li>
					Q: What games do you like to play?<br>
					A: It's varied! Check the "About" section to find our favorites!
				</li>
			</ul>
			<form>
				<fieldset>
					<legend>Ask a question</legend>
					<label for="question">Question: </label>
					<input type="text" minlength="10" required placeholder="Go ahead and ask us anything!" name="question"/>
					<br>
					<label for="email">Email Address: </label>
					<input type="text" minlength="6" required placeholder="Email Address" name="email"/>
				</fieldset>
				<br>
				<input type="submit" value="Submit">
			</form>
		</div>
		<?php include "../html/footer.html" ?>
	</body>
</html>
