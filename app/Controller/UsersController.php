<?php
class UsersController extends AppController {

    public function index() {
        $this->layout = 'default2';
        if($this->request->is('post')){
            $this->loadModel('User');
            $user = $this->User->find('first',
                array('conditions'=>array(
                'password'  => $this->request->data['User']['password'],
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
    public function register(){
        $this->layout = 'default2';
        if($this->request->is('post')){
//            debug($this->request->data);exit;
            $this->loadModel('User');
            $this->request->data['User']['role'] = 'User';
            if($this->User->save($this->request->data)){
                $this->request->data['User']['id'] = $this->User->id;
                $this->Session->write('User', $this->request->data['User']);
                $this->redirect(array('controller'=>'links','action'=>'index','admin'=>true));
            }else{
                $this->Session->setFlash($this->User->validationErrors,'error',array(),'error');
            }
        }
    }
}