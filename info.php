<?php
$username = filter_input(INPUT_POST, 'username');
$salary = filter_input(INPUT_POST, 'salary');
if (!empty($username)){
if (!empty($salary)){
$host = "database-1.crfl5put8kqp.us-east-1.rds.amazonaws.com";
$dbusername = "admin";
$dbpassword = "Ferari458Italia";
$dbname = "Student";
// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
if (mysqli_connect_error()){
die('Connect Error ('. mysqli_connect_errno() .') '
. mysqli_connect_error());
}
else{
$sql = "INSERT INTO emp (empname, sal)
values ('$username','$salary')";
if ($conn->query($sql)){
echo "New record is inserted sucessfully";
}
else{
echo "Error: ". $sql ."
". $conn->error;
}
$conn->close();
}
}
else{
echo "Password should not be empty";
die();
}
}
else{
echo "Username should not be empty";
die();
}



// Writing a mysql query to retrieve data  
$sql = "SELECT empid, empname, sal FROM emp"; 
$result = $conn->query($sql); 
?> 
            	<table>
                            	<tr>
                                	<td> Emp ID</td>
                                    	<td>Emp Name</td>
                                    	<td>Salary</td>
                                </tr>
                                

<?php

                                            // Show each data returned by mysql 
                                            while($row = $result->fetch_assoc()) { 
                                            	echo "<tr>";
                                              	echo "<td>".$row[empno]."</td>";
                                            	echo "<td>".$row[empname]."</td>";
                                            	echo "<td>".$row[sal]."</td>";
                                            	echo "</tr>";
                                        }
                                ?>
            	</table>