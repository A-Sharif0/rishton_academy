<?php
require_once('./config/connection.php');
require_once('./config/security.php');
require_once('./config/config.php');
require_once('./includes/head.php');
require_once('./includes/nav.php');
require_once('./config/helper.php');

$records_per_page = 10;

$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($current_page < 1) {
    $current_page = 1;
}

$start_from = ($current_page - 1) * $records_per_page;

$query = "SELECT DISTINCT pupils.*, classes.ClassName AS class_name, parentsguardians.Name AS parent_name
           FROM pupils 
           JOIN classes ON pupils.ClassID = classes.ClassID
            JOIN pupilparent ON pupils.PupilID = pupilparent.PupilID
            JOIN parentsguardians ON pupilparent.ParentID = parentsguardians.ParentID
           ORDER BY pupils.PupilID
           LIMIT $start_from, $records_per_page";

$data = fetchData($query, $connect);


?>

<div class="dash-content">
    <div class="activity">
        <?php if (isset($_GET['msg']) && $_GET['msg'] == 'success') : ?>
            <div class="alert alert-success">
                <span class="close-btn" onclick="this.parentElement.style.display='none';">&times;</span>
                Record Updated Successfully
            </div>
        <?php elseif (isset($_GET['msg']) && $_GET['msg'] == 'delete') :  ?>
            <div class="alert alert-success">
                <span class="close-btn" onclick="this.parentElement.style.display='none';">&times;</span>
                Record Deleted Successfully
            </div>
        <?php endif; ?>
        <div class="title">
            <div class="left">
                <i class="fas fa-users"></i>
                <span class="text">Pupils records</span>
            </div>

            <input type="sraerch" onkeyup="searchData(this, 'process/pupil/search')" name="search" placeholder="Search..." id="search">

            <div class="right">
                <a href="./pupil_add"><i class="uil uil-plus"></i>
                    <span class="text">Add</span></a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Parent Name</th>
                        <th>Class Name</th>
                        <th>Address</th>
                        <th>Medical Information</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $val) : ?>
                        <tr>
                            <td><?= $val['Name'] ?></td>
                            <td><?= $val['parent_name'] ?></td>
                            <td><?= $val['class_name'] ?></td>
                            <td><?= $val['Address'] ?></td>
                            <td><?= $val['MedicalInformation'] ?></td>
                            <td>
                                <button class="btn btn-sm btn-primary"><a href="./pupil_add?id=<?= $val['PupilID'] ?>" class="btn-a">Edit</a></button>
                                <button class="btn btn-sm btn-danger" onclick="return confirm('are you sure want to delete this record?')"><a href="./process/pupil/delete?id=<?= $val['PupilID'] ?>" class="btn-a">Delete</a></button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <?php
            $total_records_query = "SELECT COUNT(*) AS total FROM pupils";
            $total_records_result = mysqli_query($connect, $total_records_query);
            $total_records = mysqli_fetch_assoc($total_records_result)['total'];

            $base_url = './manage_pupils';
            echo paginate($current_page, $total_records, $records_per_page, $base_url);
            ?>

        </div>
    </div>
</div>
</section>
<?php
require_once('includes/footer.php');
?>