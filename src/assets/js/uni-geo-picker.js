/**
 * Created by Jakeroid on 16-Mar-16.
 */

function uniGeoPickerAttachEvents(selector) {
    var uniGeoPickerBlock = $(selector);

    if (uniGeoPickerBlock.length > 0) {

        uniGeoPickerBlock.find(".spoiler-trigger").click(function() {
            $(this).parent().next().collapse('toggle');
        });

        var uniGeoPickerInput = uniGeoPickerBlock.find('#uni-geo-picker-hidden-input');
        var mapBlockId = 'uni-geo-picker-map';
        var defaultCenterCoordinates = uniGeoPickerBlock.data('default-center-coordinates');
        var zoomLevel = uniGeoPickerBlock.data('zoom-level');

        var map, placemark = false, mapInitCenterCoordinates, markCoordinates = false;

        ymaps.ready(function() {

            var inputCoordinates = uniGeoPickerInput.val();
            if (!inputCoordinates || parseInt(inputCoordinates.replace(',', '')) == 0) {
                mapInitCenterCoordinates = defaultCenterCoordinates.split(',');
            } else {
                mapInitCenterCoordinates = markCoordinates = inputCoordinates.split(',');
            }

            map = new ymaps.Map(mapBlockId, {
                zoom: zoomLevel,
                center: mapInitCenterCoordinates,
                controls: []
            });

            var searchControl = new ymaps.control.SearchControl({
                options: {
                    noPlacemark: true,
                    noSuggestPanel: true
                }
            });

            searchControl.events.add("resultselect", function (e) {
                var results = searchControl.getResultsArray();
                var selected = e.get('index');
                var coordinates = results[selected].geometry.getCoordinates();

                if (placemark) {
                    map.geoObjects.remove(placemark);
                }
                placemark = new ymaps.Placemark(coordinates, {}, { preset: "islands#dotCircleIcon", draggable: true });
                map.geoObjects.add(placemark);
                placemark.events.add("dragend", function (e) {
                    var coordinates = this.geometry.getCoordinates();
                    updatePlaceMarkCoordinates(placemark, coordinates);
                    setCoodinatesToInput(uniGeoPickerInput, coordinates);
                }, placemark);
                setCoodinatesToInput(uniGeoPickerInput, coordinates);
            });

            map.controls.add(searchControl).add('zoomControl');

            if (!markCoordinates) {
                placemark = new ymaps.Placemark(markCoordinates, {}, { preset: "islands#dotCircleIcon", draggable: true });
                map.geoObjects.add(placemark);
                placemark.events.add("dragend", function (e) {
                    var coordinates = this.geometry.getCoordinates();
                    updatePlaceMarkCoordinates(placemark, coordinates);
                    setCoodinatesToInput(uniGeoPickerInput, coordinates);
                }, placemark);
            }

            map.events.add("click", function (e) {
                if (placemark) {
                    map.geoObjects.remove(placemark);
                }
                var coordinates = e.get("coords");
                placemark = new ymaps.Placemark(coordinates, {}, { preset: "islands#dotCircleIcon", draggable: true });
                map.geoObjects.add(placemark);
                placemark.events.add("dragend", function (e) {
                    var coordinates = this.geometry.getCoordinates();
                    updatePlaceMarkCoordinates(placemark, coordinates);
                    setCoodinatesToInput(uniGeoPickerInput, coordinates);
                }, placemark);
                setCoodinatesToInput(uniGeoPickerInput, coordinates);
            });
        });

        function setCoodinatesToInput(input, coordinates) {
            var newCoordinates = [coordinates[0].toFixed(4), coordinates[1].toFixed(4)];
            input.val(newCoordinates);
        }

        function updatePlaceMarkCoordinates(placeMark, coordinates) {
            placeMark.getOverlaySync().getData().geometry.setCoordinates(coordinates);
        }
    }
}
