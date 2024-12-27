<?php 
require_once("../Models/Coursemodel.php");

class CourseController {
    private $model;

    public function __construct() {
        $this->model = new Coursemodel();
    }

    public function showCourses($page =1,$limit = 10) {
        $offset = ($page -1) * $limit;
        return $this->model->getCourses($offset,$limit);
    }
    public function getTotalCourseCount()
    {
        return $this->model->getTotalCount();
    }

    public function saveCourse($data) {
        
        $name = trim($data['name']);
        $description = trim($data['description']);

        if (empty($name)) {
            return "Course name cannot be empty or whitespace.";
        }

        if (empty($description)) {
            return "Course description cannot be empty or whitespace.";
        }

       
        return $this->model->saveCourse([
            'id' => $data['id'] ?? null,
            'name' => $name,
            'description' => $description
        ]);
    }

    public function getCourseById($id) {
        return $this->model->getCourseById($id);
    }

    public function deleteCourse($id) {
        return $this->model->deleteCourse($id);
    }
}
?>
