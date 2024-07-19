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

$query = "SELECT * FROM parentsguardians LIMIT $start_from, $records_per_page";
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
                <i class="uil uil-users-alt"></i>
                <span class="text">Parents records</span>
            </div>
            <input type="sraerch" onkeyup="searchData(this, 'process/parent/search')" name="search" placeholder="Search..." id="search">

            <div class="right">
                <a href="./parent_add"><i class="uil uil-plus"></i>
                    <span class="text">Add</span></a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Telephone</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $val) : ?>
                        <tr>
                            <td><?= $val['Name'] ?></td>
                            <td><?= $val['Address'] ?></td>
                            <td><?= $val['Email'] ?></td>
                            <td><?= $val['Telephone'] ?></td>
                            <td>
                                <button class="btn btn-sm btn-primary"><a href="./parent_add?id=<?= $val['ParentID'] ?>" class="btn-a">Edit</a></button>
                                <button class="btn btn-sm btn-danger" onclick="return confirm('are you sure want to delete this record?')"><a href="./process/parent/delete?id=<?= $val['ParentID'] ?>" class="btn-a">Delete</a></button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <?php
            $total_records_query = "SELECT COUNT(*) AS total FROM parentsguardians";
            $total_records_result = mysqli_query($connect, $total_records_query);
            $total_records = mysqli_fetch_assoc($total_records_result)['total'];

            $base_url = './manage_parents';
            echo paginate($current_page, $total_records, $records_per_page, $base_url);
            ?>

        </div>
    </div>
</div>
</section>
<?php
require_once('includes/footer.php');
?>