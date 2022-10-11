<?php
include_once 'conq_bike.php';






if(isset($_GET['id'])>0 && ($_GET["action"]=='edit'))
{

  $sel="select * from bike where id=$_GET[id]";
  $val=$conq->query($sel);
  $edit_q=$val->fetch_array();

}
 

$v="";
if (isset($_GET['id'])>0 && ($_GET["action"]=='delete'))
{
  $deleteq="delete from bike where id=$_GET[id]";
  $v=mysqli_query($conq,$deleteq);
}



$papap="";
if(isset($_POST['submit']))
{


  if($_POST["id"]>0)
  {
  

    $type="update";
    $qur="update bike set name='$_POST[name]',
                            color='$_POST[color]',
                            address='$_POST[address]',
                            phone=$_POST[phone] where id='$_POST[id]'";
      echo $qur;
  }

  else
  {

  
      $type="insert";
      $qur="insert into bike(name,color,address,phone)values('$_POST[name]','$_POST[color]','$_POST[address]',$_POST[phone])";
      echo $insertq;
  }

$papap=insertq($conq,$qur);
// if(mysqli_query($conq,$insertq))
// {
//     $papap="inserted data";
// }
// else
// {
//     $papap="not inserted date";
// }

}

$selectq="select * from bike order by name asc";
$con=$conq->query($selectq);
$totval=$con->num_rows;

?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<div class="container">




<table class="table table-dark">
    <thead>
        <tr>
            <td>id</td>
            <td>name</td>
            <td>color</td>
            <td>address</td>
            <td>phone</td>
            <td>Edit</td>
            <td>Delete</td>
        </tr>
    </thead>
    <tbody>
        <?php if($totval<0) { ?>

             <tr>
                <td colspan="4">not record in this file</td>
             </tr>
         <?php } $i=1;?>

         <?php while($res=$con->fetch_array()){
          
          $name=$res['name']; $id= $res['id'];
          ?>

               <tr>
                <td><?php echo $i++;?></td>
               <td><?php echo $res['name']?></td>
               <td><?php echo $res['color']?></td>
               <td><?php echo $res['address']?></td>
               <td><?php echo $res['phone']?></td>
               <td><a href="bike.php?id=<?php echo $res['id'];?>&action=edit"><img src="../assets/img/img/edit.jpg" alt="" width="20px"></a></td>
               <td><a onclick="deletefn('<?php echo $id;?>')" href="#"><img src="../assets/img/img/delete.jpg" alt="" width="20px"></a></td>
    
               </tr>

               <?php }?>

    </tbody>
</table>
         </div>


         <div class="container">

         <form method="POST" action="bike.php">
           
        <?php if($papap=="inserted_data")
        {
          echo"".($type=="update")?"<div class='alert alert-success'><b>your data is updated</b></div>":"<div class='alert alert-success'><b>your data is inserted</b></div>"."";
        }
        
        ?>
      

  <div class="form-group">    
    <input type="hidden" name="id"  value="<?php echo $edit_q['id'] ?>" >
  </div>
    
      
  <div class="form-group">
    
    <label for="exampleInputEmail1">Name</label>
    <input type="text" name="name" value="<?php echo $edit_q['name'];?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Color</label>
    <input type="text" name="color"  value="<?php echo $edit_q['color']; ?>" class="form-control" id="exampleInputPassword1" placeholder="color">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Address</label>
    <input type="text" name="address"  value="<?php echo $edit_q['address'];?>" class="form-control" id="exampleInputPassword1" placeholder="address">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">phone</label>
    <input type="text" name="phone"  value="<?php echo $edit_q['phone']; ?>" class="form-control" id="exampleInputPassword1" placeholder="phone">
  </div>
  
  <button type="submit" name="submit"  class="btn btn-primary">Submit</button>
</form>
         </div>


<script>

function deletefn(ggg)
{
  if(confirm("Are  you want delete"))
  {
    window.location.href="bike.php?id="+ggg+"&action=delete";
    return true;
  }
  else
  {
    return false;
  }
}

</script>