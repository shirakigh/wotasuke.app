<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Routing\Router;
use \DateTime;
use \DateTimeZone;

use App\View\Helper\FavoriteHelper;
use App\View\Helper\EventHelper;

class AjaxController extends AppController {

    public $helpers = ['Form'];

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

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
        // $this->autoRender = false;
        $this->response->type('json');
        $this->request->allowMethod(['get']);
        $this->loadModel('Events');
        $rangeStart = date("Y-m-d H:i:s", $this->request->query('start'));
        $rangeEnd = date("Y-m-d H:i:s", $this->request->query('end'));

        $conditions = [
            'Events.user_id' => $id,
            'OR' => [
                [   //startもendも範囲内(通常の予定)
                    ['Events.start >=' => $rangeStart],
                    ['Events.end <=' => $rangeEnd],
                ],
                [   //startが範囲前でendが範囲内
                    ['Events.start <=' => $rangeStart],
                    ['Events.end >=' => $rangeStart],
                    ['Events.end <=' => $rangeEnd],
                ],
                [   //startが範囲内でendが範囲以降
                    ['Events.start >=' => $rangeStart],
                    ['Events.start <=' => $rangeEnd],
                    ['Events.end >=' => $rangeEnd],
                ],
                [   //startが範囲以前でendが範囲以降
                    ['Events.start <=' => $rangeStart],
                    ['Events.end >=' => $rangeEnd],
                ],
            ]
        ];

        // 自分のスケジュールかどうかで処理を変える
        if ($id == $this->Auth->user('id')) {
            $linkAction = '/events/view/';
        } else {
            // 自分のイベントでなければ非公開を除外する、リンク先を閲覧専用actionにする
            $linkAction = '/events/display/';
            $conditions[] = ['Events.is_private' => 0];
        }

        $events = $this->Events->find('all',[
            'conditions' => $conditions,
            'contain' => ['Favorites'],
            'distinct' => ['Events.id'],
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
                $textcolor = null;
            } else {
                $favorites = $event->favorites;
                if (!is_null($event->favorites[0]->bgcolor)) {
                    $bgcolor = $event->favorites[0]->bgcolor;
                } else {
                    $bgcolor = null;
                }
                if (!is_null($event->favorites[0]->textcolor)) {
                    $textcolor = $event->favorites[0]->textcolor;
                } else {
                    $textcolor = null;
                }
            }

            $url = Router::url($linkAction.$event->id, true);

            $start = $event->start;
            $date = new DateTime($event->end, new DateTimeZone('UTC'));
            $date->setTimezone(new DateTimeZone('Asia/Tokyo'));
            $end = $date->format('Y-m-d\TH:i:s\Z');

            $FavH = new FavoriteHelper(new \Cake\View\View());
            $EventH = new EventHelper(new \Cake\View\View());

            $data[] = array(
                'id' => $event->id,
                'title'=>$event->title,
                'start'=> $start,
                'end' => $end,
                'range' => $event->event_range,
                'allDay' => $allday,
                'details' => $event->details,
                'place' => $event->place,
                'color' => $bgcolor,
                'textColor' => $textcolor,
                'url' => $url,
                'favorites' => $favorites,
                'FavHTML' => $FavH->showFavorite($event),
                'showIsAllday' => $EventH->showIsAllday($event),
                'showIsPrivate' => $EventH->showIsPrivate($event),
            );
        }

        $this->set('events', $data);
        $this->set('_serialize', ['events']);

    }
}
