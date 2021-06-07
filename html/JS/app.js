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

//product card
$(document).ready(function(){
    $("#product-card .owl-carousel").owlCarousel({
        margin:10,
        loop:true,
        responsive:{
            0:{
                items:1
            },
            480:{
                items:2
            },
            720:{
                items:3
            },
            1000:{
                items:4
            },
            1200:{
                items:5
            }
        }
    });
});