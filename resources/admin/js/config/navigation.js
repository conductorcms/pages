angular.module('admin.pages').config(function(NavigationProvider) {
    NavigationProvider.addItemsFromArray([
        {
            section: 'Pages',
            title: 'Pages',
            uri: '/admin/pages'
        },
        {
            section: 'Pages',
            title: 'Types',
            uri: '/admin/pages/types'
        }
    ]);
});