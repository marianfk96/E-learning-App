<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="frontpageskeleton.css">
    <title>Εγγραφή</title>
</head>
<body>
    <div class="main-container">
        <h2>Δημιουργία λογαριασμού</h2>

        <?php
        if (isset($_POST["submit"])) {
            $firstname = $_POST["fn"];
            $lasttname = $_POST["ln"];
            $loginame = $_POST["email"];
            $password = $_POST["pw"];
            $role = $_POST["role"];

            $passwordHash = password_hash($password, PASSWORD_DEFAULT);

            $errors = array();

            if (empty($firstname) OR empty($lasttname) OR empty($loginame) OR empty($password) OR empty($role)) {
                array_push($errors, "Παρακαλώ συμπληρώστε όλα τα πεδία");
            }
            if (!filter_var($loginame, FILTER_VALIDATE_EMAIL)) {
                array_push($errors, "Το πεδίο Loginame πρέπει να είναι μια ενεργή διεύθυνση email");
            }

            require_once "database.php";
            $sql = "SELECT * FROM users WHERE loginame='$loginame'";
            $duplicate = mysqli_query($conn, $sql);
            $rows = mysqli_num_rows($duplicate);
            if ($rows>0) {
                array_push($errors,"Το Loginame υπάρχει ήδη");
            }

            if (count($errors)>0) {
                foreach ($errors as $error) {
                    echo "<div class='alert alert-danger'>$error</div>";
                }
            }
            else {
                $sql = "INSERT INTO users (firstname, lastname, loginame, password, role) VALUES ( ?, ?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                $preparestatement = mysqli_stmt_prepare($stmt, $sql);

                if ($preparestatement) {
                    mysqli_stmt_bind_param($stmt, "sssss", $firstname, $lasttname, $loginame, $passwordHash, $role);
                    mysqli_stmt_execute($stmt);
                    echo "<div class='alert alert-success'>Επιτυχής εγγραφή</div>";
                }
                else {
                    die("Κάτι πήγε στραβά");
                }
            }
        }
        ?>

        <form action="register.php" method="post">
            <div class="form-field">
                <label for="fn">Όνομα</label>
                <input type="text" name="fn">
            </div>
            <div class="form-field">
                <label for="ln">Επώνυμο</label>
                <input type="text" name="ln">
            </div>
            <div class="form-field">
                <label for="email">Loginame</label>
                <input type="email" name="email">
            </div>
            <div class="form-field">
                <label for="pw">Password</label>
                <input type="password" name="pw">
            </div>
            <div class="form-field">
                <label for="role">Ρόλος</label>
                <select name="role" id="role">
                    <option value="tutor">Tutor</option>
                    <option value="student">Student</option>
                </select>
            </div> 
            <div class="form-field">
                <input type="submit" value="Εγγαρφή" class="btn btn-primary" name="submit">
            </div>
        </form>
        <h3>Έχετε ήδη λογαριασμό; <a href="login.php">Σύνδεση</a></h3>
    </div>
</body>
</html>