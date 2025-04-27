$(function() {
    "use strict";

    $(".preloader").fadeOut();
    // this is for close icon when navigation open in mobile view
    $(".nav-toggler").on('click', function() {
        $("#main-wrapper").toggleClass("show-sidebar");
        $(".nav-toggler i").toggleClass("ti-menu");
    });
    $(".search-box a, .search-box .app-search .srh-btn").on('click', function() {
        $(".app-search").toggle(200);
        $(".app-search input").focus();
    });

    // ============================================================== 
    // Resize all elements
    // ============================================================== 
    $("body, .page-wrapper").trigger("resize");
    $(".page-wrapper").delay(20).show();
    
    //****************************
    /* This is for the mini-sidebar if width is less then 1170*/
    //**************************** 
    var setsidebartype = function() {
        var width = (window.innerWidth > 0) ? window.innerWidth : this.screen.width;
        if (width < 1170) {
            $("#main-wrapper").attr("data-sidebartype", "mini-sidebar");
        } else {
            $("#main-wrapper").attr("data-sidebartype", "full");
        }
    };
    $(window).ready(setsidebartype);
    $(window).on("resize", setsidebartype);



});


const portalURL = "http://sd.fgroupindonesia.com/portal";
const homeURL = "http://sd.fgroupindonesia.com/";

$( document ).ready(function() {

    // for portal usage
    const currentURL = window.location.href;

    if (currentURL === portalURL) {

    prepareDataTable('table-visitors');
    prepareDataTable('table-apps');
    prepareDataTable('table-deposits');
    prepareDataTable('table-order-jasa');
    prepareDataTable('table-users');

    } 
    
    animateText();

    toggleByLoginLink();

    specialMaintenanceLink();

});

function specialMaintenanceLink(){


    $('body').on('click', '.maintenance-link', function(e){

        e.preventDefault();

        let menu = $(this).text();
        let pesan = 'Fitur ' + menu + ' ini sedang Maintenance!'
        showInfo(pesan);


    });

}

function prepareDataTable(idCome){

    let el = '#' + idCome;
    let element = $(el);

    if(element.length>0){
        new DataTable(el);
    }

}


function animateText(){

            const $element = $('.animate_typing');
            const text = $element.text(); // Get the existing text inside the <p>
            const speed = 100; // Speed in milliseconds for each character

            $element.text(''); // Clear the text initially
            let index = 0;

            // Function to type one character at a time
            function typeEffect() {
                if (index < text.length) {
                    $element.append(text[index]); // Add the next character
                    index++;
                    setTimeout(typeEffect, speed); // Call the function again
                }
            }

            // Start the typing effect
            typeEffect();

}

function toggleByLoginLink(){


$(".dropdown > a").click(function (event) {
    event.preventDefault(); // Prevent default link behavior
    $(this).next("ul").slideToggle(200); // Toggle dropdown with animation

    let mobile_check = $('body').hasClass('mobile-nav-active');

    if(!mobile_check){
        $('body').addClass('mobile-nav-active');
    }
    
  });

$(".dropdown ul").click(function (event) {
    event.stopPropagation();


  });



}


 function showSuccess(msg) {
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: msg,
            });
        }

 function showInfo(msg) {
            Swal.fire({
                icon: 'info',
                title: 'Information',
                text: msg,
            });
        }

function showError(msg) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: msg,
            });
        }