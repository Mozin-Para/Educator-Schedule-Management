<?php
session_start();
include('admin/db_connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style> body { background-color: #343a40; } 
    .styled-table { width: 100%; border-collapse: collapse; background-color: blue; color: white; border-radius: 7px; overflow: hidden; } .styled-table th, .styled-table td { padding: 12px 15px; text-align: left; } .styled-table th { background-color: darkblue; } .styled-table tr:nth-child(even) { background-color: #1e90ff; } .styled-table tr:hover { background-color: #4169e1; } </style>
</head>
<body>
    <div class="container mt-5">
        <h2><font color=white>Faculty List</font></h2>
        <table class="styled-table">
            <thead>
                <tr>
                    
                    <th>ID No</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Last Name</th>
                    <th>Contact</th>
                    <th>Gender</th>
                    <th>Address</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT `id`, `id_no`, `firstname`, `middlename`, `lastname`, `contact`, `gender`, `address`, `email` FROM `faculty`";
                $result = $conn->query($query);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()):
                ?>
                <tr>
                    
                    <td><?php echo $row['id_no']; ?></td>
                    <td><?php echo $row['firstname']; ?></td>
                    <td><?php echo $row['middlename']; ?></td>
                    <td><?php echo $row['lastname']; ?></td>
                    <td><?php echo $row['contact']; ?></td>
                    <td><?php echo $row['gender']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                </tr>
                <?php 
                    endwhile;
                } else {
                    echo "<tr><td colspan='9'>No data found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>


