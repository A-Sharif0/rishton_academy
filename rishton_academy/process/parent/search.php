<?php
require '../../config/connection.php';

if (isset($_GET['q'])) {
    $query = $_GET['q'];
    if (!empty($query)) {
        $search = '%' . $query . '%';
        $query = "SELECT * FROM parentsguardians 
        WHERE Name LIKE '$search'
        OR Address LIKE '$search'
        OR Email LIKE '$search'
        OR Telephone LIKE '$search'
        ";
        $stmt = $connect->query($query);

        if ($stmt->num_rows > 0) {
            $data = '';
            while ($row = $stmt->fetch_assoc()) {
                $data.= '<tr>';
                $data.= '<td>' . htmlspecialchars($row['Name']) . '</td>';
                $data.= '<td>' . htmlspecialchars($row['Address']) . '</td>';
                $data.= '<td>' . htmlspecialchars($row['Email']) . '</td>';
                $data.= '<td>' . htmlspecialchars($row['Telephone']) . '</td>';
                $data.= '<td>
                        <button class="btn btn-sm btn-primary"><a href="./parent_add?id=' . htmlspecialchars($row['ParentID']) . '" class="btn-a">Edit</a></button>
                        <button class="btn btn-sm btn-danger" onclick="return confirm(\'Are you sure you want to delete this record?\')"><a href="./process/parent/delete?id=' . htmlspecialchars($row['ParentID']) . '" class="btn-a">Delete</a></button>
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
