<html lang="en">

<head>
    <title>Feedback</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,500' rel='stylesheet' type='text/css'>
    <link href='../css/feedback.css' rel='stylesheet' type='text/css'>
</head>

<body>


<div class="container">
    <div class="row">
        <div class="col-xl-8 offset-xl-2">
            <h1>
                Feedback Form
            </h1>

            <form id="feedback-form" class="needs-validation" method="post"
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


                    <input type="submit" class="btn btn-success btn-send" value="Save feedback">
                    <p class="text-muted">
                        <strong>*</strong> These fields are required.
                    </p>

                </div>

            </form>

        </div>
        <!-- /.8 -->

    </div>
    <!-- /.row-->

</div>
<!-- /.container-->

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://www.google.com/recaptcha/api.js?render=6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI"></script>
<script src="../js/validator.js"></script>


<script>
    document.addEventListener('DOMContentLoaded', function () {

        let eventChange = document.createEvent("Event");
        eventChange.initEvent("change", false, true);

        window.verifyRecaptchaCallback = function (response) {
            let inputReCaptcha = document.querySelector('input[data-recaptcha]');
            inputReCaptcha.value = response;
            inputReCaptcha.dispatchEvent(eventChange);
            // document.getElementById("recaptch").getAttribute("data-recaptcha").value = ;.dispatchEvent(eventChange);

            console.log(inputReCaptcha);
            alert('de');
        };

        window.expiredRecaptchaCallback = function () {
            let inputReCaptcha = document.querySelector('input[data-recaptcha]');
            inputReCaptcha.value = '';
            inputReCaptcha.dispatchEvent(eventChange);
            console.log(inputReCaptcha);

            alert('ferr');
        };

        addListeners();
        setRating(); //based on value inside the div

        // document.querySelector("#feedback-form").validator();
        // document.getElementById ('feedback-form').validator();
        //
        // $('#feedback-form').validator();
        // let form = document.querySelector('form');
        //
        // let data = new FormData(form);
        // let req = new XMLHttpRequest();
        // req.open("POST", '/controller/controller_feedback.php', true);
        // req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        // req.send(data);
        // req.onreadystatechange = function() {
        //     if (this.readyState == 4 && this.status == 200) {
        //         document.getElementById("demo").innerHTML =
        //             this.responseText;
        //     }
        // };

    }, false);

    function validateForm() {
        let rating = document.forms["feedback-form"]["rating"].value;
        let recaptch = document.forms["feedback-form"]["recaptch"].value;
        if (rating == "" || recaptch == "") {
            alert("rating must be filled out");
            return false;
        }
    }

    function addListeners() {
        var stars = document.querySelectorAll('.star');
        [].forEach.call(stars, function (star, index) {
            star.addEventListener('click', (function (idx) {
                document.querySelector('.stars').setAttribute('data-rating', idx + 1);
                document.getElementById('form_rating').value = idx + 1;
                setRating();
            }).bind(window, index));
        });
    }

    function setRating() {
        var stars = document.querySelectorAll('.star');
        var rating = parseInt(document.querySelector('.stars').getAttribute('data-rating'));
        [].forEach.call(stars, function (star, index) {
            if (rating > index) {
                star.classList.add('rated');
            } else {
                star.classList.remove('rated');
            }
        });
    }
</script>

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function () {
        'use strict';
        window.addEventListener('load', function () {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function (form) {
                form.addEventListener('submit', function (event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>


<script>
    var control = document.getElementById("form_file_to_upload");
    control.addEventListener("change", function (event) {
        // When the control has changed, there are new files
        var file = control.files;
        for (var i = 0; i < file.length; i++) {
            console.log("Filename: " + file[i].name);
            console.log("Type: " + file[i].type);
            console.log("Size: " + file[i].size + " bytes");
            if (file[i].type === "image/jpeg" || file[i].type === "image/gif" || file[i].type === "image/png" || file[i].type === "text/plain") {
                if (file[i].type === "text/plain") {
                    if (file[i].size > "100000") {
                        alert("Please select file where size under 100kb");
                        document.getElementById("form_file_to_upload").value = "";
                    }
                }
            } else {
                alert("Please select the authorize type file or image");
                document.getElementById("form_file_to_upload").value = "";
            }
        }
    }, false);

</script>


</body>

</html>
