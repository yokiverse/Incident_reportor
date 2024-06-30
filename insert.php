<?php
/*include "connect.php";
if(isset($_POST['submit']))
{
    $Reported_By=$_POST['name'];
    $Date_Of_Report=$_POST['dor'];
    $Title=$_POST['title'];
    $Incident_No=$_POST['incino'];
    $Incident_Type=$_POST['incitype'];
    $Date_Of_Incident=$_POST['incidate'];
    $Location=$_POST['locate'];
    $City=$_POST['city'];
    $State=$_POST['state'];
    $Zip_Code=$_POST['zip'];
    $Incident_Des=$_POST['incides'];
    $Follow_Up_Act=$_POST['act'];
?>
<?php
    $sql="INSERT INTO incident(name,dor,title,incino,incitype,incidate,locate,city,state,
    zip,incides,act) VALUES('$Reported_By','$Date_Of_Report','$Title','$Incident_No','$Incident_Type',
    '$Date_Of_Incident','$Location','$City','$State','$Zip_Code','$Incident_Des','$Follow_Up_Act')";
   $result=$conn->query($sql);
    if($result==TRUE)
    {
        echo "New Record Created";
    }
    else
    {
        echo "Error ".$sql."<br>".$conn->error;
    }
    if(isset($_POST['submit'])){
    $sql = "SELECT * FROM incident";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "<table border='1' id='tab'>";
        echo "<tr><th>Report_By</th><th>Date_of_Report</th><th>Title/Role</th><th>Incident_No</th><th>Incident_type</th><th>Date_of_Incident</th><th>Location</th><th>City</th><th>State</th><th>Zip_Code</th><th>Incident_Description</th><th>Follow_up Action</th>link<th>edit</th></tr>";
        while ($row = $result->fetch_assoc())
        {
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
            echo "<td><a name='update_btn' href='update.php?id=" . $row['incino'] . "'>EDIT</a></td>";
    
      echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No records found";
    }
    
    }

    $conn->close();
}*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Incident Report</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>
    <form action="" method="post">
        <div>
            <label>Search:</label>
            <input type="text" id="searchInput" name="search_keyword">
            <button type="button" id="searchButton">Search</button>
        </div>
    </form>
    <script>
        document.getElementById('searchButton').addEventListener('click', function() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("tab");
            tr = table.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td");
                for (var j = 0; j < td.length; j++) {
                    if (td[j]) {
                        txtValue = td[j].textContent || td[j].innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                            break; 
                        } else {
                            tr[i].style.display = "none";
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>
<?php
include "connect.php";
if(isset($_POST['submit']))
{
    $Reported_By=$_POST['name'];
    $Date_Of_Report=$_POST['dor'];
    $Title=$_POST['title'];
    $Incident_No=$_POST['incino'];
    $Incident_Type=$_POST['incitype'];
    $Date_Of_Incident=$_POST['incidate'];
    $Location=$_POST['locate'];
    $City=$_POST['city'];
    $State=$_POST['state'];
    $Zip_Code=$_POST['zip'];
    $Incident_Des=$_POST['incides'];
    $Follow_Up_Act=$_POST['act'];
    
    $sql="INSERT INTO incident(name,dor,title,incino,incitype,incidate,locate,city,state,zip,incides,act) VALUES('$Reported_By','$Date_Of_Report','$Title','$Incident_No','$Incident_Type','$Date_Of_Incident','$Location','$City','$State','$Zip_Code','$Incident_Des','$Follow_Up_Act')";
    $result=$conn->query($sql);
    if($result==TRUE)
    {
        echo "New Record Created";
    }
    else
    {
        echo "Error ".$sql."<br>".$conn->error;
    }
}

$sql = "SELECT * FROM incident";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "<table border='1' id='tab'>";
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
        echo "<td><a name='update_btn' href='update.php?id=" . $row['incino'] . "'>EDIT</a></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No records found";
}

$conn->close();
?>
