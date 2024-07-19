<?php
require_once('./config/connection.php');
require_once('./config/security.php');
require_once('./config/config.php');
require_once('./includes/head.php');
require_once('./includes/nav.php');
require_once('./config/helper.php');


$pupil = null;
$ParentID = null;

if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];

    $query = "SELECT * FROM pupils WHERE PupilID = $id";
    $result = mysqli_query($connect, $query);
    
    if (mysqli_num_rows($result) > 0) {
        $pupil = mysqli_fetch_object($result);
    } else {
        header('Location: ./404.html');
        exit();
    }

    $query = "SELECT ParentID FROM pupilparent WHERE PupilID = $id";
    $result = mysqli_query($connect, $query);
    
    if (mysqli_num_rows($result) > 0) {
        $ParentID = mysqli_fetch_object($result)->ParentID;
    } else {
        header('Location: ./404.html'); 
        exit();
    }
}

$query = "SELECT * FROM classes";
$data = fetchData($query, $connect);

$query2 = "SELECT * FROM parentsguardians";
$data2 = fetchData($query2, $connect);

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
                <i class="fas fa-users"></i>
                <span class="text">
                    <?= isset($pupil->PupilID) ? 'Update ' . htmlspecialchars($pupil->Name) . ' Pupil' : 'Create a new Pupil' ?>
                </span>
            </div>
            <div class="right">
                <a href="./manage_pupils"><i class="uil uil-eye"></i>
                    <span class="text">View</span></a>
            </div>
        </div>
        <div class="table-responsive">
            <div class="container">
                <form action="<?= isset($pupil->PupilID) ? 'process/pupil/update' : 'process/pupil/store' ?>" method="post">
                    <div class="form-row">
                        <div class="input-data">
                            <input type="text" name="Name" value="<?= isset($pupil->PupilID) ? htmlspecialchars($pupil->Name) : '' ?>" required>
                            <div class="underline"></div>
                            <label for="Name">Name</label>
                        </div>
                        <div class="input-data">
                            <select name="ParentID" class="custom-select" required>
                                <option value="">Parent Name</option>
                                <?php foreach ($data2 as $val) : ?>
                                    <option value="<?= $val['ParentID'] ?>" <?= isset($ParentID) && $ParentID == $val['ParentID'] ? 'selected' : '' ?>><?= htmlspecialchars($val['Name']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="input-data">
                            <select name="ClassID" class="custom-select" required>
                                <option value="">Select Class</option>
                                <?php foreach ($data as $val) : ?>
                                    <option value="<?= $val['ClassID'] ?>" <?= isset($pupil->ClassID) && $pupil->ClassID == $val['ClassID'] ? 'selected' : '' ?>><?= $val['ClassName'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="input-data textarea">
                            <textarea rows="8" cols="80" name="Address" required><?= isset($pupil->PupilID) ? htmlspecialchars($pupil->Address) : '' ?></textarea>
                            <br />
                            <div class="underline"></div>
                            <label for="">Address</label>
                            <br />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="input-data textarea">
                            <textarea rows="8" cols="80" name="MedicalInformation" required><?= isset($pupil->PupilID) ? htmlspecialchars($pupil->MedicalInformation) : '' ?></textarea>
                            <br />
                            <div class="underline"></div>
                            <label for="">Medical Information</label>
                            <br />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="input-data textarea">
                            <input type="hidden" name="pupil" value="<?= isset($pupil->PupilID) ? 'update' : 'store' ?>" id="">
                            <input type="hidden" name="PupilID" value="<?= isset($pupil->PupilID) ? $pupil->PupilID : '' ?>">
                            <button type="submit" class="btn btn-primary" style="float:right;"><?= isset($pupil->PupilID) ? 'Update' : 'Submit' ?></button>
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
