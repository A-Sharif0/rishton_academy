<?php
require_once('./config/connection.php');
require_once('./config/security.php');
require_once('./config/config.php');
require_once('./includes/head.php');
require_once('./includes/nav.php');
require_once('./config/helper.php');

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $query = "SELECT dinnermoney.*, pupils.Name AS pupil_name
    FROM dinnermoney 
    JOIN pupils ON dinnermoney.PupilID = pupils.PupilID
    WHERE pupils.PupilID = $id";
    $result = mysqli_query($connect, $query);

    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_object($result);
    } else {
        header('Location: ./404.html');
        exit();
    }
}

$query = "SELECT * FROM pupils";
$pupils_data = fetchData($query, $connect);


?>
<div class="dash-content">
    <div class="activity">
        <?php if (isset($_GET['msg']) && $_GET['msg'] == 'success') : ?>
            <div class="alert alert-success">
                <span class="close-btn" onclick="this.parentElement.style.display='none';">&times;</span>
                Record Inserted Successfully
            </div>
        <?php elseif (isset($_GET['msg']) && $_GET['msg'] == 'duplicate') : ?>
            <div class="alert alert-warning">
                <span class="close-btn" onclick="this.parentElement.style.display='none';">&times;</span>
                already have exist  of same date please go and edit them if you want
            </div>
        <?php endif; ?>
        <div class="title">
            <div class="left">
                <i class="fas fa-hamburger"></i>
                <span class="text">
                    <?= isset($data->PupilID) ? 'Update ' . htmlspecialchars($data->pupil_name) . ' Dinner Money' : 'Create a Dinner Money' ?>
                </span>
            </div>
            <div class="right">
                <a href="./manage_dinnermoney"><i class="uil uil-eye"></i>
                    <span class="text">View</span></a>
            </div>
        </div>
        <div class="table-responsive">
            <div class="container">
                <form action="<?= isset($data->PupilID) ? 'process/dinnermoney/update' : 'process/dinnermoney/store' ?>" method="post">
                    <div class="form-row">
                        <div class="input-data">
                            <select name="PupilID" class="custom-select" required>
                                <option value="">Select Pupil</option>
                                <?php foreach ($pupils_data as $val) : ?>
                                    <option value="<?= $val['PupilID'] ?>" <?= isset($data->PupilID) && $data->PupilID == $val['PupilID'] ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($val['Name']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="input-data">
                            <input type="number" name="Amount" step="0.01" value="<?= isset($data->PupilID) ? htmlspecialchars($data->Amount) : '' ?>" required>
                            <div class="underline"></div>
                            <label for="">Amount</label>
                        </div>
                        <div class="input-data">
                            <input type="date" name="Date" value="<?= isset($data->PupilID) ? htmlspecialchars($data->Date) : '' ?>" required>
                            <div class="underline"></div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="input-data textarea">
                            <input type="hidden" name="dinnermoney" value="<?= isset($data->PupilID) ? 'update' : 'store' ?>" id="">
                            <input type="hidden" name="EditPupilID" value="<?= isset($data->PupilID) ? $data->PupilID : '' ?>">
                            <button type="submit" class="btn btn-primary" style="float:right;">
                                <?= isset($data->PupilID) ? 'Update' : 'Submit' ?>
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
