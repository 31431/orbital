'use strict';



$(document).ready(function(){
	console.log("I'm ready!");
	var width= 100;
	var animationSpeed=500;
	var pausePeriod= 3000;
	var currentSlide=1;
	var $slideContainer = $('.main').find('.slider');
	var $slides = $('.slider').find('.slide');
	var $sliderController = $('.slider').find('.sliderController');
	var $sliderSymbols = $sliderController.find('.p'); 
	var $dotContainer = $('.navdot ul').find('li');
	var interval;
	var sliding = function() {
		interval = setInterval(function(){
			console.log("I'm changing now!");
			$slideContainer.animate({'margin-left':'-='+width+'%'},animationSpeed,function(){
				$dotContainer.removeClass("active");
				console.log(currentSlide);
				currentSlide++;
				if(currentSlide==$slides.length){
					currentSlide=1;
					$slideContainer.css('margin-left',0);
					$('#dot1').addClass("active");
				} else {
					$('#dot'+currentSlide).addClass("active");
				}
			});
				
		},pausePeriod);
	};

	sliding();
	//when mouse enters, sliding stops. When mouse leaves, sliding continues.
	$('.slider').mouseenter(function(){
		console.log("enter!");
		$sliderController.css('opacity','0.2');
		clearInterval(interval);
	});
	$('.slider').mouseleave(function(){
		console.log("leave!");
		$sliderController.css('opacity','0');
		sliding();
	})
	//Functions for the left/right arrow to change the slide;
	$('#slideBack').click(function(){
		currentSlide--;
		if(currentSlide==0){
			$slideContainer.css('margin-left','-200%');
			currentSlide=2;
		}
		$slideContainer.animate({'margin-left':'+='+width+'%'},animationSpeed);
		$dotContainer.removeClass("active");
		$("#dot"+currentSlide).addClass("active");
	});

	$('#slideNext').click(function(){
		currentSlide++;
		$slideContainer.animate({'margin-left':'-='+width+'%'},animationSpeed,function(){
			$dotContainer.removeClass("active");
			if(currentSlide==$slides.length){
				currentSlide=1;
				$slideContainer.css('margin-left',0);
				$('#dot1').addClass("active");
			} else {
				$('#dot'+currentSlide).addClass("active");
			}
		});
	});

	$dotContainer.click(function(){
		$dotContainer.removeClass("active");
		$(this).addClass("active");
		currentSlide= $dotContainer.index(this);
		console.log(currentSlide);
		$slideContainer.animate({'margin-left': (-((currentSlide+1)*100)+100)+'%'},animationSpeed);
		if(currentSlide==0){
			currentSlide=1;
		} else {
			currentSlide=2;
		}
	})

	//For modal
	var btn = document.getElementById('login');
	var modal=document.getElementsByClassName('modal');
	var close=document.getElementsByClassName('close');

	$('#login').click(function(){
		console.log('in');
		$('.modal').css('display','block');
	});
	
	$('.close').click(function(){
		$('.modal').css('display','none');
	})

});