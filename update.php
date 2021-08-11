<?php
    require_once("include/db.php");
    $SearchQueryParameter = $_GET['id'];
    if(isset($_POST["Submit"])){
        if(!empty($_POST["empName"]) && !empty($_POST["age"]) && !empty($_POST["dept"]) && !empty($_POST["deptID"])){
            $empName = $_POST["empName"];
            $age = $_POST["age"];
            $dept = $_POST["dept"];
            $deptID = $_POST["deptID"];
            global $ConnectingDB;
            $sql = "INSERT INTO emp_records(emp_Name, age, dept_Name, dept_ID) Values(:emp_NamE, :agE, :dept_NamE, :Dept_Id)";
            $stmt = $ConnectingDB -> prepare($sql);
            $stmt -> bindValue(':emp_NamE', $empName);
            $stmt -> bindValue(':agE', $age);
            $stmt -> bindValue(':dept_NamE', $dept);
            $stmt -> bindValue(':Dept_Id', $deptID);
            $Execute = $stmt -> execute();
            if($Execute){
                echo '<span class = "success">Record has been added successfully!</span>';
            }
        }
        else{
            echo '<span class = "fieldInfoHeading">Please fill all the fields!</span';
        }
    }
?>
<!doctype>
<html>
    <head>
        <title>Update Data into DB</title>
        <link rel = "stylesheet" href = "include/style.css">
    </head>
    <body>
        <?php
            global $ConnectingDB;
            $sql = "SELECT * FROM emp_records WHERE id = 'SearchQueryParameter'";
            $stmt = $ConnectingDB -> query($sql);
            while($DataRows = $stmt -> fetch()){
                $empID = $DataRows["emp_ID"];
                $empName = $DataRows["emp_Name"];
                $age = $DataRows["age"];
                $dept = $DataRows["dept_Name"];
                $deptID = $DataRows["dept_ID"];
            }
        ?>
        <div>
            <form action = "ind.php" method = "post">
                <fieldset>
                    <span class = "fieldInfo">Employee Name:</span>
                    <br>
                        <input type = "text" name = "empName" value = "<?php echo $empName;?>">
                    <br>
                    <span class = "fieldInfo">Age:</span>
                    <br>
                        <input type = "number" name = "age">
                    <br>
                    <span class = "fieldInfo">Department:</span>
                    <br>
                        <input type = "text" name = "dept">
                    <br>
                    <span class = "fieldInfo">Department ID:</span>
                    <br>
                        <select name = "deptID">
                            <option>-- SELECT --</option>
                            <option>0A</option>
                            <option>0H</option>
                            <option>0I</option>
                            <option>0O</option>
                            <option>0L</option>
                        </select>
                    <br>
                    <br>
                        <input type = "submit" name = "Submit" value = "Submit your record">
                        <br>
                </fieldset>
            </form>
            <form method="post" action="viewRecords.php">
                <button type="submit">View Records</button>
            </form>
        </div>
    </body>
</html>
