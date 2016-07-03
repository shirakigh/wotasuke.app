<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Events Controller
 *
 * @property \App\Model\Table\EventsTable $Events
 */
class EventsController extends AppController
{

    public function isAuthorized($user)
    {
        $action = $this->request->params['action'];

        // The add and index actions are always allowed.
        if (in_array($action, ['index', 'add'])) {
            return true;
        }
        // All other actions require an id.
        if (empty($this->request->params['pass'][0])) {
            return false;
        }

        // Check that the bookmark belongs to the current user.
        $id = $this->request->params['pass'][0];
        $event = $this->Events->get($id);
        if ($event->user_id == $user['id']) {
            return true;
        }
        return parent::isAuthorized($user);
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        // $this->paginate = [
        //     'contain' => ['Users', 'Favorites'],
        //     'conditions' => [
        //         'Events.user_id' => $this->Auth->user('id'),
        //     ],
        //     'order' => [
        //         'Events.start' => 'asc'
        //     ],
        //     'limit' => 10,
        // ];
        // $events = $this->paginate($this->Events);
        //
        // $this->set(compact('events'));
        // $this->set('_serialize', ['events']);
    }

    /**
     * Display method
     *
     * @param string|null $id Event id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function display($id = null)
    {
        $event = $this->Events->get($id, [
            'contain' => ['Users', 'Favorites']
        ]);

        $this->set('event', $event);
        $this->set('_serialize', ['event']);
    }

    /**
     * View method
     *
     * @param string|null $id Event id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $event = $this->Events->get($id, [
            'contain' => ['Users', 'Favorites']
        ]);

        $this->set('event', $event);
        $this->set('_serialize', ['event']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $event = $this->Events->newEntity();
        if ($this->request->is('post')) {
            $event = $this->Events->patchEntity($event, $this->request->data);
            $event->user_id = $this->Auth->user('id');
            if ($this->Events->save($event)) {
                $this->Flash->success(__('event_saved'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('could_not_be_saved'));
            }
        }
        //$users = $this->Events->Users->find('list', ['limit' => 200]);
        $favorites = $this->Events->Favorites->find('list', [
            'limit' => 200,
            'conditions' => [
                'Favorites.user_id' => $this->Auth->user('id'),
            ],
        ]);
        $this->set(compact('event', 'favorites'));
        $this->set('_serialize', ['event']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Event id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $event = $this->Events->get($id, [
            'contain' => ['Users', 'Favorites']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $event = $this->Events->patchEntity($event, $this->request->data);
            if ($this->Events->save($event)) {
                $this->Flash->success(__('event_saved'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('could_not_be_saved'));
            }
        }
        // $favorites = $this->Events->Favorites->find('list', ['limit' => 200]);
        $favorites = $this->Events->Favorites->find('list', [
            'limit' => 200,
            'conditions' => [
                'Favorites.user_id' => $this->Auth->user('id'),
            ],
        ]);
        $this->set(compact('event', 'favorites'));
        $this->set('_serialize', ['event']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Event id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $event = $this->Events->get($id);
        if ($this->Events->delete($event)) {
            $this->Flash->success(__('deleted'));
        } else {
            $this->Flash->error(__('could_not_be_deleted'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
