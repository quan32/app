<?php
class PostsController extends AppController{
	public $helpers = array('Html', 'Form', 'Session');
	public $components = array('Session');

	public function index(){
		$this->set('posts', $this->Post->find('all'));
	}

	public function view($id = null){
		if(!$id)
			throw new NotFoundException(__('Invalid post'));

		$post = $this->Post->findById($id);
		if(!$post)
			throw new NotFoundException(__('Invalid post'));
		$this->set('post',$post);
	}

	public function add(){
		if($this->request->is('post')){
			$this->request->data['Post']['user_id'] = $this->Auth->user('id');
			$this->Post->create();
			if($this->Post->save($this->request->data)){
				$this->Session->setFlash(__('Your post has been saved.'));
				return $this->redirect(array('action' => 'index'));
			}
			$this->Session->setFlash(__('Unable to add your post'));
		}
	}

	public function edit($id = null){
		if(!$id)
			throw new NotFoundException(__('Invalid post'));

		$post = $this->Post->findById($id);
		if(!$post)
			throw new NotFoundException(__('Invalid post'));
		if($this->request->is(array('post', 'put'))){
			if($this->Post->save($this->request->data)){
				$this->Session->setFlash(__('Your post has been updated'));
				return $this->redirect(array('action' => 'index'));
			}
			$this->Session->setFlash(__('Unable to update your post'));
		}
		
		if(!$this->request->data){
			$this->request->data=$post;
		}
			
	}

	public function delete($id = null){
		if($this->request->is('get'))
			throw new MethodNotAllowedException();
		if($this->Post->delete($id)){
			$this->Session->setFlash(
				__('The post has been deleted.'));
			return $this->redirect(array('action' => 'index'));
		}
			
	}

	public function isAuthorized($user){
		//All registered users can add posts

		if($this->action === 'index' || $this->action === 'add' || 
			$this->action === 'view'){
			return true;
		}

		//The owner of a post can edit and delete it
		if(in_array($this->action, array('edit', 'delete'))){
			$postId = $this->request->params['pass'][0];
			if($this->Post->isOwnedBy($postId, $user['id']))
				return true;
			
		}

		$this->Session->setFlash(__('You have not privileges'));
		return false;

	}














}

?>