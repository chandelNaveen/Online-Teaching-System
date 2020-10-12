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

              <?php  
                      if($_SERVER['REQUEST_METHOD']=='POST'){

                        $name=$_POST['name'];
                        $fname=$_POST['fname'];
                        $email=$_POST['email'];

                        if($name=="" || $fname=="" || $email==""){
                            
                            echo "<div class='alert alert-danger'>

                            Empty Field!;

                            </div>";

                        }

                        elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){

                            echo "<div class='alert alert-danger'>

                            Invalid Email Format!;

                            </div>";

                        }

                        else{

                        $query="insert into emp(Name,FName,Email)values('$name','$fname','$email')";
                        $result = $link->query($query);

                        if($result){
                            echo "<div class='alert alert-success'>

                            Data inserted Sucessfully!;

                            </div>";

                        }
                        
                    }
                      }

              ?>
                      
                      <form method="post">
                     <a href="#" class="btn btn-primary">view</a>
                     <a href="index.php" class="btn btn-primary pull-right">Add</a>

                    <div class="form-group">
                    <label for="name">Name: </label>
                    <input type="text" name="name" class="form-control">
                    </div>

                    <div class="form-group">
                    <label for="name">Father Name: </label>
                    <input type="text" name="fname" class="form-control">
                    </div>

                    <div class="form-group">
                    <label for="name">Email: </label>
                    <input type="text" name="email" class="form-control">
                    </div>

                    <input type="submit" class="btn btn-primary">

                  </form>
              
              

              </div>

              <div class="panel-footer">
              
              </div>
       
              </div>
       


       </body>




</html>
