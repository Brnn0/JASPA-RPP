//Espera a pagina ser carregada
window.addEventListener("load", (event) => {

    //aplicando mascaras em varios elementos
    elements = document.querySelectorAll('.date');
    maskOptions = { mask: '00/00/0000' };
    for (var i = 0; i < elements.length; i++) {
        IMask(elements[i], maskOptions);
    }
});