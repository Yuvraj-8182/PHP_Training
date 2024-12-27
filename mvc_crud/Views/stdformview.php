<?php
require_once '../Controller/StudentController.php';

$controller = new StudentController();
$courses = $controller->getCourses(); // Get courses for dropdown

$data = [
    'id' => null,
    'fname' => '',
    'lname' => '',
    'email' => '',
    'mobile' => '',
    'gender' => '',
    'course_name' => '',
    'status' => '',
];

$errorMessages = [
    'fname' => '',
    'lname' => '',
    'email' => '',
    'mobile' => '',
    'gender' => '',
    'course_name' => '',
    'status' => '',
];

$isEdit = false;
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $isEdit = true;
    $student = $controller->getStudentById($_GET['id']);
    if ($student) {
        $data = array_merge($data, $student);
    }
}

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the form is for editing
    $isEdit = isset($_POST['id']) && !empty($_POST['id']);
    
    // Retrieve POST data
    $data = [
        'id' => $_POST['id'] ?? null,
        'fname' => trim($_POST['fname']),
        'lname' => trim($_POST['lname']),
        'email' => trim($_POST['email']),
        'mobile' => trim($_POST['mobile']),
        'gender' => $_POST['gender'] ?? '',
        'course_name' => $_POST['course_name'] ?? '',
        'status' => $_POST['status'] ?? '',
    ];

    // Validate form fields
    if (empty($data['fname'])) {
        $errorMessages['fname'] = "First name is required.";
    }

    if (empty($data['lname'])) {
        $errorMessages['lname'] = "Last name is required.";
    }

    if (empty($data['email'])) {
        $errorMessages['email'] = "Email is required.";
    } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errorMessages['email'] = "Invalid email format.";
    }

    if (empty($data['mobile'])) {
        $errorMessages['mobile'] = "Mobile number is required.";
    } elseif (!preg_match('/^[0-9]{10}$/', $data['mobile'])) {
        $errorMessages['mobile'] = "Mobile number must be 10 digits.";
    }

    if (empty($data['gender'])) {
        $errorMessages['gender'] = "Gender is required.";
    }

    if (empty($data['course_name'])) {
        $errorMessages['course_name'] = "Course selection is required.";
    }

    if (empty($data['status'])) {
        $errorMessages['status'] = "Status is required.";
    }

    if (!array_filter($errorMessages)) {
        $response = $controller->saveStudent($data);
        if (isset($response['error'])) {
            $errorMessages['general'] = $response['error'];
        } else {
       
            header('Location: index.php');
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
    <title><?php echo $isEdit ? 'Edit Student' : 'Add Student'; ?></title>
    <link rel="stylesheet" href="../assets/student.css">
</head>

<body>
    <div class="container">
        <h1><?php echo $isEdit ? 'Edit Student' : 'Add Student'; ?></h1>
        <form method="post" class="form-container">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($data['id']); ?>">

            <div class="form-group">
                <label for="fname">First Name:</label>
                <input type="text" id="fname" name="fname" value="<?php echo htmlspecialchars($data['fname']); ?>" required>
                <span class="error-message"><?php echo $errorMessages['fname']; ?></span>
            </div>

            <div class="form-group">
                <label for="lname">Last Name:</label>
                <input type="text" id="lname" name="lname" value="<?php echo htmlspecialchars($data['lname']); ?>" required>
                <span class="error-message"><?php echo $errorMessages['lname']; ?></span>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($data['email']); ?>" required>
                <span class="error-message"><?php echo $errorMessages['email']; ?></span>
            </div>

            <div class="form-group">
                <label for="mobile">Mobile:</label>
                <input type="tel" id="mobile" name="mobile" value="<?php echo htmlspecialchars($data['mobile']); ?>" pattern="[0-9]{10}" maxlength="10" required>
                <span class="error-message"><?php echo $errorMessages['mobile']; ?></span>
            </div>

            <div class="form-group">
                <label for="gender">Gender:</label>
                <select id="gender" name="gender" required>
                    <option value="">Select Gender</option>
                    <option value="Male" <?php echo $data['gender'] === 'Male' ? 'selected' : ''; ?>>Male</option>
                    <option value="Female" <?php echo $data['gender'] === 'Female' ? 'selected' : ''; ?>>Female</option>
                    <option value="Other" <?php echo $data['gender'] === 'Other' ? 'selected' : ''; ?>>Other</option>
                </select>
                <span class="error-message"><?php echo $errorMessages['gender']; ?></span>
            </div>

            <div class="form-group">
                <label for="course_name">Course:</label>
                <select id="course_name" name="course_name" required>
                    <option value="">Select Course</option>
                    <?php foreach ($courses as $course): ?>
                        <option value="<?php echo htmlspecialchars($course); ?>" <?php echo $data['course_name'] === $course ? 'selected' : ''; ?>><?php echo htmlspecialchars($course); ?></option>
                    <?php endforeach; ?>
                </select>
                <span class="error-message"><?php echo $errorMessages['course_name']; ?></span>
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <select id="status" name="status" required>
                    <option value="Active" <?php echo $data['status'] === 'Active' ? 'selected' : ''; ?>>Active</option>
                    <option value="Inactive" <?php echo $data['status'] === 'Inactive' ? 'selected' : ''; ?>>Inactive</option>
                </select>
                <span class="error-message"><?php echo $errorMessages['status']; ?></span>
            </div>

            <button type="submit" class="btn"><?php echo $isEdit ? 'Update' : 'Add'; ?></button>
        </form>
    </div>
</body>

</html>
