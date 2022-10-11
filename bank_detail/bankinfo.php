<?php

require_once 'conqurr.php';


$select_qur="select * from bank_details";
$data=$con_query->query($select_qur);
$tot_rows=$data->num_rows;

// echo"<pre>";
// print_r ($tot_rows);
// echo"<pre>";
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<table class="table">

<thead>
    <tr>
        <th>bid</th>
        <th>bname</th>
        <th>bemail</th>
        <th>bphone</th>
    </tr>
</thead>

<tbody>
    <?php
    if($tot_rows<=0)
    {
    ?>
       <tr>
           <td colspan="4">record is not </td>
       </tr>
   <?php 
     }
     
    ?>


   <?php
     while($res=$data->fetch_array())
     {
       // print_r ($res);
   ?>
    
         <tr>
             <td><?php echo $res["bid"]; ?></td>
             <td><?php echo $res["bname"];?></td>
             <td><?php echo $res["bemail"];?></td>
             <td><?php echo $res["bphone"];?></td>
         </tr>
    <?php
    }
    ?>

</tbody>

</table>