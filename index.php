<?php
require 'function.php';
$connection = dbConnect();

$result = $connection->query('SELECT * FROM `projecten`');


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Back-End</title>
</head>

<body>
    <div class="container">
        <h1>Welkom Bij mijn Projecten</h1>

        <section class="projecten">

            <?php foreach ($result as $row) : ?>
                
                <article class="titels">
                    <h2><?php echo $row['titel']; ?></h2>
                    <figure class="foto"><img src="images/<?php echo $row['foto']; ?>" alt="project 1"></figure>
                    <header>
                    </header>
                    <p><?php echo $row['beschrijving']; ?></p>
                </article>
            <?php endforeach; ?>

             <article class="titels">
                    <h2>Alle Projecten</h2>
                    <figure class="foto" style="background-image: url(images/<?php echo $row['foto']; ?>)"></figure>
                    <header>
                        <h3>Project-1</h3>
                        <em>€ 10.00</em>
                    </header>
                    <p>Project-2</p>
                </article>
                    <article class="titels">
                        <h2>project</h2>
                        <figure class="foto" style="background-image: url(images/)"></figure>
                        <header>
                            <h3>Project-3</h3>
                        </header>
                        <p></p>
                    </article>
 



        </section>
    </div>

</body>

</html>