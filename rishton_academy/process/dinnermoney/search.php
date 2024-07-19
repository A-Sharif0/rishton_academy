<?php
require '../../config/connection.php';

if (isset($_GET['q'])) {
    $query = $_GET['q'];
    if (!empty($query)) {
        $search = '%' . $query . '%';
        $query = "SELECT dinnermoney.*, pupils.Name AS pupil_name
                  FROM dinnermoney 
                  JOIN pupils ON dinnermoney.PupilID = pupils.PupilID
                  WHERE Amount LIKE '$search'
                  OR Date LIKE '$search'
                  OR pupils.Name LIKE '$search'
                  ";
        
        $stmt = $connect->query($query);

        if ($stmt->num_rows > 0) {
            $data = '';
            while ($row = $stmt->fetch_assoc()) {
                $data.= '<tr>';
                $data.= '<td>' . htmlspecialchars($row['pupil_name']) . '</td>';
                $data.= '<td>' . htmlspecialchars($row['Amount']) . '</td>';
                $data.= '<td>' . htmlspecialchars($row['Date']) . '</td>';
                $data.= '<td>
                            <button class="btn btn-sm btn-primary"><a href="./dinnermoney_add?id=' . htmlspecialchars($row['PupilID']) . '" class="btn-a">Edit</a></button>
                            <button class="btn btn-sm btn-danger" onclick="return confirm(\'Are you sure you want to delete this record?\')"><a href="./process/dinnermoney/delete?id=' . htmlspecialchars($row['PupilID']) . '" class="btn-a">Delete</a></button>
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
