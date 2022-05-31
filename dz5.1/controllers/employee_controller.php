<?php
  class EmployeeController {
    public function index() {
      // we store all the posts in a variable
      $employee = Employee::all();
      require_once('views/employee/index.php');
    }

    public function show() {
     
      if (!isset($_GET['id']))
        return call('pages', 'error');

      // we use the given id to get the right post
      $employee = Employee::find($_GET['id']);
      require_once('views/employee/show.php');
    }
	public function deleteemployee() {
   
      if (!isset($_GET['id']))
        return call('pages', 'error');

      // we use the given id to get the right post
      $employee = Employee::deleteemployee($_GET['id']);
      require_once('views/employee/delete.php');
    }
  }
?>