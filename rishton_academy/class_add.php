<?php
require_once('./config/connection.php');
require_once('./config/security.php');
require_once('./config/config.php');
require_once('./includes/head.php');
require_once('./includes/nav.php');
require_once('./config/helper.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM classes WHERE ClassID = $id";
    $result = mysqli_query($connect, $query);

    if (mysqli_num_rows($result) > 0) {
        $class = mysqli_fetch_object($result);
    } else {
        header('Location: ./404.html');
        exit();
    }
}


$query = "SELECT * FROM teachers";
$data = fetchData($query, $connect);


?>
<div class="dash-content">
    <div class="activity">
        <?php if (isset($_GET['msg']) && $_GET['msg'] == 'success') : ?>
            <div class="alert alert-success">
                <span class="close-btn" onclick="this.parentElement.style.display='none';">&times;</span>
                Record Inserted Successfully
            </div>
        <?php endif; ?>
        <?php if (isset($_GET['msg']) && $_GET['msg'] == 'error'): ?>
            <div class="alert alert-warning">
                <span class="close-btn" onclick="this.parentElement.style.display='none';">&times;</span>
                The Class is already assign to other Teacher
            </div>
         <?php endif; ?>
        <div class="title">
            <div class="left">
                <i class="fas fa-clock"></i>
                <span class="text">
                    <?= isset($class->ClassID) ? 'Update ' . htmlspecialchars($class->ClassName) . ' Class' : 'Create a new Class' ?>
                </span>
            </div>
            <div class="right">
                <a href="./manage_classes"><i class="uil uil-eye"></i>
                    <span class="text">View</span></a>
            </div>
        </div>
        <div class="table-responsive">
            <div class="container">
                <form action="<?= isset($class->ClassID) ? 'process/class/update' : 'process/class/store' ?>" method="post">
                    <div class="form-row">
                        <div class="input-data">
                            <input type="text" name="ClassName" value="<?= isset($class->ClassID) ? htmlspecialchars($class->ClassName) : '' ?>" required>
                            <div class="underline"></div>
                            <label for="ClassName">Class Name</label>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="input-data">
                            <input type="number" name="Capacity" value="<?= isset($class->Capacity) ? htmlspecialchars($class->Capacity) : '' ?>" required>
                            <div class="underline"></div>
                            <label for="">Capacity</label>
                        </div>
                        <div class="input-data">
                            <select name="TeacherID" class="custom-select" required>
                                <option value="">Select Teacher</option>
                                <?php foreach ($data as $val) : ?>
                                    <option value="<?= $val['TeacherID'] ?>" <?= isset($class->TeacherID) && $class->TeacherID == $val['TeacherID'] ? 'selected' : '' ?>><?= $val['Name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="input-data textarea">
                            <input type="hidden" name="class" value="<?= isset($class->ClassID) ? 'update' : 'store' ?>" id="">
                            <input type="hidden" name="ClassID" value="<?= isset($class->ClassID) ? $class->ClassID : '' ?>">
                            <button type="submit" class="btn btn-primary" style="float:right;"><?= isset($class->ClassID) ? 'Update' : 'Submit' ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</section>

<?php
require_once('includes/footer.php');
?>