<?php
class LinksController extends AppController {

    public $uses = array();

    public $components = array(
        'Search.Prg'
    );

    public $filterArgs = array(
        'status' => array('type' => 'value', 'field' => 'status'),
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
            'Link' => array(
                'order' => array('Link.id' => 'DESC'),
                'conditions' => $parsedConditions,
                'limit' => 10
            )
        );
        $links = $this->paginate('Link');

        $title = 'Quản lý link';
        $this->set(compact('links','title'));
    }

    public function admin_add($id = null)
    {
        if ($this->request->is('post') || $this->request->is('put')) {

            $this->Link->create();
            $userId = 0;
            if( $this->Session->read('User')['id'] != null){
                $userId = $this->Session->read('User')['id'];
            }
            $this->request->data['Link']['user_id'] = $userId;

            if(empty($this->request->data['Link']['slug']))
            {    
                $this->request->data['Link']['slug'] = $this->Link->generateLink();
            }
            if(empty($this->request->data['Link']['total_view']))
            {
                $this->request->data['Link']['total_view'] = 0;
            }
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

        $this->loadModel('Domain');
        $domains = $this->Domain->find('list', array(
            'conditions' => array(
                'Domain.status' => true,
            ),
            'fields' => array('Domain.domain','Domain.domain')
        ));

        $this->set(compact('domains'));
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
        // $this->request->onlyAllow('post', 'delete');
        if ($this->Link->delete()) {
            $this->Session->setFlash('Link deleted', 'success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash('Link was not deleted', 'error');
        $this->redirect(array('action' => 'index'));
    }

    public function admin_publish($id = null)
    {
        if (!$id || !$link = $this->Link->findById($id)) {
            throw new NotFoundException('Không tìm thấy bài viết này');
        }

        $this->Link->id = $id;
        if ($this->Link->saveField('status', 1, array('callbacks' => false))) {
            $this->Session->setFlash('Đã đăng bài viết <strong>'.$link['Link']['title'].'</strong>',
                'success');
        } else {
            $this->Session->setFlash('Có lỗi xảy ra');
        }

        $this->redirect($this->referer(array('action' => 'index'), true));
    }

    public function admin_unpublish($id = null)
    {
        if (!$id || !$link = $this->Link->findById($id)) {
            throw new NotFoundException('Không tìm thấy bài viết này');
        }

        $this->Link->id = $id;
        if ($this->Link->saveField('status', 0 , array('callbacks' => false))) {
            $this->Session->setFlash('Đã đăng bài viết <strong>'.$link['Link']['title'].'</strong>',
                'success');
        } else {
            $this->Session->setFlash('Có lỗi xảy ra');
        }

        $this->redirect($this->referer(array('action' => 'index'), true));
    }

    public function getLink(){
        //no ko find thay 
        if(empty($this->request->params['slug']))
            throw new NotFoundException('Sai link rồi');

        $url = $this->request->params['slug'];
        $link = $this->Link->find('first', array(
            'conditions' => array(
                'Link.slug' => $url
            )
        ));
        
        if(empty($link))
        {
            throw new NotFoundException('Không tìm thấy link phù hợp');
        }
        else     
        {
            $this->loadModel('Ip');
            $all = $this->Ip->find('list', array(
                'fields' => array('ip')
            ));

            $counter = $link['Link']['total_view']+1;
            $this->Link->id = $link['Link']['id'];
            $this->Link->saveField('total_view', $counter);

            # not redirct by range ip
            $fileIp = fopen("range_ip.txt", "r");
            while(!feof($fileIp)){
                $line = fgets($fileIp);
                $checkIp = $this->Link->ipInRange($this->request->clientIp(),$line);
                if($checkIp) goto flag_end;
            }
            fclose($fileIp);

            # redirct by status
            if($link['Link']['status'] == 0 && !in_array($this->request->clientIp(), $all)){
                // $this->redirect('http://www.example.com');
                $this->redirect($link['Link']['url']);
            }
        }

        flag_end :
        $this->layout= false;
        $this->set(compact('link','title'));
    }


    public function admin_deleteAll()
    {
        if ($this->Link->deleteAll('1=1')) {
            $this->Session->setFlash('Ip deleted', 'success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash('Ip was not deleted', 'error');
        $this->redirect(array('action' => 'index'));
    }
}