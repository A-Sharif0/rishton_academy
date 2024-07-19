<?php
require_once('./config/connection.php');
require_once('./config/security.php');
require_once('./config/config.php');
require_once('./includes/head.php');
require_once('./includes/nav.php');

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $query = "SELECT * FROM librarybooks 
    WHERE BookID = $id";
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
            <i class="fas fa-book"></i>
                <span class="text">
                    <?= isset($data->BookID) ? 'Update ' . htmlspecialchars($data->Title) . '  Book' : 'Create a new Book' ?>
                </span>
            </div>
            <div class="right">
                <a href="./manage_libbook"><i class="uil uil-eye"></i>
                    <span class="text">View</span></a>
            </div>
        </div>
        <div class="table-responsive">
            <div class="container">
                <form action="<?= isset($data->BookID) ? 'process/libbook/update' : 'process/libbook/store' ?>" method="post">
                    <div class="form-row">
                        <div class="input-data">
                            <input type="text" name="Title" value="<?= isset($data->BookID) ? htmlspecialchars($data->Title) : '' ?>" required>
                            <div class="underline"></div>
                            <label for="">Title</label>
                        </div>
                        <div class="input-data">
                            <input type="text" name="Author" value="<?= isset($data->BookID) ? htmlspecialchars($data->Author) : '' ?>" required>
                            <div class="underline"></div>
                            <label for="">Author</label>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="input-data textarea">
                        <textarea rows="8" cols="80" name="CheckedOutTo" required><?= isset($data->BookID) ? htmlspecialchars($data->CheckedOutTo) : '' ?></textarea>
                            <br />
                            <div class="underline"></div>
                            <label for="">Checked OutTo</label>
                            <br />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="input-data textarea">
                            <input type="hidden" name="libbook" value="<?= isset($data->BookID) ? 'update' : 'store' ?>" id="">
                            <input type="hidden" name="BookID" value="<?= isset($data->BookID) ? $data->BookID : '' ?>">
                            <button type="submit" class="btn btn-primary" style="float:right;">
                                <?= isset($data->BookID) ? 'Update' : 'Submit' ?>
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
