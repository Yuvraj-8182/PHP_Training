<div class="form-group">
    <label for="fname">First Name:</label>
    <input type="text" id="fname" name="fname" value="<?php echo htmlspecialchars($data['fname'] ?? ''); ?>" required>
    <span class="error-message"><?php echo $errorMessages['fname']; ?></span>
</div>

<div class="form-group">
    <label for="lname">Last Name:</label>
    <input type="text" id="lname" name="lname" value="<?php echo htmlspecialchars($data['lname'] ?? ''); ?>" required>
    <span class="error-message"><?php echo $errorMessages['lname']; ?></span>
</div>

<div class="form-group">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($data['email'] ?? ''); ?>" required>
    <span class="error-message"><?php echo $errorMessages['email']; ?></span>
</div>
<label for="fname">First Name:</label>
<input type="text" id="fname" name="fname" value="<?php echo htmlspecialchars($data['fname'] ?? $student['fname'] ?? ''); ?>" required>
<span class="error-message"><?php echo $errorMessages['fname']; ?></span>


<div class="form-group">
        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
            <option value="">Select Gender</option>
            <option value="Male" <?php echo (isset($data['gender']) && $data['gender'] === 'Male') || (isset($student['gender']) && $student['gender'] === 'Male') ? 'selected' : ''; ?>>Male</option>
            <option value="Female" <?php echo (isset($data['gender']) && $data['gender'] === 'Female') || (isset($student['gender']) && $student['gender'] === 'Female') ? 'selected' : ''; ?>>Female</option>
            <option value="Other" <?php echo (isset($data['gender']) && $data['gender'] === 'Other') || (isset($student['gender']) && $student['gender'] === 'Other') ? 'selected' : ''; ?>>Other</option>
        </select>
        <span class="error-message"><?php echo $errorMessages['gender']; ?></span>
    </div>


<div class="form-group">
    <label for="mobile">Mobile:</label>
    <input 
        type="tel" 
        id="mobile" 
        name="mobile" 
        value="<?php echo htmlspecialchars($data['mobile'] ?? ''); ?>" 
        pattern="[0-9]{10}" 
        maxlength="10" 
        title="Please enter a valid 10-digit mobile number." 
        required>
    <span class="error-message"><?php echo $errorMessages['mobile']; ?></span>
</div>

<div class="form-group">
    <label for="gender">Gender:</label>
    <select id="gender" name="gender" required>
        <option value="">Select Gender</option>
        <option value="Male" <?php echo isset($data['gender']) && $data['gender'] === 'Male' ? 'selected' : ''; ?>>Male</option>
        <option value="Female" <?php echo isset($data['gender']) && $data['gender'] === 'Female' ? 'selected' : ''; ?>>Female</option>
        <option value="Other" <?php echo isset($data['gender']) && $data['gender'] === 'Other' ? 'selected' : ''; ?>>Other</option>
    </select>
    <span class="error-message"><?php echo $errorMessages['gender']; ?></span>
</div>

<div class="form-group">
    <label for="course_name">Course:</label>
    <select id="course_name" name="course_name" required>
        <option value="">Select Course</option>
        <?php foreach ($courses as $course): ?>
            <option value="<?php echo $course; ?>" <?php echo isset($data['course_name']) && $data['course_name'] === $course ? 'selected' : ''; ?>><?php echo $course; ?></option>
        <?php endforeach; ?>
    </select>
    <span class="error-message"><?php echo $errorMessages['course_name']; ?></span>
</div>

<div class="form-group">
    <label for="status">Status:</label>
    <select id="status" name="status" required>
        <option value="Active" <?php echo isset($data['status']) && $data['status'] === 'Active' ? 'selected' : ''; ?>>Active</option>
        <option value="Inactive" <?php echo isset($data['status']) && $data['status'] === 'Inactive' ? 'selected' : ''; ?>>Inactive</option>
    </select>
    <span class="error-message"><?php echo $errorMessages['status']; ?></span>
</div>
error msg show. but remove data from form field,so  not remove data from form field.
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $student = $controller->getStudentById($_GET['id']);
    $data = $student; // Use data from the database to populate the form
} else {
    $data = [
        'id' => $_POST['id'] ?? $student['id'] ?? null,
        'fname' => $_POST['fname'] ?? $student['fname'] ?? '',
        'lname' => $_POST['lname'] ?? $student['lname'] ?? '',
        'email' => $_POST['email'] ?? $student['email'] ?? '',
        'mobile' => $_POST['mobile'] ?? $student['mobile'] ?? '',
        'gender' => $_POST['gender'] ?? $student['gender'] ?? '',
        'course_name' => $_POST['course_name'] ?? $student['course_name'] ?? '',
        'status' => $_POST['status'] ?? $student['status'] ?? '',
    ];
}


<div class="form-group">
        <label for="course_name">Course:</label>
        <select id="course_name" name="course_name" required>
            <option value="">Select Course</option>
            <?php foreach ($courses as $course): ?>
                <option value="<?php echo $course; ?>" <?php echo (isset($data['course_name']) && $data['course_name'] === $course) || (isset($student['course_name']) && $student['course_name'] === $course) ? 'selected' : ''; ?>><?php echo $course; ?></option>
            <?php endforeach; ?>
        </select>
        <span class="error-message"><?php echo $errorMessages['course_name']; ?></span>
    </div>

    <div class="form-group">
        <label for="status">Status:</label>
        <select id="status" name="status" required>
            <option value="Active" <?php echo (isset($data['status']) && $data['status'] === 'Active') || (isset($student['status']) && $student['status'] === 'Active') ? 'selected' : ''; ?>>Active</option>
            <option value="Inactive" <?php echo (isset($data['status']) && $data['status'] === 'Inactive') || (isset($student['status']) && $student['status'] === 'Inactive') ? 'selected' : ''; ?>>Inactive</option>
        </select>
        <span class="error-message"><?php echo $errorMessages['status']; ?></span>
    </div>
    
    <button type="submit" class="btn"><?php echo isset($student) ? 'Update' : 'Add'; ?></button>
</form>


<?php
require_once '../Controller/CourseController.php';

$controller = new CourseController();
$message = '';
$course = null;

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $course = $controller->getCourseById($_GET['id']);
}

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $data = [
//         'id' => $_POST['id'] ?? null,
//         'name' => $_POST['name'],
//         'description' => $_POST['description']
//     ];
//     $message = $controller->saveCourse($data);

//     if ($message === true) {
//         header('Location: courseview.php');
//         exit();
//     }
// }

$errorMessages = [
    'name' => '',
    'description' => '',
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'id' => $_POST['id'] ?? null,
        'name' => trim($_POST['name']),
        'description' => trim($_POST['description']),
    ];

    // Validate fields and populate error messages
    if (empty($data['name'])) {
        $errorMessages['name'] = "name is required.";
    }

    if (empty($data['description'])) {
        $errorMessages['description'] = "description is required.";
    }
    // If no errors, save the student data
    if (!array_filter($errorMessages)) {
        $response = $controller->saveCourse($data);

        if (isset($response['error'])) {
            $errorMessages['general'] = $response['error'];
        } else {
            header('Location: courseview.php');
            exit();
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($course) ? 'Edit Course' : 'Add Course'; ?></title>
    <link rel="stylesheet" href="../assets/formview.css">
</head>

<body>
    <div class="container">
        <h1><?php echo isset($course) ? 'Edit Course' : 'Add Course'; ?></h1>
        <?php if (!empty($message)): ?>
            <p class="error-message"><?php echo htmlspecialchars($message); ?></p>
        <?php endif; ?>
        <form method="post" class="course-form">
            <input type="hidden" name="id" value="<?php echo $course['id'] ?? $data['id'] ?? ''; ?>">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($course['name'] ?? $data['name'] ?? ''); ?>"
                    required>
                    <span class="error-message"><?php echo $errorMessages['name']; ?></span>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" name="description" rows="10" cols="10"
                    required><?php echo htmlspecialchars($course['description'] ?? $data['description'] ?? ''); ?></textarea>
                    <span class="error-message"><?php echo $errorMessages['description']; ?></span>
            </div>
            <button type="submit" class="btn btn-submit"><?php echo isset($course) ? 'Update' : 'Add'; ?></button>
        </form>
        <a href="courseview.php" class="btn btn-back">Back to Course List</a>
    </div>
</body>

</html>














class StudentController {
    private $model;

    public function __construct() {
        $this->model = new StudentModel();
    }

    public function showStudents($page = 1, $limit = 10) {
        $offset = ($page - 1) * $limit;
        return $this->model->getStudents($offset, $limit);
    }

    public function getTotalStudentCount() {
        return $this->model->getTotalCount();
    }

    public function deleteStudent($id) {
        return $this->model->deleteStudent($id);
    }
}







class StudentModel {
    private $db;

    public function __construct() {
        $this->db = new mysqli('localhost', 'root', '', 'mvc');
        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }
    }

    public function getStudents($offset, $limit) {
        $stmt = $this->db->prepare("SELECT * FROM students LIMIT ?, ?");
        $stmt->bind_param('ii', $offset, $limit);
        $stmt->execute();
        $result = $stmt->get_result();
        $students = [];
        while ($row = $result->fetch_assoc()) {
            $students[] = $row;
        }
        return $students;
    }

    public function getTotalCount() {
        $result = $this->db->query("SELECT COUNT(*) AS total FROM students");
        $row = $result->fetch_assoc();
        return $row['total'];
    }

    public function deleteStudent($id) {
        $stmt = $this->db->prepare("DELETE FROM students WHERE id = ?");
        $stmt->bind_param('i', $id);
        return $stmt->execute();
    }
}











<?php
require_once '../Controller/StudentController.php';

$controller = new StudentController();

// Handle deletion
if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $controller->deleteStudent($id);
    header('Location: studentview.php');
    exit();
}

// Pagination setup
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 10;
$totalStudents = $controller->getTotalStudentCount();
$totalPages = ceil($totalStudents / $limit);

$students = $controller->showStudents($page, $limit);
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
        <table class="student-table">
            <thead>
                <tr>
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
                                <a href="studentview.php?delete_id=<?php echo $student['id']; ?>" class="btn btn-delete" onclick="return confirm('Are you sure you want to delete this student?');">Delete</a>
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
        </table>

        <!-- Pagination Links -->
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
