<?php

require_once 'confile.php';
// echo "<pre>";
// print_r ($_POST);
// echo "</pre>";

$result="";
if(isset($_POST['submit'])) 
{
   //echo "form submited";
   $insert_qurr="insert into collegeinfo(cname,cemail,caddress)values('$_POST[name]','$_POST[email]','$_POST[address]')";
   echo $insert_qurr;
   if(mysqli_query($conqurr,$insert_qurr))
   {
     $result="add_sucess";
   }
   else
   {
     $result="not_added";
   }
}

$select_qurr="select * from collegeinfo";
$data=$conqurr->query($select_qurr);
$totrow=$data->num_rows;
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


<div class="container">
    <div class="row justify-content-md-center">
        <div class="col col-lg-8">

    <h2>College Info</h2>
    <?php if($result=="add_sucess"){ 
        ?>
        <div style="color:green"><b>College record is added sucessfully</b></div>
  <?php  } else if($result=="not_added"){ ?>

    <div style="color:red"><b>College record is failed</b></div>

    <?php }?>
     


<form method="POST" action="collegeinfo.php">
  <div class="form-group">
   
    <input type="hidden" class="form-control" name="id" value="" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">

  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">College Name</label>
    <input type="text" name="name" class="form-control" id="exampleInputPassword1" placeholder="name">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">College Email</label>
    <input type="text" name="email" class="form-control" id="exampleInputPassword1" placeholder="email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">College Address</label>
    <input type="text"  name="address"       class="form-control" id="exampleInputPassword1" placeholder="address">
  </div>
    <button type="submit" name="submit" value="addcollege" class="btn btn-primary">Submit</button>
  <!-- <button type="submit" name="submit" <?php if($res['id']>0) { ?>value="editcollege" <?php } else {?> value="addcollege" <?php  } ?>class="btn btn-primary">Submit</button> -->
</form>
        </div>
    </div>
</div>

<div class="container">
    <div class="row justify-content-md-center">
     <div class="col col-lg-8">

<table class="table table-dark">
    <thead>
        <tr>
            <th>#</th>
            <th>College Name</th>
            <th>College Email</th>
            <th>College Address</th>
            <th>Edit</th>
            <th>Delete</th>
         </tr>
    </thead>
    <tbody>
        <?php
        if($totrow<=0)
        {
        ?>
        <tr>
            <td colspan="4" style="text-align:center">database is not</td>
        </tr>

        <?php
        } 
        $i=1;
        ?>

        <?php
        while($val=$data->fetch_array())
        {
        ?>
         <tr>
            <td><?php echo $i++;?></td>
            <td><?php echo $val['cname'];?></td>
            <td><?php echo $val['cemail'];?></td>
            <td><?php echo $val['caddress'];?></td>
            <td><img src="edit.jpg" alt="" width="20px"></td>
            <td><img src="delete.jpg" alt="" width="30px"></td>
         </tr>    
      <?php
        }
        ?>
    </tbody>
</table>

     </div>
    </div>
    </div>

