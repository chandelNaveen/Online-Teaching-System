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
              
                     <a href="#" class="btn btn-primary">view</a>
                     <a href="add.php" class="btn btn-primary pull-right">Add</a>
              
              <form method="post">

              <table class="table">
              
              <thread>
                         <tr>
                              <th>Sr No.</th>
                              <th>Name</th>
                              <th>Father Name</th>

                              <th>Email</th>
                              <th>Attendance</th>
                              

                         </tr>


              </thread>   

                        <?php


                        if($_GET['date']){

                            $date= $_GET['date'];
                        


                                $query="select distinct emp.*,attendance.* 
                                from attendance
                                inner join emp on attendance.emp_id=emp.emp_id and attendance.date=
                                '$date'";
                                ;
                                $result=$link->query($query);

                            if($result->num_rows>0){

                                $i=0;

                                while($val=$result->fetch_assoc()){
                                
                                    $i++;


                        ?>



              <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $val['Name']; ?></td>
                    <td><?php echo $val['FName']; ?></td>
                    <td><?php echo $val['Email']; ?></td>
                    
                    <td>
                            Present<input type="radio"
                            value="Present"
                            <?php
                                    if($val['value']=='Present')
                                    echo "checked";
                            ?>

                            >

                            Absent<input type="radio"
                            value="Absent"
                            <?php
                                    if($val['value']=='Absent')
                                    echo "checked";
                            ?>

                            >

                    </td>

                    
                   

              <?php } } }?>

              </div>

              <div class="panel-footer">
              
              </div>
       
              </div>
       


       </body>




</html>
