(function($) {
    $.fn.weekly_schedule = function(callerSettings) {

        var settings = $.extend({
            days: ["sun", "mon", "tue", "wed", "thu", "fri", "sat"], // Days displayed
            hours: "7:00AM-10:00PM", // Hours displyed
            fontFamily: "Montserrat", // Font used in the component
            fontColor: "black", // Font colot used in the component
            fontWeight: "100", // Font weight used in the component
            fontSize: "0.8em", // Font size used in the component
            hoverColor: "#727bad", // Background color when hovered
            selectionColor: "#9aa7ee", // Background color when selected
            headerBackgroundColor: "transparent", // Background color of headers
            onSelected: function(){}, // handler called after selection
            onRemoved: function(){} // handler called after removal
        }, callerSettings||{});

        settings.hoursParsed = parseHours(settings.hours);

        var mousedown = false;
        var devarionMode = false;

        var schedule = this;

         function transformData(output){
     
            let sched = {};

            for(const key in output){
                const time = output[key];
                
                sched[key] = [];
                for(let index1 = 0; index1 < time.length; ++index1){
                    sched[key].push(time[index1].classList['2'] + (time[index1].classList['3']).replace('<br>',
                        ''));
                }
            }

            //console.log(sched[0][0]); // RETURNS DATA FROM MONDAY (O) FIRST INDEX
            return (sched);

        }

        function getSelectedHour() {
            var dayContainer = $('.day');
            var output = {};
            for (var i = 0; i < dayContainer.length; i++) {
                var children = $(dayContainer[i]).children();

                var hoursSelected = [];
                for (var j = 0; j < children.length; j++) {
                    if ($(children[j]).hasClass('selected')) {
                        hoursSelected.push(children[j]);
                    }
                }
                output[i] = hoursSelected;
            }
            
           
            return (transformData(output));
        }

        if (typeof callerSettings == 'string') {
            switch (callerSettings) {
                case 'getSelectedHour':
                    return getSelectedHour();
                    break;
                default:
                    throw 'Weekly schedule method unrecognized!'
            }
        }
        // options is an object, initialize!
        else {
            var days = settings.days; // option
            var hours = settings.hoursParsed; // option

            $(schedule).addClass('schedule');

            /*
             * Generate Necessary DOMs
             */

            // Create Header
            var dayHeaderContainer = $('<div></div>', {
                class: "header"
            });

            var align_block = $('<div></div>', {
                class: "align-block"
            });

            dayHeaderContainer.append(align_block);

            // Insert header items
            for (var i = 0; i < days.length; ++i) {
                var day_header = $('<div></div>', {
                    class: "header-item " + days[i] + "-header"
                });
                var header_title = $('<h3>' + capitalize(days[i]) + '</h3>')

                day_header.append(header_title);
                dayHeaderContainer.append(day_header);
            }


            var days_wrapper = $('<div></div>', {
                class: 'days-wrapper'
            });

            var hourHeaderContainer = $('<div></div>', {
                class: 'hour-header'
            });

            days_wrapper.append(hourHeaderContainer);

            for (var i = 0; i < hours.length; i++) {
                var hour_header_item = $('<div></div>', {
                    class: 'hour-header-item ' + hours[i]
                });

                var header_title = $('<h5>' + hours[i] +'</h5>');

                hour_header_item.append(header_title);
                hourHeaderContainer.append(hour_header_item);
            }



            for(var i = 0; i < days.length; i++) {
                var day = $('<div></div>', {
                    class: "day " + days[i]
                });

                for(var j = 0; j < hours.length; j++) {

                // if (j == 2){                            

                //     var hour = $('<div></div>', {
                //         class: "hour-save " + hours[j]

                //     }

                //     ).addClass('selected');

                //     day.append(hour);
                    

                // }


                // else{                            

                    var hour = $('<div></div>', {
                        class: "hour " + hours[j]
                    });

                    day.append(hour);

                // }

                    
                }

                days_wrapper.append(day);
            }

            /*
             * Inject objects
             */

            $(schedule).append(dayHeaderContainer);
            $(schedule).append(days_wrapper);


            /*
             *  Style Everything
             */
            $('.schedule').css({
                width: "100%",
                display: "flex",
                flexDirection: "column",
                justifyContent: "flex-start"
            });

            $('.header').css({
                height: "30px",
                width: "100%",
                background: settings.headerBackgroundColor,
                marginBottom: "5px",
                display: "flex",
                flexDirection: "row"
            });
            $('.align-block').css({
                width: "100%",
                height: "100%",
                background: settings.headerBackgroundColor,
                margin: "3px"
            });

            // Style Header Items
            $('.header-item').css({
                width: '100%',
                height: '100%',
                margin: '2px' // option
            });
            $('.header-item h3').css({
                margin: 0,
                textAlign: 'center',
                verticalAlign: 'middle',
                position: "relative",
                top: "50%",
                color: settings.fontColor,
                fontFamily: settings.fontFamily,
                fontSize: settings.fontSize,
                fontWeight: settings.fontWeight,
                transform: "translateY(-50%)",
                userSelect: "none"
            });

            $('.hour-header').css({
                display: 'flex',
                flexDirection: 'column',
                margin: '2px', // option
                marginRight: '1px',
                background: settings.headerBackgroundColor,
                width: '100%'
            });

            $('.days-wrapper').css({
                width: "100%",
                height: "100%",
                background: "transparent", //option
                display: "flex",
                flexDirection: "row",
                justifyContent: "flex-start",
                position: "relative"
            });

            $('.hour-header-item').css({
                width: "100%",
                height: "100%",
                border: "none", // option
                borderColor: "none", // option
                borderStyle: "none" // option
            });
            $('.hour-header-item').css({
                color: settings.fontColor,
                margin: "0", // option
                textAlign: "right",
                verticalAlign: "middle",
                position: "relative",
                fontFamily: settings.fontFamily,
                fontSize: settings.fontSize,
                fontWeight: settings.fontWeight,
                paddingRight: "10%",
                userSelect: "none",
                bottom: "9px"
            });

            $('.day').css({
                display: "flex",
                flexDirection: "column",
                marginRight: "1px", // option
                marginBottom: "1px",
                background: "transparent", // option
                width: "100%"
            });
            $('.hour').css({
                background: "#dddddd", // option
                marginBottom: "1px", // option
                width: "100%",
                height: "100%",
                userSelect: "none",
                padding: "30px"
            });

               $('.hour-save').css({
                background: "#6fdc6f", // option
                marginBottom: "1px", // option
                width: "100%",
                height: "100%",
                userSelect: "none",
                padding: "30px"
            });


            /*
             * Hook eventlisteners
             */

            $("<style type='text/css' scoped> .hover { background: "
                + settings.hoverColor +
                " !important;} .selected { background: "
                + settings.selectionColor +
                " !important; } .disabled { pointer-events: none !important; opacity: 0.3 !important; box-shadow: none !important; }</style>")
                .appendTo(schedule);

            // Prevent Right Click
            $('.schedule').on('contextmenu', function() {
                return false;
            });

            $('.hour,.hour-save').on('mouseenter', function() {
                if (!mousedown) {
                    $(this).addClass('hover');
                }
                else {
                    if (devarionMode) {
                        $(this).removeClass('selected');
                        

                        if($(this).hasClass('hour-save')){

                            $(this).removeClass('selected');
                             $(this).css('background','#dddddd');

                        }
                    }
                    else {
                        $(this).addClass('selected');
                        console.log(" A A A A A GUY GANSA");
                    }
                }
            }).on('mousedown', function() {
                mousedown = true;
                focusOn($(this).parent());

                if ($(this).hasClass('selected')) {

                    console.log("GUY");

                    if($(this).hasClass('hour-save')){

                    schedule.trigger('selectionremoved')
                    $(this).removeClass('selected');
                    devarionMode = true;
                    console.log("REMOVED? AGUY GANSA");
                    $(this).css('background','#dddddd');

                    }

                    schedule.trigger('selectionremoved')
                    $(this).removeClass('selected');
                    devarionMode = true;
                    console.log("REMOVED? AGUY");
                }

                              

                else {
                    schedule.trigger('selectionmade')
                    $(this).addClass('selected');
                    console.log("CLICKED? AGUY");
                }
                $(this).removeClass('hover');
            }).on('mouseup', function() {
                devarionMode = false;
                mousedown = false;

                clearFocus();
            }).on('mouseleave', function () {
                if (!mousedown) {
                    $(this).removeClass('hover');

                }
            });

        }

        function parseHours(string) {

            var output = ["<br> 7:30 AM<br> - </br> 9:00 AM","<br> 9:15 AM<br> - </br> 10:45 AM","<br> 11:00 AM<br> - </br> 12:30 PM",
                "<br> 12:45 PM<br> - </br> 2:15 PM","<br> 2:30 PM<br> - </br> 4:00 PM", 
                "<br> 4:15 PM<br> - </br> 5:45 PM", "<br> 6:00 PM<br> - </br> 7:30 PM", "<br> 8:45 PM<br> - </br> 9:15 PM"];

            return output;
        }

        function capitalize(string) {
            return string.charAt(0).toUpperCase() + string.slice(1);
        }

        function focusOn(day) {
            var targetDayClass = $(day).attr('class').split('\ ')[1];
            var dayContainer = $('.day');

            for (var i = 0; i < dayContainer.length; i++) {
                if ($(dayContainer[i]).hasClass(targetDayClass)) {

                    continue;

                }

                var hours = $(dayContainer[i]).children();
                for (var j = 0; j < hours.length; j++) {
                    $(hours[j]).addClass('disabled');
                }
            }

            $(day).on('mouseleave', function() {
                clearFocus();
                mousedown = false;
                devarionMode = false;
            });
        }

        function clearFocus() {
            var dayContainer = $('.day');

            for (var i = 0; i < dayContainer.length; i++) {

                var hours = $(dayContainer[i]).children();
                for (var j = 0; j < hours.length; j++) {
                    $(hours[j]).removeClass('disabled');
                }
            }
        }

    };
}(jQuery));
