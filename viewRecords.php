<?php
    require_once("include/db.php");
?>
<!doctype>
<html>
    <head>
        <title>View Records</title>
        <link rel="stylesheet" href="include/style.css">
    </head>
    <body>
        <table width = "1000" border = "5" align = "center">
            <caption>RECORDS</caption>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Department</th>
                <th>Dept_ID</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
            <?php
                global $ConnectingDB;
                $sql = "SELECT * FROM emp_records";
                $stmt = $ConnectingDB -> query($sql);
                while($DataRows = $stmt -> fetch()){
                    $empID = $DataRows["emp_ID"];
                    $empName = $DataRows["emp_Name"];
                    $age = $DataRows["age"];
                    $dept = $DataRows["dept_Name"];
                    $deptID = $DataRows["dept_ID"];
                
            ?>
            <tr>
                <td><?php echo $empID;?></td>
                <td><?php echo $empName;?></td>
                <td><?php echo $age;?></td>
                <td><?php echo $dept;?></td>
                <td><?php echo $deptID;?></td>
                <td> <a href = "update.php?id = <?php echo $empID; ?>">Update</a> </td>
                <td> <a href = "delete.php?id = <?php echo $empID; ?>">Delete</a> </td>
            </tr>
            <?php }?>
        </table>
    </body>
</html>