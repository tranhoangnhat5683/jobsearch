var ChartsAmcharts = function() {
    var initChartSample9 = function() {
        var chart = AmCharts.makeChart("chart_9", {
            "type": "radar",
            "theme": "light",

            "fontFamily": 'Open Sans',
            
            "color":    '#888',

            "dataProvider": [{
                "country": "Open",
                "litres": 124
            }, {
                "country": "Teamwork",
                "litres": 131
            }, {
                "country": "Positive",
                "litres": 115
            }, {
                "country": "Active",
                "litres": 4
            }, {
                "country": "Careful",
                "litres": 99
            }],
            "valueAxes": [{
                "axisTitleOffset": 20,
                "minimum": 0,
                "axisAlpha": 0.15
            }],
            "startDuration": 2,
            "graphs": [{
                "balloonText": "[[value]] litres of beer per year",
                "bullet": "round",
                "valueField": "litres"
            }],
            "categoryField": "country"
        });

        $('#chart_9').closest('.portlet').find('.fullscreen').click(function() {
            chart.invalidateSize();
        });
    }
    return {
        //main function to initiate the module

        init: function() {
            initChartSample9();
        }

    };

}();