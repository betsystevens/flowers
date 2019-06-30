<h2><?= $title ?></h2>
<form action="/flowers/public/flower/addEdit" method="post">
	<div class="input">
		<input type="hidden" 
					 name="flower[flowerid]"
					 value="<?= $flower['flowerid'] ?? '' ?>">
		<label for="name">Flower Name</label>
		<input type="text" 
					 id="name"
					 name="flower[fname]"
					 value="<?= $flower['fname'] ?? '' ?>" 
					 required >
		<label for="variety">Flower Variety</label>
		<input type="text" 
					 id="variety"
					 name="flower[fvariety]"
					 value="<?= $flower['fvariety'] ?? '' ?>" 
					 required >
		<label for="container">Container</label>
		<input type="text" 
					 id="container"
					 name="flower[fcontainer]"
					 value="<?= $flower['fcontainer'] ?? '' ?>" 
					 required >
		<label for="title">Title</label>
		<input type="text"
					 id="title"
					 name="flower[title]"
					 value="<?= $flower['title'] ?? '' ?>">
		<label for="blurb">Blurb</label>
		<textarea id="blurb"
						name="flower[blurb]"
						rows="4"><?= $flower['blurb'] ?? '' ?></textarea> 
		<a href="/flowers/public/flower/list" class="btn cancel">Cancel</a>
		<button type="submit" class="btn">Submit</button>
	</div>
	
</form>