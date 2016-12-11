var t3additionsMap = {
    config: {},

    waitForDom: function () {
        if (document.readyState !== 'loading') {
            this.init();
        } else {
            document.addEventListener('DOMContentLoaded', this.init);
        }
    },

    init: function () {
        var self = this;

        this._waitForGMaps(function () {
            $('.t3additions-map').each(function () {
                var element = this;
                var uid = $(this).attr('data-uid');

                self._loadConfig(uid, function (wasSuccessful) {
                    if (wasSuccessful) {
                        self.setupMap(element, uid);
                    }
                });
            });
        });
    },

    setupMap: function (mapContainer, uid) {
        var config = this.config[uid];

        config.map = new google.maps.Map($(mapContainer).get()[0], {
            center: {
                lat: parseFloat(config.t3additionsMapCenterLat),
                lng: parseFloat(config.t3additionsMapCenterLng)
            },
            zoom: parseInt(config.t3additionsMapZoom),
            disableDefaultUI: false,
            disableDoubleClickZoom: true,
            scrollwheel: false,
            draggable: true,
            gestureHandling: 'cooperative'
        });

        try {
            var styles = JSON.parse(config.t3additionsMapStyles);

            if (!('_comment' in styles[0])) {
                config.map.setOptions({styles: styles});
            }
        } catch (e) {
            console.error(e);
        }

        config.bounds = new google.maps.LatLngBounds();

        this.addMarkers(config, uid);
    },

    addMarkers: function (config) {
        var markers = [];

        for (var i = 0; i < config.markerData.length; i++) {
            var markerData = config.markerData[i].data,
                coords,
                marker,
                icon = '';

            coords = {
                lat: parseFloat(markerData.lat),
                lng: parseFloat(markerData.lng)
            };

            if (typeof markerData.icon.path !== 'undefined') {
                icon = {
                    url: markerData.icon.path,
                    size: new google.maps.Size(
                        markerData.icon.width,
                        markerData.icon.height
                    ),
                    scaledSize: new google.maps.Size(
                        markerData.icon.scaledWidth,
                        markerData.icon.scaledHeight
                    )
                };
            }

            marker = new google.maps.Marker({
                map: config.map,
                position: coords,
                icon: icon,
                title: markerData.title
            });

            if (markerData.description.trim() !== '') {
                var infoWindow = new google.maps.InfoWindow({
                    content: markerData.htmlDescription
                });

                marker.addListener('click', function () {
                    infoWindow.open(config.map, this);
                });
            } else {
                marker.addListener('click', function () {
                   window.open(markerData.uri, '_blank');
                });
            }

            config.bounds.extend(coords);

            markers.push(marker);
        }

        config.markers = markers;

        if (config.t3additionsMapFitBounds === '1') {
            config.map.fitBounds(config.bounds);
        }
    },

    _loadConfig: function (uid, cb) {
        var self = this;

        $.ajax('http://typo3-forge.dev/index.php?type=5711&uid=' + uid)
            .done(function (result) {
                if (!result.error) {
                    self.config[uid] = result;
                    cb(true);
                } else {
                    console.error('Error parsing map properties!');
                    cb(false);
                }
            });
    },

    _waitForGMaps: function (cb) {
        var check = function (cb) {
            if (typeof google !== 'undefined') {
                if (typeof google.maps !== 'undefined') {
                    cb();
                } else {
                    setTimeout(function () { check(cb); }, 500);
                }
            } else {
                setTimeout(function () { check(cb); }, 500);
            }
        };

        check(cb);
    }
};

t3additionsMap.waitForDom();