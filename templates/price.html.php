<h2><?= $title ?></h2>
<div class="header price">
	<div></div>
	<div>Container</div>
	<div>Retail</div>
	<div>Wholesale</div>
	<div></div>
</div>
			
<?php foreach ($prices as $row): ?> 

		<div class="output price">
			<a class="btn" 
				 href="/flowers/public/price/addEdit?
				 			container=<?=$row['container']?>">
				 edit
			</a>
			
			<?php foreach ($row as $field): ?>
				<div class="field">
					<?= $field ?>
				</div>
			<?php endforeach; ?>

			<form action="/flowers/public/price/delete" method="post">
				<input type="hidden" 
							 name="container"
							 value="<?= $row['container'] ?>" >
				<input type="submit" value="delete" class="btn">
			</form>
		</div>
<?php endforeach; ?>


