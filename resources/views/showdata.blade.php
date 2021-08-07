



<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
  <div class="container">
    <?php 
     if(Session::has('message')){
     ?>
     <p><?php echo Session::get('message') ?></p>

     <?php
     }
     ?>
    

  
<a href="logout.php"class="btn btn-primary">Log Out</a>
<table class="table table-bordered table-hover">
  <tr>
    <td><b>SL</b></td>
    <td><b>Employee Name<b></td>
    <td><b>Fathers Name<b></td>
    <td><b>Mothers Name<b></td>
    <td><b>Employee Image<b></td>

    <td><b>Action<b></td>
  </tr>
  <?php
  $x=1;
  foreach($query as $val){

  ?>
  <tr>
    <td><?php echo $x++ ?></td>
    <td><?php echo $val->emp_name ?></td>
    <td><?php echo $val->father_name ?></td>
    <td><?php echo $val->mother_name ?></td>
    <td><img src="{{url('storage/'.$val->emp_image)}}" width='100' height='100'></td>
    <td>
     <a href="{{url('edit/'.$val->emp_id)}}"><button class="btn btn-primary">Edit</button></a>
      <a href="{{url('delete/'.$val->emp_id)}}" onclick="return confirm('Are you sure to delete?')"><button class="btn btn-danger">Delete</button></a></td>
  </tr>
  <?php
  }
  ?>
</table>  


  </div>






</body>
</html>




