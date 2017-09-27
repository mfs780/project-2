<?php
  $split = '1';
  $cost = '';
  $tip = '';
  $round = '';
  $sum = '';

  if(isset($_POST['calculate'])) {
    $split = $_POST['split'];
    $cost = $_POST['cost'];
    $tip = $_POST['tip'];

    if(isset($_POST['round'])) {
      $round = "checked='checked'";
    } else {
      $round = '';
    }

    $sum = (int)$cost * (1 + (int)$tip / 100) / (int)$split;

    if(strlen($round)) {
      $sum = ceil($sum);
    }
  }
?>