var t3additionsSocialwall = {
    config: {},

    init: function () {
        this._loadConfig();
        this._initSocialFeedPlugin();
    },

    _loadConfig: function () {
        try {
            this.config = JSON.parse(window.atob($('.t3additions-socialwall').attr('data-socialwall-config')));
        } catch (e) {
            console.error('Error parsing configuration: ', e);
        }
    },

    _initSocialFeedPlugin: function () {
        var itemTemplate = '<div class="social-feed-element {{? !it.moderation_passed}}hidden{{?}}" dt-create="{{=it.dt_create}}" social-feed-id = "{{=it.id}}">' +
            '<a href="{{=it.link}}" target="_blank" class="read-button">' +
                '<div class="content">' +
                    '<a class="pull-left" href="{{=it.author_link}}" target="_blank">' +
                        '<img class="media-object" src="{{=it.author_picture}}">' +
                    '</a>' +
                    '<div class="media-body">' +
                        '<p>' +
                            '<i class="fa fa-{{=it.social_network}}"></i>' +
                            '<span class="author-title">{{=it.author_name}}</span>' +
                            '<span class="muted pull-right"> {{=it.time_ago}}</span>' +
                        '</p>' +
                        '<div class="text-wrapper">' +
                            '<p class="social-feed-text">{{=it.text}} <a href="{{=it.link}}" target="_blank" class="read-button">Weiterlesen...</a></p>' +
                        '</div>' +
                    '</div>' +
                '</div>{{=it.attachment}}' +
            '</a>' +
        '</div>';

        moment.locale($('html').attr('lang'));

        $('.t3additions-socialwall .sw-holder').socialfeed({
            facebook: {
                accounts: this.config.facebook.accounts.split(','),
                limit: this.config.facebook.limit,
                language: $('html').attr('lang'),
                access_token: this.config.facebook.accessToken
            },
            length: this.config.length,
            show_media: this._createBoolFromString(this.config.showMedia),
            media_min_width: 0,
            template_html: itemTemplate,
            callback: function () {

            }
        })
    },

    _createBoolFromString: function (string) {
        if (string === '1' || string.toLowerCase() === 'true') {
            return true;
        } else {
            return true;
        }
    }
};

/**
 * Init after load
 */
$(document).ready(function () {
   t3additionsSocialwall.init();
});