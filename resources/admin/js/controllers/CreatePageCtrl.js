angular.module('admin.pages').controller('CreatePageCtrl', function($scope, PageType, Pages, $location) {

    $scope.page = {};

    $scope.buttonText = 'Select a type';

    $scope.types = PageType.types;

    PageType.getAll();

    $scope.selectType = function(type)
    {
        $scope.page.type = type;
        $scope.buttonText = type.name;
        $scope.page.typeSet = true;
    }

    $scope.save = function()
    {
        Pages.save($scope.page).success(function()
        {
            $location.path('/admin/pages');
        });
    };

});

