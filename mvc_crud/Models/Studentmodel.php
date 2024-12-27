<?php
class Studentmodel {
    private $db;

    public function __construct() {
        $this->db = new mysqli('localhost', 'root', '', 'mvc');
        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }
    }

    public function getStudents($offset,$limit) {
        $result = $this->db->query("SELECT * FROM student order by id desc LIMIT $offset,$limit");
        $students = [];
        while ($row = $result->fetch_assoc()) {
            $students[] = $row;
        }
        return $students;
    }
    public function getTotalCount() {
        $result = $this->db->query("Select COUNT(*) AS total FROM student");
        $row = $result->fetch_assoc();
        return $row['total'];
    }

    public function saveStudent($data) {
        if ($this->isDuplicateEmail($data['email'], $data['id'] ?? null)) {
            return ['error' => 'Email already exists.'];
        }

        if (isset($data['id']) && !empty($data['id'])) {
            // Update existing student
            $stmt = $this->db->prepare("UPDATE student SET fname=?, lname=?, email=?, mobile=?, gender=?, course_name=?, status=?, update_date=NOW() WHERE id=?");
            $stmt->bind_param('sssssssi', $data['fname'], $data['lname'], $data['email'], $data['mobile'], $data['gender'], $data['course_name'], $data['status'], $data['id']);
        } else {
            // Insert new student
            $stmt = $this->db->prepare("INSERT INTO student (fname, lname, email, mobile, gender, course_name, status, create_date) VALUES (?, ?, ?, ?, ?, ?, ?, NOW())");
            $stmt->bind_param('sssssss', $data['fname'], $data['lname'], $data['email'], $data['mobile'], $data['gender'], $data['course_name'], $data['status']);
        }

        return $stmt->execute() ? ['success' => true] : ['error' => $this->db->error];
    }

    public function getStudentById($id) {
        $stmt = $this->db->prepare("SELECT * FROM student WHERE id=?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function getCourses() {
        $result = $this->db->query("SELECT name FROM course");
        $courses = [];
        while ($row = $result->fetch_assoc()) {
            $courses[] = $row['name'];
        }
        return $courses;
    }

    private function isDuplicateEmail($email, $excludeId = null) {
        $query = "SELECT id FROM student WHERE email = ?";
        if ($excludeId) {
            $query .= " AND id != ?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('si', $email, $excludeId);
        } else {
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('s', $email);
        }
        $stmt->execute();
        $stmt->store_result();
        return $stmt->num_rows > 0;
    }

    public function deleteStudent($id) {
        $stmt = $this->db->prepare("DELETE FROM student WHERE id = ?");
        $stmt->bind_param('i', $id);
        return $stmt->execute();
    }
    
}
?>
