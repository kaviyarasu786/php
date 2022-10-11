<?php

require_once 'tcs_conq.php';

if(isset($_POST['submit']))

{

$insertq="insert into tcs_employee(name,email,account_number,phone_number)values('$_POST[name]','$_POST[email]','$_POST[account_number]','$_POST[phone]')";
echo $insertq;
  //$val= insertquerry($conq,$insertq);
  if(mysqli_query($conq,$insertq))
  {
    echo"add";
  }
  else
  {
    echo"not add";
  }
}

?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<div class="container">

<form method="POST" action="tcs_employee.php">
  <div class="form-group">
    <label for="formGroupExampleInput">Name</label>
    <input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="enter name">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Email</label>
    <input type="text" name="email" class="form-control" id="formGroupExampleInput2" placeholder="enter email">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Account Number</label>
    <input type="text" name="account_number" class="form-control" id="formGroupExampleInput2" placeholder="enter Account num">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Phone</label>
    <input type="text"  name="phone" class="form-control" id="formGroupExampleInput2" placeholder="enter phone num">
  </div>
  
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>

 

</form>


</div>