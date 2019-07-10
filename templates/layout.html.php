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
	<div class="page">
		<nav class="top">
			<ul>
				<li>
					<a class="logo" href="/flowers/public/flower/home">
						✽
					</a>
				</li>
				<li>
					<a href="/flowers/public/flower/list">
						Flowers
					</a>
				</li>  
				<li>
					<a href="/flowers/public/price/list">
						Prices
					</a>
				 </li> 
				<li>
					<a href="/flowers/public/user/list">
						Users
					</a>
				 </li> 
			</ul>
		</nav>
		<header>
				<h1>
					<span class="yellow">✽</span>
					Happy
					<span class="spin yellow">&#x2600</span> 
					Planting 
					<span class="yellow">✽</span>
				</h1>
		</header>
		<nav class="side left">
			<ul>
				<li>Flowers <span class="arrow"> &#x25bc </span>
					<ul>
						<li>
							<a href="/flowers/public/flower/list">
								List Flowers
							</a>		
						</li>
						<li>
							<a href="/flowers/public/flower/addEdit">
								Add Flowers
							</a>		
						</li>
					</ul>		
				</li>
				<li>Prices <span class="arrow"> &#x25bc </span>
					<ul>
						<li>
							<a href="/flowers/public/price/list">
								List Prices
							</a>
						</li>
						<li>
							<a href="/flowers/public/price/addEdit">
							Add Prices
							</a>
						</li>
					</ul>
				</li>
				<li>Users <span class="arrow"> &#x25bc </span>
					<ul>
						<li>
							<a href="/flowers/public/user/list">
								List Users
							</a>	
						</li>
						<li>
							<a href="/flowers/public/user/update">
								Add Users
							</a>	
						</li>
					</ul>
				</li>
			</ul>
		</nav>
		<main>
			<?= $output ?>
		</main>
		<section class="side right">
			
		</section>
		<footer></footer>
	</div>	
</body>
</html>