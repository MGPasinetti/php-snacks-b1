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
        $dataInserted = isset($name, $mail, $age);
        $validData = boolval($name) && boolval($mail) && boolval($age);
        $namelen = strlen($name) > 3;
        $posAtSign = strpos($mail, '@', 1);
        $posDot = strpos($mail, '.', $posAtSign);
        $ageIsNum = is_numeric($age);

        // echo "<pre>";
        //     var_dump($name, $mail, $age, $dataInserted, $namelen, $posAtSign, $posDot, $ageIsNum, $validData);
        // echo "</pre>";

        // stampo a schermo l'accesso
        if ($dataInserted && $validData) {

            if ($namelen && $posAtSign !== false && $posDot !== false && $ageIsNum) {
                echo '<h4> Accesso riuscito </h4>';
            } else {
                echo '<h4> Accesso negato </h4>';
            }

        } else {
            echo '<h4> Inserisci tutti i dati richiesti </h4>';
        } 
    ?>

    <span>-----------------------------------------------------</span>

    <!-- 
    SNACK 4
    Creare un array con 15 numeri casuali, tenendo conto che l’array non dovrà contenere lo stesso numero più di una volta
    -->
    
    <h1>Snack 4</h1>

    <?php 
        $num_elements = isset($_GET['elements']) ? (!is_numeric($_GET['elements']) ? 15 : $_GET['elements']) : 15;
        $start = isset($_GET['start']) ? (!is_numeric($_GET['start']) ? 0 : $_GET['start']) : 0;
        $end = isset($_GET['end']) ? (!is_numeric($_GET['end']) ? 100 : $_GET['end']) : 100;

        $array_random = [];

        while (count($array_random) < $num_elements) {
            $random_number = rand($start, $end);
            if (in_array($random_number, $array_random) === false) {
                $array_random[] = $random_number;
            }
        }
    ?>

    <form action="" method="get">
		<label for="start">Start</label>
		<input type="text" name="start" id="start">
		<label for="end">End</label>
		<input type="text" name="end" id="end">
		<label for="elements">elements</label>
		<input type="text" name="elements" id="elements">
		<button>Invia</button>
	</form>

	<p><?= var_dump($array_random); ?></p>

    <span>-----------------------------------------------------</span>

    <!--
    SNACK 5
    Prendere un paragrafo abbastanza lungo, contenente diverse frasi. Prendere il paragrafo e suddividerlo in tanti paragrafi. Ogni punto un nuovo paragrafo. 
    -->

    <h1>Snack 5</h1>

    <?php 

        $paragraph = 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consectetur aliquam accusamus ipsum neque ab vero, nisi sint aspernatur incidunt voluptas, repellendus laborum quam sed ea rem fugit doloremque quae omnis!
        Dolorum, consequuntur voluptates, necessitatibus qui, vitae quam eum libero tenetur odio debitis dicta officiis eveniet aspernatur iure itaque facere esse sint! Non delectus numquam quod quos, repellendus temporibus quibusdam officiis.
        Praesentium, et dolores dicta doloremque eaque nemo accusamus! Velit, odio veritatis aliquid nobis ea eos facere a autem animi obcaecati aperiam dolor, voluptate porro officia soluta maiores. Ratione, vel culpa.
        Impedit nihil rem ab mollitia laudantium incidunt porro? Ipsam nisi amet excepturi consequatur a tenetur mollitia molestias rem soluta, sequi, voluptatum voluptates temporibus exercitationem cupiditate qui asperiores, facilis adipisci aspernatur!
        Nisi iure porro doloribus quas nihil fugiat optio itaque eius similique. Qui tempore veniam, vel labore culpa doloribus alias, sit voluptates, ratione maiores odit enim saepe dolor ad pariatur nostrum.
        Quo numquam architecto quasi atque nesciunt fuga soluta, iure, et repellendus cumque, obcaecati rerum odio tenetur libero recusandae hic! Distinctio corporis eius nam vel architecto ratione possimus consequuntur pariatur rem.
        Earum blanditiis nostrum, nulla repellendus quas quo atque exercitationem error, illo quia corporis modi magnam deleniti, ullam hic quod possimus deserunt recusandae quasi quidem officia id corrupti? Accusantium, omnis officiis!
        Omnis natus possimus beatae voluptatem. Saepe odit hic nostrum reiciendis aliquam aliquid molestiae voluptate delectus cupiditate, placeat exercitationem, fugit dolores repudiandae! Cum repellendus eius provident aspernatur sit natus reprehenderit quisquam.
        Eligendi possimus mollitia rerum nihil beatae eaque aliquid excepturi dignissimos asperiores ipsum incidunt error repudiandae et obcaecati non quis sint rem laudantium odit nesciunt, minima tempore nobis tenetur aperiam. Quas.
        Expedita, magni accusamus, voluptatibus omnis cumque reiciendis voluptate autem iste architecto quos impedit nulla sequi quaerat natus nam, libero nihil reprehenderit inventore ea cupiditate. Voluptatibus atque totam fugiat nostrum facilis.';

        $with_paragraphs = str_replace('.', '<p></p>', $paragraph);

    ?>

    <h2 style="color: red;">Paragrafo originale</h2>

    <p>
        <?= $paragraph ?>
    </p>

    <h2 style="color: green;">Paragrafi ottenuti</h2>

    <p>
        <?= $with_paragraphs ?>
    </p>

    <span>-----------------------------------------------------</span>
    
</body>
</html>