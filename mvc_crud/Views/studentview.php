<?php
require_once '../Controller/StudentController.php';


$controller = new StudentController();

if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $controller->deleteStudent($id);
    header('Location: index.php');
    exit();
}
$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
$limit = 5;
$totalStudents = $controller->getTotalStudentCount();
$totalPages = ceil($totalStudents / $limit);

$students = $controller->showStudents($page, $limit);

//$students = $controller->showstudents();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
    <link rel="stylesheet" href="../assets/studentview.css">
    <link rel="stylesheet" href="../assets/style.css">
</head>

<body>
    <div class="container">
        <h1>Student List</h1>
        <?php
        session_start();
        if (isset($_SESSION['message'])) {
            echo "<p class='message'>" . htmlspecialchars($_SESSION['message']) . "</p>";
            unset($_SESSION['message']);
        }
        ?>
<form method="POST" action="student_action.php">
        <table class="student-table">
            <thead>
                <tr>
                    <th><input type="checkbox" name="action" value="select_all">Select All</th>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Gender</th>
                    <th>Course Name</th>
                    <th>Status</th>
                    <th>Created Date</th>
                    <th>Updated Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($students)): ?>
                    <?php foreach ($students as $student): ?>
                        <tr>
                            <td>
                                <input type="checkbox" name="selected_students[]" value="<?php echo $student['id']; ?>" 
                                <?php echo isset($_POST['select_all']) ? 'checked' : ''; ?>>
                            </td>
                            <td><?php echo htmlspecialchars($student['id']); ?></td>
                            <td><?php echo htmlspecialchars($student['fname']); ?></td>
                            <td><?php echo htmlspecialchars($student['lname']); ?></td>
                            <td><?php echo htmlspecialchars($student['email']); ?></td>
                            <td><?php echo htmlspecialchars($student['mobile']); ?></td>
                            <td><?php echo htmlspecialchars($student['gender']); ?></td>
                            <td><?php echo htmlspecialchars($student['course_name']); ?></td>
                            <td><?php echo htmlspecialchars($student['status']); ?></td>
                            <td><?php echo htmlspecialchars($student['create_date']); ?></td>
                            <td><?php echo htmlspecialchars($student['update_date']); ?></td>
                            <td>
                                <a href="stdformview.php?id=<?php echo $student['id']; ?>" class="btn btn-edit">Edit</a>
                                <a href="studentview.php?delete_id=<?php echo $student['id']; ?>" class="btn btn-delete"
                                    onclick="return confirm('Are you sure you want to delete this student?');">Delete</a>
                                <a href="viewstudent.php?id=<?php echo $student['id']; ?>" class="btn btn-view">View</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="11">No students found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
            <button type="submit" class="action-btn delete" name="action" value="delete">Delete Selected</button>
            <button type="submit" class="action-btn edit" name="action" value="download">Download Selected</button>
        </table>
        </form>
        <div class="pagination">
            <?php if ($page > 1): ?>
                <a href="?page=<?php echo $page - 1; ?>" class="pagination-link">Previous</a>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <a href="?page=<?php echo $i; ?>" class="pagination-link <?php echo ($i === $page) ? 'active' : ''; ?>">
                    <?php echo $i; ?>
                </a>
            <?php endfor; ?>

            <?php if ($page < $totalPages): ?>
                <a href="?page=<?php echo $page + 1; ?>" class="pagination-link">Next</a>
            <?php endif; ?>
        </div>
        <a class="back-btn" href="index.php">Back to Dashboard</a>
    </div>

</body>

</html>