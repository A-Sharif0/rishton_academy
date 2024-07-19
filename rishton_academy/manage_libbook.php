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

$query = "SELECT * FROM librarybooks LIMIT $start_from, $records_per_page";
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
                <i class="fas fa-book"></i>
                <span class="text">Library Books records</span>
            </div>

            <input type="sraerch" onkeyup="searchData(this, 'process/libbook/search')" name="search" placeholder="Search..." id="search">

            <div class="right">
                <a href="./libbook_add"><i class="uil uil-plus"></i>
                    <span class="text">Add</span></a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Checked OutTo</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $val) : ?>
                        <tr>
                            <td><?= $val['Title'] ?></td>
                            <td><?= $val['Author'] ?></td>
                            <td><?= $val['CheckedOutTo'] ?></td>
                            <td>
                                <button class="btn btn-sm btn-primary"><a href="./libbook_add?id=<?= $val['BookID'] ?>" class="btn-a">Edit</a></button>
                                <button class="btn btn-sm btn-danger" onclick="return confirm('are you sure want to delete this record?')"><a href="./process/libbook/delete?id=<?= $val['BookID'] ?>" class="btn-a">Delete</a></button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <?php
            $total_records_query = "SELECT COUNT(*) AS total FROM librarybooks";
            $total_records_result = mysqli_query($connect, $total_records_query);
            $total_records = mysqli_fetch_assoc($total_records_result)['total'];

            $base_url = './manage_libbook';
            echo paginate($current_page, $total_records, $records_per_page, $base_url);
            ?>

        </div>
    </div>
</div>
</section>
<?php
require_once('includes/footer.php');
?>