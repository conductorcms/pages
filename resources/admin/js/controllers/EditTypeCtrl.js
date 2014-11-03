angular.module('admin').controller('EditTypeCtrl', function($routeParams, $scope, $location, Pages, PageType, toaster)
{
    PageType.find($routeParams['id']).success(function(data)
    {
        $scope.type = data.type;
        $scope.contentAreas = data.type.areas;
    });

    $scope.contentAreas = [];

    $scope.pageLayouts = Pages.layouts;

    Pages.getLayouts();

    $scope.save = function()
    {
        PageType.update($scope.type, $scope.contentAreas).success(function()
        {
            toaster.pop('success', 'Successfully updated', 'Page type has been successfully updated');
            $location.path('/admin/pages/types');
        });
    };

    $scope.addArea = function()
    {
        $scope.contentAreas.push({name: '', slug: '', type: ''});
    };

    $scope.removeArea = function(area)
    {
        if(area.index != 'undefined')
        {
            PageType.destroyArea(area).success(function(data)
            {
                toaster.pop('warning', 'Successfully deleted', 'Content area has been successfully deleted');
            });
        }

        $scope.contentAreas.splice($scope.contentAreas.indexOf(area), 1);
    };

});