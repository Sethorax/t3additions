var t3additionsMenu = {
    _isInitialized: false,
    _selector: '.t3additions-menu.menu-layout-mobile',

    init: function () {
        if (!this._isInitialized) {
            this._openActiveSubmenus();
            this._calculateSubmenuHeights();
            this._bindEvents();

            this._isInitialized = true;
        }
    },

    actions: {
        open: function () {
            $(t3additionsMenu._selector).addClass('state-open');
        },

        close: function () {
            $(t3additionsMenu._selector).removeClass('state-open');
        }
    },

    _bindEvents: function () {
        $(this._selector).find('.btn-open').on('click', function () {
            $(this).closest('.menu-item').toggleClass('state-open');
        });
    },

    _calculateSubmenuHeights: function () {
        $(this._selector).find('.submenu').each(function () {
            $(this).css('max-height', $(this).outerHeight());
        });
        
        $(this._selector).addClass('state-loaded');
    },

    _openActiveSubmenus: function () {
        var curItem = $(this._selector).find('.menu-item.current').closest('.menu-list');
        var curParentMenu = null;

        for (var i = 0; i < (curItem.attr('data-menu-level') - 1); i++) {
            if (curParentMenu === null) {
                curParentMenu = curItem.closest('.menu-item');
            } else {
                curParentMenu = curParentMenu.closest('.submenu').closest('.menu-item');
            }

            curParentMenu.addClass('state-open');
        }
    }
};


/**
 * Init after load
 */
$(document).ready(function () {
   t3additionsMenu.init();
});