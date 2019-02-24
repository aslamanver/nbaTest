<?php

// Get the team data
$name = filter_input(INPUT_POST, 'name');

// Validate inputs
if ($name == null) {
    $error = "Invalid team data. Check all fields and try again.";
    include('../Error/error.php');
} else {
    require_once('../Model/database.php');

    // Display the team List page

    // This is the directory where images will be saved
    $target = "../images/";
    $target = $target . basename( $_FILES['image']['name']);

    // This gets all the other information from the form
    $filename = basename( $_FILES['image']['name']);
    $team_name = $_POST['team_name'];


    // Write the file name to the server
    if(move_uploaded_file($_FILES['image']['tmp_name'], $target)) {

    //Tells you if its all ok
    echo "The file ". basename( $_FILES['image']['name']). " has been uploaded, and your information has been added to the directory";

    // Connects to your Database
    mysql_connect("renwid", "password") or die(mysql_error()) ;
    mysql_select_db("nba") or die(mysql_error()) ;

    //Writes the information to the database
    mysql_query("INSERT INTO categories (img, team_name)
    VALUES ('$filename', '$team_name')") ;

} else {
    //Gives and error if its not
    echo "Sorry, there was a problem uploading your file.";
}
    // Add the product to the database
    $query = 'INSERT INTO categories (categoryName)
              VALUES (:team_name)';

    $query = "INSERT INTO categories (image) VALUES ('$fileName', '$content')";

    $statement = $db->prepare($query);
    $statement->bindValue(':team_name', $name);
    $statement->execute();
    $statement->closeCursor();

}
?>
