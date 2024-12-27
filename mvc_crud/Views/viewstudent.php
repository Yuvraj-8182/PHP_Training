<?php
require_once '../Controller/StudentController.php';

$controller = new StudentController();


if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Invalid student ID.");
}

$id = $_GET['id'];
$student = $controller->getStudentById($id);

if (!$student) {
    die("Student not found.");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Student</title>
    <link rel="stylesheet" href="../assets/viewstudent.css"> 
</head>
<body>
    <div class="container">
        <h1>Student Details</h1>
        <table class="details-table">
            <tr>
                <th>ID</th>
                <td><?php echo htmlspecialchars($student['id']); ?></td>
            </tr>
            <tr>
                <th>First Name</th>
                <td><?php echo htmlspecialchars($student['fname']); ?></td>
            </tr>
            <tr>
                <th>Last Name</th>
                <td><?php echo htmlspecialchars($student['lname']); ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?php echo htmlspecialchars($student['email']); ?></td>
            </tr>
            <tr>
                <th>Mobile</th>
                <td><?php echo htmlspecialchars($student['mobile']); ?></td>
            </tr>
            <tr>
                <th>Gender</th>
                <td><?php echo htmlspecialchars($student['gender']); ?></td>
            </tr>
            <tr>
                <th>Course Name</th>
                <td><?php echo htmlspecialchars($student['course_name']); ?></td>
            </tr>
            <tr>
                <th>Status</th>
                <td><?php echo htmlspecialchars($student['status']); ?></td>
            </tr>
            <tr>
                <th>Created Date</th>
                <td><?php echo htmlspecialchars($student['create_date']); ?></td>
            </tr>
            <tr>
                <th>Updated Date</th>
                <td><?php echo htmlspecialchars($student['update_date']); ?></td>
            </tr>
        </table>
        <a href="index.php" class="back-link">Back to Student List</a>
    </div>
</body>
</html>
