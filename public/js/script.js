    // (function($) {
    //     $.fn.countdown = function(options, callback) {
    //         //custom 'this' selector
    //         thisEl = $(this);

    //         // array of custom settings
    //         var settings = {
    //             'date': null,
    //             'format': null
    //         };

    //         // append the settings array to options
    //         if (options) {
    //             $.extend(settings, options);
    //         }

    //         //create the countdown processing function
    //         function countdown_proc() {
    //             var eventDate = Date.parse(settings.date) / 1000;
    //             var currentDate = Math.floor($.now() / 1000);

    //             if (eventDate <= currentDate) {
    //                 callback.call(this);
    //                 clearInterval(interval);
    //             }

    //             var seconds = eventDate - currentDate;

    //             var days = Math.floor(seconds / (60 * 60 * 24));
    //             //calculate the number of days

    //             seconds -= days * 60 * 60 * 24;
    //             //update the seconds variable with number of days removed

    //             var hours = Math.floor(seconds / (60 * 60));
    //             seconds -= hours * 60 * 60;
    //             //update the seconds variable with number of hours removed

    //             var minutes = Math.floor(seconds / 60);
    //             seconds -= minutes * 60;
    //             //update the seconds variable with number of minutes removed

    //             //conditional statements
    //             if (days == 1) {
    //                 thisEl.find(".timeRefDays").text("day");
    //             } else {
    //                 thisEl.find(".timeRefDays").text("days");
    //             }
    //             if (hours == 1) {
    //                 thisEl.find(".timeRefHours").text("hour");
    //             } else {
    //                 thisEl.find(".timeRefHours").text("hours");
    //             }
    //             if (minutes == 1) {
    //                 thisEl.find(".timeRefMinutes").text("minute");
    //             } else {
    //                 thisEl.find(".timeRefMinutes").text("minutes");
    //             }
    //             if (seconds == 1) {
    //                 thisEl.find(".timeRefSeconds").text("second");
    //             } else {
    //                 thisEl.find(".timeRefSeconds").text("seconds");
    //             }

    //             //logic for the two_digits ON setting
    //             if (settings.format == "on") {
    //                 days = (String(days).length >= 2) ? days : "0" + days;
    //                 hours = (String(hours).length >= 2) ? hours : "0" + hours;
    //                 minutes = (String(minutes).length >= 2) ? minutes : "0" + minutes;
    //                 seconds = (String(seconds).length >= 2) ? seconds : "0" + seconds;
    //             }

    //             //update the countdown's html values.
    //             thisEl.find(".days").text(days);
    //             thisEl.find(".hours").text(hours);
    //             thisEl.find(".minutes").text(minutes);
    //             thisEl.find(".seconds").text(seconds);

    //         }

    //         //run the function
    //         countdown_proc();

    //         //loop the function
    //         interval = setInterval(countdown_proc, 1000);
    //     };

    // })(jQuery);





$(document).ready(function() {
    var items = $('#header_slide .slide1');
        if(items.length > 1) {
            $("#header_slide").owlCarousel({
        items: 1,
        loop: true,
        autoplay: true,
        dots: false
    });
            
        } else {
        $("#header_slide").owlCarousel({
            items: 1,
            loop: false,
            autoplay: true,
            dots: false
            });
        }

    






    // //Provide the plugin settings
    // $("#countdown").countdown({
    //       //The countdown end date
    //       date: "1 January 2018 12:00:00",
    //       format: "on"
    //       }, 

    //       function() {
    //       // This will run when the countdown ends
    //        alert("We're Out Now");
    //        });

    // $(".notice").each(function(elem) {
    //     console.log($(this));
    //     var t = $(this).data("endtime");
    //     var $counter = $(this).find(".counter");
    //     console.log("======>", $counter);
    //     $($counter).countdown({
    //     //The countdown end date
    //     date: t,
    //     format: "on"
    //     });

    // });




    // trying with moment
    $(".notice").each(function(elem) {
        var endtime = $(this).data("endtime");
        var dayElm = $(this).find('.days');
        var hoursElm = $(this).find('.hours');
        var minutesElm = $(this).find('.minutes');
        var secondsElm = $(this).find('.seconds');

        function renderTime() {
        // get total seconds between the times
            var delta = Math.abs(new Date(endtime * 1000) - new Date()) / 1000;

            // calculate (and subtract) whole days
            var days = Math.floor(delta / 86400);
            delta -= days * 86400;

            // calculate (and subtract) whole hours
            var hours = Math.floor(delta / 3600) % 24;
            delta -= hours * 3600;

            // calculate (and subtract) whole minutes
            var minutes = Math.floor(delta / 60) % 60;
            delta -= minutes * 60;

            // what's left is seconds
            var seconds = parseInt(delta % 60);  // in theory the modulus is not required

            dayElm.text(days);
            hoursElm.text(hours);
            minutesElm.text(minutes);
            secondsElm.text(seconds);
        }

        renderTime();

        setInterval(renderTime, 1000);


        

    });

$('.kakon').owlCarousel({
    stagePadding: 50,
    loop:true,
    margin:10,
    nav:true,
    navText: ["<i class='fa fa-angle-right'></i>","<i class='fa fa-angle-left'></i>"],
    dots: false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:2
        }
    }
})

}); //end document ready


