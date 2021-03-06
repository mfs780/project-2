<?php require('calculate.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Mohammad Fahad Sheikh - Bill Splitter</title>
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
  <h1>bill splitter</h1>

  <form class="form-box" method="POST" action="index.php">
    <div class="form-container">
      <div class="form-question">
        <h2>Split how many ways?</h2>
        <p class="required-text">*Required</p>
      </div>
      <input class="form-input" type="number" name="split" min="1" value="<?php echo $split; ?>"/>
    </div>

    <div class="form-container">
      <div class="form-question">
        <h2>How much was the tab?</h2>
        <p class="required-text">*Required</p>
      </div>
      <input class="form-input" type="number" name="cost" min="1" value="<?php echo $cost; ?>"/>
    </div>

    <div class="form-container">
      <h2 class="form-question">How was the service?</h2>
      <select class="form-input" name="tip">
        <option value="10">Poor (10% tip)</option> 
        <option value="15" selected>Good (15% tip)</option>
        <option value="20">Great (20% tip)</option>
      </select>
    </div>

    <div class="form-container">
      <h2 class="form-question">Round Up</h2>
      <input id="round" class="form-input" type="checkbox" name="round"/>
      <label for="round">Yes</label>
    </div>
    <input class="form-submit" type="submit" name="calculate" value="Calculate"/>
  </form>

  <?php
    if (strlen($sum)) {
      echo '<div class="answer">';
      echo '<img class="answer-image" src="money.png"/>';
      echo 'Everyone owes $'.$sum;
      echo '</div>';
    }
  ?>
  <?php
    if (!empty($errors)) {
      echo '<div class="answer error">';
      echo '<img class="answer-image" src="error.png"/>';
      echo 'Missing Required Values in Form';
      echo '</div>';
    }
  ?>
</body>
</html>