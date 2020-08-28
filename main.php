<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Задачник</title>
        <meta name="description" content="Сборник задач">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <h1>Сборник задач</h1>
        <?php 
            session_start();
            if(isset( $_SESSION['auth']) && isset($_SESSION['name'])){
                if($_SESSION['auth'] == "ok"){
                    echo "<a href='exit.php'>Выйти</a>";
                }
                
                if($_SESSION['auth'] == "no"){
                    echo "Авторизуйтесь";
                }
                session_abort();
            }
            
        ?>
        <div class="links">
            <h3><a href="registration.php">Зарегистрироваться</a></h3>
            <h3><a href="addForm.php">Добавить задачу</a></h3>
        </div>
        <div class="auth">
                <form method="post" action="check.php">
                <table>
                    <tr>
                        <td>
                        <label for="name">Имя(никнейм)</label>
                        </td>
                        <td>
                        <input type="text" name="name">
                        </td>
                    </tr>

                    <tr>
                        <td>
                        <label for="password">Пароль</label>
                        </td>
                        <td>
                        <input type="password" name="password">
                        </td>
                    </tr>
                    <tr>
                    <td>
                        <input type="submit" value="Войти">
                    </td>
                    </tr>
                </table>    
            </form>
        </div>
        <div class="tasks">
            <table>
            <?php 
            $con = mysqli_connect("localhost", "root", "","taskbook");
            mysqli_set_charset($con, "utf8");

            $query = "SELECT * FROM tasks";

            $result = mysqli_query($con,$query);

            while ($row = mysqli_fetch_array($result)) {
                $userId = $row['id_user'];
                $queryUser = "SELECT name, mail FROM users WHERE id='$userId'";
                $resultUser = mysqli_query($con,$queryUser);
                $rowUser = mysqli_fetch_array($resultUser);
                if(isset($row['id_user'])){
                    $name = $rowUser['name'];
                    $mail = $rowUser['mail'];
                }
                else{
                    $name = "Неизвестный пользователь";
                    $mail = "";
                }
                $text = $row['text'];
                $id = $row['id'];

                echo "<tr>";
                echo "<h3> Задача №$id от $name($mail):</h3>$text";
                echo "</tr>";
            }
            if(isset($_SESSION['auth'])){
                if($_SESSION['auth'] == "ok"){
                    echo "<br>
                    <form action='delete.php' method='post'>
                    <label for='id'>Номер задачи:</label>
                    <input type='number' name='id'>
                    <input type='submit' value='Удалить'>
                    </form>
                    ";
                }
            }
            ?>
            </table>
        </div>
    </body>
</html>

