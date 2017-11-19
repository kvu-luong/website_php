<?php
require_once("connection.php");
if (isset($_GET["btn_search"])) {
		//lấy thông tin từ các form bằng phương thức POST
		$course = $_GET["course"];
		
		if ($course == "" ) {
			echo "Plese type your course you want!";
		}else{
			$sql = "select * from course where Name like '%$course%'";
			// thực thi câu $sql với biến conn lấy từ file connection.php
			$query = mysqli_query($conn,$sql);
                        $num_rows = mysqli_num_rows($query);
                        if ($num_rows==0) {
                            echo "Course is not exist!";
                        }else{?>
<table>
    <tr>
        <th>Course ID</th>
        <th>Course Name</th>
        <th>Credit</th>
        <th>Start</th>
        <th>Finish</th>
        <th>Teacher</th>
    </tr>
   
        <?php
           while ( $data = mysqli_fetch_array($query) ) {
        ?>
        <tr>
        <td><?php echo $data["CourseId"] ?></td> 
        <td><?php echo $data["Name"] ?></td> 
        <td><?php echo $data["Credit"] ?></td>
        <td><?php echo $data["Start"] ?></td>
        <td><?php echo $data["Finish"] ?></td> 
        <td><?php echo $data["Techer"] ?></td>    
         </tr>
        <?php
             }
        ?>
   
</table>
<?php
                         
                           
                        }
                    }
}
?>

