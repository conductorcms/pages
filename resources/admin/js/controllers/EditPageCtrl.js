angular.module('admin').controller('EditPageCtrl', function($scope, $location, Pages, page, toaster)
{
    $scope.page = page.data.page;

    console.log('controller');
    console.log(page);

    $scope.save = function()
    {
        Pages.update($scope.page).success(function()
        {
            toaster.pop('success', 'Sucessfully updated!', 'The page has been successfully updated');

            $location.path('/admin/pages');
        });
    }



});