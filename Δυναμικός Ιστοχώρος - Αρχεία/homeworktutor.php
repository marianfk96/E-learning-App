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
    <title>Εργασίες</title>
    <link rel="stylesheet" href="skele.css">
    <link rel="stylesheet" href="homework-styles.css">
</head>
<body>
    <header>
        <h1><a href="homeworktutor.php">Εργασίες</a></h1>
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
            <h3><a href="addassignment.php" style="margin-left: 10px;">Προσθήκη νέας εργασίας</a></h3>
            <?php
            $sql = "SELECT * FROM projects;";
            $result = mysqli_query($conn, $sql);
            /* checking if we have anything saved in the database. if not i will get an error when trying to display the data*/
            $resultsCheck = mysqli_num_rows($result);
            if ($resultsCheck==null) {
                echo "Δεν υπάρχουν εργασίες";
            }
            ?>

            <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <h2>Εργασία <?php echo $row['id'];?></h2>
            <?php $id=$row['id']; ?>
            <a style="margin-left: 10px;" href="editassignment.php?updateid=<?php echo $id?>">Επεξεργασία</a>
            <a style="margin-left: 10px;" href="deleteassignment.php?deleteid=<?php echo $id?>">Διαγραφή</a>
            <div class="homework-container">
                <p><i>Στόχοι: Oι στόχοι της εργασίας είναι:</i></p>
                <div class="goals" style="margin-left: 20px;">
                    <?php echo $row['goals'];?>
                </div>
                <p><i>Εκφώνηση</i></p>
                <p class="instructions">Κατεβάστε την εκφώνηση της εργασίας <a href="<?php echo $row['location']?>">εδώ</a></p>
                <p><i>Παραδοτέα</i></p>
                <div class="deliverables" style="margin-left: 20px;">
                    <?php echo $row['deliverables'];?>
                </div>
                <p><span style="color: red; font-weight: bold;">Ημερομηνία παράδοσης</span>: <?php echo $row['due'];?></p>
            </div>
            <?php endwhile ?>
            
            <button class="top"><a href="homeworktutor.php">&lt;top&gt;</a></button>
        </div>
    </div>
</body>
</html>