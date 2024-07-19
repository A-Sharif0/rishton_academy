<?php
require_once('./config/connection.php');
require_once('./config/security.php');
require_once('./config/config.php');
require_once('./includes/head.php');
require_once('./includes/nav.php');

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $query = "SELECT * FROM salaries 
    WHERE SalaryID = $id";
    $result = mysqli_query($connect, $query);

    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_object($result);
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
        <div class="title">
            <div class="left">
            <i class="fas fa-money-check-alt"></i>
                <span class="text">
                    <?= isset($data->SalaryID) ? 'Update ' . htmlspecialchars($data->Amount) . '  Salary' : 'Create a new Salary' ?>
                </span>
            </div>
            <div class="right">
                <a href="./manage_salary"><i class="uil uil-eye"></i>
                    <span class="text">View</span></a>
            </div>
        </div>
        <div class="table-responsive">
            <div class="container">
                <form action="<?= isset($data->SalaryID) ? 'process/salary/update' : 'process/salary/store' ?>" method="post">
                    <div class="form-row">
                        <div class="input-data">
                            <input type="number" name="Amount" step="0.01" value="<?= isset($data->SalaryID) ? htmlspecialchars($data->Amount) : '' ?>" required>
                            <div class="underline"></div>
                            <label for="">Amount</label>
                        </div>
                        <div class="input-data">
                            <input type="date" name="Date" value="<?= isset($data->SalaryID) ? htmlspecialchars($data->Date) : '' ?>" required>
                            <div class="underline"></div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="input-data textarea">
                            <input type="hidden" name="salary" value="<?= isset($data->SalaryID) ? 'update' : 'store' ?>" id="">
                            <input type="hidden" name="SalaryID" value="<?= isset($data->SalaryID) ? $data->SalaryID : '' ?>">
                            <button type="submit" class="btn btn-primary" style="float:right;">
                                <?= isset($data->SalaryID) ? 'Update' : 'Submit' ?>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
require_once('includes/footer.php');
?>
