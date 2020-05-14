<?php

include_once '../function/connect_database.php';

$reviews = $conn->query('SELECT * FROM `otzivi` WHERE `product_id`=1')->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Small Business - Start Bootstrap Template</title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/small-business.css" rel="stylesheet">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">Start Bootstrap</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


<div class="container">

    <div class="reviews">

        <div class="reviews_title">
            <div>
                <h1>
                    <span> Все отзывы </span>
                    <span> Минеральная вата Knauf Insulation EKOROLL
                    TR 044 50 мм 16,8 кв.м</span>
                </h1>
            </div>
            <div>
                <button><span> написать отзыв </span></button>
            </div>
        </div>

        <!-- foreach from database -->
        <?php foreach ($reviews as $review) : ?>

            <div class="review">
                <div class="review_full_name">
                    <?= $review['full_name']; ?>
                </div>

                <div class="review_created_at">
                    <?= $review['created_ats']; ?>
                    25.01.2020
                </div>

                <div class="review_rating">
                    <?= $review['ratings']; ?>
                    rating
                </div>

                <div class="review_comments">
                    <?= $review['comments']; ?>
                    Мякий ы без запаху
                </div>

                <div class="review_advantages">
                    <?= $review['advantages']; ?>
                    качество
                </div>

                <div class="review_disadvantages">
                    <?= $review['disadvantagess']; ?>
                    нет
                </div>


            </div>

        <?php endforeach; ?>

    </div>

</div>


<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</body>

</html>
