<div ng-controller="CarouselCtrl">
  	<div id="carousel-content">
    	<carousel interval="myInterval">
	      	<slide ng-repeat="slide in slides" active="slide.active">
	        	<img ng-src="{{slide.image}}" style="margin:auto;">
                <a ng-if="!slide.hasFunction" href="{{slide.button}}" class="{{slide.class}}">{{slide.text}}</a>
                <a ng-if="slide.hasFunction" ng-click="openPromoModal()" class="{{slide.class}}">{{slide.text}}</a>
	      	</slide>
    	</carousel>
  	</div>
</div>
