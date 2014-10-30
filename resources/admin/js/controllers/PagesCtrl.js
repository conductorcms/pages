angular.module('admin.pages').controller('PagesCtrl', function ($scope, Pages) {

    $scope.pages = Pages.pages;

    Pages.getAll();

});
