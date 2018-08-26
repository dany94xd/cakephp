<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
   public function index()
    {
        $this->paginate = [
            'contain' => ['People', 'Profiles']
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }


    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['People', 'Profiles']
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $people = $this->Users->People->find('list', ['limit' => 200]);
        $profiles = $this->Users->Profiles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'people', 'profiles'));
        $this->set('_serialize', ['user']);

    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $people = $this->Users->People->find('list', ['limit' => 200]);
        $profiles = $this->Users->Profiles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'people', 'profiles'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

 public function login(){

    if($this->request->is('post')){
    $user = $this->Auth->identify();
    if($user){
    $this->Auth->setUser($user);

    if($user['profile_id']===1){
    return $this->redirect(['controller' => 'pages', 'action' => 'pag_admin' ]); ///menus de perfiles
    }
    if($user['profile_id']===2){
    return $this->redirect(['controller' => 'pages', 'action' => 'pag-asistente' ]);
    }
    if($user['profile_id']===3){
    return $this->redirect(['controller' => 'pages', 'action' => 'pag-cliente' ]);
    }
    }
    }
    }

    public function logout(){
    $this->Flash->success('Cierre de sesion correcto');
    return $this->redirect($this->Auth->logout());
        }


}
