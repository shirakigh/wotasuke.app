<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Routing\Router;
use \DateTime;
use \DateTimeZone;



class AjaxController extends AppController {

    public function isAuthorized($user)
    {
        // とりあえず全て通すようにする
        $this->loadModel('Users');
        return true;
    }
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
        $this->loadModel('Events');
        $events = $this->Events->find('all',[
            'conditions' => [
                'Events.user_id' => $id,
                'OR' => [
                    [   //startもendも範囲内(通常の予定)
                        ['Events.start >=' => $this->request->query('start')],
                        ['Events.end <=' => $this->request->query('end')],
                    ],
                    [   //startが範囲前でendが範囲内
                        ['Events.start <=' => $this->request->query('start')],
                        ['Events.end >=' => $this->request->query('start')],
                        ['Events.end <=' => $this->request->query('end')],
                    ],
                    [   //startが範囲内でendが範囲以降
                        ['Events.start >=' => $this->request->query('start')],
                        ['Events.start <=' => $this->request->query('end')],
                        ['Events.end >=' => $this->request->query('end')],
                    ],
                    [   //startが範囲以前でendが範囲以降
                        ['Events.start <=' => $this->request->query('start')],
                        ['Events.end >=' => $this->request->query('end')],
                    ],
                ]
            ],
            'contain' => ['Favorites'],
        ]);
        foreach($events as $event) {
            // 終日フラグの設定
            if($event->is_allday == 1) {
                $allday = true;
            } else {
                $allday = false;
            }

            // 推しにイメージカラーが設定されていたら背景色にする
            if(empty($event->favorites[0])) {
                $bgcolor = null;
            } else {
                if (!is_null($event->favorites[0]->bgcolor)) {
                    $bgcolor = $event->favorites[0]->bgcolor;
                } else {
                    $bgcolor = null;
                }
            }

            $start = $event->start;
            $date = new DateTime($event->end, new DateTimeZone('UTC'));
            $date->setTimezone(new DateTimeZone('Asia/Tokyo'));
            $end = $date->format('Y-m-d\TH:i:s\Z');

            $data[] = array(
                'id' => $event->id,
                'title'=>$event->title,
                'start'=> $start,
                'end' => $end,
                'allDay' => $allday,
                'url' => Router::url('/events/view/'.$event->id, true),
                'details' => $event->details,
                'color' => $bgcolor,
            );
        }
    echo json_encode($data);
    }
}
