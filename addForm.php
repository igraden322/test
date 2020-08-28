<?php 
$con = mysqli_connect("localhost", "root", "","taskbook");
mysqli_set_charset($con, "utf8");

?>

<form action="add.php" method="post">
    <table>
        <tr>
            <td>
                <label for="mail">Почта:</label>
            </td>
            <td>
                <label for="tasktext">Текст задачи:</label>
            </td>
        </tr>
        <tr>
            <td>
                <input type="text" name="mail">
            </td>
            <td>
                <textarea name="tasktext"></textarea>
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" value="Записать задачу">
            </td>
        </tr>   
    </table>
</form>