

<html lang="en">

<head>
    <meta charset="UTF-8">
    <title> Отзыв: Минеральная вата Knauf Insulation EKOROLL TR 044 50 мм 16,8 кв.м
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,500' rel='stylesheet' type='text/css'>
    <link href='../web/css/feedback.css' rel='stylesheet' type='text/css'>
</head>

<body>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="../index.php">Feedback</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="../index.php">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>


<div class="container">
    <div class="row">
        <div class="col-xl-8 offset-xl-2">
            <h2>
                Отзыв: Минеральная вата Knauf Insulation EKOROLL TR 044 50 мм 16,8 кв.м
            </h2>

            <form id="feedback-form" class="needs-validation" method="post"
                  onsubmit="return validateForm();"
                  action="../controller/controller_feedback.php" role="form" enctype="multipart/form-data">
                <div class="messages"></div>
                <div class="controls">
                    <div class="row">
                        <input id="form_product" type="hidden" name="product" required="required" value="1" ">

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="form_name">Name *</label>
                                <input id="form_name" type="text" name="name" class="form-control"
                                       placeholder="Please enter your firstname *" required="required"
                                       data-error="Full name is required.">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="form_email">Email *</label>
                                <input id="form_email" type="email" name="email" class="form-control"
                                       placeholder="Please enter your email *" required="required"
                                       data-error="Valid email is required.">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="form_comment">Comment *</label>
                                <textarea id="form_comment" name="comment" class="form-control"
                                          placeholder="Comment is required"
                                          rows="4" required="required"
                                          data-error="Please, leave us a message."></textarea>
                                <div class="help-block with-errors"></div>

                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">

                                <label for="form_rating">Rating *:</label>
                                <div class="stars" data-rating="">
                                    <span class="star">&nbsp;</span>
                                    <span class="star">&nbsp;</span>
                                    <span class="star">&nbsp;</span>
                                    <span class="star">&nbsp;</span>
                                    <span class="star">&nbsp;</span>
                                </div>


                                <input id="form_rating" type="hidden" name="rating" class="form-control">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="form_advantage">Advantages</label>
                                <input id="form_advantage" type="text" name="advantage" class="form-control"
                                       placeholder="Please enter your advantage">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="form_disadvantages">Disadvantages</label>
                                <input id="form_disadvantages" type="text" name="disadvantage" class="form-control"
                                       placeholder="Please enter your disadvantages">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="form_file_to_upload">Images</label>
                                <input id="form_file_to_upload" type="file"
                                       accept="image/png, image/jpeg, image/gif, text/plain"
                                       name="file_to_upload" class="form-control"
                                       placeholder="Please enter your advantage"/>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="g-recaptcha" data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI"
                                 data-callback="verifyRecaptchaCallback"
                                 data-expired-callback="expiredRecaptchaCallback"></div>
                            <input id="recaptch" class="form-control d-none" data-recaptcha="true" required="required"
                                   data-error="Please complete the Captcha">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>


                    <input type="submit" class="btn btn-success btn-send" onch value="Save feedback">
                    <p class="text-muted">
                        <strong>*</strong> These fields are required.
                    </p>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Layiri 2019</p>
    </div>
    <!-- /.container -->
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://www.google.com/recaptcha/api.js?render=6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI"></script>
<script src="../web/js/validator.js"></script>
<script src="../web/js/feedback.js"></script>

</body>

</html>
