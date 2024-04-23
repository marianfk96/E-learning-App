<?php
session_start();
include_once 'database.php';

if (!isset($_SESSION["user"])) {
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ανακοινώσεις</title>
    <link rel="stylesheet" href="skele.css">
    <link rel="stylesheet" href="announcement-styles.css">
</head>
<body>
    <header>
        <h1><a href="announcementtutor.php">Ανακοινώσεις</a></h1>
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
            <h3><a href="addannouncement.php">Προσθήκη νέας ανακοίνωσης</a></h3>
            <?php
            $sql = "SELECT * FROM announcements;";
            $result = mysqli_query($conn, $sql);
            /* checking if we have anything saved in the database. if not i will get an error when trying to display the data*/
            $resultsCheck = mysqli_num_rows($result);
            if ($resultsCheck==null) {
                echo "Δεν υπάρχουν ανακοινώσεις";
            }
            ?>
            <?php while ($row = mysqli_fetch_assoc($result)): ?> 
                    <h2>Ανακοίνωση 
                    <?php
                    echo $row["id"];
                    $id = $row["id"];
                    ?></h2>
                    <div class="buttons">
                        <a style="margin-left: 10px;" href="updateannouncement.php?updateid=<?php echo $id?>">Επεξεργασία</a>
                        <a style="margin-left: 10px;" href="deleteannouncement.php?deleteid=<?php echo $id?>">Διαγραφή</a>
                    </div>
                    <div class="announcement-container">
                    <p><b>Ημερομηνία:</b>
                    <?php
                    echo $row["date"];
                    ?></p>
                    <p><b>Θέμα:</b>
                    <?php
                    echo $row["theme"];
                    ?></p>
                    <p>
                    <?php
                    echo $row["maintext"]
                    ?></p>
                    </div>
            <?php endwhile ?>
            <button class="top"><a href="announcementtutor.php">&lt;top&gt;</a></button>
        </div>
    </div>
</body>
</html>