var modal = document.getElementById("myModal");
var span = modal.querySelector(".close-2");
var acceptModalBtn = modal.querySelector("#acceptModalBtn");

var modal2 = document.getElementById("myotromodal");
var span2 = modal2.querySelector(".close2-2");
var acceptModalBtn2 = modal2.querySelector("#acceptModalBtn2");

window.onload = function() {
    const urlParams = new URLSearchParams(window.location.search);
    const success = urlParams.get('success');

    if (success === 'true') {
        showModal(modal);
    } else if (success === 'false') {
        showModal(modal2);
    }
};

function showModal(modal) {
    modal.style.display = "block";

    if (modal === modal2) {
        span2.onclick = function() {
            modal.style.display = "none";
            removeSuccessParam();
        }

        acceptModalBtn2.onclick = function() {
            modal.style.display = "none";
            removeSuccessParam();
        }
    } else {
        span.onclick = function() {
            modal.style.display = "none";
            removeSuccessParam();
        }

        acceptModalBtn.onclick = function() {
            modal.style.display = "none";
            removeSuccessParam();
        }
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
            removeSuccessParam();
        }
    }
}

function removeSuccessParam() {
    var url = new URL(window.location.href);
    url.searchParams.delete('success');
    window.history.pushState({}, '', url.toString());
    window.location.reload();
}