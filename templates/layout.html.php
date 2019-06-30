<!DOCTYPE html>
<html>
<head>
	<title><?=$title?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet"> -->
	<link rel="stylesheet" href="/flowers/public/css/style.css">
	<link rel="icon" href="/flowers/public/icon/flowerBlue144.png" type="image/png"> 

</head>
<body>
	<div id="page">
		<header>
			<div class="banner three">
				<img 
					src="/flowers/images/GeraniumLavender500x375.jpg" 
					alt="geranium">
		
				<img 
					src="/flowers/images/MillionBellsBlue500x375.jpg" 
					alt="million bells">

				<img 
					src="/flowers/images/RedPurpleFuschia500x375.jpg" 
					alt="fuschia">
			</div>
		</header>
		<nav>
			<ul>
				<li><a href="/flowers/public/flower/home">Home</a></li>
				<li><a class="arrow" href="#">Flowers</a>
				  <ul>
				  	<li>
				  		<a href="/flowers/public/flower/list">
				  				List Flowers
				  		</a>
				  	</li>
				  	<li>
				  		<a href="/flowers/public/flower/addEdit">
				  			Add Flower
				  		</a>
				  	</li>
				  </ul>
				</li>  
				<li><a class="arrow" href="#">Prices</a>
				  <ul>
				  	<li>
				  		<a href="/flowers/public/price/list">
				  			List Prices
				  		</a>
				  	</li>
				  	<li>
				  		<a href="/flowers/public/price/addEdit">
				  			Add Price
				  		</a>
				  	</li>
				  </ul>
				 </li> 
			</ul>
		</nav>
		<main>
			<?= $output ?>
		</main>
		<footer></footer>
	</div>	
</body>
</html>