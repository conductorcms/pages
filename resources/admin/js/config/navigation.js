angular.module('admin.pages').config(function(NavigationProvider) {
    NavigationProvider.addSection({
        title: 'Pages',
        items: [
            {
                title: 'Pages',
                uri: '/admin/pages'
            },
            {
                title: 'Types',
                uri: '/admin/pages/types'
            },
        ]
    });
});