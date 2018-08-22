(function () {
    'use strict';
    angular.module('ngFader', [])
      .directive('ngFader', function($interval) {

	  function link(scope){

		//Set your interval time. 4000 = 4 seconds
		scope.setTime = 4000;

		//List your images here. 
		scope.images = [{
			src: 'img/home/sliders/slider1.png',
			alt: 'Y lugar cual es'
		}, {
			src: 'img/home/sliders/slider2.png',
			alt: 'Dona online'
		
		
		}];

		/*****************************************************
			STOP! NO FURTHER CODE SHOULD HAVE TO BE EDITED
		******************************************************/

		//Pagination dots - gets number of images
        scope.numberOfImages = scope.images.length;
        scope.dots = function(num) {
          return new Array(num);   
        };

        //Pagination - click on dots and change image
        scope.selectedImage = 0;
        scope.setSelected = function (idx) {
          scope.stopSlider();
          scope.selectedImage = idx;
        };

        //Slideshow controls
        scope.sliderBack = function() {
          scope.stopSlider();
          scope.selectedImage === 0 ? scope.selectedImage = scope.numberOfImages - 1 : scope.selectedImage--;
        };

        scope.sliderForward = function() {
          scope.stopSlider();
          scope.autoSlider();
        };

        scope.autoSlider = function (){
          scope.selectedImage < scope.numberOfImages - 1 ? scope.selectedImage++ : scope.selectedImage = 0;
        };

        scope.stopSlider = function() {
          $interval.cancel(scope.intervalPromise);
          scope.activePause = true;
          scope.activeStart = false;
        };

        scope.toggleStartStop = function() {
          if(scope.activeStart) {
          	scope.stopSlider();
          } else {
          	scope.startSlider();
          }
        };
        
        scope.startSlider = function(){
          scope.intervalPromise = $interval(scope.autoSlider, scope.setTime);
          scope.activeStart = true;
          scope.activePause = false;
        };
        scope.startSlider();

        scope.show = function(idx){
        	if (scope.selectedImage===idx) {
        		return "show";
        	}
        };
        

	}

	  return {
	    restrict: 'E',
	    scope: false,
	    template: '<div class="ng-fader">'+
	    		//images will render here
			'<ul>' + 
				'<li ng-repeat="image in images" ng-click="toggleStartStop()" ng-swipe-right="sliderBack()" ng-swipe-left="sliderForward()"><img data-ng-src="{{image.src}}" data-ng-alt="{{image.alt}}" ng-class="show($index)"/></li>' + 
			'</ul>' + 
			//pagination dots will render here
			'<div class="ng-fader-pagination">' + 
				'<ul>' + 
					'<li ng-repeat="i in dots(numberOfImages) track by $index" ng-class="{current: selectedImage==$index}" ng-click="setSelected($index)"></li>' + 
				'</ul>' + 
			'</div>' + 
			//controls are here
			'<!--<div class="ng-fader-controls">' + 
				'<ul>' + 
					'<li ng-click="sliderBack()">' + 
						'<i class="ngfader-back"></i>' + 
					'</li>' + 
					'<li ng-click="stopSlider()">' + 
						'<i class="ngfader-pause" ng-class="{\'active\': activePause}"></i>' + 
					'</li>' + 
					'<li ng-click="startSlider()">' + 
						'<i class="ngfader-play"  ng-class="{\'active\': activeStart}"></i>' + 
					'</li>' + 
					'<li ng-click="sliderForward()">' + 
						'<i class="ngfader-forward"></i>' + 
					'</li>' + 
				'</ul>' + 
			'</div>-->' +
		'</div>',
		link: link
	  };
      });

}());

/*
SETUP INSTRUCTIONS
Link the ngFader CSS in your header:
link type="text/css" rel="stylesheet" href="css/ngFader.css"
Add the ngFader directive script tag in your header: 
<script src="js/directives/ngFader.js"></script>
Add 'ngFader' as a module dependancy - make sure ngAnimate and ngTouch is listed as a dependancy as well:
angular.module('yourAppModule', ['ngAnimate', 'ngTouch', 'ngFader']);
In the ngFader directive, set your timer and list your image locations in the “scope.images” array: 

//Set your interval time. 4000 = 4 seconds
scope.setTime = 4000;

//List your images here. 
scope.images = [{
		src: 'img/slideshow/slideshow_Image_1_low.jpg',
		alt: 'Add your image description here'
		}, {
		src: 'img/slideshow/slideshow_Image_2_low.jpg',
		alt: 'Add your image description here'
		}, {
		src: 'img/slideshow/slideshow_Image_3_low.jpg',
		alt: 'Add your image description here'
		}, {
		src: 'img/slideshow/slideshow_Image_4_low.jpg',
		alt: 'Add your image description here'
}]
Add <ng-fader></ng-fader> where you want the fader to show.
*/