<?php
require_once('req.php');
function validateInput($i)
{
    $i = trim($i);
    $i = stripslashes($i);
    $i = htmlspecialchars($i);
    return $i;
}
session_start();
$output = "";
if (count($_POST) > 0) {
    if ($_POST['token'] != $_SESSION['token']) {
        die();
    }
    $name = validateInput($_POST['name']);
    $email = validateInput($_POST['email']);
    $message = validateInput($_POST['message']);
    $theme = validateInput($_POST['theme']);
    $year = validateInput($_POST['year']);
    if (isset($_POST['gender'])) {
        $gender = validateInput($_POST['gender']);
    }
    $checked = 0;
    if (isset($_POST['check'])) {
        $checked = validateInput($_POST['check']);
    }
    $valid = true;
    if (!preg_match("/^[a-zA-Zа-яА-Я0-9\s]{1,45}$/u", $name)) {
        $valid = false;
        $output .= "<div class='alert alert-danger' role='alert'>
        Введите имя! (Максимум 45 символов)
      </div>";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $valid = false;
        $output .= "<div class='alert alert-danger' role='alert'>
            Введите корректный email!
          </div>";
    }
    if (empty($message)) {
        $valid = false;
        $output .= "<div class='alert alert-danger' role='alert'>
            Введите сообщение!
          </div>";
    }

    if (!preg_match("/^[a-zA-Zа-яА-Я0-9\s]{1,45}$/u", $theme)) {
        $valid = false;
        $output .= "<div class='alert alert-danger' role='alert'>
            Введите тему! (Максимум 45 символов)
          </div>";
    }
    if (!isset($gender)) {
        $valid = false;
        $output .= "<div class='alert alert-danger' role='alert'>
            Выберите пол!
          </div>";
    }
    if (!preg_match("/^[0-9]{4}$/", $year)) {
        $valid = false;
        $output .= "<div class='alert alert-danger' role='alert'>
            Введите корректный год!
          </div>";
    }
    if ($checked == 0) {
        $valid = false;
        $output .= "<div class='alert alert-danger' role='alert'>
            Вы должны согласиться с условиями!
          </div>";
    }

    if ($name && $email && $message && $theme && $year && $checked && $valid) {
        $params = [
            'name' => $name,
            'email' => $email,
            'message' => $message,
            'theme' => $theme,
            'year' => $year,
            'gender' => $gender,
            'checked' => $checked
        ];
        setcookie('name', $name, time() + 3600 * 24 * 365);
        setcookie('email', $email, time() + 3600 * 24 * 365);
        setcookie('year', $year, time() + 3600 * 24 * 365);
        setcookie('gender', $gender, time() + 3600 * 24 * 365);
        $output .= "<div class='alert alert-success' role='alert'>
            Сообщение отправлено!
            </div>";
        insertFeedback($conn, $params);
    }
} else {
    if (isset($_COOKIE['name'])) {
        $name = validateInput($_COOKIE['name']);
    }
    if (isset($_COOKIE['email'])) {
        $email = validateInput($_COOKIE['email']);
    }
    if (isset($_COOKIE['year'])) {
        $year = validateInput($_COOKIE['year']);
    }

    $_SESSION['token'] = bin2hex(random_bytes(32));
}
$gender = 0;
if (isset($_POST['gender'])) {
    $gender = validateInput($_POST['gender']);
} else if (isset($_COOKIE['gender'])) {
    $gender = validateInput($_COOKIE['gender']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Обратная связь</title>
    <?php
    require_once('style.php');
    ?>
    <link rel="stylesheet" href="./assets/styles/feedback.css">
</head>

<body class="text-center">
    <?php
    require_once('header.php');
    if ($output != "") {
        echo $output;
    }
    ?>

    <div class="form-group row">
        <form class="form-signin " novalidate="novalidate" action="feedback.php" method="POST">
            <h1 class="h3 mb-3 font-weight-normal">Обратная связь</h1>
            <input type="hidden" name="token" value="<?= $_SESSION['token'] ?>">
            <label for="inputName" class="sr-only">Имя</label>
            <input type="text" id="inputName" class="form-control" placeholder="Имя" name="name" <?php if (isset($name) && $name) {
                                                                                                        echo "value='$name'";
                                                                                                    } ?> required autofocus>

            <label for="inputEmail" class="sr-only">Email</label>
            <input type="email" id="inputEmail" class="form-control" placeholder="Email" name="email" <?php if (isset($email) && $email != '') echo "value = " . $email; ?> required>
            <label for="year" class="sr-only">Год рождения</label>
            <select class="form-control" id="year" name="year">
                <?= '<option value="' . $year . '">' . $year . '</option>' ?>
                <?php
                for ($i = 2021; $i >= 1900; $i--) {
                    if ($i != $year)
                        echo "<option value='$i'>$i</option>";
                }
                ?>
            </select>
            <label class="sr-only">Пол</label><br>

            <div class="radios">
                <input type="radio" id="gender1" name="gender" value="male" <?php if ($gender == 'male') echo "checked = 'checked'" ?>>
                <label for="male">Мужской</label>
                <br>
                <input type="radio" id="gender2" name="gender" value="female" <?php if ($gender == 'female') echo "checked = 'checked'" ?>>
                <label for="female">Женский</label>
            </div>
            <laberl for="theme" class="sr-only">Тема</laberl>
            <input type="text" id="theme" class="form-control" placeholder="Тема" name="theme" <?php if (isset($theme) && $theme) {
                                                                                                    echo "value='$theme'";
                                                                                                } ?> required>
            <label for="inputMessage" class="sr-only">Сообщение</label>
            <textarea class="form-control" id="inputMessage" rows="3" name="message" required><?php if (isset($message)) echo $message ?></textarea>
            <label for="check" class="sr-only">С контрактом ознакомлен</label>
            <input type="checkbox" id="check" name="check" value="1" required>
            <br>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Отправить</button>

        </form>
        <button class="btn btn-lg btn-primary btn-block btn-back" onclick="document.location='index.php'">На главную</button>
    </div>
</body>

</html>