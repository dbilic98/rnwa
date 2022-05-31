<?php
  function call($controller, $action) {
    require_once('controllers/' . $controller . '_controller.php');

    switch($controller) {
      case 'pages':
        $controller = new PagesController();
      break;
	  case 'customer':
        require_once('models/customer.php');
		$controller = new CustomerController();
      break;
	   case 'employee':
        require_once('models/employee.php');
		$controller = new EmployeeController();
      break;
      
    }

    $controller->{ $action }();
  }

  // we're adding an entry for the new controller and its actions
  $controllers = array('pages' 		=> ['home', 'error'],
					   'customer' => ['index', 'show'],
					   'employee' 	=> ['index', 'show','deleteemployee']);

  if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
      call($controller, $action);
    } else {
      call('pages', 'error');
    }
  } else {
    call('pages', 'error');
  }
?>