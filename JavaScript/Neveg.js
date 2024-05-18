function updatePage() {
    let currentUrl = document.URL;
    let urlParams = new URLSearchParams(currentUrl.split('?')[1]);
    let companyParam = urlParams.get('Company');

    let newUrl = "Actualizar.php?Company=" + companyParam;

    window.location.href = newUrl;
}

function DeletePage() {
    let currentUrl = document.URL;
    let urlParams = new URLSearchParams(currentUrl.split('?')[1]);
    let companyParam = urlParams.get('Company');

    let newUrl = "Eliminar.php?Company=" + companyParam;

    window.location.href = newUrl;
}

function HomePage() {
    let currentUrl = document.URL;
    let urlParams = new URLSearchParams(currentUrl.split('?')[1]);
    let companyParam = urlParams.get('Company');

    let newUrl = "Company.php?Company=" + companyParam;

    window.location.href = newUrl;
}

function actualizarPagina() {
    location.reload();
}