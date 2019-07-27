"use strict";
//open mobile menu
$(document).ready(function(){
    var showMenu = false;
    $('.burger').click(function(){
        showMenu = !showMenu;
        if(showMenu){
            $('.header_mobile').css({
                'display':'flex',
            });
            $('.burger span:nth-child(2)').css({
                'display':'none'
            });
            $('.burger span:nth-child(1)').css({
                'transform':'rotate(45deg)',
                'position':'absolute',
                'top':'50%',
                'transition':'0.2s'
            });
            $('.burger span:nth-child(3)').css({
                'transform':'rotate(-45deg)',
                'position':'absolute',
                'top':'50%',
                'transition':'0.2s'
            });
        }else{
            $('.header_mobile').css({
                'display':'none',
            });
            $('.burger span:nth-child(2)').css({
                'display':'block'
            });
            $('.burger span:nth-child(1)').css({
                'transform':'none',
                'position':'static',
                'transition':'0.2s'

            });
            $('.burger span:nth-child(3)').css({
                'transform':'none',
                'position':'static',
                'transition':'0.2s'
            });
        }
    });
});
//active link
$(function () {
    $(".main_list li a").each(function () {
        window.location.href == this.href && $(this).addClass("active");
    })
});
//open modal window
/*$(document).ready(function(){
    $('.btn').click(function () {
        $('.modal').css({'display':'flex'});
    })
});*/
//close modal window
/*
$(document).ready(function(){
  $('.modal .close').click(function () {
        $('.modal').css({'display':'none'});
  })
});*/
