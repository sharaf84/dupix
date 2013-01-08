<?php
class IframeController extends AppController {

    public $name = 'Iframe';
    public $uses = null;
    public $helpers = array('Cropimage');
    //use upload component.
    public $components = array('Upload');
	
	function beforeRender(){
		$this->layout = 'iframe/main';
	}
	
    public function viewImg($imageName=null, $size=null, $cropWidth=null, $cropHeight=null) {
    	if(!($imageName && $size && $cropWidth && $cropHeight)){
    		$this->Session->setFlash(__('Wrong data!', true));
			$this->redirect(array('action'=>'blanck'));	
    	}
		$imagePath = $this->Upload->imageUploadDir.$imageName;
        if (!file_exists($imagePath)) {
            $this->Session->setFlash(__('No image found!', true));
			$this->redirect(array('action'=>'blanck'));
        }
		//$size like: memberId,ProjectId,imgNo
		$sizrArr = explode(",", $size);
		//check member
		if($sizrArr[0] != $this->Cookie->read('Member.id')){
			$this->Session->setFlash(__('Wrong member!', true));
			$this->redirect(array('action'=>'blanck'));	
		}
        //check product
        $this->LoadModel('Product');
		if(!$this->Product->find('count', array(
			'conditions'=>array(
				'Product.id'            => $sizrArr[1],
				'Product.max_images >=' => (intval($sizrArr[2]) > 0)?intval($sizrArr[2]):null,
				'Product.crop_width'    => $cropWidth,
				'Product.crop_height'   => $cropHeight
			),
			'recursive' => '-1'
		))){
			$this->Session->setFlash(__('Wrong product', true));
			$this->redirect(array('action'=>'blanck'));	
		}
        $this->set(array(
            'imageName'   => $imageName,
            'imageWidth'  => $this->Upload->getWidth($imagePath),
            'imageHeight' => $this->Upload->getHeight($imagePath),
            'cropWidth'   => $cropWidth,
            'cropHeight'  => $cropHeight,
            'size'        => $size,
            'imageDir'    => $this->Upload->imageUploadDir));
    }

    function cropImg($size, $cropWidth, $cropHeight) {
        if (!empty($this->data)) {
            $imagePath = $this->Upload->imageUploadDir . $this->data['Image']['imageName'];
            $cropPath = $this->Upload->imageUploadDir . $size . '_' . $this->data['Image']['imageName'];            
            if ($this->Upload->resizeCropedImage($imagePath, $cropPath, $cropWidth, $cropHeight, $this->data['Image']['w'], $this->data['Image']['h'], $this->data['Image']['x1'], $this->data['Image']['y1'], $this->data['Image']['x2'], $this->data['Image']['y2'])){
                $this->Session->setFlash(__('Done.', true));
            }else
                $this->Session->setFlash(__('Faild! please try again', true));
			$this->redirect($this->referer());
        }
		$this->Session->setFlash(__('No data!', true));
        $this->redirect(array('action'=>'blanck'));
    }
	
	function blanck(){
		
	}

}

?>