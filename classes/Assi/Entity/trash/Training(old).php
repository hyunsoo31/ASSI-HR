<?php
namespace Assi\Entity;

class Training
{
  public $id;
  public $title;
  public $dateOfUpdated;


  public function __construct(\Rheebros\DatabaseTable $employeesTable, \Rheebros\DatabaseTable $jokeCategoriesTable)
  {
    $this->employeesTable = $employeesTable;
    $this->jokeCategoriesTable = $jokeCategoriesTable;
  }

  public function getAuthor()
  {
    if (empty($this->author)) {
      $this->author = $this->authorsTable->findById($this->authorid);
    }
    return $this->author;
  }
  
	public function addCategory($categoryId) {
		$jokeCat = ['jokeId' => $this->id, 'categoryId' => $categoryId];

		$this->jokeCategoriesTable->save($jokeCat);
	}
  public function hasCategory($categoryId) {
    $jokeCategories = $this->jokeCategoriesTable->find('jokeId', $this->id);

    foreach ($jokeCategories as $jokeCategory) {
      if ($jokeCategory->categoryId == $categoryId) {
        return true;
      }
    }
  }
  public function clearCategories() {
		$this->jokeCategoriesTable->deleteWhere('jokeId', $this->id);
	}
}