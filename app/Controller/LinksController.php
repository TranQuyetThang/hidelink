<?php
class LinksController extends AppController {

    public $components = array(
        'Search.Prg'
    );

    public function beforeFilter()
    {
        parent::beforeFilter();
    }

    public function admin_index()
    {
        $this->Prg->commonProcess();

        $parsedConditions = array();
        if (!empty($this->passedArgs)) {
            $parsedConditions = $this->Link->parseCriteria($this->passedArgs);
        }

        $this->paginate = array(
            'Link' => array(
                'order' => array('Link.id' => 'DESC'),
                'conditions' => $parsedConditions,
                'limit' => 2
            )
        );
        $links = $this->paginate('Link');

        $this->set(compact('links'));
    }

    public function admin_add($id = null)
    {
        if ($this->request->is('post') || $this->request->is('put')) {
            $this->Link->create();
            $userId = 0;
//            if($this->Auth->loggedIn()){
//                $userId = $this->Auth->user('id');
//            }
            $this->request->data['Link']['user_id'] = $userId;
            if ($this->Link->save($this->request->data)) {
                $this->Session->setFlash('The link has been saved', 'success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('The link could not be saved. Please, try again.', 'error');
            }
        }
        if (!empty($id)) {
            $this->request->data = $this->Link->findById($id);
        }

        $this->render('admin_add');
    }

    public function admin_edit($id = null)
    {
        if (!$this->Link->exists($id)) {
            throw new NotFoundException('Invalid link');
        }
        $this->admin_add($id);
    }

    public function admin_delete($id = null)
    {
        $this->Link->id = $id;
        if (!$this->Link->exists()) {
            throw new NotFoundException('Invalid product');
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Link->delete()) {
            $this->Session->setFlash('Link deleted', 'success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash('Link was not deleted', 'error');
        $this->redirect(array('action' => 'index'));
    }
}