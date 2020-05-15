<?php
include_once 'helpers/helpers_index.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>FeedBack - Минеральная вата</title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="web/css/product.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,500' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="../index.php">FeedBack</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>


<div class="container mx-auto ">
    <div class="reviews">
        <div class="reviews_title row">
            <div class="col-sm-8">
                <h2>
                    <span> Все отзывы </span>
                    <span> Минеральная вата Knauf Insulation EKOROLL
                    TR 044 50 мм 16,8 кв.м</span>
                </h2>
            </div>
        </div>
        <div class="row reviews_title_action">
            <div class="col-sm-2">
                <span>Сортировать:</span>
            </div>
            <div class="col-sm-1">
                <a href="<?= $_SERVER['PHP_SELF'] ?>?<?= $qdate ?>"><span>Дата</span></a>
            </div>
            <div class="col-sm-1">
                <a href="<?php $_SERVER['PHP_SELF'] ?>?<?= $qrating ?>"><span>Рейтинг</span></a>
            </div>
            <div class="col-sm-8 review_button_align">
                <a href="views/form_feedback.php?product_id=1" class="review_button"><span>НАПИСАТЬ ОТЗЫВ</span></a>
            </div>

        </div>
        <hr>

        <?php foreach ($reviews as $review) : ?>

            <div class="review">
                <div class="review_full_name" data-id="<?= $review['id'] ?>">
                    <span><?= $review['full_name'] ?></span>
                </div>
                <div class="review_created_at" data-id="<?= $review['id'] ?>">
                    <span><?= date('d/m/Y', $review['created_at']) ?></span>
                </div>
                <div class="review_rating">
                    <div class="stars" data-id="<?= $review['id'] ?>" data-rating="<?= $review['ratings'] ?>">
                        <span class="star">&nbsp;</span>
                        <span class="star">&nbsp;</span>
                        <span class="star">&nbsp;</span>
                        <span class="star">&nbsp;</span>
                        <span class="star">&nbsp;</span>
                    </div>
                </div>
                <div class="review_comments" data-id="<?= $review['id'] ?>">
                    <span><?= $review['comment'] ?></span>
                </div>
                <div class="review_advantages" data-id="<?= $review['id'] ?>">
                    <div class="review_advantages_title">
                        <i class="material-icons add">add</i><span>Преимущества:</span><br>
                    </div>
                    <div class="review_advantages_body">
                        <span><?= $review['advantages'] ?></span>
                    </div>
                </div>

                <div class="review_disadvantages" data-id="<?= $review['id'] ?>">
                    <div class="review_disadvantages_title">
                        <i class="material-icons maximize">maximize</i> <span>Недостатки:</span><br>
                    </div>
                    <div class="review_disadvantages_body">
                        <span><?= $review['disadvantages'] ?></span>
                    </div>
                </div>
                <a class="response_button" href="#"><span> ОТВЕТИТЬ </span></a>


            </div>
            <hr>

        <?php endforeach; ?>

        <nav aria-label="Page navigation example">

            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="?pageno=1">First</a></li>
                <li class="page-item <?= ($pageno <= 1) ? 'disabled' : '' ?>">
                    <a class="page-link" href="<?= ($pageno <= 1) ? '#' : "?pageno=" . ($pageno - 1) ?>">Prev</a>
                </li>
                <li class="page-item <?= ($pageno >= $total_pages) ? 'disabled' : '' ?>">
                    <a class="page-link"
                       href="<?= ($pageno >= $total_pages) ? '#' : "?pageno=" . ($pageno + 1) ?>">Next</a>
                </li>
                <li class="page-item"><a class="page-link" href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
            </ul>
        </nav>
    </div>
</div>

<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Layiri 2020</p>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="/web/js/product.js"></script>

</body>
</html>
