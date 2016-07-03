// $(document).ready(function () {
function generateCalendar($scope, $sce) {
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

    // events: $('#api-url').data('val'),
    events: function (start, end, timezone, callback) {
      $.ajax({
        url: $('#api-url').data('val'),
        dataType: 'json',
        data: {
          // our hypothetical feed requires UNIX timestamps
          start: start.unix(),
          end: end.unix(),
        },
      }).fail(function () {
        // データが取得できなかった場合はカレンダー下の一覧もクリアする
        $scope.events =  {};
        $scope.$apply();
      }).done(function (doc) {
        events = $(doc).attr('events');
        // カレンダー下部に表示用
        $.each(events,
          function(index, row) {
            events[index]['FavHTML'] = $sce.trustAsHtml(row['FavHTML']);
        });

        $scope.events =  events;
        $scope.$apply();
        callback(events);
      });
    },

    //終日設定のときはendを日付型でセットし直す
    // eventDataTransform: function　(event) {
    //   var copy = $.extend({}, event);
    //
    //   // if (copy.allDay) {
    //   //   // copy.end = new Date(copy.end).toISOString();
    //   //   // copy.end = moment(new Date(copy.end)).format();
    //   // }
    //   // console.log(copy, event);
    //   // return copy;
    //
    //   html  = '<tr><th>' + copy.title;
    //   // html += "<span class='label margin' style='background-color:" + event.color + "'>";
    //   // html += h($favorites->nickname);
    //   // html += "</span>";
    //   html += '</th></tr>';
    //   html += '<tr><td>' + moment(new Date(copy.start)).format() + '～' + moment(new Date(copy.end)).format();
    //   html += '</td></tr>';
    //   $('#events-list').append(html).trigger('create');
    //
    //   return event;
    // },

    //ドラッグ後処理
    // select: function (start, end) {
    //   var title = prompt('イベントタイトル:');
    //   var eventData;
    //   if (title) {
    //     eventData = {
    //       title: title,
    //       start: start,
    //       end: end,
    //     };
    //     $('#calendar').fullCalendar('renderEvent', eventData, true); // stick? = true
    //   }
    //
    //   $('#calendar').fullCalendar('unselect');
    // },

  });   //-----fullCalendar

}

var app = angular.module('myApp', []);
app.controller('eventCtrl', function ($scope, $sce) {
  generateCalendar($scope, $sce);
});

// });
