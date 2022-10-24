<?php

require_once "database.php";
echo "<br><br>";

$osoba = array(
        'login' => removeSpecialChar($_POST['login']),
        'haslo' => $_POST['haslo'],
        'haslo2' => $_POST['haslo2'],
        'email' => filter_var($_POST['email'], FILTER_SANITIZE_EMAIL)
        );

foreach ($osoba as $x => $value) {
    $osoba[$x] = htmlentities(trim($value));
}

$niepowodzenie = false;
$bledy = array();

foreach ($osoba as $x => $value) {
    if (empty($value) || $value == "") {
        array_push($bledy, "{$x} nie został wprowadzony");
        $niepowodzenie = true;  
    }
}

if ($osoba[$haslo] != $osoba[$haslo2]) {
    array_push($bledy, "Hasła się ze sobą nie zgadzają");
    $niepowodzenie = true;
}

if (!checkemail($osoba['email'])) {
    array_push($bledy, "Podano niepoprawny adres email");
    $niepowodzenie = true;
}

if (strlen($osoba['login']) > 16) {
    array_push($bledy, "Login powinien nie zawierać wiecej znaków niż 16");
    $niepowodzenie = true;
}

if (strlen($osoba['email']) > 32) {
    array_push($bledy, "Login powinien nie zawierać wiecej znaków niż 16");
    $niepowodzenie = true;
}

if (strlen($osoba['haslo']) > 32) {
    array_push($bledy, "Haslo nie powinno zawierać wiecej znaków niż 32");
    $niepowodzenie = true;
}

if ($niepowodzenie == true) {
    echo "Logowanie się nie powiodło..";
} else if ($niepowodzenie == false) {
    echo "Logowanie się powiodło";

    $query = $conn->prepare('INSERT INTO osoba VALUES ()')
}

echo "<br><br>";

foreach ($bledy as $blad) {
    echo "$blad <br>";
}
echo "<br>";
echo "Zmienne post: <br>";

foreach ($osoba as $x => $value) {
    echo $x . ": " . $value . "<br>";
}


function removeSpecialChar($str) {
    $result = preg_replace('/[^a-zA-Z0-9_ -]/s','', $str);
    $result = str_replace(' ', '', $result);
    return $result;
}

function checkemail($str) {
    return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
}