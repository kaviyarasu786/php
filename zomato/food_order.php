<?php
require_once 'confile.php';


if(isset($_GET["id"])>0 && ($_GET["action"]=='edit'))
{
  // $updateq="update food_order set name='$_POST[name]',
  //                                 contact='$_POST[contact]',
  //                                 location='$_POST[location]' where id=$_GET[id]";
  $selet="select * from food_order where id=$_GET[id]";
  $value=$connectq->query($selet);
  $edit_q=$value->fetch_assoc();
  //echo($res['id']);

}


$foood1="";
if(isset($_POST['submit']))
{
   $type="";
  if($_POST['id']>0)
  {
    $type="update";
    $qurr="update food_order set name='$_POST[name]',
                                        contact=$_POST[contact],
                                        location='$_POST[location]' where id='$_POST[id]' ";

                  
  }
  else
  {

  $type="insert";
  $qurr="insert into food_order(name,contact,location)values('$_POST[name]','$_POST[contact]','$_POST[location]')";
  //echo $insertq;
  }
  
 $foood1=insertfile($connectq,$qurr);

  // if(mysqli_query($connectq,$insertq))
  // {
  //   $foood1= "booked";
  
  // }
  // else
  // {
  //   $foood1= "cancel";
  // }
}


$selectq="select * from food_order";
$res=$connectq->query($selectq);
$totrow=$res->num_rows;
?>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<div class="container">


<h2 style="color:293462">Online food Order</h2>

<?php if($foood1=="sucess")   // sucess & update or success &insert
{
    echo""
    .($type=="update")?"<div class='alert alert-success'><b>your data is updated</b></div>":"<div class='alert alert-success'><b>your data is inserted</b></div>".
    "";
} else if($foood1=="failed") {  // fail & update or fail &insert

  if($type=="update")
  {
    echo"<div class='alert alert-danger';>Update failed</div>";
  }
  else{
    echo "<div class='alert alert-danger';><b>Insert failed</b></div>";
  }
 
 }?>
 

<div  class="alert alert-info">
<form method="POST" action="food_order.php" >
<div class="form-group">
    
    <input type="hidden"  name="id" value="<?php echo $edit_q['id'];?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
  </div>
  <div class="form-group">
    <label for="">Name</label>
    <input type="text"  name="name" value="<?php echo $edit_q['name'];?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Contact</label>
    <input type="text" name="contact"value="<?php echo $edit_q['contact'];?>" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Location</label>
    <select class="custom-select" name="location">
  <option selected>select your locaction</option>
  <option value="salem"<?Php if($edit_q['location']=='salem'){ ?>selected <?php }?>>Salem</option>
  <option value="namakkal"<?Php if($edit_q['location']=='namakkal'){ ?>selected <?php }?>>Namakkal</option>
  <option value="madhurai" <?Php if($edit_q['location']=='madhurai'){ ?>selected <?php }?>>Madhurai</option>
  <option value="covai" <?Php if($edit_q['location']=='covai'){ ?>selected <?php }?>>Covai</option>
  <option value="trichy" <?Php if($edit_q['location']=='trichy'){ ?>selected <?php }?>>trichy</option>

</select>
  </div>
  
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>

</div>

</div>


<div class="container">

<table class="table">
  <thead class="thead-dark">
     <tr>
      <th>#</th>
      <th>name</th>
      <th>contact</th>
      <th>location</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
      <?php if($totrow<0){?>
          <tr>
            <td colspan="4">not record in this file</td>
          </tr>
          <?php } $i=1;?>


          <?php while($val=$res->fetch_array()) 
          {?>

          <tr>
            <td><?php echo $i++;?></td>
            <td><?php echo $val['name'];?></td>
            <td><?php echo $val['contact'];?></td>
            <td><?php echo $val['location'];?></td>
            
            <td><a href="food_order.php?id=<?php echo $val['id']?>&action=edit"><img src="../assets/img/img/edit.jpg" alt="" width="20px"></a></td>
            <td><img src="../assets/img/img/delete.jpg" alt="" width="30px"></td>
          </tr>
          <?php }?>
  </tbody>
</table>


</div>
