<h2><?= $heading ?></h2>
<form action="" method="post">
	<!-- collect data to insert into price table -->
	<div class="input">
		<label for="container">Container</label>
		<input type="text" 
					 id="container" 
					 name="price[container]"
					 maxlength="40"
					 value="<?= $price['container'] ?? '' ?>"
					 <?= ($price['container'] != '') ? "readonly":"" ?>
					 required >
		<label for="retail">Retail Price</label>
		<input type="text" 
					 id="retail"
					 name="price[retail]"
					 value="<?= $price['retail'] ?? '' ?>" 
					 pattern="[0-9]+(\.[0-9][0-9]?)?">
		<label for="wholesale">Wholesale Price</label>
		<input type="text" 
				   id="wholesale" 
					 name="price[wholesale]" 
					 value="<?= $price['wholesale'] ?? '' ?>" 
				   pattern="[0-9]+(\.[0-9][0-9]?)?">
		<a href="/flowers/public/price/list" class="btn cancel">Cancel</a>		   
		<button type="submit">Submit</button>
	</div>
</form>