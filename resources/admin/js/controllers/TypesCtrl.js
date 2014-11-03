angular.module('admin').controller('TypesCtrl', function($scope, $location, PageType)
{
    $scope.types = PageType.types;

    $scope.edit = function(type)
    {
        $location.path('/admin/pages/types/' + type.id);
    }

    $scope.destroy = function(type)
    {
        PageType.destroy(type.id);
    }
});