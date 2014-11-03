angular.module('admin.pages').config(function($routeProvider) {

    $routeProvider.when('/admin/pages', {
        templateUrl: 'pages/pages/list.html',
        controller: 'PagesCtrl',
        resolve: {
            pages: function(Pages)
            {
                return Pages.getAll();
            }
        },
        permissions: ['admin']
    });

    $routeProvider.when('/admin/pages/types', {
        templateUrl: 'pages/types/list.html',
        controller: 'TypesCtrl',
        resolve: {
            types: function(PageType)
            {
                return PageType.getAll();
            }
        },
        permissions: ['admin']
    });

    $routeProvider.when('/admin/pages/types/create', {
        templateUrl: 'pages/types/create.html',
        controller: 'CreateTypeCtrl',
        permissions: ['admin']
    });

    $routeProvider.when('/admin/pages/types/:id', {
        templateUrl: 'pages/types/edit.html',
        controller: 'EditTypeCtrl',
        permissions: ['admin']
    });

    $routeProvider.when('/admin/pages/create', {
        templateUrl: 'pages/pages/create.html',
        controller: 'CreatePageCtrl',
        permissions: ['admin']
    });

    $routeProvider.when('/admin/pages/:id', {
        templateUrl: 'pages/pages/edit.html',
        controller: 'EditPageCtrl',
        resolve: {
            page: function($route, Pages)
            {
                return Pages.find($route.current.params.id);
            }
        },
        permissions: ['admin']
    });
});
