<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Σύνδεση</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="frontpageskeleton.css">
</head>
<body>
    <div class="main-container">
        <h2>Συμπληρώσετ τα πεδία για να συνδεθείτε</h2>

        <?php
        if (isset($_POST["submit"])) {
            $loginame = $_POST["email"];
            $password = $_POST["pw"];

            require_once "database.php";
            $sql = "SELECT * FROM users WHERE loginame = '$loginame'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($user) {
                if (password_verify($password, $user["password"])) {
                    if ($user["role"]=="tutor") {
                        session_start();
                        $_SESSION["user"] = "yes";
                        header("Location: indextutor.php");
                        die();
                    }
                    else {
                        session_start();
                        $_SESSION["user"] = "yes";
                        header("Location: index.php");
                        die();
                    }
                }
                else {
                    echo "<div class='alert alert-danger'>Λάθος κωδικός πρόσβασης</div>";
                }
            }
            else {
                echo "<div class='alert alert-danger'>Το Loginame δεν υπάρχει</div>";
            }


        }
        ?>
        <form action="login.php" method="post">
            <div class="form-field">
                <label for="un">Loginame</label>
                <input type="email" name="email">
            </div>
            <div class="form-field">
                <label for="pw">Password</label>
                <input type="password" name="pw">
            </div>
            <div class="form-field">
                <input type="submit" value="Σύνδεση" class="btn btn-primary" name="submit">
            </div>
        </form>
        <h3>Δεν έχετε λογαριασμό; <a href="register.php">Εγγραφή</a></h3>
    </div>
</body>
</html>