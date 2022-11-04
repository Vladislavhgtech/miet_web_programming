<?php 
require "db.php";

$data=$_POST;

if(isset($data['do_login']))
{
    $errors=array();
    $user=R::findOne('users', 'login = ?', array($data['login']));
    if ($user) 
    {
        if( password_verify($data['password'], $user->password)) 
        {
            //запоминаем залогинившегося пользователя с помощью сессии
            $_SESSION['logged_user']=$user;

            print '<div style="color: green;">Уважаемый, '. $user->login.' Ваши паспортные данные '.$user->passport.'</div><hr>';


        } else {
            $errors[]='Неккоректный пароль';
        }

    }
    else {
        $errors[]='Пользователь не найден';
    }

    if(! empty($errors) ) {

        echo '<div style="color: red;">'.array_shift($errors).'</div><hr>';

    }
}

?>


<form action="login.php" method="POST">
    
<p>    
    <p><strong>Ваш логин</strong></p>
    <input type="text" name="login" value="<?php echo @$data['login']; ?>">
</p>

<p>    
    <p><strong>Пароль</strong></p>
    <input type="password" name="password" value="<?php echo @$data['password']; ?>">
</p>

<p>
    <button type="submit" name="do_login">Войти</button>
</p>




</form>