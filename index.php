<!DOCTYPE HTML>
<html>
	<head>
		<title>Team Octocat Storefront Group Project</title>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="css/storefront.css" />
		<script language="javascript" src="../js/cart.js"></script>
	</head>
	<body>
		<?php include "./php/header.php" ?>
		<br>
		<div class="bodywrap">
			<h1 class="herotx homebnr">Welcome to the Team Octocat Asset Storefront!</h1>
			<h1>Want to kickstart your game or take it to the <b>next level?</b></h1>
			Check out our inventory of literally tens of products to be used in your project here!<br>
			<br>
			<?php
				$server='localhost';
				$user="brent";
				$password = "Student123!";
				$database = "Octocat";
				$connection = new mysqli($server, $user, $password, $database);
				
				$query = "SELECT * FROM Product p JOIN ProductType pt ON p.PRODUCTTYPE_ID = pt.PRODUCTTYPE_ID WHERE pt.producttype='3D Models';";
				$result = $connection->query($query);
				$count = mysqli_num_rows($result);
				
				echo "<div id=\"wrapper\">3D Models<div id=\"products\"><table align=\"left\" bgcolor=\"lightblue\"><thead><tr>";
				
				for ($i = 0; $i < $count; $i++)
				{
					echo "<th><span class=\"product\" /></th>";
				}
				echo "</tr></thead><tr>";
				
				while($record = $result->fetch_assoc())
				{
					$id = $record['PRODUCT_ID'];
					$prod = $record['productname'];
					$desc = $record['description'];
					$price = $record['price'];
					$size = $record['filesizemb'];
					$tris = $record['triangles'];
					$verts = $record['vertices'];
					$rigg = $record['rigged']? 'Yes': 'No';
					$anim = $record['animated']? 'Yes': 'No';
					$loc = $record['imagelocation'];
				
					echo "<td><table bgcolor=\"#FFEFD5\"><col width=\"200px\" /><tr>";
					echo "<td align=\"center\" class=\"buttonIn\">";
					echo "<a href=\"./php/item_form.php?pid=$id\"><img src=\"$loc\" width=\"200\" height=\"200\"></a><br>";
					echo "<br><b>Product Name:</b> $prod<br>";
					echo "<b>Model Triangles:</b> $tris<br>";
					echo "<b>Vertices:</b> $verts<br>";
					echo "<b>Animated:</b> $anim<br>";
					echo "<b>Rigged Geometry:</b> $rigg<br>";
					echo "<b>Size:</b> $size MB<br>";
					echo "<h3>\${$price}</h3></td></table></td>";
				}
				
				echo "</tr></table></td></tr></table></div></div><br>";
				
				$query = "SELECT * FROM Product p JOIN ProductType pt ON p.PRODUCTTYPE_ID = pt.PRODUCTTYPE_ID WHERE pt.producttype='Scripts';";
				$result = $connection->query($query);
				$count = mysqli_num_rows($result);
				
				echo "<div id=\"wrapper\">Scripts<div id=\"products\"><table align=\"left\" bgcolor=\"lightblue\"><thead><tr>";
				
				for ($i = 0; $i < $count; $i++)
				{
					echo "<th><span class=\"product\" /></th>";
				}
				echo "</tr></thead><tr>";
								
				while($record = $result->fetch_assoc())
				{
					$id = $record['PRODUCT_ID'];
					$prod = $record['productname'];
					$desc = $record['description'];
					$price = $record['price'];
					$size = $record['filesizemb'];
					$loc = $record['imagelocation'];
					$lines = $record['codelines'];
				
					echo "<td><table bgcolor=\"#FFEFD5\"><col width=\"200px\" /><tr>";
					echo "<td align=\"center\" class=\"buttonIn\">";
					echo "<a href=\"./php/item_form.php?pid=$id\"><img src=\"$loc\" width=\"200\" height=\"200\"></a><br>";
					echo "<br><b>Product Name:</b> $prod<br>";
					echo "<b>Size:</b> $size MB<br>";
					echo "<b>Lines:</b> $lines<br>";
					echo "<h3>\${$price}</h3></td></table></td>";
				}
				
				echo "</tr></table></td></tr></table></div></div><br>";
				
				$query = "SELECT * FROM Product p JOIN ProductType pt ON p.PRODUCTTYPE_ID = pt.PRODUCTTYPE_ID WHERE pt.producttype='Audio';";
				$result = $connection->query($query);
				$count = mysqli_num_rows($result);
				
				echo "<div id=\"wrapper\">Sound FX<div id=\"products\"><table align=\"left\" bgcolor=\"lightblue\"><thead><tr>";
				
				while($record = $result->fetch_assoc())
				{
					$id = $record['PRODUCT_ID'];
					$prod = $record['productname'];
					$desc = $record['description'];
					$price = $record['price'];
					$size = $record['filesizemb'];
					$loc = $record['imagelocation'];
					$length = $record['lengthsec'];
				
					echo "<td><table bgcolor=\"#FFEFD5\"><col width=\"200px\" /><tr>";
					echo "<td align=\"center\" class=\"buttonIn\">";
					echo "<a href=\"./php/item_form.php?pid=$id\"><img src=\"$loc\" width=\"200\" height=\"200\"></a><br>";
					echo "<br><b>Product Name:</b> $prod<br>";
					echo "<b>Size:</b> $size MB<br>";
					echo "<b>Length:</b> $length sec<br>";
					echo "<h3>\${$price}</h3></td></table></td>";
				}
				
				echo "</tr></table></td></tr></table></div></div><br>";
				
				$connection->close();
			?>
		</div>
		<?php include "./html/footer.html" ?>
	</body>
</html>
