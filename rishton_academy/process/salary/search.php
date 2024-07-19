<?php
require '../../config/connection.php';

if (isset($_GET['q'])) {
    $query = $_GET['q'];
    if (!empty($query)) {
        $search = '%' . $query . '%';
        $query = "SELECT * FROM salaries
                  WHERE Amount LIKE '$search'
                  OR Date LIKE '$search'
                  ";
        
        $stmt = $connect->query($query);

        if ($stmt->num_rows > 0) {
            $data = '';
            while ($row = $stmt->fetch_assoc()) {
                $data.= '<tr>';
                $data.= '<td>' . htmlspecialchars($row['Amount']) . '</td>';
                $data.= '<td>' . htmlspecialchars($row['Date']) . '</td>';
                $data.= '<td>
                            <button class="btn btn-sm btn-primary"><a href="./salary_add?id=' . htmlspecialchars($row['SalaryID']) . '" class="btn-a">Edit</a></button>
                            <button class="btn btn-sm btn-danger" onclick="return confirm(\'Are you sure you want to delete this record?\')"><a href="./process/salary/delete?id=' . htmlspecialchars($row['SalaryID']) . '" class="btn-a">Delete</a></button>
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
