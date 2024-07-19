<?php
require '../../config/connection.php';

if (isset($_GET['q'])) {
    $query = $_GET['q'];
    if (!empty($query)) {
        $search = '%' . $query . '%';
        $query = "SELECT * FROM librarybooks 
        WHERE Title LIKE '$search'
        OR Author LIKE '$search'
        OR CheckedOutTo LIKE '$search'
        ";
        
        $stmt = $connect->query($query);

        if ($stmt->num_rows > 0) {
            $data = '';
            while ($row = $stmt->fetch_assoc()) {
                $data.= '<tr>';
                $data.= '<td>' . htmlspecialchars($row['Title']) . '</td>';
                $data.= '<td>' . htmlspecialchars($row['Author']) . '</td>';
                $data.= '<td>' . htmlspecialchars($row['CheckedOutTo']) . '</td>';
                $data.= '<td>
                        <button class="btn btn-sm btn-primary"><a href="./libbook_add?id=' . htmlspecialchars($row['BookID']) . '" class="btn-a">Edit</a></button>
                        <button class="btn btn-sm btn-danger" onclick="return confirm(\'Are you sure you want to delete this record?\')"><a href="./process/libbook/delete?id=' . htmlspecialchars($row['BookID']) . '" class="btn-a">Delete</a></button>
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
