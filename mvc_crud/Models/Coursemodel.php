<?php
class Coursemodel
{
    private $db;

    public function __construct()
    {
        $this->db = new mysqli('localhost', 'root', '', 'mvc');
        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }
    }

    public function isDuplicateCourseName($name, $id = null)
    {
        if ($id) {
            $stmt = $this->db->prepare("SELECT id FROM course WHERE name = ? AND id != ?");
            $stmt->bind_param('si', $name, $id);
        } else {
           
            $stmt = $this->db->prepare("SELECT id FROM course WHERE name = ?");
            $stmt->bind_param('s', $name);
        }

        $stmt->execute();
        $result = $stmt->get_result();
        return $result->num_rows > 0; 
    }

    public function saveCourse($data)
    {
        if ($this->isDuplicateCourseName($data['name'], $data['id'] ?? null)) {
            return "Duplicate course name. Please use a unique name.";
        }

        if (isset($data['id']) && !empty($data['id'])) {
            $stmt = $this->db->prepare("UPDATE course SET name = ?, description = ?, update_date = NOW() WHERE id = ?");
            $stmt->bind_param('ssi', $data['name'], $data['description'], $data['id']);
        } else {
            
            $stmt = $this->db->prepare("INSERT INTO course (name, description, create_date) VALUES (?, ?, NOW())");
            $stmt->bind_param('ss', $data['name'], $data['description']);
        }

        return $stmt->execute() ? true : "Database error.";
    }

    public function getCourses($offset,$limit)
    {
        $result = $this->db->query("SELECT * FROM course order by id desc LIMIT $offset,$limit");
        $courses = [];
        while ($row = $result->fetch_assoc()) {
            $courses[] = $row;
        }
        return $courses;
    }

    public function getTotalCount() {
        $result = $this->db->query("Select COUNT(*) AS total FROM course");
        $row = $result->fetch_assoc();
        return $row['total'];
    }

    public function getCourseById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM course WHERE id = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function deleteCourse($id)
    {
        $stmt = $this->db->prepare("DELETE FROM course WHERE id = ?");
        $stmt->bind_param('i', $id);
        return $stmt->execute();
    }
}
?>
