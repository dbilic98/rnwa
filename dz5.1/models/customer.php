<?php
  class Customer {
    // we define 3 attributes
    // they are public so that we can access them using $post->author directly
    public $CUST_ID;
    public $ADDRESS;
    public $CITY;

    public function __construct($CUST_ID, $ADDRESS, $CITY) {
      $this->CUST_ID = $CUST_ID;
      $this-> CITY = $CITY;
      $this-> ADDRESS = $ADDRESS;
    }

    public static function all() {
      $list = [];
      $db = Db::getInstance();
      $req = $db->query('SELECT * FROM CUSTOMER');


      // we create a list of Post objects from the database results
      foreach($req->fetchAll() as $post) {
        $list[] = new CUSTOMER($post['CUST_ID'], $post['CITY'], $post['ADDRESS']);
      }

      return $list;
    }

    public static function find($id) {
      $db = Db::getInstance();
      // we make sure $id is an integer
      $id = intval($id);
      $req = $db->prepare('SELECT * FROM CUSTOMER WHERE CUST_ID= :id');
      // the query was prepared, now we replace :id with our actual $id value
      $req->execute(array('id' => $id));
      $post = $req->fetch();

      return new Customer($post['CUST_ID'], $post['CITY'], $post['ADDRESS']);
    }
  }
?>