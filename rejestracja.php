<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CREVATTI - Rejestracja</title>
    <link rel="stylesheet" href="css/style2.css">
</head>
<body>
    <header>
        <ul>
            <li>
                <a href="oferta.php">Oferta</a>
            </li>
            <li>
                <a href="">Zdjęcia</a>
            </li>
            <li>
                <a href="logowanie.php">Logowanie</a>
            </li>
            <li><a href="index.php">Strona główna</a></li>
        </ul>

        <div id="cont">
            <div></div>
            <a href="oferta.php">Oferta</a>
            <a href="">Zdjęcia</a>
            <a href="logowanie.php">Logowanie</a>
            <a href="rejestracja.php">Rejestracja</a>
        </div>
        <input type="checkbox" name="" id="drop">
    </header>
    <main>
        <section>
            <article>
                <h1>CREVATTI</h1>
                <label id="desc">Fromularz rejestracyjny</label>
                <form action="php/zarejestruj.php" method="POST">
                    <div id="forma">
                        <label for="">Login</label>
                        <input type="text" name="login" id="">
                        <label for="">Hasło</label>
                        <input type="text" name="haslo" id="">
                        <label for="">Powtórz hasło</label>
                        <input type="text" name="haslo2" id="">
                        <label for="">Adres e-mail</label>
                        <input type="text" name="email" id="">
                        </div>
                    <input type="submit" value="Rejestracja" id="rejestr">
                    <p>Masz już konto?  <a id="log" href="logowanie.php">Zaloguj się</a></p>
                </form>
            </article>
        </section>
        <div id="mod">
            <button id="dark-mode"></button>
            <button id="plus">+</button>
            <button id="minus">-</button>
        </div>
        <div id="alert"></div>
    </main>

</body>
</html>