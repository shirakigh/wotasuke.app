<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Utility\Hash;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('ImageProcess');
    }

    public function isAuthorized($user)
    {
        $action = $this->request->params['action'];

        // The add and index actions are always allowed.
        if (in_array($action, ['index'])) {
            return true;
        }
        // All other actions require an id.
        if (empty($this->request->params['pass'][0])) {
            return false;
        }

        if ($this->Auth->user('id') == $user['id']) {
            return true;
        }
        return parent::isAuthorized($user);
    }

    /**
     * Before Filter method
     *
     * @return type
     */
    public function beforeFilter(\Cake\Event\Event $event) {
      parent::beforeFilter($event);
      $this->Auth->allow(['add', 'logout']);
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'finder' => 'IncludeIcon'
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    /**
     * Login method
     *
     * @return type
     */
    public function login()
    {
      if($this->request->is('post')){
        $user = $this->Auth->identify();
        if($user){
            $this->Auth->setUser($user);
            // アイコン画像名をセッションに追加
            $this->_writeIconSession($user);
          return $this->redirect($this->Auth->redirectUrl());
        }
        $this->Flash->error(__('login_failed'));
      }
    }

    /**
     * LOgout Method
     *
     * @return bool
     */
    public function logout()
    {
        $this->request->session()->destroy();
        return $this->redirect($this->Auth->logout());
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'finder' => 'IncludeIcon',
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            // 画像がアップロードされたら画像の保存処理を行う
            if(!empty($this->request->data['up_img']['name'])) {
                // 画像の保存する
                $this->ImageProcess->generate($this->request, IMAGE_USER_ICON);
            }
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                // ログインユーザセッションの上書き
                $this->Auth->setUser($user->toArray());
                if(!empty($this->request->data['up_img']['name'])) {
                    // Imagesテーブルに保存
                    $result = $this->ImageProcess->saveImages($this->request->data['image'], $this->Auth->user('id'));
                }
                $this->_writeIconSession($user);

                //セッションに登録
                $this->Flash->success(__('user_added'));
                return $this->redirect([
                    'controller' => 'Events',
                    'action' => 'index'
                ]);
            } else {
                $this->Flash->error(__('could_not_be_saved'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'finder' => 'IncludeIcon',
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            // 画像がアップロードされたら画像の保存処理を行う
            if(!empty($this->request->data['up_img']['name'])) {
                // 画像を保存する
                $this->ImageProcess->generate($this->request, IMAGE_USER_ICON);
                $image = Hash::merge($this->request->data['images'][0], $this->request->data['image']);
                $this->request->data['images'][0] = $image;
            }

            $user = $this->Users->patchEntity($user, $this->request->data);
            // 新しいパスワードが入力されていたらセッターでパスワードをセット
            if (!empty($this->request->data['password_new'])) {
                $user->set('password', $this->request->data['password_new']);
            }
            if ($this->Users->save($user)) {
                $this->Auth->setUser($user->toArray());
                // アイコン画像名をセッションに追加
                $this->_writeIconSession($user);
                $this->Flash->success(__('saved'));
                return $this->redirect(['action' => 'view', $id]);
            } else {
                $this->Flash->error(__('could_not_be_saved'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('deleted'));
        } else {
            $this->Flash->error(__('could_not_be_deleted'));
        }
        return $this->redirect(['action' => 'index']);
    }

    protected function _writeIconSession($user)
    {
        if(!empty($user['image'])) {
            $this->request->session()->write('user_icon', THUMBNAIL_PATH.$user['image']['name']);
        } else if(!empty($user['images'])) {
            $this->request->session()->write('user_icon', THUMBNAIL_PATH.$user['images'][0]['name']);
        } else {
            // 画像がアップロードされていなかったらnoimage画像をセットする
            $this->request->session()->write('user_icon', THUMBNAIL_PATH.'noimage_user.png');
        }
    }
}
