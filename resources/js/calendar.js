import '@fullcalendar/core/vdom';
import { Calendar } from "@fullcalendar/core";
import interactionPlugin from "@fullcalendar/interaction";
import dayGridPlugin from "@fullcalendar/daygrid";
import axios from 'axios';

var calendarEl = document.getElementById("calendar");

var calendar = new Calendar(calendarEl, {
    plugins: [dayGridPlugin],
    initialView: "dayGridMonth",
    events: {
        url: "/reserve",
        extraParams: function () {
            return {
                dynamic_value: Math.random()
              };
        },
      },
    headerToolbar: {
        left: "prev,next today",
        center: "title",
        right: "",
    },
    locale: "ja",
    buttonText: {
        today: '今月'
    },
    
    
});
calendar.render();
