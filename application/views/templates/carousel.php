<div ng-controller="CarouselCtrl">
  	<div id="carousel-content">
    	<carousel interval="myInterval">
	      	<slide ng-repeat="slide in slides" active="slide.active">
	        	<img ng-src="{{slide.image}}" style="margin:auto;">
                <a href="{{slide.button}}" class="{{slide.class}}">Comprar</a>
	      	</slide>
    	</carousel>
  	</div>
</div>		
