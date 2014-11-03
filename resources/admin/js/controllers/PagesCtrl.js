angular.module('admin.pages').controller('PagesCtrl', function ($scope, Pages, $location, toaster) {

    $scope.pages = Pages.pages;

    $scope.edit = function(page)
    {
        $location.path('/admin/pages/' + page.id);
    }

    $scope.destroy = function(page)
    {
        Pages.destroy(page).success(function(data)
        {
           toaster.pop('warning', 'Deleted Successfully', 'Page was deleted successfully');
        });
    }

});
