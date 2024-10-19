<?php
// Include your database connection script
include '../db.php';

// Function to capture a 10-digit number from the input
function captureTenDigitNumber($input) {
    // Use regex to find a 10-digit number in the string
    preg_match('/\d{10}/', $input, $matches);
    
    if (!empty($matches)) {
        return $matches[0];
    } else {
        return false;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['time_in'])) {
        date_default_timezone_set('Asia/Kolkata');
        $currentDateTime = date("Y-m-d H:i:s");
        $data = $_POST['time_in'];
        $result = captureTenDigitNumber($data);
        
        if ($result) {
            // Establish database connection
            $db = new mysqli(' ', 'root', '', 'attendance');

            // Check connection
            if ($db->connect_error) {
                die("Connection failed: " . $db->connect_error);
            }

            // Prepare and execute query to select student information
            $stmt = $db->prepare('SELECT * FROM users WHERE id_number = ?');
            $stmt->bind_param('s', $result);
            $stmt->execute();
            $queryResult = $stmt->get_result();

            if ($queryResult->num_rows > 0) {
                $student = $queryResult->fetch_assoc();
                $full_name = $student['full_name'];
                $section = $student['section'];
                $id_number = $student['id_number'];
                $user_id = $student['user_id'];

                // Prepare and execute query to insert data into the database
                $stmt = $db->prepare('INSERT INTO record (full_name, section, id_number, time_in, user_id) VALUES (?, ?, ?, ?, ?)');
                $stmt->bind_param('sssss', $full_name, $section, $id_number, $currentDateTime ,$user_id);
                $success = $stmt->execute();

                if ($success) {
                    echo "Data inserted successfully!";
                } else {
                    echo "Failed to insert data: " . $stmt->error;
                }
            } else {
                echo "No student found with the provided ID number.";
            }

            // Close the prepared statement and connection
            $stmt->close();
            $db->close();
        } else {
            echo "No 10-digit number found in the input.";
        }
    } elseif (isset($_POST['time_out'])) {
        date_default_timezone_set('Asia/Manila');
        $currentDateTime = date("Y-m-d H:i:s");
        $data1 = $_POST['time_out'];
        $results = captureTenDigitNumber($data1);

        if ($results) {
            // Establish database connection
            $db = new mysqli('localhost', 'root', '', 'attendance');

            // Check connection
            if ($db->connect_error) {
                die("Connection failed: " . $db->connect_error);
            }

            // Prepare and execute query to update the time_out field
            $stmt = $db->prepare('UPDATE record SET time_out = ? WHERE id_number = ? AND time_out IS NULL');
            $stmt->bind_param("si", $currentDateTime, $results);
            $success = $stmt->execute();

            if ($success) {
                echo "time_out field updated successfully!";
            } else {
                echo "Failed to update time_out field: " . $stmt->error;
            }

            // Close the prepared statement and connection
            $stmt->close();
            $db->close();
        } else {
            echo "No 10-digit number found in the input.";
        }
    } else {
        echo "Data parameter missing.";
    }
} else {
    echo "Invalid request method.";
}
?>
