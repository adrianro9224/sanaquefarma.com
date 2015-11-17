/**
 * Created by Adrian on 12/11/2014.
 */

var farmapp = angular.module('farmapp', ['ui.bootstrap', 'ngCookies']);

    //Create the farmapp module

farmapp.controller('CarouselCtrl', ['$scope', function($scope) {
    $scope.myInterval = 7500;
    var slides = $scope.slides = [];
    $scope.addSlide = function(i) {
        var format = '.jpg';
           /* if( i == 0 )
                format = '.png';*/
        slides.push({
            image: 'http://sanaquefarma.com/assets/images/slides/' + i + format,
            button: ['http://sanaquefarma.com/product/show_product_by_id/2','http://sanaquefarma.com/product/show_product_by_id/5','http://sanaquefarma.com/product/show_product_by_id/7'][slides.length % 3],
            class : ['dynoral-button', 'argel-button', 'promelight-button'][slides.length % 3]
        });
    };
    for (var i=0; i<=2; i++) {

        //if ( i != 2 )
            $scope.addSlide(i);

    }

}]);

