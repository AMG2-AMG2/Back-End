<?php
require 'function.php';
$connection = dbConnect();

$voornaam = '';
$achternaam = '';
$email = '';
$bericht = '';

$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $voornaam =  $_POST['voornaam'];
    $achternaam =  $_POST['achternaam'];
    $email =  $_POST['email'];
    $bericht =  $_POST['bericht'];
    $tijdstip =  date('Y-m-d H:i:s');



    if (empty($voornaam)) {
        $errors['voornaam'] = 'Vul uw naam in a.u.b';
    }
    
    if (empty($achternaam)) {
        $errors['achternaam'] = 'Vul uw achternaam in a.u.b';
    }
    
    if (empty($email)) {
        $errors['email'] = 'Dit is geen geldig e-mail adres!';
    }
    
    if (empty($bericht)) {
        $errors['bericht'] = 'Vul miniaal 5 tekens in.';
    }

    if (count($errors) == 0) {
        $sql = "INSERT INTO `bericht` (`voornaam`, `achternaam`, `email`, `bericht`, `tijdstip`)
                VALUES (:voornaam, :achernaam, :bericht, :tijdstip);"; 

        $statement = $connection->prepare($sql);
        $params = [
            'voornaam' => $voornaam,
            'achternaam' => $achternaam,
            'email' => $email,
            'bericht' => $bericht,
            'tijdstip' => $tijdstip,
        ];
        $statement->execute($params);
        header('Location: bedankt.html');
        exit;
    }

}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1 class="contact_h1">neem contact op!</h1>

        <section class="contact_head">

            <header class="contact_header">
                <h2> have a question?</h2>
            </header>

            <form action="contact.php" method="POST" novalidate>
                <div class="contact_form1">
                    <label for="voornaam">voornaam</label>
                    <input type="text" value="<?php echo $voornaam; ?>" id="voornaam" name="voornaam" placeholder="Vul uw voornaam in" required>

                    <?php if (!empty($errors['voornaam'])) : ?>
                        <p class="form_error"><?php echo $errors['voornaam'] ?></p>
                    <?php endif; ?>

                </div>
                <div class="contact_form2">
                    <label for="achternaam">Achternaam</label>
                    <input type="text" value="<?php echo $achternaam; ?>" id="achternaam" name="achternaam" placeholder="Vul uw achternaam in" required>
                    <?php if (!empty($errors['achternaam'])) : ?>
                        <p class="form_error"><?php echo $errors['achternaam'] ?></p>
                    <?php endif; ?>
                </div>
                <div class="contact_form3">
                    <label for="email">E-mail</label>
                    <input type="email" value="<?php echo $email; ?>" id="email" name="email" placeholder="Vul uw e-mailadres in" required>
                    <?php if (!empty($errors['email'])) : ?>
                        <p class="form_error"><?php echo $errors['email'] ?></p>
                    <?php endif; ?>
                </div>
                <div class="contact_form4">
                    <label for="bericht">Bericht</label>
                    <textarea id="bericht" name="bericht" placeholder="Vul uw vraag of bericht in" required><?php echo $bericht; ?></textarea>
                    <?php if (!empty($errors['bericht'])) : ?>
                        <p class="form_error"><?php echo $errors['bericht'] ?></p>
                    <?php endif; ?>
                    <button type="submit" class="contact_button">Opsturen</button>
                </div>


            </form>

        </section>
    </div>

</body>

</html>