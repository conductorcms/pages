angular.module('admin').controller('TypesCtrl', function($scope, PageType)
{
    $scope.types = PageType.types;

    PageType.getAll();
});