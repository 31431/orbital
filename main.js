'use strict';



$(document).ready(function(){
	console.log("I'm ready!");
	var width= 100;
	var animationSpeed=500;
	var pausePeriod= 5000;
	var currentSlide=1;
	var $slideContainer = $('.main').find('.slider');
	var $slides = $('.slider').find('.slide');
	var interval;
	var sliding = function() {
		interval = setInterval(
		function(){
			console.log("I'm changing now!");
			$slideContainer.animate({'margin-left':'-='+width+'%'},animationSpeed,function(){
	currentSlide++;
	console.log(currentSlide);
	console.log($slides.length);
	if(currentSlide === $slides.length+1){
		$slideContainer.css('margin-left',0);
		currentSlide=1;
	}

});
}, pausePeriod);};

	sliding();


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