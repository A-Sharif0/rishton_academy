<?php
require_once('./config/connection.php');
require_once('./config/security.php');
require_once('./config/config.php');
require_once('./includes/head.php');
require_once('./includes/nav.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM teachingassistants WHERE AssistantID = $id";
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
            <i class="fa-solid fa-handshake"></i>
                <span class="text">
                    <?= isset($teacher->AssistantID) ? 'Update ' . htmlspecialchars($teacher->Name) . ' Teacher Assistant' : 'Create a new Teacher Assistant' ?>
                </span>
            </div>
            <div class="right">
                <a href="./manage_teacherassistant"><i class="uil uil-eye"></i>
                    <span class="text">View</span></a>
            </div>
        </div>
        <div class="table-responsive">
            <div class="container">
                <form action="<?= isset($teacher->AssistantID) ? 'process/teacherassistant/update' : 'process/teacherassistant/store' ?>" method="post">
                    <div class="form-row">
                        <div class="input-data">
                            <input type="text" name="Name" value="<?= isset($teacher->AssistantID) ? htmlspecialchars($teacher->Name) : '' ?>" required>
                            <div class="underline"></div>
                            <label for="Name">Name</label>
                        </div>
                    </div>
                    <div class="form-row">
                    <div class="input-data">
                            <input type="tel" name="PhoneNumber" pattern="[\+]{0,1}[0-9\s-]+" value="<?= isset($teacher->AssistantID) ? htmlspecialchars($teacher->PhoneNumber) : '' ?>" required>
                            <div class="underline"></div>
                            <label for="">Phone Number</label>
                        </div>
                        <div class="input-data">
                            <input type="number" name="AnnualSalary" step="0.01" value="<?= isset($teacher->AssistantID) ? htmlspecialchars($teacher->AnnualSalary) : '' ?>" required>
                            <div class="underline"></div>
                            <label for="">Annual Salary</label>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="input-data textarea">
                        <textarea rows="8" cols="80" name="Address" required><?= isset($teacher->AssistantID) ? htmlspecialchars($teacher->Address) : '' ?></textarea>
                            <br />
                            <div class="underline"></div>
                            <label for="">Address</label>
                            <br />
                            <input type="hidden" name="teacherassistant" value="<?= isset($teacher->AssistantID) ? 'update' : 'store' ?>" id="">
                            <input type="hidden" name="AssistantID" value="<?= isset($teacher->AssistantID) ? $teacher->AssistantID : '' ?>">
                            <button type="submit" class="btn btn-primary" style="float:right;"><?= isset($teacher->AssistantID) ? 'Update' : 'Submit' ?></button>
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