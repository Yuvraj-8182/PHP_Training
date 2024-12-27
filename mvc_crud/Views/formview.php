<?php
require_once '../Controller/CourseController.php';

$controller = new CourseController();

$message='';
$data = [
    'id' => null,
    'name' => '',
    'description' => '',
];

$errorMessages = [
    'name' => '',
    'description' => '',
];

$isEdit = false;
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $isEdit = true;
    $course = $controller->getCourseById($_GET['id']);
    if ($course) {
        $data = array_merge($data, $course);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $isEdit = isset($_POST['id']) && !empty($_POST['id']);
    

    $data = [
        'id' => $_POST['id'] ?? null,
        'name' => trim($_POST['name']),
        'description' => trim($_POST['description']),
    ];
  
    if (empty($data['name'])) {
        $errorMessages['name'] = "Corse name is required.";
    }

    if (empty($data['description'])) {
        $errorMessages['description'] = "description is required.";
    }

    if (!array_filter($errorMessages)) {
        $message = $controller->saveCourse($data);
        if ($message === true) 
        {
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
    <title><?php echo $isEdit ? 'Edit Course' : 'Add Course'; ?></title>
    <link rel="stylesheet" href="../assets/formview.css"> 
</head>
<body>
    <div class="container">
        <h1><?php echo $isEdit ? 'Edit Course' : 'Add Course'; ?></h1>
        <?php if (!empty($message)): ?>
            <p class="error-message"><?php echo htmlspecialchars($message); ?></p>
        <?php endif; ?>
        <form method="post" class="course-form">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($data['id']);?>">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($data['name']); ?>" required>
                <span class="error-message"><?php echo $errorMessages['name']; ?></span>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" name="description" rows="10" cols="10" required><?php echo htmlspecialchars($data['description']); ?></textarea>
                <span class="error-message"><?php echo $errorMessages['description']; ?></span>
            </div>
            <button type="submit" class="btn btn-submit"><?php echo $isEdit ? 'Update' : 'Add'; ?></button>
        </form>
        <a href="courseview.php" class="btn btn-back">Back to Course List</a>
    </div>
</body>
</html>
