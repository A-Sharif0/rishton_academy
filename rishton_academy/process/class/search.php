<?php
require '../../config/connection.php';

if (isset($_GET['q'])) {
    $query = $_GET['q'];
    if (!empty($query)) {
        $search = '%' . $query . '%';
        $query = "SELECT classes.*, teachers.Name AS teacher_name 
                  FROM classes 
                  JOIN teachers ON classes.TeacherID = teachers.TeacherID 
                  WHERE ClassName LIKE '$search' OR Capacity LIKE '$search'
                  OR teachers.Name LIKE '$search'
                  ";
        
        $stmt = $connect->query($query);

        if ($stmt->num_rows > 0) {
            $data = '';
            while ($row = $stmt->fetch_assoc()) {
                $data.= '<tr>';
                $data.= '<td>' . htmlspecialchars($row['ClassName']) . '</td>';
                $data.= '<td>' . htmlspecialchars($row['Capacity']) . '</td>';
                $data.= '<td>' . htmlspecialchars($row['teacher_name']) . '</td>';
                $data.= '<td>
                            <button class="btn btn-sm btn-primary"><a href="./class_add?id=' . htmlspecialchars($row['ClassID']) . '" class="btn-a">Edit</a></button>
                            <button class="btn btn-sm btn-danger" onclick="return confirm(\'Are you sure you want to delete this record?\')"><a href="./process/class/delete?id=' . htmlspecialchars($row['ClassID']) . '" class="btn-a">Delete</a></button>
                        </td>';
                $data.= '</tr>';
            }
            $response = array('status' => 'success', 'data' => $data);
            echo json_encode($response);
            exit();
        } else {
            echo '<tr><td colspan="4">No results found.</td></tr>';
        }
    }
}
?>
