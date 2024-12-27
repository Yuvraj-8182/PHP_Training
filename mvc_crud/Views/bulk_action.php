<?php
require_once '../Controller/CourseController.php';


$c = new CourseController();


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    session_start();
    $selectedCourses = $_POST['selected_courses'] ?? [];
   // $_SESSION['all'] = $selectedCourses;
    if (empty($selectedCourses)) {
        $_SESSION['message'] = "No courses selected.";
        header('Location: courseview.php');
        exit();
    }

    if ($_POST['action'] === 'delete') {
        foreach ($selectedCourses as $courseId) {
            $c->deleteCourse($courseId);
        }
        $_SESSION['message'] = count($selectedCourses) . " courses deleted successfully.";
        header('Location: courseview.php');
        exit();
    }
     
    // if($_POST['action'] === 'select_all')
    // {
    //     $courses =[];
    //     foreach ($selectedCourses as $courseId)
    //     {
    //            $course = $c->getCourseById($courseId);
    //            if($course)
    //            {
    //               $courses[] = $course;
    //            }
    //     }
    //     header('Location: courseview.php');
    //     exit();
    // }

    if ($_POST['action'] === 'download') {
        $courses = [];
        foreach ($selectedCourses as $courseId) {
            $course = $c->getCourseById($courseId);
            if ($course) {
                $courses[] = $course;
            }
        }
     
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="selected_courses.csv"');
        
        $output = fopen('php://output', 'w');
        fputcsv($output, ['ID', 'Name', 'Description', 'Create Date', 'Update Date']); // Header row
        foreach ($courses as $course) {
            fputcsv($output, [
                $course['id'],
                $course['name'],
                $course['description'],
                $course['create_date'],
                $course['update_date']
            ]);
        }
        fclose($output);
        exit();
    }
}
header('Location: courseview.php');
exit();



