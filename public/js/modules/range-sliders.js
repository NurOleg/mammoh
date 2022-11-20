function initFilter(sl1_min, sl1_max, sl2_min, sl2_max) {
    !function () {
        var e = $(".filter-range-slider--1");
        e.slider({
            max: sl1_max, min: sl1_min, step: 0.25, range: !0, values: [sl1_min, sl1_max], slide: function (e, i) {
                var r = $(".filter-range-slider--1 .ui-slider-pip-selected-1 .ui-slider-label").data("value"),
                    l = $(".filter-range-slider--1 .ui-slider-pip-selected-2 .ui-slider-label").data("value");
                $(".filter-range-slider__input-min--rangeSlider-1").val(r), $(".filter-range-slider__input-max--rangeSlider-1").val(l)
            }
        }).slider("pips", {first: "pip", last: "pip"});
        var i = $(".filter-range-slider__input-min--rangeSlider-1"),
            r = $(".filter-range-slider__input-max--rangeSlider-1"), l = e.slider("values")[0],
            a = e.slider("values")[1];
        i.val(l), r.val(a), i.on("change", (function () {
            var i = $(this).val();
            e.slider("values", "0", parseInt(i)), e.slider("pips", "refresh")
        })), r.on("change", (function () {
            var i = $(this).val();
            e.slider("values", "1", parseInt(i)), e.slider("pips", "refresh")
        }))
    }(), function () {
        var e = $(".filter-range-slider--2");
        e.slider({
            max: sl2_max, min: sl2_min, step: 10, range: !0, values: [sl2_min, sl2_max], slide: function (e, i) {
                var r = $(".filter-range-slider--2 .ui-slider-pip-selected-1 .ui-slider-label").data("value"),
                    l = $(".filter-range-slider--2 .ui-slider-pip-selected-2 .ui-slider-label").data("value");
                $(".filter-range-slider__input-min--rangeSlider-2").val(r), $(".filter-range-slider__input-max--rangeSlider-2").val(l)
            }
        }).slider("pips", {first: "pip", last: "pip"});
        var i = $(".filter-range-slider__input-min--rangeSlider-2"),
            r = $(".filter-range-slider__input-max--rangeSlider-2"), l = e.slider("values")[0],
            a = e.slider("values")[1];
        i.val(l), r.val(a), i.on("change", (function () {
            var i = $(this).val();
            e.slider("values", "0", parseInt(i)), e.slider("pips", "refresh")
        })), r.on("change", (function () {
            var i = $(this).val();
            e.slider("values", "1", parseInt(i)), e.slider("pips", "refresh")
        }))
    }();
}
