<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
<div>
<label> Enter your name:</label>
<input type="text" name="user">
<div style="color:red;"></div>
</div>
<div>
<label>Enter Email:</label>
<input type="email" name="email">
<div style="color:red;"></div>
</div>
<div>
<label>Enter phone number:</label>
<input type="telephone" name="phone">
<div style="color:red;"></div>
</div>
<input type="submit" value="Register" name="submit-btn">
</form>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$db="firstdb";
$conn = new mysqli($servername, $username, $password,$db);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
echo "<br> <br>";
//$sql = "create table user(username varchar(10),emailid varchar(20),phonenumber int(10))";
 if ($_SERVER["REQUEST_METHOD"] == "POST")
 {
     $u=$_REQUEST["user"];
        echo $u;
        if(empty($u))
        {
            echo "<br>enter your name<br>";
            $flag=false;
        }
        else 
        {
            $pattern="/^[a-zA-Z]+$/";
          
           if(preg_match($pattern, $u)==0)
           {
             echo "<br>enter your name correctly<br>";
             $flag=false;
           }
           else{
             $flag=true;
           }

            
        }
  echo "<br> <br>";
      
        $mail=$_REQUEST["email"];
        echo $mail;
        if(empty($mail))
        {
             echo ("enter your email<br>");
             $flag=false;
        }
        else
        {
             $pattern1="/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/";
          
           if(preg_match($pattern1, $mail)==0)
           {
              echo "<br>enter a valid mail<br>";
              $flag=false;
           }
            else{
             $flag=true;
           }
        }
echo "<br> <br>";
        $p=$_REQUEST["phone"];
        echo $p;
        if(empty($p))
        {
            echo ("enter phoneno<br>");
            $flag=false;
        }
        else {
     
            $pattern2="/^[0-9]+$/";
          
           if(preg_match($pattern2, $p)==0)
           {
              echo "<br>invalid phone no<br>";
              $flag=false;
           }
            else{
             $flag=true;
           }
            
        }
echo "<br> <br>";
      if($flag)
       {
          $i="insert into user values('$u','$mail','$p')";
          if ($conn->query($i) === TRUE)
          {
            echo "inserted successfully";
          }
	  else
	  {
           echo "Error creating table: " . $conn->error;
          }
          
        }
  }

