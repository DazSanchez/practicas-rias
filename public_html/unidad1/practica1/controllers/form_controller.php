<?php
  include_once('../utils/helpers.php');
  include_once('../models/profile.php');

  // Resumes user session
  session_start();

  // Parse form values from request to class
  $profile_form = parseEntity($_POST, new ProfileForm());
  $profile_form->picture = $_FILES['picture'];

  // Check if all fields exists
  $is_valid_request = validateFields($profile_form, $field_names);
  $is_valid_date = validateDate($profile_form->day, $profile_form->month);

  if(!$is_valid_date) {
    $_SESSION["DATE_ERROR"] = TRUE;
    header("Location: /practica1/index.php");
    exit;
  }
  
  if(!$is_valid_request) {
    $_SESSION["REGISTER_ERROR"] = TRUE;
    header("Location: /practica1/index.php");
    exit;
  }

  $data_list = array();

  if(isset($_SESSION["register"])) {
    $data_list = (array) $_SESSION["register"];
  }

  array_push($data_list, $profile_form);

  $_SESSION["register"] = $data_list;
  header("Location: /practica1/pages/list.php");
?>