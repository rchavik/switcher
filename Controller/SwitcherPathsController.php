<?php
App::uses('SwitcherAppController', 'Switcher.Controller');
/**
 * SwitcherPaths Controller
 *
 * @property SwitcherPath $SwitcherPath
 */
class SwitcherPathsController extends SwitcherAppController {


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->SwitcherPath->recursive = 0;
		$this->set('switcherPaths', $this->paginate());
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->SwitcherPath->id = $id;
		if (!$this->SwitcherPath->exists()) {
			throw new NotFoundException(__('Invalid switcher path'));
		}
		$this->set('switcherPath', $this->SwitcherPath->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->SwitcherPath->create();
			if ($this->SwitcherPath->save($this->request->data)) {
				$this->Session->setFlash(__('The switcher path has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The switcher path could not be saved. Please, try again.'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->SwitcherPath->id = $id;
		if (!$this->SwitcherPath->exists()) {
			throw new NotFoundException(__('Invalid switcher path'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->SwitcherPath->save($this->request->data)) {
				$this->Session->setFlash(__('The switcher path has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The switcher path could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->SwitcherPath->read(null, $id);
		}
	}

/**
 * admin_delete method
 *
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->SwitcherPath->id = $id;
		if (!$this->SwitcherPath->exists()) {
			throw new NotFoundException(__('Invalid switcher path'));
		}
		if ($this->SwitcherPath->delete()) {
			$this->Session->setFlash(__('Switcher path deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Switcher path was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
