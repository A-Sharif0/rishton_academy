<?php
require '../../config/connection.php';

if (isset($_GET['q'])) {
    $query = $_GET['q'];
    if (!empty($query)) {
        $search = '%' . $query . '%';
        $query = "SELECT * FROM teachers 
        WHERE Name LIKE '$search'
        OR Address LIKE '$search'
        OR PhoneNumber LIKE '$search'
        OR AnnualSalary LIKE '$search'
        OR BackgroundCheck LIKE '$search'
        ";
        
        $stmt = $connect->query($query);

        if ($stmt->num_rows > 0) {
            $data = '';
            while ($row = $stmt->fetch_assoc()) {
                $data.= '<tr>';
                $data.= '<td>' . htmlspecialchars($row['Name']) . '</td>';
                $data.= '<td>' . htmlspecialchars($row['PhoneNumber']) . '</td>';
                $data.= '<td>' . htmlspecialchars($row['AnnualSalary']) . '</td>';
                $data.= '<td>' . htmlspecialchars($row['BackgroundCheck']) . '</td>';
                $data.= '<td>' . htmlspecialchars($row['Address']) . '</td>';
                $data.= '<td>
                        <button class="btn btn-sm btn-primary"><a href="./teacher_add?id=' . htmlspecialchars($row['TeacherID']) . '" class="btn-a">Edit</a></button>
                        <button class="btn btn-sm btn-danger" onclick="return confirm(\'Are you sure you want to delete this record?\')"><a href="./process/teacher/delete?id=' . htmlspecialchars($row['TeacherID']) . '" class="btn-a">Delete</a></button>
                      </td>';
                $data.= '</tr>';
                
            }
            $response = array('status' => 'success', 'data' => $data);
            echo json_encode($response);
            exit();
        } else {
            echo '<tr><td colspan="5">No results found.</td></tr>';
        }
    }
}
?>
