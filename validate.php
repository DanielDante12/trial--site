<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $errors = array();

    // Validate First name
    if (empty($_POST['First_name'])) {
        $errors[] = "Enter First name";
    } else {
        $First_name = $_POST['First_name'];
    }

    // Validate Last name
    if (empty($_POST['Last_name'])) {
        $errors[] = "Enter Last name";
    } else {
        $Last_name = $_POST['Last_name'];
    }

    // Validate Gender
    if (empty($_POST['Gender'])) {
        $errors[] = "Select your gender";
    } else {
        $Gender = $_POST['Gender'];
    }

    // Validate Date of birth
    if (empty($_POST['Date_Of_Birth'])) {
        $errors[] = "Enter DOB";
    } else {
        $Date_Of_Birth = $_POST['Date_Of_Birth'];
    }

    // Validate Nationality
    if (empty($_POST['Nationality'])) {
        $errors[] = "Select your Nationality";
    } else {
        $Nationality = $_POST['Nationality'];
    }

    // Validate University
    if (empty($_POST['University'])) {
        $errors[] = "Select your University";
    } else {
        $University = $_POST['University'];
    }

    // Validate Course
    if (empty($_POST['Course'])) {
        $errors[] = "Choose course";
    } else {
        $Course = $_POST['Course'];
    }

    // Validate University testimonial of results
    if (empty($_FILES['University_testimonial_of_results']['name'])) {
        $errors[] = "Submit file";
    } else {
        // Handle file upload logic here
        $University_testimonial_of_results = $_FILES['University_testimonial_of_results']['name'];
        // ...
    }

    // Validate Comment
    if (empty($_POST['Comment'])) {
        $errors[] = "Please fill in the comment";
    } else {
        $Comment = $_POST['Comment'];
    }

    // Check if there are any validation errors
    if (!empty($errors)) {
        //inserting values in the database
        
        // ...
    } else {
        // Proceed with further processing, saving data to the database, etc.
        // ...
    }
}
