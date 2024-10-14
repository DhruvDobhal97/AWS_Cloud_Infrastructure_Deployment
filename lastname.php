<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Caf&eacute;!</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body class="bodyStyle">

    <div id="header" class="mainHeader">
        <hr>
        <div class="center">Dobhal Caf&eacute;</div>
    </div>
    <br>
    <hr>
    <div class="topnav">
        <a href="index.php">Home</a>
        <a href="#aboutUs">About Us</a>
        <a href="#contactUs">Contact Us</a>
    </div>
    <hr>
    <div id="mainContent">

        <div id="mainPictures" class="center">
            <table>
                <tr>
                    <td><img src="images/Coffee-and-Pastries.jpg" height=auto width="490"></td>
                    <td><img src="images/Cake-Vitrine.jpg" height=auto width="450"></td>
                </tr>
            </table>
            <hr>
            <div id="header" class="mainHeader"><p>Dobhal caf&eacute; Employee List!</p></div>
            <br>

            <?php
            // Update Database Connection Details
            $host = 'database-1-instance-1.ctaesga4cokf.ca-central-1.rds.amazonaws.com';
            $dbname = 'dobhal_db'; // Add the correct database name here
            $username = 'postgres';
            $password = 'Dhruv1997';

            try {
                // Connect to PostgreSQL database
                $conn = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // Debugging Step
                echo "Reached the database query section<br>";

                // Fetch employee data
                $query = "SELECT * FROM employee";
                $result = $conn->query($query);

                // Start table
                echo "<table border='1' cellpadding='10' cellspacing='0'>";
                echo "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Position</th><th>Timestamp</th></tr>";

                // Loop through the result set and output each row as a table row
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['fname'] . "</td>";
                    echo "<td>" . $row['lname'] . "</td>";
                    echo "<td>" . $row['position'] . "</td>";
                    echo "<td>" . $row['created_at'] . "</td>";
                    echo "</tr>";
                }

                // End table
                echo "</table>";
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
            ?>

        </div>
    </div>
</body>
</html>
