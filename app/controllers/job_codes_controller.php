<?php
class JobCodesController extends AppController {

	var $name = 'JobCodes';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->JobCode->recursive = 0;
		$this->set('jobCodes', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid JobCode.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('jobCode', $this->JobCode->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->JobCode->create();
			if ($this->JobCode->save($this->data)) {
				$this->Session->setFlash(__('The JobCode has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The JobCode could not be saved. Please, try again.', true));
			}
		}
		$projects = $this->JobCode->Project->find('list');
		$this->set(compact('projects'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid JobCode', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->JobCode->save($this->data)) {
				$this->Session->setFlash(__('The JobCode has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The JobCode could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->JobCode->read(null, $id);
		}
		$projects = $this->JobCode->Project->find('list');
		$this->set(compact('projects'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for JobCode', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->JobCode->del($id)) {
			$this->Session->setFlash(__('JobCode deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}


	function admin_index() {
		$this->JobCode->recursive = 0;
		$this->set('jobCodes', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid JobCode.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('jobCode', $this->JobCode->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->JobCode->create();
			if ($this->JobCode->save($this->data)) {
				$this->Session->setFlash(__('The JobCode has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The JobCode could not be saved. Please, try again.', true));
			}
		}
		$projects = $this->JobCode->Project->find('list');
		$this->set(compact('projects'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid JobCode', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->JobCode->save($this->data)) {
				$this->Session->setFlash(__('The JobCode has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The JobCode could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->JobCode->read(null, $id);
		}
		$projects = $this->JobCode->Project->find('list');
		$this->set(compact('projects'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for JobCode', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->JobCode->del($id)) {
			$this->Session->setFlash(__('JobCode deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>