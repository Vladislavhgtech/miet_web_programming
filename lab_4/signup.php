<?php 
require "db.php";

$data=$_POST;
$errors=array();


if (isset($data['do_signup'])) {
    if (trim ($data['login'])=='') 
    {
        $errors[]='Введите логин';

    }
    if (trim ($data['email'])=='') 
    {
        $errors[]='Введите email';

    }

    if (trim ($data['passport'])=='') 
    {
        $errors[]='Введите паспорт';

    }

    if (trim ($data['password'])=='') 
    {
        $errors[]='Введите пароль';

    }

    if (trim ($data['password_2'])!=$data['password'])  
    {
        $errors[]='Повторный пароль введен неверно';

    }





    if(empty($errors) ) {
        //всё хорошо, регистрируем пользователя в БД

        $user=R::dispense('users');
        $user->login=$data['login'];
        $user->email=$data['email'];
        $user->passport=$data['passport'];
        $user->password=password_hash($data['password'], PASSWORD_DEFAULT);
        R::store($user);

        echo '<div style="color: green;">Вы успешно зарегистрировались</div><hr>';


    }
    else {
        echo '<div style="color: red;">'.array_shift($errors).'</div><hr>';

    }


}
?>


<form action="/signup.php" method="POST">

<p>
    <p><strong>Ваш логин</strong></p>
    <input type="text" name="login" value="<?php echo @$data['login']; ?>">

    <p><strong>Ваш email</strong></p>
    <input type="email" name="email" value="<?php echo @$data['email']; ?>">

    <p><strong>Серия и номер паспорта</strong></p>
    <input type="passport" name="passport" value="<?php echo @$data['passport']; ?>">

    <p><strong>Ваш пароль</strong></p>
    <input type="password" name="password">

    <p><strong>Введите ваш пароль ещё раз</strong></p>
    <input type="password" name="password_2">

    <p>
        <button type="submit" name="do_signup">Зарегистрироваться</button>
    </p>

</p>


</form>