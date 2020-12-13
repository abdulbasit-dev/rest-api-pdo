<?php
class Category
{
  public $id;
  public $name;
  public $created_at;
  public $conn;

  public function __construct($dbh)
  {
    $this->conn = $dbh;
  }

  public function  read()
  {
    $query = "SELECT * FROM category ORDER BY created_at DESC";

    //Prepare statement
    $stmt = $this->conn->prepare($query);

    //Execute Query
    $stmt->execute();
    return $stmt;
  }

  public function getSingleCategory()
  {

    $query = 'SELECT * FROM category WHERE id = ?';
    // prepare statement 
    $stmt = $this->conn->prepare($query);
    //bind id 
    $stmt->bindParam(1, $this->id);
    //exectue queru
    $stmt->execute();

    //get data from database
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    extract($row);

    //set property
    $this->name = $name;
    $this->created_at = $created_at;
  }


  public function create()
  {
    //create query
    $query = "INSERT INTO category SET 
    name = :name";
    //prepare statmet
    $stmt = $this->conn->prepare($query);
    //clean data
    $this->name = htmlspecialchars(strip_tags($this->name));

    //bindParam
    // $stmt->bindParam(":name", $this->name);
    //execute query
    if ($stmt->execute([":name" => $this->name])) {
      return true;
    }

    //Print error if somthing gose wrong
    printf("Error: %s.\n", $stmt->error);
    return false;
  }



  public function update()
  {
    //create query
    $query = "UPDATE category SET name = :name WHERE id = :id";
    //prepare query
    $stmt = $this->conn->prepare($query);
    //clean data
    $this->name = htmlspecialchars(strip_tags($this->name));
    $this->id = htmlspecialchars(strip_tags($this->id));
    //execute query & bindParams
    //bind params
    $stmt->bindParam(":name", $this->name);
    $stmt->bindParam(":id", $this->id);


    if ($stmt->execute()) {
      return true;
    }

    //if somthing gose wrong
    printf("Error: %s \n", $stmt->error);
    return false;
  }

  public function delete()
  {
    //create query
    $query = "DELETE FROM category WHERE id=:id";
    //prepare statment
    $stmt = $this->conn->prepare($query);
    //execute query & bind id

    if ($stmt->execute([":id" => $this->id])) {
      return true;
    }

    //Print error if somthing gose wrong
    printf("Error: %s.\n", $stmt->error);
    return false;
  }
}
