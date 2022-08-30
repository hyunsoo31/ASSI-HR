<?php
namespace Assi\Controllers;
use \Rheebros\DatabaseTable;
use \Rheebros\Authentication;

class Training {
  private $employeesTable;
  private $trainingTable;
  private $trainingInfoTable;
  private $authentication;

  public function __construct(DatabaseTable $trainingTable, DatabaseTable $employeesTable, DatabaseTable $trainingInfoTable, Authentication $authentication)
  { 
    $this -> trainingTable = $trainingTable;
    // $this -> programmingTable = $programmingTable;
    $this -> employeesTable = $employeesTable;
    $this -> trainingInfoTable = $trainingInfoTable;
    $this -> authentication = $authentication;
  }

  public function list() {

    $page = $_GET['page'] ?? 1;
    $offset = ($page-1)*10;

    $training = $this->trainingTable->findAll('dateOfUpdated DESC', 10, $offset);  
    $totalTraining = $this->trainingTable->total();
    $numPages = ceil($totalTraining/10);
    	

    // if (isset($_GET['category']))
	// 	{
	// 	 $training_info = $this->trainingInfoTable->findById($_GET['category']);
	// 	 $training = $training_info->getJokes(5, $offset2);
    //      $totalJokes2 = $training_info->getNumJokes();
    //      $numPages = ceil($totalJokes2/5);
	// 	}
	// 	else
	// 	{
	// 	 $jokes = $this->jokesTable->findAll('jokedate DESC', 10, $offset);  
    //      $totalJokes = $this->jokesTable->total();
    //      $numPages = ceil($totalJokes/10);
	// 	}		
 
    $title = 'Training List';
  
    // // $totalJokes = totalJokes($pdo, 'joke');
    //   $totalJokes = $this->jokesTable->total();
  
  
    // // 버퍼 저장 시작
    // ob_start();
    // //템플릿을 include한다. PHP 코드가 실행되지만 결과 HTML은 브라우저로 전송되지 않고 버퍼에 저장된다.
    // $output = include  __DIR__ .'/../templates/jokes.html.php';
  
    // // 출력 버퍼의 내용을 읽고 $output 변수에 저장한다. $output은 layout.html.php에서 사용된다.
  
    // $output = ob_get_clean();

    // return ['output' => $output, 'title' => $title];

   
    $author = $this->authentication->getUser();
    return [
    'template'=> 'training.html.php',
     'title'=>$title,
     'variables'=> [
       'totalTraining' => $totalTraining,
       'numPages' => $numPages,
       'training' => $training,
       'user' => $author, //  'userId' =>$author->id ?? null,
      //  'categories' =>$this->categoriesTable->findAll(),
       'currentPage' => $page
      //  'categoryId' => $_GET['category'] ?? null
      ]
    ];
    
  }

  // public function list2() {

  //   $page = $_GET['page'] ?? 1;
  //   $offset = ($page-1)*10;
  //   $offset2 = ($page-1)*5;

  //   if (isset($_GET['category']))
	// 	{
	// 		$category = $this->categoriesTable->findById($_GET['category']);
	// 		$progs = $category->getJokes(5, $offset2);
  //     $totalJokes2 = $category->getNumJokes();
  //     $numPages = ceil($totalJokes2/5);
	// 	}
	// 	else
	// 	{
	// 		$progs = $this->programmingTable->findAll('prog_date DESC', 10, $offset);  
  //     $totalProgramming = $this->programmingTable->total();
  //     $numPages = ceil($totalProgramming/10);
	// 	}		
 
  //   $title = '프로그래밍 글 목록';

  //   $totalProgramming = $this->programmingTable->total();
  //   $author = $this->authentication->getUser();
  //   return [
  //   'template'=> 'programming.html.php',
  //    'title'=>$title,
  //    'variables'=> [
  //      'totalProgramming' => $totalProgramming,
  //      'numPages' => $numPages,
  //      'progs' => $progs,
  //      'user' => $author, //  'userId' =>$author->id ?? null,
  //      'categories' =>$this->categoriesTable->findAll(),
  //      'currentPage' => $page,
  //      'categoryId' => $_GET['category'] ?? null
  //     ]
  //   ];
    
  // }
  public function home() {

    // $title = "인터넷 유머 세상";

    // ob_start();
    // include __DIR__ . '/../templates/home.html.php';
    // $output = ob_get_clean();
    // return ['output' => $output, 'title' => $title];

    $title = 'Assi market';
    return ['template' => 'home.html.php', 'title' => $title];
  }

//   public function delete() {
//     $author = $this-> authentication->getUser();
//     $joke = $this->jokesTable->findById($_POST['id']);

//     if($joke->authorid != $author->id && !$author->hasPermission(\Ijdb\Entity\Author::DELETE_JOKES)){
//       return;
//     }
    
//     $this->jokesTable->delete($_POST['id']);
    
//     header('location: /joke/list');
//   }


  // public function delete() {
  //   $author = $this-> authentication->getUser();

  //   if(isset($_GET['id'])) {
  //     $joke = $this->jokesTable->findById($_POST['id']);
  //     if($joke->authorid != $author->id){
  //       return;
  //     }
  //   }
  //   $this->jokesTable->delete($_POST['id']);
    
  //   // header('location: index.php?action=list');
  //   header('location: /joke/list');
  // }

  // public function edit() {
  //   if (isset($_POST['joke'])){
  //     $joke = $_POST['joke'];
  //     $joke['authorid'] = 1;
  //     $joke['jokedate'] = new \DateTime();

  //     $this->jokesTable->save($joke);

  //     // header('location: index.php?action=list');
  //     header('location: /joke/list');
  //   }
  //   else {
  //     if(isset($_GET['id'])) {
  //       $joke = $this->jokesTable->findById($_GET['id']);
  //     }
      
  //     $title = '유머 글 수정';
      
  //     // ob_start();

  //     // include __DIR__ . '/../templates/editjoke.html.php';

  //     // $output = ob_get_clean();
  //     // return ['output' => $output, 'title' => $title];

  //     return [
  //       'template'=>'editjoke.html.php',
  //       'title'=>$title,
  //       'variables' => [
  //         'joke' => $joke ?? null
  //         ]
  //       ];
  //   }
  // }

  
  //  ASSIASSIASSIASSIASSIASSIASSIASSIASSIASSIASSIASSI
  // public function saveEdit() {
  //   $authorObject = $this-> authentication->getUser();


  //   $joke = $_POST['joke'];
  //   $joke['jokedate'] = new \DateTime();
  
    
    


  //   $jokeEntity = $authorObject->addJoke($joke);
  //   $jokeEntity->clearCategories();
  

  //   foreach ($_POST['category'] as $categoryId) {
  //     $jokeEntity->addCategory($categoryId);
  //   }

  //   header('location: /joke/list');
  // }

  // public function edit() {
  //   $author = $this->authentication->getUser();
  //   $categories = $this->categoriesTable->findAll();

  //   if (isset($_GET['id'])) {
  //     $joke = $this->jokesTable->findById($_GET['id']);
  //   }

  //   $title = '유머 글 수정';

  //   return [
  //     'template' => 'editjoke.html.php',
  //     'title' => $title,
  //     'variables' => [ 'joke' => $joke ?? null, 'user' => $author, 'categories'=>$categories]
  //   ];
  // }
  // public function jokedetail() {
  //   $author = $this->authentication->getUser();
  //   $categories = $this->categoriesTable->findAll();

  //   if (isset($_GET['id'])) {
  //     $joke = $this->jokesTable->findById($_GET['id']);
  //   }

  //   $title = '유머 글 수정';

  //   return [
  //     'template' => 'jokedetail.html.php',
  //     'title' => $title,
  //     'variables' => [ 'joke' => $joke ?? null, 'user' => $author, 'categories'=>$categories]
  //   ];
  // }


}
