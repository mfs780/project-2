<?php
  require('Form.php');

  use DWA\Form;

  $form = new Form($_POST);
  $sum = '';
  $errors = [];

  if ($form->isSubmitted()) {

    # Retrieve data from form
    $split = $form->get('split', 1);
    $cost = $form->get('cost', 1);
    $tip = $form->get('tip');
    $round = $form->isChosen('round');

    # Validate
    $errors = $form->validate([
      'split' => 'required',
      'cost' => 'required'
    ]);

    if (empty($errors)) {
      $sum = (int)$cost * (1 + (int)$tip / 100) / (int)$split;

      if(strlen($round)) {
        $sum = ceil($sum);
      }
    }
  }
?>