<?php
require_once('./config/connection.php');
require_once('./config/security.php');
require_once('./config/config.php');
require_once('./includes/head.php');
require_once('./includes/nav.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM parentsguardians WHERE ParentID = $id";
    $result = mysqli_query($connect, $query);

    if (mysqli_num_rows($result) > 0) {
        $parent = mysqli_fetch_object($result);
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
                <i class="uil uil-users-alt"></i>
                <span class="text">
                    <?= isset($parent->ParentID) ? 'Update ' . htmlspecialchars($parent->Name) . ' Parent' : 'Create a new Parent' ?>
                </span>
            </div>
            <div class="right">
                <a href="./manage_parents"><i class="uil uil-eye"></i>
                    <span class="text">View</span></a>
            </div>
        </div>
        <div class="table-responsive">
            <div class="container">
                <form action="<?= isset($parent->ParentID) ? 'process/parent/update' : 'process/parent/store' ?>" method="post">
                    <div class="form-row">
                        <div class="input-data">
                            <input type="text" name="Name" value="<?= isset($parent->ParentID) ? htmlspecialchars($parent->Name) : '' ?>" required>
                            <div class="underline"></div>
                            <label for="Name">Full Name</label>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="input-data">
                            <input type="email" name="Email" value="<?= isset($parent->ParentID) ? htmlspecialchars($parent->Email) : '' ?>" required>
                            <div class="underline"></div>
                            <label for="Email">Email Address</label>
                        </div>
                        <div class="input-data">
                            <input type="tel" name="Telephone" pattern="[\+]{0,1}[0-9\s-]+" value="<?= isset($parent->ParentID) ? htmlspecialchars($parent->Telephone) : '' ?>" required>
                            <div class="underline"></div>
                            <label for="">Telephone</label>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="input-data textarea">
                            <textarea rows="8" cols="80" name="Address" required><?= isset($parent->ParentID) ? htmlspecialchars($parent->Address) : '' ?></textarea>
                            <br />
                            <div class="underline"></div>
                            <label for="">Address</label>
                            <br />
                            <input type="hidden" name="parent" value="<?= isset($parent->ParentID) ? 'update' : 'store' ?>" id="">
                            <input type="hidden" name="ParentID" value="<?= isset($parent->ParentID) ? $parent->ParentID : '' ?>">
                            <button type="submit" class="btn btn-primary" style="float:right;"><?= isset($parent->ParentID) ? 'Update' : 'Submit' ?></button>
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