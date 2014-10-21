angular.module('admin.pages').config(function($routeProvider) {

    $routeProvider.when('/admin/pages', {
        templateUrl: 'pages/index.html',
        controller: 'PagesCtrl',
        permissions: ['admin']
    });

    $routeProvider.when('/admin/pages/types', {
        templateUrl: 'pages/types.html',
        controller: 'PagesCtrl',
        permissions: ['admin']
    });

    $routeProvider.when('/admin/pages/create', {
        templateUrl: 'pages/create.html',
        controller: 'PagesCtrl',
        permissions: ['admin']
    })

});
