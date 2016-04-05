<?php
class UsersController extends AppController {

    public function beforeFilter()
    {
        parent::beforeFilter();
        if (!empty($this->request->params['prefix']) && $this->request->params['prefix'] == 'admin') {
            if( $this->Session->read('User') == null)
                $this->redirect($this->referer(array('controller' => 'users' ,'action' => 'index', 'admin' => false)));
        }
    }

    public function index() {
        $this->layout = 'default2';
        if($this->request->is('post')){
            $this->loadModel('User');
            $user = $this->User->find('first',
                array('conditions'=>array(
                'password'  => md5($this->request->data['User']['password']),
                'username'  => $this->request->data['User']['username']
            )));
            if(!empty($user)){
                $this->Session->write('User',$user['User']);
                $this->redirect(array('controller'=>'links','action'=>'index','admin'=>true));
                $this->set('login_success',true);
            }else{
                $this->set('login_error',true);
            }
        }
    }
    public function admin_register(){
        $this->layout = 'default2';
        if($this->request->is('post')){
            $this->loadModel('User');
            $this->request->data['User']['role'] = 'Admin';
            $this->request->data['User']['password'] = md5($this->request->data['User']['password']);
            $this->request->data['User']['repassword'] = md5($this->request->data['User']['repassword']);
            if($this->request->data['User']['password'] != $this->request->data['User']['repassword']){
                $this->Session->setFlash('xác nhận password không đúng');
                $this->redirect(array('controller'=>'links','action'=>'index','admin'=>true));
            }

            if($this->User->save($this->request->data)){
                $this->request->data['User']['id'] = $this->User->id;
                $this->Session->write('User', $this->request->data['User']);
                $this->redirect(array('controller'=>'links','action'=>'index','admin'=>true));
            }else{
                $this->Session->setFlash($this->User->validationErrors,'error',array(),'error');
            }
        }
    }

    public function admin_resetPass(){
        $this->layout = 'default2';
        debug($this->request->data);
    }

    public function logout(){
        if( $this->Session->read('User') )
            $this->Session->destroy();

        $this->redirect(array('action' => 'index'));
    }
}