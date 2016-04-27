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

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
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
            'contain' => ['Events', 'Users']
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
            if ($this->Favorites->save($favorite)) {
                $this->Flash->success(__('The favorite has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The favorite could not be saved. Please, try again.'));
            }
        }
        $events = $this->Favorites->Events->find('list', ['limit' => 200]);
        $users = $this->Favorites->Users->find('list', ['limit' => 200]);
        $this->set(compact('favorite', 'events', 'users'));
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
            'contain' => ['Events', 'Users']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $favorite = $this->Favorites->patchEntity($favorite, $this->request->data);
            if ($this->Favorites->save($favorite)) {
                $this->Flash->success(__('The favorite has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The favorite could not be saved. Please, try again.'));
            }
        }
        $events = $this->Favorites->Events->find('list', ['limit' => 200]);
        $users = $this->Favorites->Users->find('list', ['limit' => 200]);
        $this->set(compact('favorite', 'events', 'users'));
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
            $this->Flash->success(__('The favorite has been deleted.'));
        } else {
            $this->Flash->error(__('The favorite could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
