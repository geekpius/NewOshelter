function openAccountGroupOnMobile(){
    $(".account-mobile-init-view").hide();
    $(".account-options").show();
    $("#backContainer").show();
}

function goBack(){
    $(".account-mobile-init-view").show();
    $(".account-options").hide();
    $("#backContainer").hide();
}

let windowWidth = $(window).width();
if(windowWidth <= 991){
    $("#account").on("click", function() {
        openAccountGroupOnMobile();
    });
    
    $("#goBack").on("click", function(e) {
        e.preventDefault();
        goBack();
        originalUrl = $("#account").data("url");
        window.history.replaceState(null, document.title, originalUrl);
        return false;
    });    
}


$(document).ready(function(){
    let windowWidth = $(window).width();
        if(windowWidth <= 991){
        let hashUrl = window.location.hash;
        if(hashUrl && hashUrl.toString() == "#show=true"){
            openAccountGroupOnMobile();
        }
    }
});