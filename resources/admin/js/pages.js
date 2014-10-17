angular.module('admin.pages', ['ngRoute', 'admin.core', 'admin.pages.templates']).config(function ($routeProvider, NavigationProvider) {
    $routeProvider.when('/admin/pages', {
        templateUrl: 'pages/index.html',
        controller: 'PagesCtrl'
    });

    NavigationProvider.addSection({
        'title': 'Pages',
        'items': [
            {
                'title': 'Overview',
                'link': '/admin/pages'
            }
        ]
    });

});