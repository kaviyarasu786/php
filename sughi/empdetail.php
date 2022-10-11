<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


<div class="container">
<?php if($result=="inserted data")
{
  ?>
  <div style="color:green"><b>your data is inserted</b></div>

<?php } else if($result=="not inserted data") {?>
  <div style="color:red"><b>your data not inserted</b></div>
  <?php }?>

<form method="POST" action="empdetail.php">
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">phone</label>
    <input type="text" name="phone" class="form-control" id="exampleInputPassword1" placeholder="enter phone number">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Adddress</label>
    <input type="text" name="address" class="form-control" id="exampleInputPassword1" placeholder="enter address">
  </div>
  
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
</div>


<?php

require_once 'sughi_conq.php';

$result="";
if(isset($_POST['submit']))

{
    $insertq="insert into empdetail (name,phone,address)values('$_POST[name]','$_POST[phone]','$_POST[address]')";
   // echo $insertq;

$result=insertq($conq,$insertq);

//     if(mysqli_query($conq,$insertq))
//     {
//       echo "add";

//     }
//     else
//     {
//       echo"no add";
//     }
 }


?>