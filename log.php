<?if (isset($_POST['login']) && !empty($_POST['login']) && isset($_POST['password']) && !empty($_POST['password'])){
    if ($_POST['password'] === $_POST['passConfirm']) {
        require_once 'config.php';
        $login = mysqli_real_escape_string($link, $_POST['login']);
        $logins = mysqli_query($link, "SELECT * FROM `users` WHERE `login`='$login'");
        if(mysqli_num_rows($logins) != 0){
            echo "Этот логин уже занят, попробуйте другой.";
            ?>
            <p>Регистрация</p>
            <form method="POST" action="signin.php">
                <div> Эл. почта <input type="email" name="email"> </div>
                <div> Тел.: <input type="text" name="phone" value="<?echo $_POST['phone']?>"> </div>
                <div> Пароль*: <input required type="password" name="password"> </div>
                <div> Подтверждение пароля*: <input required type="password" name="passConfirm"> </div>
                <div> <input type="submit"> </div>
            </form>
            <?
        }else{
            $queryHead = "INSERT INTO `users`(`login`, ";
            $queryTail = " VALUES ( '$login' ,";
            if(isset($_POST['name']) && !empty($_POST['name'])){
                $queryHead .= "`name`, ";
                $name = mysqli_real_escape_string($link, $_POST['name']);
                $queryTail .= "'$name', ";
            }
            if(isset($_POST['email']) && !empty($_POST['email'])){
                $queryHead .= "`email`, ";
                $email = mysqli_real_escape_string($link, $_POST['email']);
                $queryTail .= "'$email', ";
            }
            if(isset($_POST['phone']) && !empty($_POST['phone'])){
                $queryHead .= " `phone`, ";
                $phone = mysqli_real_escape_string($link, $_POST['phone']);
                $queryTail .= "'$phone', ";
            }
            $queryHead .= "`pass`)";
            $pass = md5(mysqli_real_escape_string($link, $_POST['password']));
            $queryTail .= " '$pass');";
            $queryHead .= $queryTail;
            $result = mysqli_query($link, $queryHead) or die("Ошибка " . mysqli_error($link));
            header('Refresh: 5; url=../index.php');
            echo "Благодарим за регистрацию, через 5 секунд вы будете перенаправлены на страницу входа. Если этого не произошло - нажмите <a href='../index.php'>сюда</a>";
        }
    }else{ echo "Введённые пароли не совпадают. Попробуйте ещё раз.";
        ?>
        <p>Регистрация</p>
        <form method="POST" action="signin.php">
            <div> Эл. почта <input type="email" name="email"> </div>
            <div> Тел.: <input type="text" name="phone" value="<?echo $_POST['phone']?>"> </div>
            <div> Пароль*: <input required type="password" name="password"> </div>
            <div> Подтверждение пароля*: <input required type="password" name="passConfirm"> </div>
            <div> <input type="submit"> </div>
        </form>
    <?}?>
<?}else{
    ?>
    <p>Регистрация</p>
    <form method="POST" action="signin.php">
        <div> Эл. почта <input type="email" name="email"> </div>
        <div> Тел.: <input type="text" name="phone"> </div>
        <div> Пароль*: <input required type="password" name="password"> </div>
        <div> Подтверждение пароля*: <input required type="password" name="passConfirm"> </div>
        <div> <input type="submit"> </div>
    </form>
<?}?>
