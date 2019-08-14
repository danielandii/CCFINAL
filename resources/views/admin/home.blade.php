@extends('admin.templates.default')

@section('content')
    <section class="content-header">
        <h1>
          Home Admin
        </h1>
      </section>

      <section class="content">
            <div class="row">
                <div class="col-lg-4 col-xs-6">
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>{{$pending}}</h3>
                            <p>Pending Orders</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-shopping-cart"></i>
                        </div>
                        <a href="{{Route('admin.index.transaction')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-xs-6">
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>{{$success}}</h3>
                            <p>Success Orders</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-shopping-cart"></i>
                        </div>
                            <a href="{{Route('admin.index.transaction')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-xs-6">
                    <div class="small-box bg-blue">
                        <div class="inner">
                            <h3>{{$plan}}</h3>
                            <p>Package Plans</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-ios-pricetag-outline"></i>
                        </div>
                            <a href="{{Route('admin.index.plan')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-primary">
                            <div class="box-body no-padding">
                            <div id="calendar"></div>
                            </div>
                        </div>
                    </div>
                </div>
      </section>
@endsection
@push('scripts')

<script>
    $(function () {
        /* initialize the external events
        -----------------------------------------------------------------*/
        function init_events(ele) {
        ele.each(function () {
            // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
            // it doesn't need to have a start or end
            var eventObject = {
            title: $.trim($(this).text()) // use the element's text as the event title
            }

            // store the Event Object in the DOM element so we can get to it later
            $(this).data('eventObject', eventObject)

            // make the event draggable using jQuery UI
            $(this).draggable({
            zIndex        : 1070,
            revert        : true, // will cause the event to go back to its
            revertDuration: 0  //  original position after the drag
            })
        })
        }

        init_events($('#external-events div.external-event'))

        /* initialize the calendar
        -----------------------------------------------------------------*/
        //Date for the calendar events (dummy data)
        var date = new Date()
        var d    = date.getDate(),
            m    = date.getMonth(),
            y    = date.getFullYear()
        $('#calendar').fullCalendar({
        header    : {
            left  : 'prev,next today',
            center: 'title',
            right : 'month,agendaWeek,agendaDay'
        },
        buttonText: {
            today: 'Hari ini',
            month: 'Bulanan',
            week : 'Mingguan',
            day  : 'Harian'
        },
        //Random default events
        events    :[
        @foreach($events as $event)
        {
            title          : '{{$event->email}}',
            start          : '{{$event->event_date}}',
            @if($event->transaction->status == 'Baru')
            backgroundColor: '#f39c12', //yellow
            borderColor    : '#f39c12' //yellow
            @else
            backgroundColor: '#00a65a', //Success (green)
            borderColor    : '#00a65a' //Success (green)
            @endif
        },
        @endforeach
        ],
        // editable  : true,
        // droppable : true, // this allows things to be dropped onto the calendar !!!
        // drop      : function (date, allDay) { // this function is called when something is dropped

        //     // retrieve the dropped element's stored Event Object
        //     var originalEventObject = $(this).data('eventObject')

        //     // we need to copy it, so that multiple events don't have a reference to the same object
        //     var copiedEventObject = $.extend({}, originalEventObject)

        //     // assign it the date that was reported
        //     copiedEventObject.start           = date
        //     copiedEventObject.allDay          = allDay
        //     copiedEventObject.backgroundColor = $(this).css('background-color')
        //     copiedEventObject.borderColor     = $(this).css('border-color')

        //     // render the event on the calendar
        //     // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
        //     $('#calendar').fullCalendar('renderEvent', copiedEventObject, true)

        //     // is the "remove after drop" checkbox checked?
        //     if ($('#drop-remove').is(':checked')) {
        //     // if so, remove the element from the "Draggable Events" list
        //     $(this).remove()
        //     }

        // }
        })

        // /* ADDING EVENTS */
        // var currColor = '#3c8dbc' //Red by default
        // //Color chooser button
        // var colorChooser = $('#color-chooser-btn')
        // $('#color-chooser > li > a').click(function (e) {
        // e.preventDefault()
        // //Save color
        // currColor = $(this).css('color')
        // //Add color effect to button
        // $('#add-new-event').css({ 'background-color': currColor, 'border-color': currColor })
        // })
        // $('#add-new-event').click(function (e) {
        // e.preventDefault()
        // //Get value and make sure it is not null
        // var val = $('#new-event').val()
        // if (val.length == 0) {
        //     return
        // }

        // //Create events
        // var event = $('<div />')
        // event.css({
        //     'background-color': currColor,
        //     'border-color'    : currColor,
        //     'color'           : '#fff'
        // }).addClass('external-event')
        // event.html(val)
        // $('#external-events').prepend(event)

        // //Add draggable funtionality
        // init_events(event)

        // //Remove event from text input
        // $('#new-event').val('')
        // })
    })
</script>

@endpush
