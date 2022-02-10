<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['formData'])) {$formData = $_POST['formData'];}
    if (isset($_POST['name'])) {$name = $_POST['name'];}
    if (isset($_POST['phone'])) {$phone = $_POST['phone'];}
    if (isset($_POST['email'])) {$email = $_POST['email'];}
    if (isset($_POST['noname'])) {$noname = $_POST['noname'];}
    if (isset($_POST['activitycompany'])) {$activitycompany = $_POST['activitycompany'];}
    if (isset($_POST['bin'])) {$bin = $_POST['bin'];}

    $to = "ramzez1@gmail.com"; /*Укажите адрес, га который должно приходить письмо*/
    $sendfrom   = "ramzez1@gmail.com"; /*Укажите адрес, с которого будет приходить письмо, можно не настоящий, нужно для формирования заголовка письма*/
    $headers  = "From: " . strip_tags($sendfrom) . "\r\n";
    $headers .= "Reply-To: ". strip_tags($sendfrom) . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html;charset=utf-8 \r\n";
    $subject = "$formData";
    $message = "<h2>$formData</h2><br> <b>Имя пославшего:</b> $name<br> <b>Телефон:</b> $phone<br> <b>E-mail:</b> $email<br> <b>noname field:</b> $noname<br> <b>Деятельность компании:</b> $activitycompany<br> <b>Bin:</b> $bin<br>";
    $send = mail ($to, $subject, $message, $headers);
    if ($send == 'true')
    {
    echo '<center><H3 class="success">Спасибо за отправку вашего сообщения!</H3></center>';
    }
    else 
    {
    echo '<center><h3 style="color:red;"><b>Ошибка. Сообщение не отправлено!</b></h3></center>';
    }
} else {
    http_response_code(403);
    echo "Попробуйте еще раз";
}
?>