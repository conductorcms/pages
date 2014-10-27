angular.module('admin').controller('CreateTypeCtrl', function($scope, Pages, Slug)
{
	$scope.contentAreas = [];

	$scope.pageLayouts = Pages.layouts;

	Pages.getLayouts();

	$scope.addContentArea = function()
	{
		$scope.contentAreas.push({name: '', slug: '', type: ''});
	}

	$scope.removeContentArea = function(area)
	{
		$scope.contentAreas.splice($scope.contentAreas.indexOf(area), 1);
	}

});