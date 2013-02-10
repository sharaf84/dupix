<link rel="stylesheet" href="css/front/eventCalendar.css">

<!-- Theme CSS file: it makes eventCalendar nicer -->
<link rel="stylesheet" href="css/front/eventCalendar_theme_responsive.css" />  
<div id="contain">
    <div id="container">
        <div id="eventCalendarScroll"></div>
        <script>
                $(document).ready(function() {
                        $("#eventCalendarScroll").eventCalendar({
                                eventsjson: 'events.json',
                                eventsScrollable: true
                        });
                });
        </script>

    </div>
</div>
<script src="js/front/jquery.eventCalendar.js" type="text/javascript"></script>