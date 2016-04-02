<?php
class IpsController extends AppController {

    public $uses = array();

    public $components = array(
        'Search.Prg'
    );

    public $filterArgs = array(
        // 'status' => array('type' => 'value', 'field' => 'status'),
    );

    public function beforeFilter()
    {
        parent::beforeFilter();
        if (!empty($this->request->params['prefix']) && $this->request->params['prefix'] == 'admin') {
            // $this->Link->enablePublishable('find', false);

            if( $this->Session->read('User') == null)
                $this->redirect($this->referer(array('controller' => 'users' ,'action' => 'index', 'admin' => false)));
        }
    }

    public function admin_index()
    {
        $this->Prg->commonProcess();

        $parsedConditions = array();
        if (!empty($this->passedArgs)) {
//            $parsedConditions = $this->Link->parseCriteria($this->passedArgs);
        }

        $this->paginate = array(
            'Ip' => array(
                // 'conditions' => $parsedConditions,   
                'limit' => 5
            )
        );

        $ips = $this->paginate('Ip');

        $title = 'Quản lý IP';
        $this->set(compact('ips','title'));
    }

    public function admin_add($id = null)
    {
        if ($this->request->is('post') || $this->request->is('put')) {

            $this->Ip->create();
            if ($this->Ip->save($this->request->data)) {
                $this->Session->setFlash('The link has been saved', 'success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('The link could not be saved. Please, try again.', 'error');
            }
        }
        if (!empty($id)) {
            $this->request->data = $this->Ip->findById($id);
        }

        $this->render('admin_add');
    }

    public function admin_edit($id = null)
    {
        if (!$this->Ip->exists($id)) {
            throw new NotFoundException('Invalid link');
        }
        $this->admin_add($id);
    }

    public function admin_delete($id = null)
    {
        $this->Ip->id = $id;
        if (!$this->Ip->exists()) {
            throw new NotFoundException('Invalid product');
        }
        // $this->request->onlyAllow('post', 'delete');
        if ($this->Ip->delete()) {
            $this->Session->setFlash('Ip deleted', 'success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash('Ip was not deleted', 'error');
        $this->redirect(array('action' => 'index'));
    }
}