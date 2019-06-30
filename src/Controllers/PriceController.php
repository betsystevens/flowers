<?php
namespace Controllers;

use App\DatabaseTable;

class PriceController
{
	private $priceTable;
		
	public function __construct(DatabaseTable $priceTable) {
		$this->priceTable = $priceTable;
	}

	public function home() {
		return ['template' => 'home.html.php', 'title' => 'Home'];
	}

	public function list() {
		$title = "Prices";
		$prices = $this->priceTable->getAll();

		return [
			'template' => 'price.html.php',
			'title' => $title,
			'variables' => ['prices' => $prices]];
	}

	public function addEdit() {
		// has user entered input
		if (isset($_POST['price'])) {
			// is it add or update
			$found = $this->priceTable->findById($_POST['price']['container']);
			if ($found){
  				// update
  				$result = $this->priceTable->update($_POST['price']);
  			} else {
  				//insert
  				$fields = $_POST['price'];
  				$result = $this->priceTable->insert($fields);
  			}
	  		header("location: /flowers/public/price/list");
	  	} else {
	  		$title = 'Add Price'; // default
	  		// is it add or update
	  		if (isset($_GET['container'])) {
	  			// update
	  			$price = $this->priceTable->findById($_GET['container']);
	  			$title = 'Edit Price';
	  		}
		}	
		return [
			'template' => 'inputPrice.html.php', 
			'title' => $title,
			'variables' => ['price' => $price]];	
	}

	public function delete() {

		$this->priceTable->deleteById($_POST['container']);
		header('location: /flowers/public/price/list');
						
	}
}