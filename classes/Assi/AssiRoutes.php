<?php
namespace Assi;
class AssiRoutes implements \Rheebros\Routes
{

  // private $authorsTable;
  // private $jokesTable;
  // private $categoriesTable;
  // private $authentication;
  private $employeesTable;
  private $trainingTable;
  private $employeeTrainingsTable;
  private $authentication;


  public function __construct()
  {
    include __DIR__ . '/../../includes/DatabaseConnection.php';
    $this -> employeesTable = new \Rheebros\DatabaseTable($pdo, 'employee', 'id', '\Assi\Entity\Employee',[&$this->trainingTable, &$this->employeeTrainingsTable]);
    $this->trainingTable = new \Rheebros\DatabaseTable($pdo, 'training','id', '\Assi\Entity\Training', [&$this->employeesTable, &$this->employeeTrainingsTable]);
    //$this->employeeTrainingsTable =  new \Rheebros\DatabaseTable($pdo, 'training_information2', 'TR_ID');
    $this->employeeTrainingsTable =  new \Rheebros\DatabaseTable($pdo, 'employeetraining', 'id', '\Assi\Entity\EmployeeTraining', [&$this->employeesTable, &$this->trainingTable]);
    // $this->programmingTable = new \Rheebros\DatabaseTable($pdo, 'programming', 'prog_id', '\Ijdb\Entity\Programming', [&$this->authorsTable, &$this->jokeCategoriesTbale]);
    // $this->authorsTable =  new \Rheebros\DatabaseTable($pdo, 'author', 'id', '\Ijdb\Entity\Author', [&$this->jokesTable]);
    // $this->categoriesTable =  new \Rheebros\DatabaseTable($pdo, 'category', 'id', '\Ijdb\Entity\Category', [&$this->jokesTable, &$this->jokeCategoriesTable]);
    // $this->jokeCategoriesTable =  new \Rheebros\DatabaseTable($pdo, 'joke_category', 'categoryId');
    $this->authentication =  new \Rheebros\Authentication($this->employeesTable, 'EEID', 'password', 'firstName');
  }

  public function getRoutes(): array
  {
    // 생성자로 옮겨서 삭제한 코드
    // include __DIR__ . '/../../includes/DatabaseConnection.php';
    // $jokesTable = new \Hanbit\DatabaseTable($pdo, 'joke', 'id');
    // $authorsTable = new \Hanbit\DatabaseTable($pdo, 'author', 'id');
    // $jokeController = new \Ijdb\Controllers\Joke($jokesTable, $authorsTable);
    // $authorController = new \Ijdb\Controllers\Register($authorsTable);

    $trainingController = new \Assi\Controllers\Training($this->trainingTable);
    $employeesController = new \Assi\Controllers\Register($this->employeesTable, $this->trainingTable, $this->authentication, $this->employeeTrainingsTable);
    $loginController = new \Assi\Controllers\Login($this->authentication);
    $employeesController2 = new \Assi\Controllers\Employee($this->employeesTable, $this->trainingTable, $this->authentication, $this->employeeTrainingsTable);
    $employeeTrainingController = new \Assi\Controllers\EmployeeTraining($this->employeesTable, $this->employeeTrainingsTable, $this->authentication);
    // $categoryController = new \Assi\Controllers\Category($this->categoriesTable);

    // $jokeController = new \Assi\Controllers\Joke($this->jokesTable, $this->authorsTable, $this->categoriesTable, $this->authentication);
    // $programmingController = new \Assi\Controllers\Programming($this->programmingTable, $this->authorsTable, $this->categoriesTable, $this->authentication);
    // $authorController = new \Assi\Controllers\Register($this->authorsTable);
    // $loginController = new \Assi\Controllers\Login($this->authentication);
    // $categoryController = new \Assi\Controllers\Category($this->categoriesTable);

    $routes = [
      'employees/permissions' => [
        'GET' => [
          'controller' => $employeesController,
          'action' => 'permissions'
        ],
        'POST' => [
          'controller' => $employeesController,
          'action' => 'savePermissions'
        ],
        'login' => true,
        'permissions' => \Assi\Entity\Employee::EDIT_USER_ACCESS
      ],
      'permission/error' => [
        'GET' => [
          'controller' => $loginController,
          'action' => 'permissionError'
        ]
      ],
      'employees/list' => [
        'GET' => [
          'controller' => $employeesController2,
          'action' => 'list'
        ],
        'login' => true,
        'permissions' => \Assi\Entity\Employee::LIST_USER
      ],
      'employee/permissions' => [
        'GET' => [
          'controller' => $employeesController,
          'action' => 'permissions'
        ],
        'POST' => [
          'controller' => $employeesController,
          'action' => 'savePermissions'
        ],
        'login' => true,
        'permissions' => \Assi\Entity\Employee::EDIT_USER_ACCESS
      ],
      'permission/error' => [
        'GET' => [
          'controller' => $loginController,
          'action' => 'permissionError'
        ]
      ],
      'training/list' => [
        'GET' => [
          'controller' => $trainingController,
          'action' => 'list'
        ],
        'login' => true
      ],
      'training/edit' => [
        'POST' => [
          'controller' => $trainingController,
          'action' => 'saveEdit'
        ],
        'GET' => [
          'controller' => $trainingController,
          'action' => 'edit'
        ],
        'login' => true,
        'permissions' => \Assi\Entity\Employee::LIST_TR
      ],
      'training/list' => [
        'GET' => [
          'controller' => $trainingController,
          'action' => 'list'
        ],
        'login' => true,
        'permissions' => \Assi\Entity\Employee::LIST_TR
      ],
      'training/delete' => [
        'POST' => [
          'controller' => $trainingController,
          'action' => 'delete'
        ],
        'login' => true,
        'permissions' => \Assi\Entity\Employee::LIST_TR
      ],
      'training1_kor' => [
        'GET' => [
          'controller' => $trainingController,
          'action' => 'training1'
        ]
      ],
      'training1_eng' => [
        'GET' => [
          'controller' => $trainingController,
          'action' => 'training1'
        ]
      ],
      'training1_spn' => [
        'GET' => [
          'controller' => $trainingController,
          'action' => 'training1'
        ]
      ],
      'training2_kor' => [
        'GET' => [
          'controller' => $trainingController,
          'action' => 'training2'
        ]
      ],
      'training2_eng' => [
        'GET' => [
          'controller' => $trainingController,
          'action' => 'training2'
        ]
      ],
      'training2_spn' => [
        'GET' => [
          'controller' => $trainingController,
          'action' => 'training2'
        ]
      ],
      'training3_kor' => [
        'GET' => [
          'controller' => $trainingController,
          'action' => 'training3'
        ]
      ],
      'training3_eng' => [
        'GET' => [
          'controller' => $trainingController,
          'action' => 'training3'
        ]
      ],
      'training3_spn' => [
        'GET' => [
          'controller' => $trainingController,
          'action' => 'training3'
        ]
      ],
      'training/uploads' => [
        'GET' => [
          'controller' => $trainingController,
          'action' => 'list2'
        ],
        'login' => true,
        'permissions' => \Assi\Entity\Employee::LIST_TR
      ],
      'training/upload' => [
        'POST' => [
          'controller' => $trainingController,
          'action' => 'upload'
        ],
        'login' => true,
        'permissions' => \Assi\Entity\Employee::LIST_TR
      ],

      'lastcheck_kor' => [
        'GET' => [
          'controller' => $trainingController,
          'action' => 'lastcheck'
        ],
        'login' => true
      ],
      'lastcheck_eng' => [
        'GET' => [
          'controller' => $trainingController,
          'action' => 'lastcheck'
        ],
        'login' => true
      ],
      'lastcheck_spn' => [
        'GET' => [
          'controller' => $trainingController,
          'action' => 'lastcheck'
        ],
        'login' => true
      ],
      'lastcheck2_kor' => [
        'GET' => [
          'controller' => $trainingController,
          'action' => 'lastcheck2'
        ],
        'login' => true
      ],
      'lastcheck2_eng' => [
        'GET' => [
          'controller' => $trainingController,
          'action' => 'lastcheck2'
        ],
        'login' => true
      ],
      'lastcheck2_spn' => [
        'GET' => [
          'controller' => $trainingController,
          'action' => 'lastcheck2'
        ],
        'login' => true
      ],
      'lastcheck3_kor' => [
        'GET' => [
          'controller' => $trainingController,
          'action' => 'lastcheck3'
        ],
        'login' => true
      ],
      'lastcheck3_eng' => [
        'GET' => [
          'controller' => $trainingController,
          'action' => 'lastcheck3'
        ],
        'login' => true
      ],
      'lastcheck3_spn' => [
        'GET' => [
          'controller' => $trainingController,
          'action' => 'lastcheck3'
        ],
        'login' => true
      ],

      'review1_kor' => [
        'GET' => [
          'controller' => $trainingController,
          'action' => 'review1'
        ],
        'login' => true
      ],
      'review1_eng' => [
        'GET' => [
          'controller' => $trainingController,
          'action' => 'review1'
        ],
        'login' => true
      ],

      'review1_spn' => [
        'GET' => [
          'controller' => $trainingController,
          'action' => 'review1'
        ],
        'login' => true
      ],

      'review2_kor' => [
        'GET' => [
          'controller' => $trainingController,
          'action' => 'review2'
        ],
        'login' => true
      ],
      'review2_eng' => [
        'GET' => [
          'controller' => $trainingController,
          'action' => 'review2'
        ],
        'login' => true
      ],
      'review2_spn' => [
        'GET' => [
          'controller' => $trainingController,
          'action' => 'review2'
        ],
        'login' => true
      ],
      'review3_kor' => [
        'GET' => [
          'controller' => $trainingController,
          'action' => 'review3'
        ],
        'login' => true
      ],
      'review3_eng' => [
        'GET' => [
          'controller' => $trainingController,
          'action' => 'review3'
        ],
        'login' => true
      ],
      'review3_spn' => [
        'GET' => [
          'controller' => $trainingController,
          'action' => 'review3'
        ],
        'login' => true
      ],
      
      'test1_kor' => [
        'GET' => [
          'controller' => $trainingController,
          'action' => 'test1'
        ],
        'login' => true
      ],
      'test2_kor' => [
        'GET' => [
          'controller' => $trainingController,
          'action' => 'test2'
        ],
        'login' => true
      ],
      'test3_kor' => [
        'GET' => [
          'controller' => $trainingController,
          'action' => 'test3'
        ],
        'login' => true
      ],
      'test1_eng' => [
        'GET' => [
          'controller' => $trainingController,
          'action' => 'test1'
        ],
        'login' => true
      ],
      'test2_eng' => [
        'GET' => [
          'controller' => $trainingController,
          'action' => 'test2_eng'
        ],
        'login' => true
      ],
      'test3_eng' => [
        'GET' => [
          'controller' => $trainingController,
          'action' => 'test3'
        ],
        'login' => true
      ],
      'test1_spn' => [
        'GET' => [
          'controller' => $trainingController,
          'action' => 'test1'
        ],
        'login' => true
      ],
      'test2_spn' => [
        'GET' => [
          'controller' => $trainingController,
          'action' => 'test2_spn'
        ],
        'login' => true
      ],
      'test3_spn' => [
        'GET' => [
          'controller' => $trainingController,
          'action' => 'test3'
        ],
        'login' => true
      ],
      'fail1' => [
        'GET' => [
          'controller' => $employeesController2,
          'action' => 'fail1'
        ],
        'POST' => [
          'controller' => $employeesController2,
          'action' => 'saveEdit3'
        ],
        'login' => true
      ],
      'pass1' => [
        'GET' => [
          'controller' => $employeesController2,
          'action' => 'pass1'
        ],
        'POST' => [
          'controller' => $employeesController2,
          'action' => 'saveEdit3'
        ],
        'login' => true
      ],
      'certificate1' => [
        'GET' => [
          'controller' => $employeesController2,
          'action' => 'cert1'
        ],
        'login' => true,
        'permissions' => \Assi\Entity\Employee::USER_CREATE
      ],
      'certificate2' => [
        'GET' => [
          'controller' => $employeesController2,
          'action' => 'cert2'
        ],
        'login' => true,
        'permissions' => \Assi\Entity\Employee::USER_CREATE
      ],
      'certificate3' => [
        'GET' => [
          'controller' => $employeesController2,
          'action' => 'cert3'
        ],
        'login' => true,
        'permissions' => \Assi\Entity\Employee::USER_CREATE
      ],
      'fail2' => [
        'GET' => [
          'controller' => $employeesController2,
          'action' => 'fail2'
        ],
        'POST' => [
          'controller' => $employeesController2,
          'action' => 'saveEdit3'
        ],
        'login' => true
      ],
      'pass2' => [
        'GET' => [
          'controller' => $employeesController2,
          'action' => 'pass2'
        ],
        'POST' => [
          'controller' => $employeesController2,
          'action' => 'saveEdit3'
        ],
        'login' => true
      ],
      'fail3' => [
        'GET' => [
          'controller' => $employeesController2,
          'action' => 'fail3'
        ],
        'POST' => [
          'controller' => $employeesController2,
          'action' => 'saveEdit3'
        ],
        'login' => true
      ],
      'pass3' => [
        'GET' => [
          'controller' => $employeesController2,
          'action' => 'pass3'
        ],
        'POST' => [
          'controller' => $employeesController2,
          'action' => 'saveEdit3'
        ],
        'login' => true
      ],
      'employee/register' => [
        'GET' => [
          'controller' => $employeesController,
          'action' => 'registrationForm'
        ],
        'POST' => [
          'controller' => $employeesController,
          'action' => 'registerUser'
        ],
        'login' => true,
        'permissions' => \Assi\Entity\Employee::USER_CREATE
      ],
      'employee/success' => [
        'GET' => [
          'controller' => $employeesController,
          'action' => 'success'
        ]
      ],
      'login' => [
        'GET' => [
          'controller' => $loginController,
          'action' => 'loginForm'
        ],
        'POST' => [
          'controller' => $loginController,
          'action' => 'processLogin'
        ]
      ],
      'login/success' => [
        'GET' => [
          'controller' => $loginController,
          'action' => 'success'
        ],
        'login' => true
      ],
      'login/error' => [
        'GET' => [
          'controller' => $loginController,
          'action' => 'error'
        ]
      ],
      'logout' => [
        'GET' => [
          'controller' => $loginController,
          'action' => 'logout'
        ]
      ],
      'employee/detail' => [
        'GET' => [
          'controller' => $employeesController2,
          'action' => 'employeedetail2'
        ],
         'login' => true
      ],
      'employee/edit' => [
        'POST' => [
          'controller' => $employeesController,
          'action' => 'saveEdit'
        ],
        'GET' => [
          'controller' => $employeesController,
          'action' => 'edit'
        ],
        'login' => true
      ],
      'employee/delete' => [
        'POST' => [
          'controller' => $employeesController,
          'action' => 'delete'
        ],
        'login' => true,
        'permissions' => \Assi\Entity\Employee::DELETE_USER
      ],

      'employee/detail/edit' => [
        'POST' => [
          'controller' => $employeeTrainingController,
          'action' => 'saveEdit2'
        ],
        'GET' => [
          'controller' => $employeeTrainingController,
          'action' => 'edit2'
        ],
        'login' => true
      ],

      'orientation_kor' => [
        'GET' => [
          'controller' => $employeesController2,
          'action' => 'orientation'
        ],
         'login' => true
      ],
      'orientation_eng' => [
        'GET' => [
          'controller' => $employeesController2,
          'action' => 'orientation'
        ],
         'login' => true
      ],
      'orientation_spn' => [
        'GET' => [
          'controller' => $employeesController2,
          'action' => 'orientation'
        ],
         'login' => true
      ],

      'insurance' => [
        'GET' => [
          'controller' => $employeesController2,
          'action' => 'insurance'
        ],
         'login' => true
      ],
      'insurance_ga55_kor' => [
        'GET' => [
          'controller' => $employeesController2,
          'action' => 'insurance'
        ],
         'login' => true,
         'permissions' => \Assi\Entity\Employee::GA55
      ],
      'insurance_ga55_eng' => [
        'GET' => [
          'controller' => $employeesController2,
          'action' => 'insurance'
        ],
         'login' => true,
         'permissions' => \Assi\Entity\Employee::GA55
      ],
      'insurance_ga55_spn' => [
        'GET' => [
          'controller' => $employeesController2,
          'action' => 'insurance'
        ],
         'login' => true,
         'permissions' => \Assi\Entity\Employee::GA55
      ],
      'insurance_il70_kor' => [
        'GET' => [
          'controller' => $employeesController2,
          'action' => 'insurance'
        ],
         'login' => true,
         'permissions' => \Assi\Entity\Employee::IL70
      ],
      'insurance_il70_eng' => [
        'GET' => [
          'controller' => $employeesController2,
          'action' => 'insurance'
        ],
         'login' => true,
         'permissions' => \Assi\Entity\Employee::IL70
      ],
      'insurance_il70_spn' => [
        'GET' => [
          'controller' => $employeesController2,
          'action' => 'insurance'
        ],
         'login' => true,
         'permissions' => \Assi\Entity\Employee::IL70
      ],
      'insurance_pa88_kor' => [
        'GET' => [
          'controller' => $employeesController2,
          'action' => 'insurance'
        ],
         'login' => true,
         'permissions' => \Assi\Entity\Employee::PA88
      ],
      'insurance_pa88_eng' => [
        'GET' => [
          'controller' => $employeesController2,
          'action' => 'insurance'
        ],
         'login' => true,
         'permissions' => \Assi\Entity\Employee::PA88
      ],
      'insurance_pa88_spn' => [
        'GET' => [
          'controller' => $employeesController2,
          'action' => 'insurance'
        ],
         'login' => true,
         'permissions' => \Assi\Entity\Employee::PA88
      ],

      'insurance_form_ga55' => [
        'GET' => [
          'controller' => $employeesController2,
          'action' => 'insurance_form'
        ],
         'login' => true,
         'permissions' => \Assi\Entity\Employee::GA55
      ],
      'insurance_form_il70' => [
        'GET' => [
          'controller' => $employeesController2,
          'action' => 'insurance_form'
        ],
         'login' => true,
         'permissions' => \Assi\Entity\Employee::IL70
      ],
      'insurance_form_pa88' => [
        'GET' => [
          'controller' => $employeesController2,
          'action' => 'insurance_form'
        ],
         'login' => true,
         'permissions' => \Assi\Entity\Employee::PA88
      ],
      // 'training/delete' => [
      //   'POST' => [
      //     'controller' => $trainingController,
      //     'action' => 'delete'
      //   ],
      //   'login' => true,
      //   'permissions' => \Assi\Entity\Employee::EDIT_TR
      // ],
      'example' => [
        'GET' => [
          'controller' => $employeesController2,
          'action' => 'pdf'
        ]
      ],

      '' => [
        'GET' => [
          'controller' => $employeesController2,
          'action' => 'home'
        ]
      ]
    ];


    return $routes;

    // $method = $_SERVER['REQUEST_METHOD'];
    // $controller = $routes[$route][$method]['controller'];
    // $action = $routes[$route][$method]['action'];

    // return $controller->$action();
  }

  public function getAuthentication(): \Rheebros\Authentication
  {
    return $this->authentication;
  }

  public function checkPermission($permission) : bool {
    $user = $this->authentication->getUser();

    if($user && $user->hasPermission($permission)){
      return true;
    } else {
      return false;
    }
  }


    // public function callAction($route)
    //   {
    //     // include_once __DIR__ . '/../classes/Ijdb/DatabaseTable.php'; -> autoloader로 인해 필요 없어짐
    //     include __DIR__ . '/../../includes/DatabaseConnection.php';



    //     $jokesTable = new \Hanbit\DatabaseTable($pdo, 'joke', 'id');
    //     $authorsTable = new \Hanbit\DatabaseTable($pdo, 'author', 'id');

    //     $jokeController = new \Ijdb\Controllers\Joke($jokesTable, $authorsTable);

    //     $routes = [
    //       'joke/edit' => [
    //         'POST' => [
    //           'controller' => $jokeController,
    //           'action' => 'saveEdit'
    //         ],
    //         'GET' => [
    //           'controller' => $jokeController,
    //           'action' => 'edit'
    //         ]
    //       ],
    //       'joke/delete' => [
    //         'POST' => [
    //           'controller' => $jokeController,
    //           'action' => 'delete'
    //         ]
    //       ],
    //       'joke/ist' => [
    //         'GET' => [
    //           'controller' => $jokeController,
    //           'action' => 'list'
    //         ]
    //       ],
    //       '' => [
    //         'GET' => [
    //           'controller' => $jokeController,
    //           'action' => 'home'
    //         ]
    //       ]
    //     ];

    //     $method = $_SERVER['REQUEST_METHOD'];

    //     $controller = $routes[$route][$method]['controller'];
    //     $action = $routes[$route][$method]['action'];

    //     return $controller->$action();


    //     // if($route === 'joke/list') {
    //     //   // include __DIR__ . '/../classes/Controllers/Joke.php';
    //     //   $controller = new \Ijdb\Controllers\Joke($jokesTable, $authorsTable);
    //     //   $page = $controller->list();
    //     // } else if ($route === '') {
    //     //   // include __DIR__ .'/../classes/Controllers/Joke.php';
    //     //   $controller = new \Ijdb\Controllers\Joke($jokesTable, $authorsTable);
    //     //   $page = $controller->home();
    //     // } else if ($route === 'joke/edit') {
    //     //   // include __DIR__ .'/../classes/Controllers/Joke.php';
    //     //   $controller = new \Ijdb\Controllers\Joke($jokesTable, $authorsTable);
    //     //   $page = $controller->edit();
    //     // } else if($route === 'joke/delete') {
    //     //   // include __DIR__ . '/../classes/Controllers/Joke.php';
    //     //   $controller = new \Ijdb\Controllers\Joke($jokesTable, $authorsTable);
    //     //   $page = $controller->delete();
    //     // } else if ($route === 'register') {
    //     //   // include __DIR__ . '/../classes/Ijdb/Controllers/RegisterController.php';
    //     //   $page = $controller -> showForm();
    //     // }
    //     // return $page;
    //   }
}
