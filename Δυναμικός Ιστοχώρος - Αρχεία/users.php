<?php
session_start();
include 'database.php';

if (!isset($_SESSION["user"])) {
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Χρήστες Πλατφόρμας</title>
    <link rel="stylesheet" href="skele.css">
    <link rel="stylesheet" href="user-styles.css">
</head>
<body>
<header>
        <h1><a href="users.php">Χρήστες Πλατφόρμας</a></h1>
    </header>
    <div class="site-content">
        <nav class="nav-container">
            <button class="btn"><a href="indextutor.php">Αρχική σελίδα</a></button>
            <button class="btn"><a href="announcementtutor.php">Ανακοινώσεις</a></button>
            <button class="btn"><a href="communicationtutor.php">Επικοινωνία</a></button>
            <button class="btn"><a href="documentstutor.php">Έγγραφα μαθήματος</a></button>
            <button class="btn"><a href="homeworktutor.php">Εργασίες</a></button>
            <button class="btn"><a href="users.php">Χρήστες</a></button>
            <button class="logout"><a href="register.php">Logout</a></button>
        </nav>
        <div class="main-container">
            <div class="btn-container">
                <button><a href="adduser.php">Προσθήκη χρήστη</a></button>
            </div>
            <div class="table-container">
            <?php
            $sql = "SELECT * FROM users;";
            $result = mysqli_query($conn, $sql);
            /* checking if we have anything saved in the database. if not i will get an error when trying to display the data*/
            $resultsCheck = mysqli_num_rows($result);
            if ($resultsCheck==null) {
                echo "Δεν υπάρχουν χρήστες";
            }
            ?>
                <table class="table">
                    <tr>
                        <th class="th-container">id</th>
                        <th class="th-container">First Name</th>
                        <th class="th-container">Last Name</th>
                        <th class="th-container" id="email">Loginame</th>
                        <th class="th-container">Role</th>
                        <th class="th-container"><p style="margin: 0;">Επεξεργασία</p></th>
                        <th class="th-container"><p style="margin: 0;">Διαγραφή</p></th>
                    </tr>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <th class="th-container"><?php echo $row['id'];?></th>
                            <th class="th-container"><?php echo $row['firstname'];?></th>
                            <th class="th-container"><?php echo $row['lastname'];?></th>
                            <th class="th-container" id="email"><?php echo $row['loginame'];?></th>
                            <th class="th-container"><?php echo $row['role'];?></th>
                            <?php $id = $row['id']; ?>
                            <th class="th-container"><a href="edituser.php?updateid=<?php echo $id?>">Επεξεργασία</a></th>
                            <th class="th-container"><a href="deleteuser.php?deleteid=<?php echo $id?>">Διαγραφή</a></th>
                        </tr>
                    <?php endwhile ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>