$(function () {
    // Slideshow 1
    $("#slider1").responsiveSlides({
        maxwidth: 1600,
        speed: 600
    });

    // Calendar
    $('#calendar').fullCalendar({
        height: 'auto',
        events: 'hms/include/fetch-meetings.php',
        eventRender: function(event, element) {
            element.find('.fc-title').append("<br/><a href='hms/user-login.php?link=" + event.link + "' target='_blank'>Join Meeting</a>");
        }
    });

    // Show calendar popup automatically on page load
    $(window).on('load', function() {
        $("#calendar-popup").fadeIn();
        $("#calendar-overlay").fadeIn();
    });

    // Close the calendar popup
    $("#close-calendar").click(function() {
        $("#calendar-popup").fadeOut();
        $("#calendar-overlay").fadeOut();
    });
});

