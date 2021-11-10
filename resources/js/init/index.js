var lsjQuery = jQuery;
lsjQuery(document).ready(function() {
    if (typeof lsjQuery.fn.layerSlider == "undefined") {
        lsShowNotice('layerslider_1', 'jquery');
    } else {
        lsjQuery("#layerslider_4").layerSlider({
            responsiveUnder: 1170,
            layersContainer: 1170,
            skinsPath: 'js/layerslider/skins/'
        })
    }
});