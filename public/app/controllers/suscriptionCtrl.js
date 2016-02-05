farmapp.controller('suscriptionCtrl', ['$scope', '$modal', '$log', '$http', '$rootScope', '$location', function( $scope, $modal, $log, $http, $rootScope, $location ){

    $scope.items = [false, false];

    $scope.animationsEnabled = true;

    angular.element(document).ready(function(){
        var currentUrl = $location.absUrl();
        console.log(currentUrl);
        if ( currentUrl == "http://sanaquefarma.com/" ){
            $scope.open('md');
        }
    });

    $rootScope.$on('OpenPromoModal', function( event, data ){
            $scope.open('md');
    });

    $scope.open = function (size) {

        var modalInstance = $modal.open({
            animation: $scope.animationsEnabled,
            templateUrl: 'suscription.html',
            controller: 'ModalInstanceCtrl',
            size: size,
            resolve: {
                items: function () {
                    return $scope.items;
                }
            }
        });

        modalInstance.result.then(function ( data ) {
            console.log(data);
            send_suscription(data);
        }, function () {
            $log.info('Modal dismissed at: ' + new Date());
        });
    };

    $scope.toggleAnimation = function () {
        $scope.animationsEnabled = !$scope.animationsEnabled;
    };

    function send_suscription( email ) {

        $http.post("/account/do_suscription" , { data : email} )
            .success(function(data, status, headers, config) {

                console.log(data);
                switch (data.status) {
                    case 'HAS_SUSCRIPTION':
                        //$rootScope.$emit('test',data );
                        $scope.items = [false, true];
                        $scope.open('md');
                    break;
                    case 'SUSCRITED':
                        $scope.items = [true, false];
                        $scope.open('md');
                    break;
                    default:

                }

            }).
            error(function(data, status, headers, config) {
                $window.location.reload();
                console.info(data + ":(");
            });
    }

}]);
