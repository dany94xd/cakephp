<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * OptionsProfiles Controller
 *
 * @property \App\Model\Table\OptionsProfilesTable $OptionsProfiles
 *
 * @method \App\Model\Entity\OptionsProfile[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OptionsProfilesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Options', 'Profiles']
        ];
        $optionsProfiles = $this->paginate($this->OptionsProfiles);

        $this->set(compact('optionsProfiles'));
    }

    /**
     * View method
     *
     * @param string|null $id Options Profile id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $optionsProfile = $this->OptionsProfiles->get($id, [
            'contain' => ['Options', 'Profiles']
        ]);

        $this->set('optionsProfile', $optionsProfile);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $optionsProfile = $this->OptionsProfiles->newEntity();
        if ($this->request->is('post')) {
            $optionsProfile = $this->OptionsProfiles->patchEntity($optionsProfile, $this->request->getData());
            if ($this->OptionsProfiles->save($optionsProfile)) {
                $this->Flash->success(__('The options profile has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The options profile could not be saved. Please, try again.'));
        }
        $options = $this->OptionsProfiles->Options->find('list', ['limit' => 200]);
        $profiles = $this->OptionsProfiles->Profiles->find('list', ['limit' => 200]);
        $this->set(compact('optionsProfile', 'options', 'profiles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Options Profile id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $optionsProfile = $this->OptionsProfiles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $optionsProfile = $this->OptionsProfiles->patchEntity($optionsProfile, $this->request->getData());
            if ($this->OptionsProfiles->save($optionsProfile)) {
                $this->Flash->success(__('The options profile has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The options profile could not be saved. Please, try again.'));
        }
        $options = $this->OptionsProfiles->Options->find('list', ['limit' => 200]);
        $profiles = $this->OptionsProfiles->Profiles->find('list', ['limit' => 200]);
        $this->set(compact('optionsProfile', 'options', 'profiles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Options Profile id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $optionsProfile = $this->OptionsProfiles->get($id);
        if ($this->OptionsProfiles->delete($optionsProfile)) {
            $this->Flash->success(__('The options profile has been deleted.'));
        } else {
            $this->Flash->error(__('The options profile could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
