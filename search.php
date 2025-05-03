<?php 
  require "config.php";
  
  if(isset($_POST['search'])) {
    $search = $_POST['search'];

    $select = $conn->query("SELECT * FROM posts WHERE title LIKE '{$search}%'");
    $select->execute();
    $rows = $select->fetchAll(PDO::FETCH_OBJ);
    foreach($rows as $row) {
      echo "<h2>$row->title</h2>";
      echo "<h2>$row->body</h2>";
    }
  }