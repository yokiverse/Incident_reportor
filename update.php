<?php
include "connect.php";
$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Reported_By = $_POST['name'];
    $Date_Of_Report = $_POST['dor'];
    $Title = $_POST['title'];
    $Incident_No = $_POST['incino'];
    $Incident_Type = $_POST['incitype'];
    $Date_Of_Incident = $_POST['incidate'];
    $Location = $_POST['locate'];
    $City = $_POST['city'];
    $State = $_POST['state'];
    $Zip_Code = $_POST['zip'];
    $Incident_Des = $_POST['incides'];
    $Follow_Up_Act = $_POST['act'];

    // Update
    $sql = "UPDATE `incident` SET `name`='$Reported_By', `dor`='$Date_Of_Report', `title`='$Title',
            `incitype`='$Incident_Type', `incidate`='$Date_Of_Incident', `locate`='$Location',
            `city`='$City', `state`='$State', `zip`='$Zip_Code', `incides`='$Incident_Des',
            `act`='$Follow_Up_Act' WHERE `incino`='$Incident_No'";

    $result = $conn->query($sql);
    if ($result === TRUE) {
        echo "Updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Fetch and display updated records
    $sql = "SELECT * FROM incident WHERE `incino`='$Incident_No'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>Report_By</th><th>Date_of_Report</th><th>Title/Role</th><th>Incident_No</th><th>Incident_type</th><th>Date_of_Incident</th><th>Location</th><th>City</th><th>State</th><th>Zip_Code</th><th>Incident_Description</th><th>Follow_up Action</th><th>Edit</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["dor"] . "</td>";
            echo "<td>" . $row["title"] . "</td>";
            echo "<td>" . $row["incino"] . "</td>";
            echo "<td>" . $row["incitype"] . "</td>";
            echo "<td>" . $row["incidate"] . "</td>";
            echo "<td>" . $row["locate"] . "</td>";
            echo "<td>" . $row["city"] . "</td>";
            echo "<td>" . $row["state"] . "</td>";
            echo "<td>" . $row["zip"] . "</td>";
            echo "<td>" . $row["incides"] . "</td>";
            echo "<td>" . $row["act"] . "</td>";
            //echo "<td><a name='update_btn' href='update.php?id=" . $row['incino'] . "'>EDIT</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No records found";
    }

   // $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="form.css">
</head>
<body>
<form action="" method="post">
    <?php
    $sql = "SELECT * FROM incident WHERE `incino`='$id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            ?>
            <table width="100%" id">
                <tr>
                    <td><label>REPORTED BY:</label></td>
                    <td><input type="text" name="name" value="<?php echo $row['name']; ?>"></td>
                    <td><label>DATE OF REPORT:</label></td>
                    <td><input type="datetime-local" name="dor" value="<?php echo $row['dor']; ?>"></td>
                </tr>
                <tr>
                    <td><label>TITLE/ROLE:</label></td>
                    <td><input type="text" name="title" value="<?php echo $row['title']; ?>"></td>
                    <td><label>INCIDENT NO.:</label></td>
                    <td><input type="text" name="incino" value="<?php echo $row['incino']; ?>" readonly></td>
                </tr>
            </table>
            <h3>INCIDENT INFORMATION</h3>
            <table width="100%">
                <tr>
                    <td><label>INCIDENT TYPE:</label></td>
                    <td><input type="text" name="incitype" value="<?php echo $row['incitype']; ?>"></td>
                    <td colspan="3"><label>DATE OF INCIDENT:</label></td>
                    <td><input type="text" name="incidate" value="<?php echo $row['incidate']; ?>"></td>
                </tr>
                <tr>
                    <td><label>LOCATION:</label></td>
                    <td colspan="6"><input type="text" name="locate" value="<?php echo $row['locate']; ?>"></td>
                </tr>
                <tr>
                    <td><label>CITY:</label></td>
                    <td>
                        <select name="city" class="dropdown1">
                            <option <?php if ($row['city'] == 'CHENNAI') echo 'selected'; ?>>CHENNAI</option>
                            <option <?php if ($row['city'] == 'WAYANAD') echo 'selected'; ?>>WAYANAD</option>
                        </select>
                    </td>
                    <td><label>STATE:</label></td>
                    <td>
                        <select name="state" class="dropdown2">
                            <option <?php if ($row['state'] == 'CHENNAI') echo 'selected'; ?>>CHENNAI</option>
                            <option <?php if ($row['state'] == 'WAYANAD') echo 'selected'; ?>>WAYANAD</option>
                        </select>
                    </td>
                    <td><label>ZIP CODE:</label></td>
                    <td><input type="text" name="zip" value="<?php echo $row['zip']; ?>"></td>
                </tr>
            </table>
            <div>
                <label>INCIDENT DESCRIPTION</label><br>
                <textarea name="incides"><?php echo $row['incides']; ?></textarea><br>
                <label>FOLLOW UP ACTION</label><br>
                <textarea name="act"><?php echo $row['act']; ?></textarea>
            </div>
            <button name="submit" id="up_btn">UPDATE</button>
            <?php
        }
    }
    ?>
</form>
</body>
</html>
