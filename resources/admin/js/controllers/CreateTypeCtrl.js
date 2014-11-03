angular.module('admin').controller('CreateTypeCtrl', function($scope, $location, Pages, PageType, toaster)
{
    $scope.newType = {};
	$scope.contentAreas = [];

	$scope.pageLayouts = Pages.layouts;

	Pages.getLayouts();

    $scope.save = function()
    {
        PageType.save($scope.newType, $scope.contentAreas).success(function()
        {
            toaster.pop('success', 'Page Type Created', 'Page type successfully created');
            $location.path('/admin/pages/types');
        });
    };

	$scope.addArea = function()
	{
		$scope.contentAreas.push({name: '', slug: '', type: ''});
	};

	$scope.removeArea = function(area)
	{
		$scope.contentAreas.splice($scope.contentAreas.indexOf(area), 1);
	};

});