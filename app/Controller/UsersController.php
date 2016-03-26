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
                $this->set('login_success',true);
            }else{
                $this->set('login_error',true);
            }
        }
    }
    public function register(){
        $this->layout = 'default2';
    }
}