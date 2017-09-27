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
      <h2 class="form-question">
        <p>Split how many ways?</p>
        <p class="required-text">*Required</p>
      </h2>
      <input class="form-input" type="text" name="split" value="<?php echo $split; ?>"/>
    </div>

    <div class="form-container">
      <h2 class="form-question">
        <p>How much was the tab?</p>
        <p class="required-text">*Required</p>
      </h2>
      <input class="form-input" type="text" name="cost" value="<?php echo $cost; ?>"/>
    </div>

    <div class="form-container">
      <h2 class="form-question">How was the service?</h2>
      <select class="form-input" name="tip" value="<?php echo $tip; ?>">
        <option value="10">Poor (10% tip)</option> 
        <option value="15" selected>Good (15% tip)</option>
        <option value="20">Great (20% tip)</option>
      </select>
    </div>

    <div class="form-container">
      <h2 class="form-question">Round Up</h2>
      <input class="form-input" type="checkbox" name="round" <?php echo $round; ?>/>
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
</body>
</html>