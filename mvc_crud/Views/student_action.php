<?php
require_once  '../Controller/StudentController.php';
$controller = new StudentController();





if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    session_start();
    $selectedStudents = $_POST['selected_students'] ?? [];

    if (empty($selectedStudents)) {
        $_SESSION['message'] = "No student selected.";
        header('Location: index.php');
        exit();
    }

    if ($_POST['action'] === 'delete') {
        foreach ($selectedStudents as $studentId) {
            $controller->deleteStudent($studentId);
        }
        $_SESSION['message'] = count($selectedStudents) . " courses deleted successfully.";
        header('Location: index.php');
        exit();
    }
     
    if($_POST['action'] === 'select_all')
    {
        $students =[];
        foreach ($selectedStudents as $studentId)
        {
               $student = $controller->getStudentById($studeId);
               if($student)
               {
                  $students[] = $student;
               }
        }
        header('Location: studentview.php');
        exit();
    }

    if ($_POST['action'] === 'download') {
        $students = [];
        foreach ($selectedStudents as $studentId) {
            $student = $controller->getStudentById($studentId);
            if ($student) {
                $students[] = $student;
            }
        }
     
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="selected_students.csv"');
        
        $output = fopen('php://output', 'w');
        fputcsv($output, ['ID', 'Fisrt Name', 'Last Name','Email','Mobile','Gender','Course Name','Status', 'Create Date', 'Update Date']); // Header row
        foreach ($students as $student) {
            fputcsv($output, [
                $student['id'],
                $student['fname'],
                $student['lname'],
                $student['email'],
                $student['mobile'],
                $student['gender'],
                $student['course_name'],
                $student['status'],
                $student['create_date'],
                $student['update_date']
            ]);
        }
        fclose($output);
        exit();
    }
}
header('Location: index.php');
exit();
?>
