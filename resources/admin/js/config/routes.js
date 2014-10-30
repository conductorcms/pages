angular.module('admin.pages').config(function($routeProvider) {

    $routeProvider.when('/admin/pages', {
        templateUrl: 'pages/pages/list.html',
        controller: 'PagesCtrl',
        permissions: ['admin']
    });

    $routeProvider.when('/admin/pages/types', {
        templateUrl: 'pages/types/list.html',
        controller: 'TypesCtrl',
        permissions: ['admin']
    });

	$routeProvider.when('/admin/pages/types/create', {
		templateUrl: 'pages/types/create.html',
		controller: 'CreateTypeCtrl',
		permissions: ['admin']
	});

    $routeProvider.when('/admin/pages/create', {
        templateUrl: 'pages/pages/create.html',
        controller: 'CreatePageCtrl',
        permissions: ['admin']
    });

});
