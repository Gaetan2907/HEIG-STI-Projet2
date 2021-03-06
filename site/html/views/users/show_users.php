<?php include "../../../databases/db_connection.php"; 
session_start();
include "../../scripts/check_authentication.php";
include "../../scripts/check_is_admin.php";
?>
<!doctype html>
<html>
<?php include "../head.php";?>
<body>
<?php include "../nav.php"; ?>
    <div class="container">
        <h1 class="mt-2">Utilisateurs</h1>
        <a href="./new_user.php" class="btn btn-success my-2">Ajouter un utilisateur</a>

        <table class="table">
            <thead>
                <tr>
                <th scope="col">Utilisateur</th>
                <th scope="col">Admin</th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            <?php
            $sql = $file_db->prepare("SELECT * FROM users WHERE `is_active` = 1");
            $sql->execute();
            foreach ($sql->fetchAll() as $user) {
                ?>
                <tr>
                <td><?=$user['username']?></td>
                <td><?=$user['is_admin'] ? "Oui" : "Non"?></td>
                <td><a href="./edit_user.php?username=<?=$user['username']?>">Modifier</a></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
<?php include "../scripts.php";?>
</body>
</html>
