/**
 * Created by adrian on 21/05/15.
 */
farmapp.controller('ModalInstanceCtrl', function ($scope, $modalInstance, items, $rootScope) {

    $scope.suscritedSucces = items[0];
    $scope.hasSuscription = items[1];

    // $rootScope.$on('test', function( event, data ){
    //
    //     switch (data.status) {
    //         case 'SUSCRITED':
    //             $scope.suscritedSucces = true;
    //         break;
    //         case 'HAS_SUSCRIPTION':
    //             $scope.hasSuscription = true;
    //         break;
    //
    //     }
    // });

    $scope.ok = function ( data ) {
        $modalInstance.close( data );
    };

    $scope.cancel = function () {
        $modalInstance.dismiss('cancel');
    };
});
