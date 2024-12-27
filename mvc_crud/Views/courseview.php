<?php 
require_once '../Controller/CourseController.php';

$c = new CourseController();

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])) {
    $c->deleteCourse($_GET['delete_id']);
    header('Location: courseview.php');
    exit();
}

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 3;
$totalCourse = $c->getTotalCourseCount();
$totalPages = ceil($totalCourse / $limit);
$courses = $c->showCourses($page, $limit);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>
    <link rel="stylesheet" href="../assets/course.css"> 
</head>
<body>
    <h1>Courses</h1>

    <?php
    session_start();
    if (isset($_SESSION['message'])) {
        echo "<p class='message'>" . htmlspecialchars($_SESSION['message']) . "</p>";
        unset($_SESSION['message']);
    }
    ?>

    <form method="POST" action="bulk_action.php">
        <table>
            <thead>
                <tr>
                    <th><input type="checkbox" name="select_all" value="1" onchange="this.form.submit()">Select All</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Created Date</th>
                    <th>Updated Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($courses)): ?>
                    <?php foreach ($courses as $course): ?>
                        <tr>
                            <td>
                                <input type="checkbox" name="selected_courses[]" value="<?php echo $course['id']; ?>" 
                                <?php echo isset($_POST['select_all']) ? 'checked' : ''; ?>>
                            </td>
                            <td><?php echo htmlspecialchars($course['id']); ?></td>
                            <td><?php echo htmlspecialchars($course['name']); ?></td>
                            <td><?php echo htmlspecialchars($course['description']); ?></td>
                            <td><?php echo htmlspecialchars($course['create_date']); ?></td>
                            <td><?php echo htmlspecialchars($course['update_date']); ?></td>
                            <td>
                                <a class="action-btn edit" href="formview.php?id=<?php echo $course['id']; ?>">Edit</a>
                                <a class="action-btn delete" href="courseview.php?delete_id=<?php echo $course['id']; ?>" onclick="return confirm('Are you sure?');">Delete</a>
                                <a class="action-btn view" href="viewcourse.php?id=<?php echo $course['id']; ?>">View</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7">No courses found.</td>
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
</body>
</html>
