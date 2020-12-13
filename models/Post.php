<?php
class Post
{
  private $conn;
  // private $table = "posts";

  //Post Property
  public $id;
  public $category_id;
  public $category_name;
  public $title;
  public $body;
  public $author;
  public $created_at;

  public function __construct($dbh)
  {
    $this->conn = $dbh;
  }

  //Get Posts
  public function read()
  {
    //Create query
    $query = 'SELECT 
                c.name as category_name,
                p.id,
                p.category_id,
                p.title,
                p.body,
                p.author,
                p.created_at
                FROM posts p LEFT JOIN category c
                    ON p.category_id = c.id
                ORDER BY p.created_at DESC';

    //Prepare Statemen
    $stmt = $this->conn->prepare($query);
    //Execute query
    $stmt->execute();

    return $stmt;
  }

  public function getSinglePost()
  {
    //Create query
    $query = 'SELECT 
                c.name as category_name,
                p.id,
                p.category_id,
                p.title,
                p.body,
                p.author,
                p.created_at
                FROM posts p LEFT JOIN category c
                    ON p.category_id = c.id
                WHERE P.id =?
                LIMIT 0,1';
    //prepare statment
    $stmt = $this->conn->prepare($query);

    // Bind Id
    $stmt->bindParam(1, $this->id);

    //execut query
    // $stmt->execute([$this->id]);
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    extract($row);

    //set property
    $this->title = $title;
    $this->body = $body;
    $this->author = $author;
    $this->category_id = $category_id;
    $this->category_name = $category_name;
    $this->created_at = $created_at;
  }

  public function create()
  {
    //Create query
    $query = 'INSERT 
                INTO posts SET 
                title=:title,     
                body=:body,     
                author=:author,     
                category_id=:category_id';

    //prepare statement
    $stmt = $this->conn->prepare($query);

    //Clean Data
    $this->title = htmlspecialchars(strip_tags($this->title));
    $this->body = htmlspecialchars(strip_tags($this->body));
    $this->author = htmlspecialchars(strip_tags($this->author));
    $this->category_id = htmlspecialchars(strip_tags($this->category_id));

    //Bind params
    $stmt->bindParam(":title", $this->title);
    $stmt->bindParam(":body", $this->body);
    $stmt->bindParam(":author", $this->author);
    $stmt->bindParam(":category_id", $this->category_id);

    //Execute Query
    if ($stmt->execute()) {
      return true;
    }

    //Print error if somthing gose wrong
    printf("Error: %s.\n", $stmt->error);
    return false;
  }


  public function update()
  {
    //Create query
    $query = 'UPDATE 
                posts SET 
                title=:title,     
                body=:body,     
                author=:author,     
                category_id=:category_id
                WHERE id = :id';

    //prepare statement
    $stmt = $this->conn->prepare($query);

    //Clean Data
    $this->title = htmlspecialchars(strip_tags($this->title));
    $this->body = htmlspecialchars(strip_tags($this->body));
    $this->author = htmlspecialchars(strip_tags($this->author));
    $this->category_id = htmlspecialchars(strip_tags($this->category_id));
    $this->id = htmlspecialchars(strip_tags($this->id));

    //Bind params
    $stmt->bindParam(":title", $this->title);
    $stmt->bindParam(":body", $this->body);
    $stmt->bindParam(":author", $this->author);
    $stmt->bindParam(":category_id", $this->category_id);
    $stmt->bindParam(":id", $this->id);

    //Execute Query
    if ($stmt->execute()) {
      return true;
    }

    //Print error if somthing gose wrong
    printf("Error: %s.\n", $stmt->error);
    return false;
  }

  function delete()
  {
    $query = "DELETE FROM posts WHERE id = :id";
    //prepare statment
    $stmt = $this->conn->prepare($query);

    //Clear data
    $this->id = htmlspecialchars(strip_tags($this->id));

    //Bind Param
    $stmt->bindParam(":id", $this->id);

    if ($stmt->execute()) {
      return true;
    }

    //Print error if somthing gose wrong
    printf("Error: %s \n", $stmt->error);
    return false;
  }
}
