<?php
  class Zupanija  {
    // we define 3 attributes
    // they are public so that we can access them using $post->author directly
    public $EMP_ID;
    public $FIRST_NAME;
    public $LAST_NAME;



    public function __construct($EMP_ID, $FIRST_NAME, $LAST_NAME) {
      $this-> EMP_ID = $EMP_ID;
      $this-> FIRST_NAME= $FIRST_NAME;
      $this-> LAST_NAME= $LAST_NAME;
      

    }

    public static function all() {
      $list = [];
      $db = Db::getInstance();
      $req = $db->query('SELECT * FROM EMPLOYEE');


      // we create a list of Post objects from the database results
      foreach($req->fetchAll() as $employee) {
        $list[] = new Employee($employee['EMP_ID'], $employee['FIRST_NAME='],$employee['LAST_NAME=']);
      }

      return $list;
    }

    public static function find($id) {
      $db = Db::getInstance();
      // we make sure $id is an integer
      $id = intval($id);
      $req = $db->prepare('SELECT * FROM  EMPLOYEE WHERE EMP_ID = :id');
      // the query was prepared, now we replace :id with our actual $id value
      $req->execute(array('id' => $id));
      $employee = $req->fetch();

      return new Employee($employee['EMP_ID'], $employee['FIRST_NAME'], $employee['LAST_NAME']);
    }
	
	public static function deleteemployee($id) {
      $db = Db::getInstance();
      // we make sure $id is an integer
      //$id = intval($id);
	  $sql="DELETE FROM EMPLOYEE WHERE EMP_ID ='$id'";
	  //echo $sql;
	  
      //$req = $db->prepare($sql);
      // the query was prepared, now we replace :id with our actual $id value
      //if ($req->execute(array('id' => $id))){
		  //$req=$r->execute($sql);
	if ($db->query($sql) == TRUE){
	//if (1==2){
		  $rez="USPJESNO brisanje";
	  }
		  else {
			 $rez="NEUSPJESNO brisanje";;
		  }
		  return $rez;
	  
}
  }
?>