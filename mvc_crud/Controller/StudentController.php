<?php 
require_once("../Models/Studentmodel.php");

class StudentController {
    private $model;

    public function __construct() {
        $this->model = new Studentmodel();
    }

    public function showstudents($page =1,$limit = 10) {
        $offset = ($page -1) * $limit;
        return $this->model->getStudents($offset,$limit);
    }
    public function getTotalStudentCount()
    {
        return $this->model->getTotalCount();
    }
    public function saveStudent($data) {
        return $this->model->saveStudent($data);
    }

    public function getStudentById($id) {
        return $this->model->getStudentById($id);
    }

    public function getCourses() {
        return $this->model->getCourses();
    }

    public function deleteStudent($id) {
        return $this->model->deleteStudent($id);
    }
}
?>
