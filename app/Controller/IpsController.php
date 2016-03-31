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

        $title = 'Quản lý link';
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

    // public function admin_publish($id = null)
    // {
    //     if (!$id || !$link = $this->Link->findById($id)) {
    //         throw new NotFoundException('Không tìm thấy bài viết này');
    //     }

    //     $this->Link->id = $id;
    //     if ($this->Link->saveField('status', 1, array('callbacks' => false))) {
    //         $this->Session->setFlash('Đã đăng bài viết <strong>'.$link['Link']['title'].'</strong>',
    //             'success');
    //     } else {
    //         $this->Session->setFlash('Có lỗi xảy ra');
    //     }

    //     $this->redirect($this->referer(array('action' => 'index'), true));
    // }

    // public function admin_unpublish($id = null)
    // {
    //     if (!$id || !$link = $this->Link->findById($id)) {
    //         throw new NotFoundException('Không tìm thấy bài viết này');
    //     }

    //     $this->Link->id = $id;
    //     if ($this->Link->saveField('status', 0 , array('callbacks' => false))) {
    //         $this->Session->setFlash('Đã đăng bài viết <strong>'.$link['Link']['title'].'</strong>',
    //             'success');
    //     } else {
    //         $this->Session->setFlash('Có lỗi xảy ra');
    //     }

    //     $this->redirect($this->referer(array('action' => 'index'), true));
    // }

    // public function getLink(){
    //     //no ko find thay 
    //     if(empty($this->request->params['slug']))
    //         throw new NotFoundException('Sai link rồi');

    //     $url = $this->request->params['slug'];
    //     $link = $this->Link->find('first', array(
    //         'conditions' => array(
    //             'Link.slug' => $url
    //         )
    //     ));
        
    //     if(empty($link))
    //     {
    //         throw new NotFoundException('Không tìm thấy link phù hợp');
    //     }
    //     else     
    //     {
    //         if($link['Link']['status']){
    //             // $this->redirect('http://www.example.com');
    //             $this->redirect($link['Link']['url']);
    //         }
    //         $title = 'Quản lý link';
    //         $counter = $link['Link']['total_view']+1;
    //         $this->Link->id = $link['Link']['id'];
    //         $this->Link->saveField('total_view', $counter);
    //     }
    //     $this->layout= false;
    //     $this->set(compact('link','title'));
    // }
}