var ComponentsIonSliders = function() {

    var handleBasicDemo = function() {
        // demo 1
        $("#range_1").ionRangeSlider();

        // demo 2
        $("#range_2").ionRangeSlider({
            min: 100,
            max: 1000,
            from: 550
        });

        // demo 3
        $("#range_3").ionRangeSlider({
            type: "double",
            grid: true,
			values: ['05 AM', '06 AM', '07 AM', '08 AM', '09 AM', '10 AM', '11 AM', '12 PM', '01 PM', '02 PM', '03 PM', '04 PM', '05 PM', '06 PM'],
            //min: 4,
            //max: 20,
            from: 2,
            //from_min: 7.0,
            //from_max: 7.5,
            //from_shadow: true,
            to: 11,
            prefix: "",
			disable: true
        });
		$("#range_3_1").ionRangeSlider({
            type: "double",
            grid: true,
			values: ['05 AM', '06 AM', '07 AM', '08 AM', '09 AM', '10 AM', '11 AM', '12 PM', '01 PM', '02 PM', '03 PM', '04 PM', '05 PM', '06 PM'],
            //min: 4,
            //max: 20,
            from: 2,
            from_min: 2.0,
            from_max: 2.2,
            from_shadow: true,
            to: 5,
            prefix: "",
			disable: true
        });
		$("#range_3_2").ionRangeSlider({
            type: "double",
            grid: true,
			values: ['05 AM', '06 AM', '07 AM', '08 AM', '09 AM', '10 AM', '11 AM', '12 PM', '01 PM', '02 PM', '03 PM', '04 PM', '05 PM', '06 PM'],
            //min: 4,
            //max: 20,
            from: 5,
            from_min: 5,
            from_max: 8,
            from_shadow: true,
            to: 9,
            prefix: "",
			disable: true
        });
		$("#range_3_3").ionRangeSlider({
            type: "double",
            grid: true,
			values: ['05 AM', '06 AM', '07 AM', '08 AM', '09 AM', '10 AM', '11 AM', '12 PM', '01 PM', '02 PM', '03 PM', '04 PM', '05 PM', '06 PM'],
            //min: 4,
            //max: 20,
            from: 2,
            from_min: 2.0,
            from_max: 2.2,
            from_shadow: true,
            to: '2.2',
            prefix: "",
			disable: true
        });
		$("#range_3_4").ionRangeSlider({
            type: "double",
            grid: true,
			values: ['05 AM', '06 AM', '07 AM', '08 AM', '09 AM', '10 AM', '11 AM', '12 PM', '01 PM', '02 PM', '03 PM', '04 PM', '05 PM', '06 PM'],
			from_min: 2,
    		from_max: 8,
            //min: 4,
            //max: 20,
            from: 2,
            //from_min: 7.0,
            //from_max: 7.5,
            from_shadow: true,
            to: 11,
			to_min: 9,
    		to_max: 11,
			to_shadow: true,
            prefix: "",
			disable: true
        });
        $("#range_3-1").ionRangeSlider({
            type: "double",
            grid: true,
            min: 4,
            max: 20,
            from: 7,
            to: 10,
            from: 12,
            to: 16,
            prefix: ""
            //disable: true
        });

        $("#range_39").ionRangeSlider({
            min: +moment().subtract(1, "years").format("X"),
            max: +moment().format("X"),
            from: +moment().subtract(6, "months").format("X"),
            prettify: function (num) {
                return moment(num, "X").format("LL");
            }
        });


        $("#range_40").ionRangeSlider({
            type: "double",
            //from_fixed: 7,
            //to: 4,
            min: +moment().subtract(12, "hours").format("HH:mm"),
            max: +moment().add(12, "hours").format("HH:mm"),
            from_fixed: +moment().subtract(3, "hours").format("HH:mm"),
            prettify: function (num) {
                return moment(num, "HH:mm").format("MMM Do, hh:mm A");
            }
        });

        $("#range_41").ionRangeSlider({
            type: "double",
            min: +moment().subtract(12, "hours").format("X"),
            max: +moment().add(12, "hours").format("X"),
            from: +moment().subtract(3, "hours").format("X"),
            to: +moment().add(2, "hours").format("X"),
            grid: true,
            force_edges: true,
            prettify: function (num) {
                var m = moment(num, "X").locale("ru");
                return m.format("HH:mm:a");
            },
            disable: true
        });

        $("#range_42").ionRangeSlider({
            type: "double",
            min: +moment().subtract(12, "hours").format("X"),
            max: +moment().add(12, "hours").format("X"),
            from: +moment().subtract(0.1, "hours").format("X"),
            to: +moment().add(0.1, "hours").format("X"),
            grid: true,
            force_edges: true,
            prettify: function (num) {
                var m = moment(num, "X").locale("ru");
                return m.format("HH:mm:a");
            },
            disable: true
        });

        $("#range_43").ionRangeSlider({
            type: "double",
            min: +moment().subtract(12, "hours").format("X"),
            max: +moment().add(12, "hours").format("X"),
            from: +moment().subtract(1, "hours").format("X"),
            to: +moment().add(1, "hours").format("X"),
            grid: true,
            force_edges: true,
            prettify: function (num) {
                var m = moment(num, "X").locale("ru");
                return m.format("HH:mm:a");
            },
            disable: true
        });

        $("#range_44").ionRangeSlider({
            type: "double",
            min: +moment().subtract(12, "hours").format("X"),
            max: +moment().add(12, "hours").format("X"),
            from: +moment().subtract(4.5, "hours").format("X"),
            to: +moment().add(4.5, "hours").format("X"),
            grid: true,
            force_edges: true,
            prettify: function (num) {
                var m = moment(num, "X").locale("ru");
                return m.format("HH:mm:a");
            },
            disable: true
        });

        // demo 4
        $("#range_4").ionRangeSlider({
            type: "double",
            grid: true,
            min: -1000,
            max: 1000,
            from: -500,
            to: 500
        });

        // demo 5
        $("#range_5").ionRangeSlider({
            type: "double",
            grid: true,
            from: 1,
            to: 5,
            values: [0, 10, 100, 1000, 10000, 100000, 1000000]
        });
		
		// demo 5
        $("#range_5_1").ionRangeSlider({
            type: "double",
            grid: true,
            from: 1,
            to: 5,
            values: ['05:00 AM, 06:00 AM, 07:00 AM, 08:00 AM, 09:00 AM, 10:00 AM, 11:00 AM, 12:00 AM, 01:00 PM, 02:00 PM, 03:00 PM, 04:00 PM, 05:00 PM, 06:00 PM,']
        });

        // demo 6
        $("#range_6").ionRangeSlider({
            grid: true,
            from: 5,
            values: [
                "zero", "one",
                "two", "three",
                "four", "five",
                "six", "seven",
                "eight", "nine",
                "ten"
            ]
        });

        // demo 7
        $("#range_7").ionRangeSlider({
            grid: true,
            from: 3,
            values: [
                "January", "February", "March",
                "April", "May", "June",
                "July", "August", "September",
                "October", "November", "December"
            ]
        });

        // demo 8
        $("#range_8").ionRangeSlider({
            type: "double",
            min: 100,
            max: 200,
            from: 145,
            to: 155,
            prefix: "Weight: ",
            postfix: " million pounds",
            decorate_both: true
        });

        // demo 9
        $("#range_9").ionRangeSlider({
            type: "double",
            min: 100,
            max: 200,
            from: 148,
            to: 152,
            prefix: "Weight: ",
            postfix: " million pounds",
            values_separator: " → "
        });
    }

    var handleAdvancedDemo = function() {
        $("#range_10").ionRangeSlider({
            type: "double",
            min: 0,
            max: 100,
            from: 30,
            to: 70,
            from_fixed: true
        });

        $("#range_11").ionRangeSlider({
            min: 0,
            max: 100,
            from: 30,
            from_min: 10,
            from_max: 50
        });

        $("#range_12").ionRangeSlider({
            type: "double",
            min: 0,
            max: 24,
            from: 7,
            from_min: 10,
            from_max: 30,
            from_shadow: true,
            to: 80,
            to_min: 70,
            to_max: 90,
            to_shadow: true,
            grid: true,
            grid_num: 10
        });

        $("#range_13").ionRangeSlider({
            min: 0,
            max: 100,
            from: 30,
            disable: true
        });
    }

    return {
        //main function to initiate the module
        init: function() {
            handleBasicDemo();
            handleAdvancedDemo();
        }

    };

}();

jQuery(document).ready(function() {
    ComponentsIonSliders.init();
});