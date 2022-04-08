<!-- 
SNACK 2
Passare come parametri GET name, mail e age e verificare (cercando i metodi che non conosciamo nella documentazione) che name sia più lungo di 3 caratteri, che mail contenga un punto e una chiocciola e che age sia un numero. Se tutto è ok stampare “Accesso riuscito”, altrimenti “Accesso negato”
SNACK 4
Creare un array con 15 numeri casuali, tenendo conto che l’array non dovrà contenere lo stesso numero più di una volta
SNACK 5
Prendere un paragrafo abbastanza lungo, contenente diverse frasi. Prendere il paragrafo e suddividerlo in tanti paragrafi. Ogni punto un nuovo paragrafo. 
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Snacks blocco 1</title>
</head>
<body>
    <!-- 
    SNACK 1
    Creiamo un array contenente le partite di basket di un’ipotetica tappa del calendario. Ogni array avrà una squadra di casa e una squadra ospite, punti fatti dalla squadra di casa e punti fatti dalla squadra ospite. Stampiamo a schermo tutte le partite con questo schema.
    Olimpia Milano - Cantù | 55-60 
    -->

    <h1>Snack 1</h1>

    <?php 
        $arrMatches = [
            [
                'casa' => [
                    'nome' => 'Olimpia Milano',
                    'punteggio' => 55 
                ],
                'ospite' => [
                    'nome' => 'Cantù',
                    'punteggio' => 60
                ]
            ],
            [
                'casa' => [
                    'nome' => 'Bergamo',
                    'punteggio' => 82 
                ],
                'ospite' => [
                    'nome' => 'Brescia',
                    'punteggio' => 25
                ]
            ],
            [
                'casa' => [
                    'nome' => 'Bologna',
                    'punteggio' => 53 
                ],
                'ospite' => [
                    'nome' => 'Padova',
                    'punteggio' => 67
                ]
            ],
            [
                'casa' => [
                    'nome' => 'Trieste',
                    'punteggio' => 76 
                ],
                'ospite' => [
                    'nome' => 'Venezia',
                    'punteggio' => 32
                ]
            ],
            [
                'casa' => [
                    'nome' => 'Pavia',
                    'punteggio' => 33
                ],
                'ospite' => [
                    'nome' => 'Sondrio',
                    'punteggio' => 35
                ]
            ],
        
        ]; 
    ?>
    
    <ul><?php
        for ($_i=0; $_i < count($arrMatches); $_i++) { ?>
            <li>
                <span><?= $arrMatches[$_i]['casa']['nome'] ?></span> -
                <span><?= $arrMatches[$_i]['ospite']['nome'] ?></span> |
                <span><?= $arrMatches[$_i]['casa']['punteggio'] ?></span> -
                <span><?= $arrMatches[$_i]['ospite']['punteggio'] ?></span>
            </li><?php
        } ?>
    </ul>

    <span>-----------------------------------------------------</span>

    <!-- 
    SNACK 2
    Passare come parametri GET name, mail e age e verificare (cercando i metodi che non conosciamo nella documentazione) che name sia più lungo di 3 caratteri, che mail contenga un punto e una chiocciola e che age sia un numero. Se tutto è ok stampare “Accesso riuscito”, altrimenti “Accesso negato” 
    -->

    <h1>Snack 2</h1>

    <form action="" method="get">
        <label for="name">Nome:</label>
        <input type="text" name="name" id="name">
        <label for="mail">Mail:</label>
        <input type="text" name="mail" id="mail">
        <label for="age">Età:</label>
        <input type="number" name="age" id="age">
        <button type="submit">Accedi</button>
    </form>

    <?php
        // prendo i parametri dall'URL
        $name = $_REQUEST['name'];
        $mail = $_REQUEST['mail'];
        $age = $_REQUEST['age'];
        // $dataInserted = $name && $mail && $age;
        $namelen = strlen($name) > 3;
        $posAtSign = strpos($email, '@', 1);
        $posDot = strpos($email, '@', $posAtSign);
        $ageIsNum = is_int($age);

        if (isset($name, $mail, $age)) {

            if ($namelen && $posAtSign && $posDot && $ageIsNum) {
                echo 'Accesso riuscito';
            } else {
                echo 'Accesso negato';
            }

        } else {
            echo 'Accesso negato';
        }
    ?>

</body>
</html>