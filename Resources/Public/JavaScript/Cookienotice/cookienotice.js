var t3additionsCookienotice = {
    _cookieName: 't3additionsCookieNoticeAccepted',

    waitForDom: function () {
        if (document.readyState !== 'loading') {
            t3additionsCookienotice.init();
        } else {
            document.addEventListener('DOMContentLoaded', t3additionsCookienotice.init);
        }
    },

    init: function () {
        if (!t3additionsCookienotice._wasAlreadyAccepted()) {
            t3additionsCookienotice._showCookiebar();
            t3additionsCookienotice._bindEvents();
        }
    },

    _wasAlreadyAccepted: function () {
        return document.cookie.indexOf(t3additionsCookienotice._cookieName) > -1;

    },

    _showCookiebar: function () {
        console.log('show Cookiebar');
        document.getElementById('t3additions-cookienotice').className += ' state-visible';
    },

    _bindEvents: function () {
        document.getElementById('t3additions-cookienotice-accept').addEventListener('click', function () {
            document.cookie = 't3additionsCookieNoticeAccepted=1; expires=' + new Date(new Date().setFullYear(new Date().getFullYear() + 1)) +'; path=/';
            document.getElementById('t3additions-cookienotice').className += ' state-accepted';
        });
    }
};


t3additionsCookienotice.waitForDom();
