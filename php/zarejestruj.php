<?php

require_once "database.php";
echo "<br><br>";

$osoba = array(
        'login' => removeSpecialChar($_POST['login']),
        'haslo' => $_POST['haslo'],
        'haslo2' => $_POST['haslo2'],
        'email' => filter_var($_POST['email'], FILTER_SANITIZE_EMAIL)
        );

class Rejestracja {

    public $niepowodzenie = false;
    public $bledy = array();

    function error($str) {
        array_push($this->bledy, $str);
        $this->niepowodzenie = true;
    }
    
}

foreach ($osoba as $x => $value) {
    $osoba[$x] = htmlentities(trim($value));
}

$rejestracja = new Rejestracja();

foreach ($osoba as $x => $value) {
    if (empty($value) || $value == "") {
        $rejestracja->error("{$x} nie został wprowadzony");
        // array_push($rejestracja->bledy, "{$x} nie został wprowadzony");
    }
}

if (strlen($osoba['email']) > 32) 
    $rejestracja->error("Login powinien nie zawierać wiecej znaków niż 32");
    
if ($osoba['haslo'] != $osoba['haslo2']) 
    $rejestracja->error("Hasła się ze sobą nie zgadzają");

if (!checkemail($osoba['email'])) 
    $rejestracja->error("Podano niepoprawny adres email");

if (strlen($osoba['login']) > 16) 
    $rejestracja->error("Login powinien nie zawierać wiecej znaków niż 16");

if (strlen($osoba['haslo']) > 32) 
    $rejestracja->error("Haslo nie powinno zawierać wiecej znaków niż 32");


if ($rejestracja->niepowodzenie == true) {
    echo "Logowanie się nie powiodło..";
} else if ($rejestracja->niepowodzenie == false) {
    echo "Logowanie się powiodło";
    // $query = $conn->prepare('INSERT INTO osoba VALUES ()');
}

echo "<br><br>";

foreach ($rejestracja->bledy as $blad) {
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
