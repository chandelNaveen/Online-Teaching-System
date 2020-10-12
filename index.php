<?php include_once("connection.php"); ?>
<!DOCTYPE html>
<html> 
       <head>
                <title>
                
                 </title>
                 
                 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
                 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
                 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                 



       </head>

       <body>

              <div class="panel panel-default container">
              <div class="panel-heading">
              
                  <h1 style="text-align: center;"> Attendance Management System</h1>

              </div>

              <div class="panel-body">
              
                     <a href="view.php" class="btn btn-primary">view</a>
                     <a href="add.php" class="btn btn-primary pull-right">Add</a>
              
              <form method="post">

              <table class="table">
              
              <thread>
                         <tr>
                              <th>Name</th>
                              <th>Father Name</th>
                              <th>Email</th>
                              <th>Attendance</th>

                         </tr>


              </thread>   

              <tbody>


              <?php

                    $query="select * from emp";
                    $result=$link->query($query);
                    while($show=$result->fetch_assoc()){

                    


              ?>

                     <tr>
                          <td><?php echo $show['Name']; ?></td>
                          <td><?php echo $show['FName']; ?></td>
                          <td><?php echo $show['Email']; ?></td>
                          <td>
                          
                              Present <input required type="radio" name="attendance[<?php echo $show['emp_id'] ?>]" value="Present">
                              Absent<input required type="radio" name="attendance[<?php echo $show['emp_id']; ?>]" value="Absent">

                          </td>

                     </tr>
                 <?php } ?>

               


              </tbody>
            

        <?php

               if($_SERVER['REQUEST_METHOD']=='POST'){

                     $att=$_POST['attendance'];

                $date=date('d-m-y');

                $query="select distinct date from attendance";
                $result=$link->query($query);

                $b=false;

                if($result->num_rows>0){
                while($check=$result->fetch_assoc()){
                    
                    if($date==$check['date']){
                     $b=true;

                     echo "<div class='alert alert-danger'>

                     Attendance Already taken Today!;

                     </div>";

                }

              }

              }      
                   if(!$b){

                            foreach($att as $key => $value){

                                   if($value=="Present"){

                                          $query="insert into attendance(value,emp_id,date) values('Present',$key,'$date')";
                                          $insertResult=$link->query($query);
                                   }

                                   else{
                                          $query="insert into attendance(value,emp_id,date) values('Absent',$key,'$date')";
                                          $insertResult=$link->query($query);  
                                   }


                            }


                            if($insertResult){
                                   echo "<div class='alert alert-success'>

                                   Attendance taken Sucessfully!;
              
                                   </div>";
                            }

                     }
              
              
               }



       ?>
       

              </table>

              <input class="btn btn-primary" type="submit" value="Take Attendance">
               </form>

              </div>

              <div class="panel-footer">
              
              </div>
       
              </div>
       


       </body>




</html>
