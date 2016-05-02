<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Routing\Router;

class AjaxController extends AppController {

  /**
   * Feed method
   *
   * @return \Cake\Network\Response|null
   */
  public function feed($id=null)
  {
      // 今回はJSONのみを返すためViewのレンダーを無効化
      $this->layout = "";
      $this->autoRender = false;
      $this->request->allowMethod(['get']);
      $this->layout = "ajax";
      $vars = $this->params['url'];
      $conditions = ['UNIX_TIMESTAMP(start) >=' => $vars['start'], 'UNIX_TIMESTAMP(start) <=' => $vars['end']];
      $this->loadModel('Events');
      $events = $this->Events->find('all', $conditions);
      foreach($events as $event) {
          if($event->is_allday == 1) {
              $allday = true;
              $end = $event->start;
          } else {
              $allday = false;
              $end = $event->end;
          }
          $data[] = array(
                  'id' => $event->id,
                  'title'=>$event->title,
                  'start'=>$event->start,
                  'end' => $end,
                  'allDay' => $allday,
                  'url' => Router::url('/events/view/'.$event->id, true),
                  'details' => $event->details,
                  //'className' => $event->event_type->color
          );
      }
      // JSON形式で返却。errorが定義されていない場合はstatusとresultの配列になる。
      //return json_encode(compact('data'));
      //$this->set("json", json_encode($data));
      echo json_encode($data);
      //return json_encode($data);
  }

  public function testApi() {
    // 今回はJSONのみを返すためViewのレンダーを無効化
    $this->autoRender = false;
    // Ajax以外の通信の場合
    if(!$this->request->is('ajax')) {
      throw new BadRequestException();
    }
    /*  ここでDBアクセスなど何かの処理をする */
    $result = $this->User->find('list');
    // 値が入っているかを確認。
    // 値によっては(bool)でキャストしてしまうのも可
    $status = !empty($result);
    if(!$status) {
      $error = array(
        'message' => 'データがありません',
        'code' => 404
      );
    }
    // JSON形式で返却。errorが定義されていない場合はstatusとresultの配列になる。
    return json_encode(compact('status', 'result', 'error'));
  }
}
