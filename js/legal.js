document.addEventListener('DOMContentLoaded', function() {
    const lang2 = document.getElementById("lang2");
    lang2.addEventListener('change',event => {
        var currlocation = String(window.location.pathname).split('/');
        let currlocationend = currlocation[currlocation.length - 2];
        console.log(currlocation);
        if(lang2[lang2.selectedIndex].value == 'hi' && !document.URL.includes("in-hi")){
            window.location.href = '/int220/in-hi/' + currlocationend + '/';
        } else if(lang2[lang2.selectedIndex].value == 'en' && document.URL.includes("in-hi")){
            window.location.href = '/int220/' + currlocationend + '/';
        }
    });
});