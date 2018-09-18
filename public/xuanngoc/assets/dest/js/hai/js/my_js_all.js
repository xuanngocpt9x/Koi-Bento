"use strict";
jQuery(document).ready(function ($) {
	/*--------địa chỉ chạy---------*/
	$(function () {
		$('.marquee').marquee({
			duration: 5000,
		});
	});
				
	jQuery(window).scroll(function (){
		var top = jQuery(document).scrollTop();
		var height = 300;
		if (top > height){
			$('#menu-header').addClass('menu_fix');
			$('#menu-header').slideDown('slow');
		}
		else if(top==0){
			$('#menu-header').removeClass('menu_fix');
			$('.title').css("margin-top","0");
			$('#menu-header').css("display","");
		}
	});
	/*--------đăng ký đăng nhập---------*/
		$(".log-in").click(function(){
					$(".signin").addClass("active-dx");
					$(".signup").addClass("inactive-sx");
					$(".signup").removeClass("active-sx");
					$(".signin").removeClass("inactive-dx");
				});

				$(".back").click(function(){
					$(".signup").addClass("active-sx");
					$(".signin").addClass("inactive-dx");
					$(".signin").removeClass("active-dx");
					$(".signup").removeClass("inactive-sx");
				});
				$(".slidedow").click(function(){
					$("#modelall").addClass("model_add");
					$("#modelall").removeClass("model");
				});
				$(".close").click(function(){
					$("#modelall").removeClass("model_add");
					$("#modelall").addClass("model");
					
				});
/*--------tab_menu---------*/
				
/*--------back to top---------*/
			$(window).scroll(function () {
					if($(this).scrollTop()>300){
						$('.dr_angle').fadeIn('slow');
						$('#demo1').removeClass("angle_top");
					}
					else{
						$('.dr_angle').fadeOut('slow');
						$('#demo1').addClass("angle_top");
					}
				});

				$('.scrollup1').click(function () {
					$("html,body").animate({scrollTop: 0}, 1000);
					return false;
				});
/*--------serach---------*/
/*--------serach---------*/
/*--------serach---------*/
/*--------serach---------*/
/*--------serach---------*/
/*--------serach---------*/
/*--------serach---------*/
/*--------serach---------*/
/*--------serach---------*/
/*--------serach---------*/
/*--------serach---------*/
/*--------serach---------*/
/*--------serach---------*/
/*--------serach---------*/
/*--------serach---------*/
/*--------serach---------*/
/*--------serach---------*/
/*--------serach---------*/
/*--------serach---------*/
/*--------serach---------*/
/*--------serach---------*/
/*--------serach---------*/
/*--------serach---------*/
});




















