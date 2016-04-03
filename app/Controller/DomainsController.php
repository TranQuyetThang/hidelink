<?php
class DomainsController extends AppController {

    public $uses = array();

    public $components = array(
        'Search.Prg'
    );

    public function beforeFilter()
    {
        parent::beforeFilter();
        if (!empty($this->request->params['prefix']) && $this->request->params['prefix'] == 'admin') {
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
            'Domain' => array(
                'limit' => 20
            )
        );

        $domains = $this->paginate('Domain');

        $title = 'Quản lý Domain';
        $this->set(compact('domains','title'));
    }

    public function admin_add($id = null)
    {
        if ($this->request->is('post') || $this->request->is('put')) {

            $this->Domain->create();
            if ($this->Domain->save($this->request->data)) {
                $this->Session->setFlash('The domain has been saved', 'success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('The domain could not be saved. Please, try again.', 'error');
            }
        }
        if (!empty($id)) {
            $this->request->data = $this->Domain->findById($id);
        }

        $this->render('admin_add');
    }

    public function admin_edit($id = null)
    {
        if (!$this->Domain->exists($id)) {
            throw new NotFoundException('Invalid domain');
        }
        $this->admin_add($id);
    }

    public function admin_delete($id = null)
    {
        $this->Domain->id = $id;
        if (!$this->Domain->exists()) {
            throw new NotFoundException('Invalid product');
        }
        // $this->request->onlyAllow('post', 'delete');
        if ($this->Domain->delete()) {
            $this->Session->setFlash('domain deleted', 'success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash('domain was not deleted', 'error');
        $this->redirect(array('action' => 'index'));
    }
}