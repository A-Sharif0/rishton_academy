<?php
require_once('./config/connection.php');
require_once('./config/security.php');
require_once('./config/config.php');
require_once('./includes/head.php');
require_once('./includes/nav.php');

$query = "SELECT COUNT(*) as total FROM pupils";
$exe = $connect->query($query);
$total_pupils = $exe->fetch_assoc()['total'];

$query = "SELECT COUNT(*) as total FROM teachers";
$exe = $connect->query($query);
$total_teachers = $exe->fetch_assoc()['total'];

$query = "SELECT COUNT(*) as total FROM classes";
$exe = $connect->query($query);
$total_classes = $exe->fetch_assoc()['total'];



$query = "SELECT COUNT(*) as total FROM librarybooks";
$exe = $connect->query($query);
$total_books = $exe->fetch_assoc()['total'];

$query = "SELECT COUNT(*) as total FROM teachingassistants";
$exe = $connect->query($query);
$total_assistants = $exe->fetch_assoc()['total'];

$query = "SELECT COUNT(*) as total FROM parentsguardians";
$exe = $connect->query($query);
$total_parents = $exe->fetch_assoc()['total'];

?>

    <div class="dash-content">
        <div class="overview">
            <div class="title">
                <span class="text">Dashboard</span>
            </div>

            <div class="boxes">
                <div class="box box1">
                    <i class="fas fa-users"></i>
                    <span class="text">Total Pupils</span>
                    <span class="number"><?= $total_pupils; ?></span>
                </div>
                <div class="box box2">
                    <i class="fas fa-chalkboard-teacher"></i>
                    <span class="text">Total Teachers</span>
                    <span class="number"><?= $total_teachers; ?></span>
                </div>
                <div class="box box3">
                    <i class="fas fa-clock"></i>
                    <span class="text">Total Classes</span>
                    <span class="number"><?= $total_classes; ?></span>
                </div>
            </div>

        </div>

<br><br>
        <div class="boxes">
                <div class="box box2">
                    <i class="fas fa-book"></i>
                    <span class="text">Total Books</span>
                    <span class="number"><?= $total_books; ?></span>
                </div>
                <div class="box box3">
                    <i class="fas fa-chalkboard-teacher"></i>
                    <span class="text">Total Teachers Assistants</span>
                    <span class="number"><?= $total_assistants; ?></span>
                </div>
                <div class="box box1">
                    <i class="fas fa-user"></i>
                    <span class="text">Total Parents</span>
                    <span class="number"><?= $total_parents; ?></span>
                </div>
            </div>

        </div>

    </div>
</section>

<?php
require_once('includes/footer.php');
?>