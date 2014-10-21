angular.module('admin.pages').config(function($routeProvider) {

    $routeProvider.when('/admin/pages', {
        templateUrl: 'pages/index.html',
        controller: 'PagesCtrl',
        permissions: ['admin']
    });

});
