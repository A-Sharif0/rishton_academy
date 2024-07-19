<?php
require_once('./config/connection.php');
require_once('./config/security.php');
require_once('./config/config.php');
require_once('./includes/head.php');
require_once('./includes/nav.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM teachers WHERE TeacherID = $id";
    $result = mysqli_query($connect, $query);

    if (mysqli_num_rows($result) > 0) {
        $teacher = mysqli_fetch_object($result);
    } else {
        header('Location: ./404.html');
        exit();
    }
}


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
                The Class is already assign to other Teacher Class
            </div>
         <?php endif; ?>
        <div class="title">
            <div class="left">
                <i class="fas fa-chalkboard-teacher"></i>
                <span class="text">
                    <?= isset($teacher->TeacherID) ? 'Update ' . htmlspecialchars($teacher->Name) . ' Teacher' : 'Create a new Teacher' ?>
                </span>
            </div>
            <div class="right">
                <a href="./manage_teachers"><i class="uil uil-eye"></i>
                    <span class="text">View</span></a>
            </div>
        </div>
        <div class="table-responsive">
            <div class="container">
                <form action="<?= isset($teacher->TeacherID) ? 'process/teacher/update' : 'process/teacher/store' ?>" method="post">
                    <div class="form-row">
                        <div class="input-data">
                            <input type="text" name="Name" value="<?= isset($teacher->TeacherID) ? htmlspecialchars($teacher->Name) : '' ?>" required>
                            <div class="underline"></div>
                            <label for="Name">Name</label>
                        </div>
                    </div>
                    <div class="form-row">
                    <div class="input-data">
                            <input type="tel" name="PhoneNumber" pattern="[\+]{0,1}[0-9\s-]+" value="<?= isset($teacher->TeacherID) ? htmlspecialchars($teacher->PhoneNumber) : '' ?>" required>
                            <div class="underline"></div>
                            <label for="">Phone Number</label>
                        </div>
                        <div class="input-data">
                            <input type="number" name="AnnualSalary" step="0.01" value="<?= isset($teacher->TeacherID) ? htmlspecialchars($teacher->AnnualSalary) : '' ?>" required>
                            <div class="underline"></div>
                            <label for="">Annual Salary</label>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="input-data textarea">
                        <textarea rows="8" cols="80" name="BackgroundCheck" required><?= isset($teacher->TeacherID) ? htmlspecialchars($teacher->BackgroundCheck) : '' ?></textarea>
                            <br />
                            <div class="underline"></div>
                            <label for="">Background Check</label>
                            <br />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="input-data textarea">
                        <textarea rows="8" cols="80" name="Address" required><?= isset($teacher->TeacherID) ? htmlspecialchars($teacher->Address) : '' ?></textarea>
                            <br />
                            <div class="underline"></div>
                            <label for="">Address</label>
                            <br />
                            <input type="hidden" name="teacher" value="<?= isset($teacher->TeacherID) ? 'update' : 'store' ?>" id="">
                            <input type="hidden" name="TeacherID" value="<?= isset($teacher->TeacherID) ? $teacher->TeacherID : '' ?>">
                            <button type="submit" class="btn btn-primary" style="float:right;"><?= isset($teacher->TeacherID) ? 'Update' : 'Submit' ?></button>
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