<?php
namespace Controllers;

use App\DatabaseTable;

class FlowerController
{
	private $flowerTable;

	public function __construct(DatabaseTable $flowerTable) {
		$this->flowerTable = $flowerTable;
	}

	public function home() {
		return['template' => 'home.html.php', 'title' => 'Home'];
	}

	public function list() {
		$title = 'Flowers';
		$flowers = $this->flowerTable->getAll();

		return [
			'template' => 'flower.html.php',
			'title' => $title,
			'variables' => [
				'flowers' => $flowers,
				'heading' => 'Flowers'
			]
		];
	}

	public function addEdit() {
		// has user entered input
		if (isset($_POST['flower'])) {
			// is it add or update
			if (
					(isset ($_POST['flower']['flowerid'])) &&
					(($_POST['flower']['flowerid']) == '')
				)
				{
					// it is add so insert
					$fields = $_POST['flower'];
					// unset flowerid so mysql will
					// autoincrement a unique id on insert
					unset($fields['flowerid']);
					$this->flowerTable->insert($fields);
				} else {
					$this->flowerTable->update($_POST['flower']);
				}
				header("location: /flowers/public/flower/list");
		} else {
			$title = 'Add Flower'; // default title
			$action = 'Add';
			// is it add or update
			if (isset($_GET['flowerid'])) {
				// udpate
				$flower = $this->flowerTable->findById($_GET['flowerid']);
				$title = 'Edit Flower';
				$action = 'Edit';
			}
		}
		return [
			'template' => 'inputFlower.html.php',
			'title' => $title,
			'variables' => [
				'flower' => $flower,
				'heading' => $action . ' Flower'
			]
		];
	}

	public function delete() {

		$this->flowerTable->deleteById($_POST['flowerid']);
		header('location: /flowers/public/flower/list');

	}

}