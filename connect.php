<?php 
    $bookTitle = $_POST['title'];
    $bookAuthor = $_POST['author'];
    $bookISBN = $_POST['isbn'];

    #database connection

    $conn = new mysqli('localhost', 'root','','booklist');
    if ($conn->connect_error){
        die('Connection Failed :' .$conn->connect_error);
    } else {
        $stmnt = $conn->prepare("Insert into list(title,author, isbn)
        values(?,?,?)");
        $stmnt->bind_param("ssi", $bookTitle, $bookAuthor, $bookISBN);
        $stmnt->execute();
        echo"Insert Success";
        $stmnt->close();
        $conn->close();
    }




?>