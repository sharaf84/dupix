<?php

class ProfileController extends AppController {

    public $name = 'Profile';
    public $uses = array('Member');
    public $components = array('Email');
    public $currentMember = null;

    function setCurrentMember() {
        $this->Member->recursive = 1;
        $this->currentMember = $this->Member->read(null, $this->Cookie->read('Member.id'));
    }

    function display() {
        $this->setCurrentMember();
        $this->set('member', $this->currentMember);
        $this->render('display');
    }

    /* Albums Functions */

    //view albums
    function albums() {
        $this->display();
    }

    function albumImgs($albumId = null) {
        $this->Member->Album->recursive = 1;
        return $this->Member->Album->find('first', array('conditions' => array('Album.id' => $albumId, 'Album.member_id' => $this->Cookie->read('Member.id'))));
    }

    //call by ajax
    function getAlbumImgs() {
        $json = false;
        $albumId = isset($this->params['form']['album_id']) ? $this->params['form']['album_id'] : null;
        if ($albumId) {
            $galley = array();
            $albumImgs = $this->albumImgs($albumId);
            if (!empty($albumImgs['Gal'])) {
                foreach ($albumImgs['Gal'] as $albumImg) {
                    $gallery[$albumImg['id']] = $albumImg['image'];
                }
                if (!empty($gallery)) {
                    $json = json_encode($gallery);
                }
            }
        }
        $this->autoRender = false;
        return $json;
    }

    // add Album (call by ajax)
    function addAlbum() {
        $msg = 'Please enter a valid album title!';
        $id = $title = '';
        if (!empty($this->data['Album']['title'])) {
            $this->data['Album']['member_id'] = $this->Cookie->read('Member.id');
            $this->Member->Album->create();
            if ($this->Member->Album->save($this->data)) {
                $msg = 'Album added successfully.';
                $id = $this->Member->Album->id;
                $title = $this->data['Album']['title'];
            }
        }
        echo '{"msg":"' . $msg . '", "title":"' . $title . '", "id":"' . $id . '"}';
        $this->data = null;
        $this->autoRender = false;
    }

    // deleteAlbum(call by ajax)
    function deleteAlbum() {
        $this->autoRender = false;
        $id = isset($this->params['form']['album_id']) ? $this->params['form']['album_id'] : null;
        if ($id != null) {
            //get album imgs to be deleted from server.
            $this->Upload->filesToDelete = $this->Member->Album->Gal->find('list', array('fields' => 'Gal.image', 'conditions' => array('album_id' => $id)));
            $this->Member->Album->recursive = -1;
            if ($this->Member->Album->deleteAll(array(
                        'Album.id' => $id,
                        'Album.member_id' => $this->Cookie->read('Member.id')
                    ))) {
                $this->Upload->deleteFiles();
                return true;
            }
        }
        return false;
    }

    // editAlbum (call by ajax)
    function editAlbum() {
        $this->autoRender = false;
        $id = isset($this->params['form']['album_id']) ? $this->params['form']['album_id'] : null;
        $title = isset($this->params['form']['album_title']) ? $this->params['form']['album_title'] : null;
        if ($id != null) {
            $this->Member->Album->recursive = -1;
            if ($this->Member->Album->updateAll(
                            array('Album.title' => "'$title'"), array('Album.id' => $id, 'Album.member_id' => $this->Cookie->read('Member.id')
                    )))
                return $title;
        }else
            return false;
    }

    // deleteAlbumImg(call by ajax)
    function deleteAlbumImg() {
        $this->autoRender = false;
        $id = isset($this->params['form']['img_id']) ? $this->params['form']['img_id'] : null;
        if ($id != null) {
            $gal = $this->Member->Album->Gal->read(null, $id);
            if ($gal['Album']['member_id'] == $this->Cookie->read('Member.id')) {
                if ($this->Member->Album->Gal->Delete($id)) {
                    $this->Upload->filesToDelete = array($gal['Gal']['image']);
                    $this->Upload->deleteFiles();
                    return true;
                }
            }
        }
        return false;
    }

    /* Projects Functions */

    //view projects data
    function projects() {
        $this->set('projects', $this->Member->Project->find('all', array(
                    'conditions' => array(
                        'Project.member_id' => $this->Cookie->read('Member.id'),
                        'Project.account' => 1,
                    ),
                    'recursive' => 1
                )));
    }

    //create project
    function createProject($productId = null) {
        $this->loadModel('Product');
        $this->Product->recursive = 1;
        $this->set('product', $this->Product->read(null, $productId));
        $this->display();
    }

    //Edit project
    function editProject($projectId = null) {
        $this->data = $this->getProject($projectId);
        $this->createProject($this->data['Project']['product_id']);
    }

    function getProject($id) {
        return $this->Member->Project->find('first', array(
                    'conditions' => array(
                        'Project.id' => $id,
                        'Project.member_id' => $this->Cookie->read('Member.id'),
                        'Project.account' => 1,
                    ),
                    'recursive' => 1
                ));
    }

    //save project (add / edit)
    function saveProject($productId = null) {
        if ($productId && !empty($this->data)) {
            $this->data['Project']['member_id'] = $this->Cookie->read('Member.id');
            $this->data['Project']['product_id'] = $productId;
            $this->data['Project']['title'] = (!empty($this->data['Project']['title'])) ? $this->data['Project']['title'] : $this->Cookie->read('Member.email');
            $this->Member->Project->create();
            if ($this->Member->Project->save($this->data)) {
                $this->Session->setFlash(__('The project has been saved', true));
                $this->saveProjectImgs($this->Member->Project->id);
                $this->redirect(array('action' => 'cart'));
            }
        }
        $this->Session->setFlash(__('The project could not be saved. Please, try again.', true));
        $this->redirect($this->referer($this->Session->read('Setting.url')));
    }

    //save project imgs (add / edit)
    function saveProjectImgs($projectId = null) {
        if ($projectId && !empty($this->data['Gal'])) {
            $position = 1;
            foreach ($this->data['Gal'] as $gal) {
                if (!empty($gal['image'])) {
                    $identifire = $projectId . ',' . $this->Cookie->read('Member.id') . ',' . $this->data['Project']['product_id'] . ',' . $position;
                    $copy = $identifire . substr($gal['image'], strpos($gal['image'], "_"));
                    copy($this->Upload->imageUploadDir . $gal['image'], $this->Upload->imageUploadDir . $copy);
                    $gal['image'] = $copy;
                    $gal['position'] = $position++;
                    $gal['project_id'] = $projectId;
                    $this->Member->Project->Gal->create();
                    $this->Member->Project->Gal->save($gal);
                }
            }
        }
    }

    //save photo print project (add / edit)
    function savePhotoPrintProject($productId = null) {
        if ($productId && !empty($this->data)) {
            $this->data['Project']['member_id'] = $this->Cookie->read('Member.id');
            $this->data['Project']['product_id'] = $productId;
            $this->data['Project']['title'] = (!empty($this->data['Project']['title'])) ? $this->data['Project']['title'] : $this->Cookie->read('Member.name');
            $this->data['Project']['type'] = 1; //photo print
            $this->Member->Project->create();
            if ($this->Member->Project->save($this->data)) {
                $this->Session->setFlash(__('The project has been saved', true));
                $this->Member->Project->saveField('quantity', $this->savePhotoPrintImgs($this->Member->Project->id));
                $this->redirect(array('action' => 'cart'));
            }
        }
        $this->Session->setFlash(__('The project could not be saved. Please, try again.', true));
        $this->redirect($this->referer());
    }

    //save PhotoPrint project imgs (add / edit)
    function savePhotoPrintImgs($projectId = null) {
        $quantity = 0;
        if ($projectId && !empty($this->data['Gal'])) {
            foreach ($this->data['Gal'] as $gal) {
                if (!empty($gal['image'])) {
                    $quantity+=$gal['quantity'];
                    $gal['project_id'] = $projectId;
                    $this->Member->Project->Gal->create();
                    $this->Member->Project->Gal->save($gal);
                }
            }
        }
        return $quantity;
    }

    //deleteCart(call by ajax)
    function deleteProject() {
        $json = false;
        $this->data['Project']['id'] = isset($this->params['form']['project_id']) ? $this->params['form']['project_id'] : null;
        $this->data['Project']['member_id'] = $this->Cookie->read('Member.id');
        $this->data['Project']['account'] = 1;
        if ($this->isExist('Project')) {
            $this->Member->Project->id = $this->data['Project']['id'];
            if ($this->Member->Project->saveField('account', 0))
                $json = true;
        }
        $this->data = null;
        $this->autoRender = false;
        return $json;
    }

    /* Cart Functions */

    //View cart data
    function cart() {
        $this->set('cartProjects', $this->getCartProjects());
        $this->set('cartPrice', $this->getCartPrice());
    }

    //updateCart (call by ajax)
    function updateCart() {
        $json = '{"msg":"Error! Please try again."}';
        $this->data['Project']['id'] = isset($this->params['form']['project_id']) ? $this->params['form']['project_id'] : null;
        $this->data['Project']['member_id'] = $this->Cookie->read('Member.id');
        if ($this->isExist('Project')) {
            $this->data['Project']['cart'] = 1;
            $this->data['Project']['quantity'] = isset($this->params['form']['quantity']) ? intval($this->params['form']['quantity']) : 0;
            if ($this->data['Project']['quantity'] > 0 && $this->Member->Project->save($this->data))
                $json = '{"msg":"Done.", "cartCount":' . $this->getCartCount() . ', "cartPrice":' . $this->getCartPrice() . '}';
        }
        $this->data = null;
        $this->autoRender = false;
        return $json;
    }

    //deleteCart(call by ajax)
    function deleteCart() {
        $json = false;
        $this->data['Project']['id'] = isset($this->params['form']['project_id']) ? $this->params['form']['project_id'] : null;
        $this->data['Project']['member_id'] = $this->Cookie->read('Member.id');
        $this->data['Project']['cart'] = 1;
        if ($this->isExist('Project')) {
            $this->Member->Project->id = $this->data['Project']['id'];
            if ($this->Member->Project->saveField('cart', 0))
                $json = '{"cartCount":"' . $this->getCartCount() . '", "cartPrice":"' . $this->getCartPrice() . '"}';
        }
        $this->data = null;
        $this->autoRender = false;
        return $json;
    }

    //delete all member cart (set cart = 0)
    private function deleteAllCart() {
        $this->Member->Project->updateAll(array('Project.cart' => 0), array('Project.cart' => 1, 'Project.member_id' => $this->Cookie->read('Member.id')));
    }

    //Check Model with condition($this->data) and return modelId
    private function isExist($modelName = null) {
        return $this->Member->$modelName->field('id', array($this->data[$modelName]));
    }

    //get cart projects
    function getCartProjects() {
        return $this->Member->Project->find('all', array(
                    'conditions' => array(
                        'Project.member_id' => $this->Cookie->read('Member.id'),
                        'Project.cart' => 1,
                    ),
                    'recursive' => 1
                ));
    }

    //get cart count
    function getCartCount() {
        return $this->Member->Project->find('count', array(
                    'fields' => array('SUM(quantity) AS count'),
                    'conditions' => array(
                        'cart' => 1,
                        'quantity >' => 0,
                        'member_id' => $this->Cookie->read('Member.id')
                    ),
                    'recursive' => '-1'
                ));
    }

    //get cart price
    function getCartPrice() {
        $result = $this->Member->Project->query('
			SELECT SUM( projects.quantity * products.price ) AS cartPrice
			FROM projects LEFT JOIN products 
			ON ( projects.product_id = products.id )
			WHERE projects.cart = 1
			AND projects.quantity > 0
			AND projects.member_id = ' . $this->Cookie->read('Member.id')
        );
        return $result[0][0]['cartPrice'];
    }

    //add order
    function addOrder() {
        $this->Session->setFlash(__('Wrong data posted! Please try again.', true));
        $cartProjects = $this->getCartProjects();
        if (!empty($this->data) && !empty($cartProjects)) {
            $date = date('Y-m-d-H-i-s');
            //make new dir for this order
            $dir = IMAGES . 'projects' . DS . $date;
            mkdir($dir, 0777);
            foreach ($cartProjects as $project) {
                // get fotoprint section
                //$section = $this -> Section -> find('first', array('conditions' => array('Section.id' => $project['Product']['section_id'])));
                if ($project['Project']['type'] == 1)
                    $dirProject = IMAGES . 'projects' . DS . $date . DS . $project['Product']['title'];
                else
                    $dirProject = IMAGES . 'projects' . DS . $date . DS . $project['Project']['quantity'] . '_' . $project['Product']['title'];
                //make new dir for each project
                mkdir($dirProject, 0777);
                ////get images to copy and ziped
                $imgs = $this->Member->Project->Gal->find('all', array('conditions' => array('Gal.project_id' => $project['Project']['id'])));
                foreach ($imgs as $img) {
                    $oldDir = IMAGES . 'upload' . DS . $img['Gal']['image'];
                    if ($section['Section']['photo_print'] == 1)
                        $newDir = IMAGES . 'projects' . DS . $date . DS . $project['Product']['title'] . DS . $img['Gal']['quantity'] . '_' . $img['Gal']['image'];
                    else
                        $newDir = IMAGES . 'projects' . DS . $date . DS . $project['Project']['quantity'] . '_' . $project['Product']['title'] . DS . $img['Gal']['image'];
                    copy($oldDir, $newDir);
                }
                $this->data['Order']['email'] = $this->Cookie->read('Member.email');
                $this->data['Order']['project_id'] = $project['Project']['id'];
                $this->data['Order']['unit_price'] = $project['Product']['price'];
                $this->data['Order']['quantity'] = $project['Project']['quantity'];
                $this->data['Order']['keyword'] = $date;
                $this->Member->Project->Order->create();
                $this->Member->Project->Order->save($this->data);
            }
            //call  zip function
            $source = IMAGES . 'projects' . DS . $date;
            $destination = IMAGES . 'projects' . DS . $date . '.zip';
            $this->zip($source, $destination);
            $this->deleteAllCart();
            $this->Session->setFlash(__('Order successful. We will contact you soon.', true));
            $this->deleteDir($source);
        }
        $this->redirect($this->Session->read('Setting.url'));
    }

    //zip folder
    function zip($source, $destination) {
        if (!extension_loaded('zip') || !file_exists($source)) {
            return false;
        }
        $zip = new ZipArchive();
        if (!$zip->open($destination, ZIPARCHIVE::CREATE)) {
            return false;
        }
        $source = str_replace('\\', '/', realpath($source));
        if (is_dir($source) === true) {
            $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($source), RecursiveIteratorIterator::SELF_FIRST);
            foreach ($files as $file) {
                $file = str_replace('\\', '/', $file);
                if (in_array(substr($file, strrpos($file, '/') + 1), array('.', '..')))
                    continue;
                //$file = realpath($file);
                if (is_dir($file) === true) {
                    $zip->addEmptyDir(str_replace($source . '/', '', $file . '/'));
                } else if (is_file($file) === true) {
                    $zip->addFromString(str_replace($source . '/', '', $file), file_get_contents($file));
                }
            }
        } else if (is_file($source) === true) {
            $zip->addFromString(basename($source), file_get_contents($source));
        }
        return $zip->close();
    }

    //delete copied folder of images
    function deleteDir($dirPath) {
        if (!is_dir($dirPath)) {
            throw new InvalidArgumentException("$dirPath must be a directory");
        }
        if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
            $dirPath .= '/';
        }
        $files = glob($dirPath . '*', GLOB_MARK);
        foreach ($files as $file) {
            if (is_dir($file)) {
                self::deleteDir($file);
            } else {
                unlink($file);
            }
        }
        rmdir($dirPath);
    }

    /* Registeration Functions */

    //register (call by ajax).
    function register() {
        if (!empty($this->data)) {
            $this->data['Member']['confirm_code'] = String::uuid();
            $this->Member->create();
            if ($this->Member->save($this->data)) {
                $this->Email->to = $this->data['Member']['email'];
                $this->Email->subject = $this->Session->read('Setting.title');
                $this->Email->replyTo = $this->Session->read('Setting.email');
                $this->Email->from = $this->Session->read('Setting.email');
                $this->Email->sendAs = 'html';
                $this->Email->template = 'confirmation';
                //set data to template 'confirmation'.
                $this->set('name', $this->data['Member']['name']);
                $this->set('id', $this->Member->getLastInsertID());
                $this->set('code', $this->data['Member']['confirm_code']);
                if ($this->Email->send()) {
                    $result = 'Confirmation mail sent. Please check your inbox';
                } else {
                    $this->Member->delete($this->Member->getLastInsertID());
                    $result = 'Error sending the confirmation mail. Please try again';
                }
            } else {
                $result = '<div>There was an error.</div>';
                if (!empty($this->Member->validationErrors)) {
                    foreach ($this->Member->validationErrors as $key => $val) {
                        $result .= "<div class='$key-join'>$val</div>";
                    }
                }
                $result .= '<div>Please, try again.</div>';
            }
        }
        $this->data = null;
        $this->autoRender = false;
        return $result;
    }

    // confirm action.
    function confirm($memberId = null, $code = null) {
        if (empty($memberId) || empty($code)) {
            $this->Session->setFlash(__('Invalid data.', true));
            $this->redirect($this->referer());
        }
        $member = $this->Member->read(null, $memberId);
        if (empty($member)) {
            $this->Session->setFlash(__('Invalid member.', true));
            $this->redirect($this->referer());
        }
        if ($member['Member']['confirm_code'] == $code) {
            $this->Member->id = $memberId;
            if($this->Member->saveField('confirmed', '1')){
                $member['Member']['confirmed'] = 1;
                $this->Cookie->time = '+12 weeks';
                $this->Cookie->write('Member', $member['Member'], true, $this->Cookie->time);
                $this->Session->setFlash(__('Registration confirmed.', true));
            }else
                $this->Session->setFlash(__('Sorry! please try again.', true));
        } else {
            $this->Session->setFlash(__('Invalid code.', true));
        }
        $this->redirect($this->Session->read('Setting.url'));
    }

    //forget password.
    function forgot() {
        $this->Session->setFlash(__('Please enter a valid email.', true));
        if (!empty($this->data['Member']['email']) && Validation::email($this->data['Member']['email'])) {
            $member = $this->Member->find('first', array('conditions' => array('Member.email' => $this->data['Member']['email'], 'Member.confirmed' => 1)));
            if (!empty($member)) {
                //send forgot mail
                $this->Email->to = $this->data['Member']['email'];
                $this->Email->subject = $this->Session->read('Setting.title');
                $this->Email->replyTo = $this->Session->read('Setting.email');
                $this->Email->from = $this->Session->read('Setting.email');
                $this->Email->sendAs = 'html';
                $this->Email->template = 'forgot';
                //set data to template 'forgot'.
                $this->set('member', $member);
                if ($this->Email->send())
                    $this->Session->setFlash(__('Password sent. Please check your inbox', true));
                else
                    $this->Session->setFlash(__('Problem sending mail. Please try again', true));
            } else
                $this->Session->setFlash(__('Invalid member email.', true));
        }
        $this->redirect($this->Session->read('Setting.url'));
    }

    //Login
    function login() {
        if ($this->isAuthentic('Member')) {
            $this->Session->setFlash(__('You are already logging in.', true));
            $this->redirect($this->referer($this->Session->read('Setting.url')));
        }
        if (!empty($this->data)) {
            $this->Member->recursive = -1;
            $member = $this->Member->find('first', array(
                'conditions' => array('email' => $this->data['Member']['email'], 'password' => $this->data['Member']['password'], 'confirmed' => 1)
            ));
            if (!empty($member)) {
                //Set Cookie with member data.
                if ($this->data['Member']['remember'])
                    $this->Cookie->time = '+12 weeks';
                $this->Cookie->write('Member', $member['Member'], true, $this->Cookie->time);
                $this->Session->setFlash('Logged in successfully.');
            } else {
                $this->Session->setFlash(__('Wrong email or password! Please, try again.', true));
            }
        }
        $this->data = null;
        $this->redirect($this->referer($this->Session->read('Setting.url')));
    }

    //Logout
    function logout() {
        $this->Cookie->delete('Member');
        $this->Session->setFlash('Logged out successfully.');
        $this->redirect($this->Session->read('Setting.url'));
    }

    //facebook login call by ajax.
    function facebookLogin() {
        if (!empty($this->params['form'])) {
            $member = array();
            $member['Member']['name'] = $this->params['form']['name'];
            $member['Member']['emial'] = $this->params['form']['email'];
            $member['Member']['password'] = 'fbPass_' . $this->params['form']['id'];
            $member['Member']['confirm_password'] = 'fbPass_' . $this->params['form']['id'];
            $member['Member']['confirmed'] = 1;
            $member['Member']['confirm_code'] = String::uuid();
            $member['Member']['facebook'] = 1;
            //Save facebook memeber if not exists in data base (By validation).
            $this->loadModel('Member');
            $this->Member->create();
            $this->Member->save($member);
            //Get memeber id.
            $member['Member']['id'] = $this->Member->field('Member.id', array('Member.email' => $member['Member']['email']));
            //Set Cookie with member data.
            $this->Cookie->write('Member', $member['Member']);
        }
        $this->autoRender = false;
    }

}

?>