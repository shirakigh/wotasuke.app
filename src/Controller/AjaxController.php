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
      $this->autoRender = false;
      $this->response->type('json');
      $this->request->allowMethod(['get']);
      $vars = $this->params['url'];
      $conditions = ['UNIX_TIMESTAMP(start) >=' => $vars['start'], 'UNIX_TIMESTAMP(start) <=' => $vars['end']];
      $this->loadModel('Events');
      $events = $this->Events->find('all', [
          $conditions,
          'contain' => ['Favorites'],
      ]);
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
                  'color' => $event->favorites[0]->bgcolor,
          );
      }
      echo json_encode($data);
  }
}
