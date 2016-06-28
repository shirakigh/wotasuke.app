$(document).ready(function () {

  $('#calendar').fullCalendar({
    axisFormat: 'H:mm',     // スロットの時間の書式
    columnFormat: {
      week: 'D[(]ddd[)]',
    },
    defaultView: 'month',
    editable: true,
    firstDay: 1,
    firstHour: 8,
    header: {
      left: 'prev,next today',
      center: 'title',
      right: 'month,agendaWeek,agendaDay',
    },
    height: 650,
    lang: 'ja',
    timeFormat: 'H:mm',       // 時間の書式
    timezone: 'Asia/Tokyo',
    ignoreTimezone: false,
    weekMode: 'variable',

    //ドラッグ可能
    selectable: true,
    selectHelper: true,
    events: $('#api-url').data('val'),

    //終日設定のときはendを日付型でセットし直す
    eventDataTransform: function　(event) {
      var copy = $.extend({}, event);
      // if (copy.allDay) {
      //   // copy.end = new Date(copy.end).toISOString();
      //   // copy.end = moment(new Date(copy.end)).format();
      // }
      // console.log(copy, event);
      // return copy;

      html  = '<tr><th>' + copy.title;
      // html += "<span class='label margin' style='background-color:" + event.color + "'>";
      // html += h($favorites->nickname);
      // html += "</span>";
      html += '</th></tr>';
      html += '<tr><td>' + moment(new Date(copy.start)).format() + '～' + moment(new Date(copy.end)).format();
      html += '</td></tr>';
      $('#events-list').append(html);

      return event;
    },

    //ドラッグ後処理
    select: function (start, end) {
      var title = prompt('イベントタイトル:');
      var eventData;
      if (title) {
        eventData = {
          title: title,
          start: start,
          end: end,
        };
        $('#calendar').fullCalendar('renderEvent', eventData, true); // stick? = true
      }

      $('#calendar').fullCalendar('unselect');
    },

    eventRender: function (event, element) {
      // html  = '<tr><th>' + event.title;
      // // html += "<span class='label margin' style='background-color:" + event.color + "'>";
      // // html += h($favorites->nickname);
      // // html += "</span>";
      // html += '</th></tr>';
      // html += '<tr><td>' + moment(new Date(event.start)).format() + '～' + moment(new Date(event.end)).format();
      // html += '</td></tr>';
      // $('#events-list').append(html);

    },

  });
});
