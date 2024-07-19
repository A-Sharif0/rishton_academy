<?php
require '../../config/connection.php';

if (isset($_GET['q'])) {
    $query = $_GET['q'];
    if (!empty($query)) {
        $search = '%' . $query . '%';
        $query = "SELECT 
                        pupils.*, 
                        classes.ClassName AS class_name, 
                        parentsguardians.Name AS parent_name 
                    FROM 
                        pupils 
                        JOIN classes ON pupils.ClassID = classes.ClassID 
                        JOIN pupilparent ON pupils.PupilID = pupilparent.PupilID 
                        JOIN parentsguardians ON pupilparent.ParentID = parentsguardians.ParentID 
                    WHERE pupils.Name LIKE '$search' OR pupils.Address LIKE '$search' OR MedicalInformation LIKE '$search'
                  OR classes.ClassName LIKE '$search'
                  OR parentsguardians.Name LIKE '$search'
                  ";

        $stmt = $connect->query($query);

        if ($stmt->num_rows > 0) {
            $data = '';
            while ($row = $stmt->fetch_assoc()) {
                $data .= '<tr>';
                $data .= '<td>' . htmlspecialchars($row['Name']) . '</td>';
                $data .= '<td>' . htmlspecialchars($row['parent_name']) . '</td>';
                $data .= '<td>' . htmlspecialchars($row['class_name']) . '</td>';
                $data .= '<td>' . htmlspecialchars($row['Address']) . '</td>';
                $data .= '<td>' . htmlspecialchars($row['MedicalInformation']) . '</td>';
                $data .= '<td>
                            <button class="btn btn-sm btn-primary"><a href="./pupil_add?id=' . htmlspecialchars($row['PupilID']) . '" class="btn-a">Edit</a></button>
                            <button class="btn btn-sm btn-danger" onclick="return confirm(\'Are you sure you want to delete this record?\')"><a href="./process/pupil/delete?id=' . htmlspecialchars($row['PupilID']) . '" class="btn-a">Delete</a></button>
                        </td>';
                $data .= '</tr>';
            }
            $response = array('status' => 'success', 'data' => $data);
            echo json_encode($response);
            exit();
        } else {
            echo '<tr><td colspan="4">No results found.</td></tr>';
        }
    }
}
