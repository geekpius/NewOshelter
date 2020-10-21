/**
 * Theme: Metrica - Responsive Bootstrap 4 Admin Dashboard
 * Author: Mannatthemes
 * Module/App: Main Js
 */


(function ($) {

    'use strict';

    function initSlimscroll() {
        $('.slimscroll').slimscroll({
            height: 'auto',
            position: 'right',
            size: "7px",
            color: '#e0e5f1',
            opacity: 1,
            wheelStep: 5,
            touchScrollStep: 50
        });
    }

   
    function initMetisMenu() {
        //metis menu
        $("#main_menu_side_nav").metisMenu();
    }

    function initLeftMenuCollapse() {
        // Left menu collapse
        $('.button-menu-mobile').on('click', function (event) {
            event.preventDefault();
            $("body").toggleClass("enlarge-menu");
            initSlimscroll();
        });
    }

    function initEnlarge() {
        if ($(window).width() < 1025) {
            $('body').addClass('enlarge-menu');
        } else {
            if ($('body').data('keep-enlarged') != true)
                $('body').removeClass('enlarge-menu');
        }
    }

   

    function initSerach() {
        $('.search-btn').on('click', function () {
            var targetId = $(this).data('target');
            var $searchBar;
            if (targetId) {
                $searchBar = $(targetId);
                $searchBar.toggleClass('open');
            }
        });
    }


    function initMainIconMenu() {
        $('.main-icon-menu .leftmenu-sm-item').on('click', function(e){
            e.preventDefault();
            $(this).addClass('active');
            $(this).siblings().removeClass('active');
            $('.main-menu-inner').addClass('active');
            var targ = $(this).attr('href');
            $(targ).addClass('active');
            $(targ).siblings().removeClass('active');
        });
    }

    function initTooltipPlugin(){
        $.fn.tooltip && $('[data-toggle="tooltip"]').tooltip()
        $('[data-toggle="tooltip-custom"]').tooltip({
            template: '<div class="tooltip tooltip-custom" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>'
        });
    }
    

    function initActiveMenu() {
        // === following js will activate the menu in left side bar based on url ====
        $(".left-sidenav a").each(function () {
            var pageUrl = window.location.href.split(/[?#]/)[0];
            if (this.href == pageUrl) {
                $(this).addClass("active");
                $(this).parent().parent().addClass("in");
                $(this).parent().parent().addClass("mm-show");
                $(this).parent().parent().prev().addClass("active");
                $(this).parent().parent().parent().addClass("active");
                $(this).parent().parent().parent().addClass("mm-active");
                $(this).parent().parent().parent().parent().addClass("in");  
                $(this).parent().parent().parent().parent().parent().addClass("active");  
                $(this).parent().parent().parent().parent().parent().parent().addClass("active");              
                var menu =  $(this).closest('.main-icon-menu-pane').attr('id');
                $("a[href='#"+menu+"']").addClass('active');
                
            }
        });
    }

    

    function init() {
        initSlimscroll();
        initMetisMenu();
        initLeftMenuCollapse();
        initEnlarge();
        initSerach();
        initMainIconMenu();
        initTooltipPlugin();
        initActiveMenu();
        Waves.init();
    }

    init();

})(jQuery)



function validatePassword(password) {
                
    // Do not show anything when the length of password is zero.
    if (password.length === 0) {
        document.getElementById("msg").innerHTML = "";
        return;
    }
    // Create an array and push all possible values that you want in password
    var matchedCase = new Array();
    matchedCase.push("[$@$!%*#?&]"); // Special Charector
    matchedCase.push("[A-Z]");      // Uppercase Alpabates
    matchedCase.push("[0-9]");      // Numbers
    matchedCase.push("[a-z]");     // Lowercase Alphabates

    // Check the conditions
    var ctr = 0;
    for (var i = 0; i < matchedCase.length; i++) {
        if (new RegExp(matchedCase[i]).test(password)) {
            ctr++;
        }
    }
    // Display it
    var color = "";
    var strength = "";
    switch (ctr) {
        case 0:
        case 1:
        case 2:
            strength = "Very Weak";
            color = "red";
            break;
        case 3:
            strength = "Medium";
            color = "orange";
            break;
        case 4:
            strength = "Strong";
            color = "green";
            break;
    }
    document.getElementById("msg").innerHTML = strength;
    document.getElementById("msg").style.color = color;
}