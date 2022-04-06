document.addEventListener('DOMContentLoaded', function() {
    const lang2 = document.getElementById("lang2");
    lang2.addEventListener('change',event => {
        if(lang2[lang2.selectedIndex].value == 'hi' && document.URL=='http://localhost/int220/shows/'){
            window.location.href = '/int220/in-hi/shows/';
        } else if(lang2[lang2.selectedIndex].value == 'en' && document.URL=='http://localhost/int220/in-hi/shows/'){
            window.location.href = '/int220/shows/';
        }
    });
});