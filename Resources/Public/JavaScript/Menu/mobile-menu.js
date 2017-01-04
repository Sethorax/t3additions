var t3additionsMenu = {
    _isInitialized: false,
    _selector: '.t3additions-menu.menu-layout-mobile',

    init: function () {
        if (!t3additionsMenu._isInitialized) {
            t3additionsMenu._openActiveSubmenus();
            t3additionsMenu._calculateSubmenuHeights();
            t3additionsMenu._bindEvents();

            t3additionsMenu._isInitialized = true;
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
        $(t3additionsMenu._selector).find('.btn-open').on('click', function () {
            $(this).closest('.menu-item').toggleClass('state-open');
        });
    },

    _calculateSubmenuHeights: function () {
        $(t3additionsMenu._selector).find('.submenu').each(function () {
            $(this).css('max-height', $(this).outerHeight());
        });
        
        $(t3additionsMenu._selector).addClass('state-loaded');
    },

    _openActiveSubmenus: function () {
        var curItem = $(t3additionsMenu._selector).find('.menu-item.current').closest('.menu-list');
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