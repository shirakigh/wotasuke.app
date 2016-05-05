$(document).ready(function () {
  $('#calendar').fullCalendar({
    axisFormat: 'H:mm',     // スロットの時間の書式
    columnFormat: {
      week: 'M/D[(]ddd[)]',
    },
    defaultView: 'month',
    editable: true,
    events: '/ajax/feed/',
    firstDay: 1,
    firstHour: 8,
    header: {
      left: 'prev,next today',
      center: 'title',
      right: 'month,agendaWeek,agendaDay',
    },
    lang: 'ja',
    timeFormat: 'H:mm',       // 時間の書式
    weekMode: 'variable',

    //ドラッグ可能
    selectable:true,
    selectHelper:true,

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

  });
});
