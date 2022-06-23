<?php
require 'function.php';
$connection = dbConnect();

$result = $connection->query('SELECT * FROM `design`');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>back-end</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Mukta:wght@300;500&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Welkom Bij mijn Projecten</h1>

        <section class="projecten">

            <?php foreach($result as $row): ?>
            <article class="titels">
                <h2><?php echo $row['titel']; ?></h2>
                <figure class="foto"><img src="images/<?php echo $row['foto']; ?>" alt="project 1" width="300px" height="300px"></figure>
                <header>
                </header>
                <p class="besch"><?php echo $row['beschrijving']; ?></p>
                <a class="button" href="detail.php?id=<?php echo $row['id'];?>">Meer Info</a>
            </article>

            <?php endforeach; ?>
        </section>
    </div> 

    <footer class="footer">

    <div>
        <h2 class="h2r">Made By Halil</h2>
    </div>
    </footer>
</body>
</html>