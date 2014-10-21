angular.module('admin.pages').config(function(NavigationProvider) {
    NavigationProvider.addSection({
        title: 'Pages',
        items: [
            {
                title: 'Pages',
                uri: '/admin/pages'
            },
            {
                title: 'Page types',
                uri: '/admin/pages/types'
            },
            {
                title: 'Add a page',
                uri: '/admin/pages/create'
            }

        ]
    });
});