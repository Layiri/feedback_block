
document.addEventListener('DOMContentLoaded', function () {
    let starsDiv = document.querySelectorAll('.stars');
    for( i=0; i< starsDiv.length; i++ )
    {
        setRating(starsDiv[i]);
    }
}, false);

function setRating(starsDiv) {
    let stars = starsDiv.querySelectorAll('.star');
    let rating = parseInt(starsDiv.getAttribute('data-rating'));
    [].forEach.call(stars, function (star, index) {
        if (rating > index) {
            star.classList.add('rated');
        } else {
            star.classList.remove('rated');
        }
    });
}

