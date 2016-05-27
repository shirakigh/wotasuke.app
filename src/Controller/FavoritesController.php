<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Favorites Controller
 *
 * @property \App\Model\Table\FavoritesTable $Favorites
 */
class FavoritesController extends AppController
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
        $favorite = $this->Favorites->get($id);
        if ($favorite->user_id == $user['id']) {
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
        $this->paginate = [
            'contain' => ['Users'],
            'conditions' => [
                'Favorites.user_id' => $this->Auth->user('id'),
            ]
        ];
        $favorites = $this->paginate($this->Favorites);

        $this->set(compact('favorites'));
        $this->set('_serialize', ['favorites']);
    }

    /**
     * View method
     *
     * @param string|null $id Favorite id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $favorite = $this->Favorites->get($id, [
            'contain' => ['Users', 'Events']
        ]);

        $this->set('favorite', $favorite);
        $this->set('_serialize', ['favorite']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $favorite = $this->Favorites->newEntity();
        if ($this->request->is('post')) {
            $favorite = $this->Favorites->patchEntity($favorite, $this->request->data);
            $favorite->user_id = $this->Auth->user('id');
            if ($this->Favorites->save($favorite)) {
                $this->Flash->success(__('favorite_saved'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('could_not_be_saved'));
            }
        }
        $users = $this->Favorites->Users->find('list', ['limit' => 200]);
        // $events = $this->Favorites->Events->find('list', ['limit' => 200]);
        // $this->set(compact('favorite', 'events'));
        $this->set(compact('favorite'));
        $this->set('_serialize', ['favorite']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Favorite id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $favorite = $this->Favorites->get($id, [
            'contain' => ['Events']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $favorite = $this->Favorites->patchEntity($favorite, $this->request->data);
            if ($this->Favorites->save($favorite)) {
                $this->Flash->success(__('saved'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('could_not_be_saved'));
            }
        }
        $users = $this->Favorites->Users->find('list', ['limit' => 200]);
        $events = $this->Favorites->Events->find('list', ['limit' => 200]);
        $this->set(compact('favorite', 'users', 'events'));
        $this->set('_serialize', ['favorite']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Favorite id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $favorite = $this->Favorites->get($id);
        if ($this->Favorites->delete($favorite)) {
            $this->Flash->success(__('favorite_deleted'));
        } else {
            $this->Flash->error(__('could_not_be_deleted'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
