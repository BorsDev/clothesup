//navbar menu
const toggleButton = document.getElementById("button");
const naviList = document.getElementById("naviList");

toggleButton.addEventListener("click",function(){
    naviList.classList.toggle("active");
});

//owl carousel banner
$(document).ready(function(){
    $("#banner-area .owl-carousel").owlCarousel({
        items:1,
        dots : false,
        rewind : true,
        autoplay: true,
        autoplayTimeout:3000
    });
});

//set date
const date = document.getElementById("date");
date.innerHTML = new Date().getFullYear();


//popover
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
  });
  
//product card
$(document).ready(function(){
    $("#product-card .owl-carousel").owlCarousel({
        margin:10,
        loop:true,
        nav: false,
        responsive:{
            720:{
                items:4
            },
            1000:{
                items:6
            },
            1200:{
                items:8
            }
        }
    });
});

//img upload preview
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#imageResult')
                .attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

$(function () {
    $('#upload').on('change', function () {
        readURL(input);
    });
});

