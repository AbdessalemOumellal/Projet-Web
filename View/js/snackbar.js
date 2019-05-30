function showSnackbar(text,type){
    var snackbar = $("#snackbar");
    snackbar.removeClass("show-snackbar");
    snackbar.removeClass("default");
    snackbar.removeClass("true");
    snackbar.removeClass("false");
    snackbar.empty();
    snackbar.text(text);
    snackbar.addClass("show-snackbar");
    if (type){
        snackbar.addClass(type);
    }else {
        snackbar.addClass('default')
    }
    setTimeout(function(){
        snackbar.removeClass("show-snackbar");
        snackbar.empty();
    },3000);
}
