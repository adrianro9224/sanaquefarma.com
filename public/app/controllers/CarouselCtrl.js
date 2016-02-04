/**
 * Created by Adrian on 12/11/2014.
 */

var farmapp = angular.module('farmapp', ['ui.bootstrap', 'ngCookies']);

    //Create the farmapp module

farmapp.controller('CarouselCtrl', ['$scope', '$rootScope', function( $scope, $rootScope ) {
    $scope.myInterval = 7500;
    var slides = $scope.slides = [];
    $scope.addSlide = function(i) {
        var format = '.png';
           /* if( i == 0 )
                format = '.png';*/
        slides.push({
            image: 'http://sanaquefarma.com/assets/images/slides/' + i + format,
            button: ['', 'http://sanaquefarma.com/l/dynoral','http://sanaquefarma.com/l/bioplus','http://sanaquefarma.com/l/promelite'][slides.length % 4],
            class : ['promo-button', 'dynoral-button', 'bioplus-button', 'promelite-button'][slides.length % 4],
            text : ['Recíbelos ya', 'Ver más', 'Ver más', 'Ver más'][slides.length % 4],
            hasFunction : [true,false,false,false][slides.length % 4]
        });
    };
    for (var i=0; i<=3; i++) {

        //if ( i != 2 )
            $scope.addSlide(i);

    }

    $scope.openPromoModal = function() {
        $rootScope.$emit('OpenPromoModal', true);
    }

}]);
