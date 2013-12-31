<?php
class ThreadsController extends AppController{
	public $helpers = array('Html', 'Form', 'Session');
	public $components = array('Session');

	public function index(){
		$this->set('threads', $this->Thread->find('all'));
	}

	public function view($id = null){
		if(!$id)
			throw new NotFoundException(__('Invalid thread'));

		$thread = $this->Thread->findById($id);
		if(!$thread)
			throw new NotFoundException(__('Invalid thread'));
		$this->set('thread',$thread);
	}

	public function add(){
		if($this->request->is('post')){
			$this->request->data['Thread']['user_id'] = $this->Auth->user('id');
			$this->Thread->create();
			if($this->Thread->save($this->request->data)){
				$this->Session->setFlash(__('Your thread has been saved.'));
				return $this->redirect(array('action' => 'index'));
			}
			$this->Session->setFlash(__('Unable to add your thread'));
		}
	}

	public function edit($id = null){
		if(!$id)
			throw new NotFoundException(__('Invalid thread'));

		$thread = $this->Thread->findById($id);
		if(!$thread)
			throw new NotFoundException(__('Invalid thread'));
		if($this->request->is(array('post', 'put'))){
			if($this->Thread->save($this->request->data)){
				$this->Session->setFlash(__('Your thread has been updated'));
				return $this->redirect(array('action' => 'index'));
			}
			$this->Session->setFlash(__('Unable to update your thread'));
		}
		
		if(!$this->request->data){
			$this->request->data=$thread;
		}
			
	}

	public function delete($id = null){
		if($this->request->is('get'))
			throw new MethodNotAllowedException();
		if($this->Thread->delete($id)){
			$this->Session->setFlash(
				__('The thread has been deleted.'));
			return $this->redirect(array('action' => 'index'));
		}
			
	}

	public function isAuthorized($user){
		//All registered users can add posts

		if($this->action === 'index' || $this->action === 'add' || 
			$this->action === 'view'){
			return true;
		}

		//The owner of a thread can edit and delete it
		if(in_array($this->action, array('edit', 'delete'))){
			$threadId = $this->request->params['pass'][0];
			if($this->Thread->isOwnedBy($threadId, $user['id']))
				return true;
			
		}

		$this->Session->setFlash(__('You have not privileges'));
		return false;

	}

}

?>