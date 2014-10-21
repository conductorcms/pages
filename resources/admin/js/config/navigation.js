angular.module('admin.pages').config(function(NavigationProvider) {
    NavigationProvider.addSection({
        title: 'Pages',
        items: [
            {
                title: 'Overview',
                uri: '/admin/pages'
            }
        ]
    });
});