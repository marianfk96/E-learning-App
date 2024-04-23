<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Επικοινωνία</title>
    <link rel="stylesheet" href="skele.css">
    <link rel="stylesheet" href="communication-styles.css">
</head>
<body>
    <header>
        <h1><a href="communication.php">Επικοινωνία</a></h1>
    </header>
    <div class="site-content">
        <nav class="nav-container">
            <button class="btn"><a href="index.php">Αρχική σελίδα</a></button>
            <button class="btn"><a href="announcement.php">Ανακοινώσεις</a></button>
            <button class="btn"><a href="communication.php">Επικοινωνία</a></button>
            <button class="btn"><a href="documents.php">Έγγραφα μαθήματος</a></button>
            <button class="btn"><a href="homework.php">Εργασίες</a></button>
            <button class="logout"><a href="register.php">Logout</a></button>
        </nav>
        <div class="main-container">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi nulla quidem sint aperiam rerum nesciunt illum vitae veritatis sequi voluptas? Ad tempore sequi iure excepturi officiis explicabo culpa est quidem! Quaerat amet molestiae et iste nisi exercitationem voluptas mollitia error eligendi consequuntur perspiciatis odit soluta excepturi sint in optio accusantium dignissimos aliquam unde fugiat blanditiis, vitae eveniet natus! Sint repudiandae ex, placeat possimus velit libero temporibus architecto porro perspiciatis at necessitatibus sed exercitationem dolor totam dolore delectus voluptas molestiae! Magnam repellat voluptates corporis atque eum nostrum fugiat cumque aperiam odio modi, ad, quidem praesentium doloremque aliquid ex perspiciatis voluptatem animi.</p>
            <h2>Αποστολή e-mail μέσω web φόρμας</h2>
            <div class="contact-container">
                <form id="contact" action="mail.php" method="post">
                    <ul>
                        <li>
                            <label for="sender"><b>Αποστολέας: </b></label>
                            <input type="text" name="sender" id="sender">
                        </li>
                        <li>
                            <label for="theme"><b>Θέμα: </b></label>
                            <input type="text" name="theme" id="theme">
                        </li>
                        <li>
                            <label for="text"><b>Κείμενο: </b></label>
                            <textarea name="text" id="text" cols="100" rows="20"></textarea>
                        </li>
                    </ul>
                    <input type="submit" class="submit-btn" value="Αποστολή" name="submit">
                </form>
            </div>
            <h2>Αποστολή e-mail με χρήση e-mail διεύθυνσης</h2>
            <div class="contact-container">
                <p>Εναλλακτικά μπορείτε να αποστείλετε e-mail στην παρακάτω διεύθυνση ηλεκτρονικού ταχυδρομείου <a href="mailto: mar.foudouli@gmail.com">tutor@csd.auth.test.gr</a></p>
            </div>
        </div>
    </div>
</body>
</html>