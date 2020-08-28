<?php

echo"
<form method='post'>
<input type='submit' value='Вывод сообщения с задержкой'>
<input type='hidden' name='check' value='checked'>
</form>";

if(isset($_POST['check'])){
    if($_POST['check'] == 'checked'){
        sleep(4);
        echo "Сообщение";
    }
}

?>