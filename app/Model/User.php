<?php
/**
 * Application model for CakePHP.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('AppModel', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class User extends AppModel {

    public $useTable = 'users';
    public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'required' => true, 'allowEmpty' => false,
                'message' => 'Bạn chưa điền tên đăng nhập.'),
            'alpha' => array(
                'rule' => '/^[a-z0-9\._\p{M}\p{L}p{N}]*$/iu', // /^[a-z0-9\p{L}p{N}]*$/iu support unicode character, /^[a-z\d\._]*$/i dont' support
                'message' => 'Tên đăng nhập (username) viết liền và chỉ gồm chữ số và chữ cái.'),
            'unique_username' => array(
                'rule'=>array('isUnique'),
                'message' => 'Tên đăng nhập này đã được sử dụng.'),
            'username_min' => array(
                'rule' => array('minLength', '5'),
                'message' => 'Tên đăng nhập phải ít nhất 5 kí tự.'),
            'maxLength' => array(
                'rule'    => array('maxLength', 30),
                'message' => 'Tên đăng nhập không được dài quá 20 kí tự.'
            )
        ),
        'email' => array(
            'isValid' => array(
                'rule' => array('email', true),
                'required' => true,
                'message' => 'Email này không hợp lệ.'),
            'isUnique' => array(
                'rule' => array('isUnique', 'email'),
                'message' => 'Địa chỉ email này đã được sử dụng.')),
        'password' => array(
            'to_short' => array(
                'rule' => array('minLength', '6'),
                'message' => 'Mật khẩu dài ít nhất 6 ký tự.'
            ),
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'Hãy nhập mật khẩu.'
            ),
            'confirmPassword' => array(
                'rule' => 'confirmPassword',
                'message' => 'Mật khẩu không trùng khớp.'
            )
        ),
        'repassword' => array(
            'rule' => 'confirmTempPassword',
            'message' => 'Mật khẩu không trùng khớp.'
        ),
    );
    public function confirmTempPassword($password = null) {
        if ((isset($this->data[$this->alias]['password']) && isset($password['repassword']))
            && !empty($password['repassword'])
            && ($this->data[$this->alias]['password'] === $password['repassword'])) {
            return true;
        }
        return false;
    }

    public function confirmPassword($password = null) {
        if ((isset($this->data[$this->alias]['repassword']) && isset($password['password']))
            && !empty($password['password'])
            && ($this->data[$this->alias]['repassword'] === $password['password'])) {

            return true;
        }
        return false;
    }

}
