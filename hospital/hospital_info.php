<?php

require_once 'conqury.php';

$resvalue="";
if(isset($_POST['submit']))
{
  $insertq="insert into hospital_info(hname,haddress,hphone)values('$_POST[name]','$_POST[address]','$_POST[phone]')";
  //echo $insertq;
  if(mysqli_query($confile,$insertq))
   {
      $resvalue="record_added";
   }
   else
   {
    $resvalue="record is not added";
   }
}

$selectq="select * from hospital_info";
$res=$confile->query($selectq);
$totrows=$res->num_rows;
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<div class="container">
<table  class="table">
    <thead class="thead-dark">
        <tr>
            <th>hid</th>
            <th>hname</th>
            <th>haddress</th>
            <th>hphone</th>
           
        </tr>
    </thead>
    <tbody>
        <?php
        if($totrows<0)
        {
        ?>
          <tr>
            <td colspan="4" style="text-align:center">No data form database </td>
          </tr>
        <?php
         }
         $i=1;
        ?>

        <?php
        
        while($val=$res->fetch_array())
        {
        ?>
                 <tr>
                    <td><?php echo $i++;?></td>
                    <td><?php echo  strtoupper( $val['hname']);?></td>
                    <td><?php echo ucfirst( $val['haddress']);?></td>
                    <td><?php echo substr($val['hphone'], 1,2);?></td>
                 </tr>    
        <?php
         }
         ?>
    </tbody>
</table>
</div>


<div class="container">
<h2>Hospital detals</h2>
<?php if($resvalue=="record_added")
{
?>
  <div style="color:green ;"><b>Your record is added sucessfully</b></div>

 <?php } else if($resvalue=="record is not added"){ ?>

  <div style="color:red ;"><b>Your record is not added</b></div>
<?php }?>

<form method="POST" action="hospital_info.php">
  <div class="form-group">
    <label for="exampleInputEmail1">Hospital Name</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="name">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Hospital Address</label>
    <input type="text" name="address" class="form-control" id="exampleInputPassword1" placeholder="address">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Hospital Phone</label>
    <input type="text" name="phone"class="form-control" id="exampleInputPassword1" placeholder="phone">
  </div>
  
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>

</div>

