<?php 
  
  // get values
  $firstName = filter_input(INPUT_GET, 'firstName', FILTER_SANITIZE_STRING);
  $lastName = filter_input(INPUT_GET, 'lastName', FILTER_SANITIZE_STRING);
  $age = filter_input(INPUT_GET, 'age', FILTER_VALIDATE_INT);

  // check values
  if(($firstName === FALSE || $firstName == '') || ($lastName === FALSE || $lastName == '')){
    $errorMessage = 'You did not submit firstname and lastname parameters.';
  }else if ($age <= 0){
    $errorMessage = "You haven't been born yet!";
  }else if($age == FALSE){
    $errorMessage = 'You did not submit a numeric age parameter.';
  }else{
    $errorMessage = '';
  } 

  // check age
  if($age >= 18){
    $displayMessage = "I'm old enough to vote in the United States.";
  }else{
    $displayMessage = "I'm not old enough to vote in the United States.";
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>INF653 Assignment 1 - Humphrey Sui, Qiupeng</title>
  <link rel="stylesheet" href="http://localhost/INF653_assignment_1/styles.css">
</head>
<body>
  <div class="phone">
    
    <div class="volume"></div>
    <div class="power"></div>
    
    <div class="content">
      <div class="camera"><div class="dot"></div></div>
      <p class="date">Today is <?php echo date('d/m/Y') ?></p>

      <?php if($errorMessage==''){ ?>
 
        <p class="displayName">Hello! My name is <?php echo htmlspecialchars($firstName. ' ' .$lastName) ?>.</p>
        <p class="display">I'm <?php echo htmlspecialchars($age) ?> years old, and <?php echo $displayMessage ?></p>
        <?php echo '<p class="display">That means '." I'm at least " . $age*365 . ' days old.' ?>
         
      <?php }else{ ?>
        <p class="displayName"> <?php echo $errorMessage ?> </p>
      <?php } ?>
    </div>
  </div>

</body>
</html>