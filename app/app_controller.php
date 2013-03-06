<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.app
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       cake
 * @subpackage    cake.app
 */
class AppController extends Controller {

    public $helpers = array('Html', 'Form', 'Javascript', 'Ajax', 'Session', 'Lang');
    public $components = array('Session', 'Cookie', 'Upload', 'Image');

    function beforeFilter() {
        //write settings in session
        if (!$this->Session->check('Setting'))
            $this->setSettings();
        //Set Cookie	
        $this->setCookie();
        //Access Controll List
        $this->checkACL();
        //Set footer data
        $this->setFooterData();
        //Set $memberCookie to use in all views. 
        $this->set('memberCookie', $this->Cookie->read('Member'));
    }

    function beforeRender() {
        if ($this->layout != 'ajax')
            $this->layout = 'front/main';
    }

    function clearCache() {
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
        header('Cache-Control: no-store, no-cache, must-revalidate');
        header('Cache-Control: post-check=0, pre-check=0', false);
        header('Pragma: no-cache');
    }

    protected function setSettings() {
        $this->loadModel('Setting');
        $this->Session->write($this->Setting->read(null, 1));
    }

    protected function setCookie() {
        //Set Cookie	
        $this->Cookie->name = 'Dupix';
        $this->Cookie->key = '#MaT7AwlsH@Ya.AmOOR*';
        $this->Cookie->time = 3600; // or '1 hour'
        //$this->Cookie->domain = 'localhost';
        //$this->Cookie->path = '/bakers/preferences/';
        //$this->Cookie->secure = true; //i.e. only sent if using secure HTTPS
    }

    protected function isAuthentic($model = null) {
        if ($this->Cookie->read($model)) {
            //check if data in Cookie existing in database.
            if ($this->inDataBase($model)) {
                return true;
            } else {
                $this->Cookie->delete($model);
                return false;
            }
        }else
            return false;
    }

    protected function inDataBase($model = null) {
        if (!$model)
            return false;
        $this->loadModel($model);
        $this->$model->recursive = -1;
        return $this->$model->find('count', array('conditions' => $this->Cookie->read($model)));
    }

    protected function checkACL() {
        //Check Memebers before doing any action in the profile controller except(signin, logout, register, confirm, forgot);
        if (
                ($this->name == 'Profile') &&
                ($this->action != 'login') &&
                ($this->action != 'facebookLogin') &&
                ($this->action != 'logout') &&
                ($this->action != 'register') &&
                ($this->action != 'confirm') &&
                ($this->action != 'forgot') &&
                !$this->isAuthentic('Member')
        ) {
            if ($this->action == 'index' || $this->action == 'cart') {
                $this->Session->setFlash(__('Sorry! Please login first.', true), true);
                $this->redirect($this->referer($this->Session->read('Setting.url')));
            } else {
                echo 'Sorry! Please login first.';
                die();
            }
        }
    }

    public function autoComplete($modelName, $filedName) {
        $this->$modelName->recursive = -1;
        $key = isset($this->params['form']['q']) ? $this->params['form']['q'] : '';
        $dataArray = $this->$modelName->find('all', array(
            'fields' => 'DISTINCT ' . $filedName,
            'conditions' => array($filedName . ' LIKE' => '%' . $key . '%')
                ));
        foreach ($dataArray as $data)
            echo $data[$modelName][$filedName] . "\n";
        $this->layout = 'ajax';
        $this->autoRender = false;
    }
    
    /**
     * Add prefix to array keys
     * @author Ahmed Sharaf
     * @param array $arr
     * @param string $prefix
     * @return array
     */    
    protected function arrKeyPrefix($arr=array(), $prefix=''){
        foreach ($arr as $key => $val) {
            $arr[$prefix.'.'.$key] = $val;
            unset($arr[$key]);
        }
        return $arr;
    }

    public function flashImgUpload($albumId = null) {
        $this->autoRender = false;
        if ($albumId && $this->relatedToMember('Album', $albumId)) {
            set_time_limit(240);
            $this->loadModel('Gal');
            $gal = array('album_id' => $albumId);
            $imgArr = array();
            $file = $_FILES['Filedata'];
            for ($k = 0; $k < count($file['name']); $k++) {
                $imgArr['name'] = $file['name'][$k];
                $imgArr['size'] = $file['size'][$k];
                $imgArr['tmp_name'] = $file['tmp_name'][$k];
                $this->Upload->resize = 4;
                $this->Upload->maxImageWidth = 710;
                $this->Upload->thumbWidth = 90;
                $this->Upload->thumbHeight = 60;
                $gal['image'] = $this->Upload->uploadImage($imgArr);
                $this->Gal->create();
                $this->Gal->save($gal);
            }
            return "status=1";
        }
        return "status=0";
    }
    
    public function ajaxImgUpload($albumId = null) {
        $this->autoRender = false;
        if ($albumId && $this->relatedToMember('Album', $albumId)) {
            set_time_limit(240);
            $this->loadModel('Gal');
            $gal = array('album_id' => $albumId, 'member_id' => $this->Cookie->read('Member.id'));
            $this->Upload->resize = -1;
            $gal['image'] = $this->Upload->uploadImage( $_FILES['uploaded_file']);
            if($gal['image']){
                $this->Image->load($this->Upload->imageUploadDir.$gal['image'])->best_fit(1000, 600)->save($this->Upload->imageUploadDir.'large_'.$gal['image']);
                $this->Image->load($this->Upload->imageUploadDir.$gal['image'])->fit_and_crop(389, 366)->save($this->Upload->imageUploadDir.'medium_'.$gal['image']);
                $this->Image->load($this->Upload->imageUploadDir.$gal['image'])->fit_and_crop(101, 63)->save($this->Upload->imageUploadDir.'thumb_'.$gal['image']);
                $this->Gal->create();
                $this->Gal->save($gal);
                echo json_encode(array('id' => $this->Gal->id, 'name' => $gal['image']));
            }
        }
        echo false;
    }

    //cheks if (Album, Cart, ...or any other belongsTo relation) reletd to current member.  
    protected function relatedToMember($model, $id) {
        $this->Member->$model->recursive = -1;
        return $this->Member->$model->find('count', array('conditions' => array($model . '.id' => $id, $model . '.member_id' => $this->Cookie->read('Member.id'))));
    }

    public function setFooterData() {
//        $this->loadModel('Section');
//        $this->Section->recursive = -1;
//        $this->set('sections', $this->Section->find('all'));
    }

}
