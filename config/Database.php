<?php
class Database
{
  // DB params 
  private $dbName = "myblog";
  private $username = "root";
  private $host = "localhost";
  private $password = "";
  private $dbh;

  //DB conenct 
  public function conect()
  {

    $dsn = "mysql:host=" . $this->host . ';dbname=' . $this->dbName;
    try {
      $this->dbh = new PDO($dsn, $this->username, $this->password);
      $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {

      echo "conection Error: " . $e->getMessage();
    }

    return $this->dbh;
  }
}
