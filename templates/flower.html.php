<h2><?= $heading ?></h2>
<div class="header flower">
	<div></div>
	<div>Name</div>
	<div>Variety</div>
	<div>Container</div>
	<div></div>
</div>

<?php foreach ($flowers as $row): ?>
	
	<div class="output flower">
		<div class="edit">
		<a class="btn" 
			 href="/flowers/public/flower/addEdit?flowerid=<?=$row['flowerid']?>">
			 edit
		</a>
		</div>
		<?php foreach ($row as $key => $field): ?>
			<div class="field <?= $key ?>">
				<?= ($field == '' ? $key:$field) ?>
			</div>
		<?php endforeach; ?>

		<form action="/flowers/public/flower/delete" method="post">
			<input type="hidden" 
						 name="flowerid"
						 value="<?= $row['flowerid'] ?>">
			<input type="submit" value="delete" class="btn">
		</form>
	</div>
	<hr></hr>
<?php endforeach; ?>	
