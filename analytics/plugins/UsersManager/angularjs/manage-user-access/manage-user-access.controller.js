/*!
 * Piwik - free/libre analytics platform
 *
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 */
(function () {
    angular.module('piwikApp').controller('ManageUserAccessController', ManageUserAccessController);

    ManageUserAccessController.$inject = ['piwik', 'piwikApi', '$timeout'];

    function ManageUserAccessController(piwik, piwikApi, $timeout) {

        var self = this;
        this.isLoading = false;

        function launchAjaxRequest(login, access, successCallback) {

            self.isLoading = true;

            $timeout(function () {
                piwik.helper.lazyScrollTo('.loadingManageUserAccess', 50);
            });

            var parameters = {userLogin: login, access: access, idSites: self.site.id};

            return piwikApi.post({
                module: 'API',
                format: 'json',
                method: 'UsersManager.setUserAccess'
            }, parameters).then(function (response) {
                self.isLoading = false;
                return response;
            }, function () {
                self.isLoading = false;
            });
        }

        this.siteChanged = function () {
            if (this.site && this.site.id != piwik.idSite) {
                piwik.broadcast.propagateNewPage('segment=&idSite=' + this.site.id, false);
            }
        };

        this.setAccess = function (login, access) {
    
            // callback called when the ajax request Update the user permissions is successful
            function successCallback(response) {
                var mainDiv = $('[data-login="' + login + '"]');
                mainDiv.find('.accessGranted')
                    .attr("src", "plugins/UsersManager/images/no-access.png")
                    .attr("class", "updateAccess")
                    .click(function () {
                        var access = $(this).parent().attr('id')
                        self.setAccess(login, access);
                    })
                ;
                mainDiv.find('#' + access + ' img')
                    .attr('src', "plugins/UsersManager/images/ok.png")
                    .attr('class', "accessGranted")
                ;

                var UI = require('piwik/UI');
                var notification = new UI.Notification();
                notification.show(_pk_translate('General_Done'), {
                    placeat: '#accessUpdated',
                    context: 'success',
                    noclear: true,
                    type: 'toast',
                    style: {display: 'inline-block', marginTop: '10px'},
                    id: 'usersManagerAccessUpdated'
                });

                // reload if user anonymous was updated, since we display a Notice message when anon has view access
                if (login == 'anonymous') {
                    window.location.reload();
                }
            }

            if (this.site.id == 'all') {

                //ask confirmation
                $('#confirm').find('.login').text(login);

                function onValidate() {
                    launchAjaxRequest(login, access).then(successCallback);
                }

                piwikHelper.modalConfirm('#confirm', {yes: onValidate})
            }
            else {
                launchAjaxRequest(login, access).then(successCallback);
            }
        }
    }
})();