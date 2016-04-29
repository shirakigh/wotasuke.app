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

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $events = $this->paginate($this->Events);

        $this->set(compact('events'));
        $this->set('_serialize', ['events']);
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
        $users = $this->Events->Users->find('list', ['limit' => 200]);
        $favorites = $this->Events->Favorites->find('list', ['limit' => 200]);
        $this->set(compact('event', 'users', 'favorites'));
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
            'contain' => ['Favorites']
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
        $users = $this->Events->Users->find('list', ['limit' => 200]);
        $favorites = $this->Events->Favorites->find('list', ['limit' => 200]);
        $this->set(compact('event', 'users', 'favorites'));
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
