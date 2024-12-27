<?php
require_once '../Controller/CourseController.php';

$controller = new CourseController();

if (!isset($_GET['id'])) {
    echo "<p class='error-message'>No course ID provided.</p>";
    exit();
}

$course = $controller->getCourseById($_GET['id']);

if (!$course) {
    echo "<p class='error-message'>Course not found.</p>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Course</title>
    <link rel="stylesheet" href="../assets/viewcourse.css"> 
</head>
<body>
    <div class="container">
        <h1>Course Details</h1>
        <table class="course-details">
            <tr>
                <th>ID</th>
                <td><?php echo htmlspecialchars($course['id']); ?></td>
            </tr>
            <tr>
                <th>Name</th>
                <td><?php echo htmlspecialchars($course['name']); ?></td>
            </tr>
            <tr>
                <th>Description</th>
                <td><?php echo htmlspecialchars($course['description']); ?></td>
            </tr>
            <tr>
                <th>Created Date</th>
                <td><?php echo htmlspecialchars($course['create_date']); ?></td>
            </tr>
            <tr>
                <th>Updated Date</th>
                <td><?php echo htmlspecialchars($course['update_date']); ?></td>
            </tr>
        </table>
        <a href="courseview.php" class="btn btn-back">Back to Course List</a>
    </div>
</body>
</html>
