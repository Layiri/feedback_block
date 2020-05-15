
document.addEventListener('DOMContentLoaded', function () {

    let eventChange = document.createEvent("Event");
    eventChange.initEvent("change", false, true);

    window.verifyRecaptchaCallback = function (response) {
        let inputReCaptcha = document.querySelector('input[data-recaptcha]');
        inputReCaptcha.value = response;
        inputReCaptcha.dispatchEvent(eventChange);
    };

    window.expiredRecaptchaCallback = function () {
        let inputReCaptcha = document.querySelector('input[data-recaptcha]');
        inputReCaptcha.value = '';
        inputReCaptcha.dispatchEvent(eventChange);
    };

    addListeners();
    setRating(); //based on value inside the div

}, false);

function validateForm() {
    let rating = document.forms["feedback-form"]["rating"].value;
    if (rating == "") {
        alert("rating  must be filled out");
        return false;
    }else{
        return true;
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





























































// $(helpers () {
//
//     window.verifyRecaptchaCallback = helpers (response) {
//         $('input[data-recaptcha]').val(response).trigger('change');
//     }
//
//     window.expiredRecaptchaCallback = helpers () {
//         $('input[data-recaptcha]').val("").trigger('change');
//     }
//
//     $('#contact-form').validator();
//
//     $('#contact-form').on('submit', helpers (e) {
//         if (!e.isDefaultPrevented()) {
//             var url = "contact.php";
//
//             $.ajax({
//                 type: "POST",
//                 url: url,
//                 data: $(this).serialize(),
//                 success: helpers (data) {
//                     var messageAlert = 'alert-' + data.type;
//                     var messageText = data.message;
//
//                     var alertBox = '<div class="alert ' + messageAlert + ' alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' + messageText + '</div>';
//                     if (messageAlert && messageText) {
//                         $('#contact-form').find('.messages').html(alertBox);
//                         $('#contact-form')[0].reset();
//                         grecaptcha.reset();
//                     }
//                 }
//             });
//             return false;
//         }
//     })
// });