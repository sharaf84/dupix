<?php

require_once '../auth_controller.php';

class ProductsController extends AuthController {

    public $name = 'Products';
    public $components = array('Upload'); //use upload component.

    function index($parentId = null, $memberId = null) {
        //select position field to use in ordering and savePositions function
        $positionField = 'position';
        if ($this->Session->check('conditions.home'))
            $positionField = 'home_position';

        // set this paginate with data
        if($memberId)
            $this->paginate = array(
                'conditions' => $this->arrKeyPrefix(array_merge(array('parent_id' => 0, 'member_id' => $memberId), (array)$this->Session->read('conditions')), 'Product'),
                'order' => array('Product.' . $positionField => 'ASC'),
                'limit' => isset($this->params['named']['limit']) ? $this->params['named']['limit'] : $this->paginate['limit'],
                'page' => isset($this->params['named']['page']) ? $this->params['named']['page'] : $this->paginate['page'],
            );
        else
            $this->paginate = array(
            'conditions' => $this->arrKeyPrefix(array_merge(array('parent_id' => 0), (array)$this->Session->read('conditions')), 'Product'),
            'order' => array('Product.' . $positionField => 'ASC'),
            'limit' => isset($this->params['named']['limit']) ? $this->params['named']['limit'] : $this->paginate['limit'],
            'page' => isset($this->params['named']['page']) ? $this->params['named']['page'] : $this->paginate['page'],
        );
        
            

        // save positions 
        $this->savePositions($positionField);

        //set products to view
        $this->Product->recursive = 1;
        $this->set('products', $this->paginate());
        //get sections and set $this->data to use in filtering form.
        if ($this->Session->check('conditions') && is_array($this->Session->read('conditions')))
            $this->data['Product'] = $this->Session->read('conditions');
        $sections = $this->Product->Section->find('list');
        $members = $this->Product->Member->find('list');
        $this->set(compact('sections', 'members'));
    }

    //save products positions.	
    private function savePositions($positionField) {
        if (!empty($this->data['Product']['ids'])) {
            // set the start positions order.
            $i = (($this->paginate['page'] - 1) * $this->paginate['limit']) + 1;
            // save positions  	
            foreach ($this->data['Product']['ids'] as $id) {
                $this->Product->id = $id;
                $this->Product->saveField($positionField, $i++);
            }
            $this->Session->setFlash(__('The positions have been saved', true));
        }
    }

    //Filter product by issue or section or both.
    function filter() {
        //pr($this->data);
        if (!empty($this->data['Product'])) {
            //array filter unsets empty, null, and false values.
            $this->Session->write('conditions', array_filter($this->data['Product']));
        }
        $this->redirect(array('action' => 'index'));
    }

    function setHot($id = null) {
        $this->Product->updateAll(array('Product.hot' => 0));
        $this->Product->id = $id;
        $this->Product->saveField('hot', 1);
        $this->redirect(array('action' => 'index'));
    }

    function view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid product', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('product', $this->Product->read(null, $id));
    }

    function add($parentId = null, $memberId = null) {
        if($memberId){
               $this->loadModel('Member');
               $member = $this->Product->Member->read(null, $memberId);
               
               if(isset ($member) && $member){
                  $this->set('member', $member); 
               }
                   
        }
       
        if (!empty($this->data)) {
            //upload images and then add it to Gal.
//            $i = 0;
//            foreach ($this->data['Gal'] as $key => $val) {
//                $this->data['Gal'][$i]['image'] = $this->Upload->uploadImage($val['image']);
//                if (empty($this->data['Gal'][$i]['image']))
//                    unset($this->data['Gal'][$i]);
//                $i++;
//            }
//            if (empty($this->data['Gal']))
//                unset($this->data['Gal']);
            $this->Upload->masterImageWidth = 700;
            $this->Upload->masterImageHeight = 350;
            $this->Upload->resize = 1;
            $this->data['Product']['project_image']=$this->Upload->uploadImage($this->data['Product']['project_image']);
            
            $this->Upload->masterImageWidth = 205;
            $this->Upload->masterImageHeight = 134;
            $this->Upload->resize = 1;
            $this->data['Product']['hot_image']=$this->Upload->uploadImage($this->data['Product']['hot_image']);
            
            $this->Upload->masterImageWidth = 721;
            $this->Upload->masterImageHeight = 230;
            $this->Upload->resize = 1;
            $this->data['Product']['top_image']=$this->Upload->uploadImage($this->data['Product']['top_image']);
            
            $this->Upload->masterImageWidth = 400;
            $this->Upload->masterImageHeight = 230;
            $this->Upload->resize = 1;
            $this->data['Product']['middle_image']=$this->Upload->uploadImage($this->data['Product']['middle_image']);
            
            $this->Upload->masterImageWidth = 220;
            $this->Upload->masterImageHeight = 137;
            $this->Upload->resize = 1;
            $this->data['Product']['bottom_image']=$this->Upload->uploadImage($this->data['Product']['bottom_image']);
            
            $this->Upload->masterImageWidth = 700;
            $this->Upload->masterImageHeight = 350;
            $this->Upload->resize = 1;
            $this->data['Product']['slide_image']=$this->Upload->uploadImage($this->data['Product']['slide_image']);
           
            $this->Product->create();
            if ($this->Product->saveAll($this->data, array('validate' => 'first'))) {
                $this->Session->setFlash(__('The product has been saved', true));
                //$this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The product could not be saved. Please, try again.', true));
            }
        }
        $sections = $this->Product->Section->find('list');
        $members = $this->Product->Member->find('list');
        $parents = $this->Product->find('list', array('conditions'=>array('Product.parent_id' => 0)));
        if($parentId)
            $this->data['Product']['parent_id'] = $parentId;
        $this->set(compact('sections', 'parents', 'members'));
    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid product', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            //upload images and then add it to Gal.
//            $i = 0;
//            foreach ($this->data['Gal'] as $key => $val) {
//                $this->data['Gal'][$i]['image'] = $this->Upload->uploadImage($val['image']);
//                if (empty($this->data['Gal'][$i]['image']))
//                    unset($this->data['Gal'][$i]);
//                $i++;
//            }
//            if (empty($this->data['Gal']))
//                unset($this->data['Gal']);
            
            $this->Product->id = $id;
            
            if ($this->data['Product']['project_image']['name']) {
                $this->Upload->masterImageWidth = 700;
                $this->Upload->masterImageHeight = 350;
                $this->Upload->resize = 1;
                $this->Upload->filesToDelete = array($this->Product->field('project_image'));
                $this->data['Product']['project_image'] = $this->Upload->uploadImage($this->data['Product']['project_image'] );
            }else
                unset($this->data['Product']['project_image'] );
            
            if ($this->data['Product']['hot_image']['name']) {
                $this->Upload->masterImageWidth = 205;
                $this->Upload->masterImageHeight = 134;
                $this->Upload->resize = 1;
                array_push($this->Upload->filesToDelete, $this->Product->field('hot_image'));
                $this->data['Product']['hot_image'] = $this->Upload->uploadImage($this->data['Product']['hot_image'] );
            }else
                unset($this->data['Product']['hot_image'] );
            
            if ($this->data['Product']['top_image']['name']) {
                $this->Upload->masterImageWidth = 712;
                $this->Upload->masterImageHeight = 230;
                $this->Upload->resize = 1;
                array_push($this->Upload->filesToDelete, $this->Product->field('top_image'));
                $this->data['Product']['top_image'] = $this->Upload->uploadImage($this->data['Product']['top_image'] );
            }else
                unset($this->data['Product']['top_image'] );
            
            if ($this->data['Product']['middle_image']['name']) {
                $this->Upload->masterImageWidth = 402;
                $this->Upload->masterImageHeight = 230;
                $this->Upload->resize = 1;
                array_push($this->Upload->filesToDelete, $this->Product->field('middle_image'));
                $this->data['Product']['middle_image'] = $this->Upload->uploadImage($this->data['Product']['middle_image'] );
            }else
                unset($this->data['Product']['middle_image'] );
            
            if ($this->data['Product']['bottom_image']['name']) {
                $this->Upload->masterImageWidth = 220;
                $this->Upload->masterImageHeight = 137;
                $this->Upload->resize = 1;
                array_push($this->Upload->filesToDelete, $this->Product->field('bottom_image'));
                $this->data['Product']['bottom_image'] = $this->Upload->uploadImage($this->data['Product']['bottom_image'] );
            }else
                unset($this->data['Product']['bottom_image'] );
            
            if ($this->data['Product']['slide_image']['name']) {
                $this->Upload->masterImageWidth = 700;
                $this->Upload->masterImageHeight = 350;
                $this->Upload->resize = 1;
                array_push($this->Upload->filesToDelete, $this->Product->field('bottom_image'));
                $this->data['Product']['slide_image'] = $this->Upload->uploadImage($this->data['Product']['slide_image'] );
            }else
                unset($this->data['Product']['slide_image'] );
                        
            if ($this->Product->saveAll($this->data, array('validate' => 'first'))) {
                $this->Upload->deleteFiles(); //delete old files
                $this->Session->setFlash(__('The product has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The product could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Product->read(null, $id);
        }
        $members = $this->Product->Member->find('list');
        $sections = $this->Product->Section->find('list');
        $parents = $this->Product->find('list', array('conditions'=>array('Product.parent_id' => 0)));
        $this->set(compact('sections', 'parents'));
    }

    function delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid id for product', true));
            $this->redirect(array('action' => 'index'));
        }
        //set the component var filesToDelete with an array of files should be deleted.
        $this->Product->id = $id;
	$this->Upload->filesToDelete = array(
            $this->Product->field('project_image'), 
            $this->Product->field('hot_image'), 
            $this->Product->field('top_image'), 
            $this->Product->field('middle_image'), 
            $this->Product->field('bottom_image'), 
            $this->Product->field('slide_image') 
        );
        if ($this->Product->delete($id)) {
            $this->Upload->deleteFiles();
            $this->Session->setFlash(__('Product deleted', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Product was not deleted', true));
        $this->redirect(array('action' => 'index'));
    }

}

?>