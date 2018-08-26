<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Options Controller
 *
 * @property \App\Model\Table\OptionsTable $Options
 *
 * @method \App\Model\Entity\Option[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OptionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $options = $this->paginate($this->Options);

        $this->set(compact('options'));
    }

    /**
     * View method
     *
     * @param string|null $id Option id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $option = $this->Options->get($id, [
            'contain' => ['Profiles']
        ]);

        $this->set('option', $option);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $option = $this->Options->newEntity();
        if ($this->request->is('post')) {
            $option = $this->Options->patchEntity($option, $this->request->getData());
            if ($this->Options->save($option)) {
                $this->Flash->success(__('The option has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The option could not be saved. Please, try again.'));
        }
        $profiles = $this->Options->Profiles->find('list', ['limit' => 200]);
        $this->set(compact('option', 'profiles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Option id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $option = $this->Options->get($id, [
            'contain' => ['Profiles']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $option = $this->Options->patchEntity($option, $this->request->getData());
            if ($this->Options->save($option)) {
                $this->Flash->success(__('The option has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The option could not be saved. Please, try again.'));
        }
        $profiles = $this->Options->Profiles->find('list', ['limit' => 200]);
        $this->set(compact('option', 'profiles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Option id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $option = $this->Options->get($id);
        if ($this->Options->delete($option)) {
            $this->Flash->success(__('The option has been deleted.'));
        } else {
            $this->Flash->error(__('The option could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
