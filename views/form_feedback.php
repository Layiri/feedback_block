<html>

<head>
    <title>Contact Form Tutorial by Bootstrapious.com</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,500' rel='stylesheet' type='text/css'>
    <link href='custom.css' rel='stylesheet' type='text/css'>
</head>

<body>

<div class="container">

    <div class="row">

        <div class="col-xl-8 offset-xl-2">

            <h1>Contact form Tutorial from
                <a href="http://bootstrapious.com">Bootstrapious.com</a>
            </h1>

            <p class="lead">This is a demo for our tutorial dedicated to crafting working Bootstrap contact form with
                PHP and AJAX background.
                At this part, we will add Google's ReCaptcha too.</p>


            <form id="contact-form" method="post" action="contact.php" role="form">

                <div class="messages"></div>

                <div class="controls">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="form_name">Name *</label>
                                <input id="form_name" type="text" name="name" class="form-control"
                                       placeholder="Please enter your firstname *" required="required"
                                       data-error="Firstname is required.">
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
                                <input id="form_comment" type="text" name="comment" class="form-control"
                                       placeholder="Please enter your comment *" required="required"
                                       data-error="Valid comment is required.">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="form_phone">Rating * TODOOO::</label>
                                <input id="form_phone" type="tel" name="phone" class="form-control"
                                       placeholder="Rating * TODOOO">
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

                    <div class="form-group">
                        <label for="form_comment">Comment *</label>
                        <textarea id="form_comment" name="comment" class="form-control" placeholder="Message for me *"
                                  rows="4" required="required"
                                  data-error="Please, leave us a message."></textarea>
                        <div class="help-block with-errors"></div>
                    </div>


                    <div class="form-group">
                        <div class="g-recaptcha" data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI"
                             data-callback="verifyRecaptchaCallback"
                             data-expired-callback="expiredRecaptchaCallback"></div>
                        <input class="form-control d-none" data-recaptcha="true" required
                               data-error="Please complete the Captcha">
                        <div class="help-block with-errors"></div>
                    </div>


                    <input type="submit" class="btn btn-success btn-send" value="Send message">

                    <p class="text-muted">
                        <strong>*</strong> These fields are required. Contact form template by
                        <a href="https://bootstrapious.com/p/bootstrap-recaptcha" target="_blank">Bootstrapious</a>.
                    </p>

                </div>

            </form>

        </div>
        <!-- /.8 -->

    </div>
    <!-- /.row-->

</div>
<!-- /.container-->

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>
<script src="https://www.google.com/recaptcha/api.js?render=6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI"></script>

<script src="validator.js"></script>
<script src="contact.js"></script>


<script>
    grecaptcha.ready(function() {
        grecaptcha.execute('6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI', {action: 'homepage'}).then(function(token) {
        ...
        });
    });
</script>

</body>

</html>