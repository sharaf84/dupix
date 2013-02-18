<?php
echo $this->Javascript->link(
    array(
        'front/jquery.jcarousel.min',
        'front/jquery.history',
        'front/jquery.galleriffic',
        'front/jquery.galleriffic.custom',
        'front/jquery.opacityrollover',
        'ajaxupload/jquery.html5.upload',
        'ajaxupload/jquery.html5.upload.custom'
    )
    , false
);
?>
<script type="text/javascript">
    document.write('<style>.noscript { display: none; }</style>');    
</script>

<div id="contain">
    <div id="container">
        <div class="profile-photos">
            <div class="profile-photos-left">
                <div class="profile-pesonal-img"><img src="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>personal.jpg" width="180" height="180" border="0" /></div>
                <div class="profile-pesonal-name">Yasmine Ali</div>
            </div>
            <div class="profile-photos-right">
                <div class="profile-cover-img"><img src="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>cover.jpg" width="505" height="180" border="0" /></div>
                <div class="profile-menu"><a href="#">Create new Album</a> |   <a href="#addImage" id="addImageLink">Upload a Photo</a> |   <a href="#removeImageByIndex" id="removeImageByIndexLink">Delete Photo(s)</a> |   <a href="#">Update Profile info</a></div>
            </div>
        </div>
        <div class="profile-albums">
            <div id="tab" class="secTabs">
                <ul class="tabs">
                    <li><a class="my-albums" href="#tab1">MY ALBUMS</a></li>
                    <li><a class="shared-albums" href="#tab2">SHARED ALBUMS</a></li>
                </ul>
                <div class="tab_container">

                    <div style="display: none;" id="tab1" class="tab_content"><ul id="mycarousel" class="jcarousel-skin-tango">
                            <li>
                                <div class="album-name">Mustafa's Pics</div>
                                <div class="album-option">
                                    <a href="javascript:animatedcollapse.toggle('menu-stores')"><img src="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>plus.png" width="30" height="30" border="0" /></a>
                                </div>
                                <div class="album-pop" id="menu-stores">
                                    <div class="album-pop-arw"><img src="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>arw-album.png" border="0" /></div>
                                    <div class="album-pop-links">
                                        <a href="#">Rename</a>
                                        <a href="#">Delete</a>
                                        <a href="#">Share public</a>
                                        <a href="#">Share private</a>
                                        <a href="#">Pin</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="album-name">Mustafa's Pics</div>
                                <div class="album-option">
                                    <a href="javascript:animatedcollapse.toggle('menu-stores1')"><img src="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>plus.png" width="30" height="30" border="0" /></a>
                                </div>
                                <div class="album-pop" id="menu-stores1">
                                    <div class="album-pop-arw"><img src="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>arw-album.png" border="0" /></div>
                                    <div class="album-pop-links">
                                        <a href="#">Rename</a>
                                        <a href="#">Delete</a>
                                        <a href="#">Share public</a>
                                        <a href="#">Share private</a>
                                        <a href="#">Pin</a>
                                    </div>
                                </div>
                            </li>
                            <li class="selected">
                                <div class="album-name">Mustafa's Pics</div>
                                <div class="album-option">
                                    <a href="javascript:animatedcollapse.toggle('menu-stores2')"><img src="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>plus.png" width="30" height="30" border="0" /></a>
                                </div>
                                <div class="album-pop" id="menu-stores2">
                                    <div class="album-pop-arw"><img src="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>arw-album.png" border="0" /></div>
                                    <div class="album-pop-links">
                                        <a href="#">Rename</a>
                                        <a href="#">Delete</a>
                                        <a href="#">Share public</a>
                                        <a href="#">Share private</a>
                                        <a href="#">Pin</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="album-name">Mustafa's Pics</div>
                                <div class="album-option">
                                    <a href="javascript:animatedcollapse.toggle('menu-stores3')"><img src="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>plus.png" width="30" height="30" border="0" /></a>
                                </div>
                                <div class="album-pop" id="menu-stores3">
                                    <div class="album-pop-arw"><img src="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>arw-album.png" border="0" /></div>
                                    <div class="album-pop-links">
                                        <a href="#">Rename</a>
                                        <a href="#">Delete</a>
                                        <a href="#">Share public</a>
                                        <a href="#">Share private</a>
                                        <a href="#">Pin</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="album-name">Mustafa's Pics</div>
                                <div class="album-option">
                                    <a href="javascript:animatedcollapse.toggle('menu-stores4')"><img src="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>plus.png" width="30" height="30" border="0" /></a>
                                </div>
                                <div class="album-pop" id="menu-stores4">
                                    <div class="album-pop-arw"><img src="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>arw-album.png" border="0" /></div>
                                    <div class="album-pop-links">
                                        <a href="#">Rename</a>
                                        <a href="#">Delete</a>
                                        <a href="#">Share public</a>
                                        <a href="#">Share private</a>
                                        <a href="#">Pin</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="album-name">Mustafa's Pics</div>
                                <div class="album-option">
                                    <a href="javascript:animatedcollapse.toggle('menu-stores5')"><img src="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>plus.png" width="30" height="30" border="0" /></a>
                                </div>
                                <div class="album-pop" id="menu-stores5">
                                    <div class="album-pop-arw"><img src="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>arw-album.png" border="0" /></div>
                                    <div class="album-pop-links">
                                        <a href="#">Rename</a>
                                        <a href="#">Delete</a>
                                        <a href="#">Share public</a>
                                        <a href="#">Share private</a>
                                        <a href="#">Pin</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="album-name">Mustafa's Pics</div>
                                <div class="album-option">
                                    <a href="javascript:animatedcollapse.toggle('menu-stores6')"><img src="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>plus.png" width="30" height="30" border="0" /></a>
                                </div>
                                <div class="album-pop" id="menu-stores6">
                                    <div class="album-pop-arw"><img src="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>arw-album.png" border="0" /></div>
                                    <div class="album-pop-links">
                                        <a href="#">Rename</a>
                                        <a href="#">Delete</a>
                                        <a href="#">Share public</a>
                                        <a href="#">Share private</a>
                                        <a href="#">Pin</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="album-name">Mustafa's Pics</div>
                                <div class="album-option">
                                    <a href="javascript:animatedcollapse.toggle('menu-stores7')"><img src="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>plus.png" width="30" height="30" border="0" /></a>
                                </div>
                                <div class="album-pop" id="menu-stores7">
                                    <div class="album-pop-arw"><img src="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>arw-album.png" border="0" /></div>
                                    <div class="album-pop-links">
                                        <a href="#">Rename</a>
                                        <a href="#">Delete</a>
                                        <a href="#">Share public</a>
                                        <a href="#">Share private</a>
                                        <a href="#">Pin</a>
                                    </div>
                                </div>
                            </li>
                        </ul></div>

                    <div style="display: none;" id="tab2" class="tab_content"><ul id="mycarousel2" class="jcarousel-skin-tango">
                            <li>
                                <div class="album-name">Mustafa's Pics</div>
                                <div class="album-option">
                                    <a href="javascript:animatedcollapse.toggle('menu-stores')"><img src="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>plus.png" width="30" height="30" border="0" /></a>
                                </div>
                                <div class="album-pop" id="menu-stores">
                                    <div class="album-pop-arw"><img src="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>arw-album.png" border="0" /></div>
                                    <div class="album-pop-links">
                                        <a href="#">Rename</a>
                                        <a href="#">Delete</a>
                                        <a href="#">Share public</a>
                                        <a href="#">Share private</a>
                                        <a href="#">Pin</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="album-name">Mustafa's Pics</div>
                                <div class="album-option">
                                    <a href="javascript:animatedcollapse.toggle('menu-stores1')"><img src="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>plus.png" width="30" height="30" border="0" /></a>
                                </div>
                                <div class="album-pop" id="menu-stores1">
                                    <div class="album-pop-arw"><img src="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>arw-album.png" border="0" /></div>
                                    <div class="album-pop-links">
                                        <a href="#">Rename</a>
                                        <a href="#">Delete</a>
                                        <a href="#">Share public</a>
                                        <a href="#">Share private</a>
                                        <a href="#">Pin</a>
                                    </div>
                                </div>
                            </li>
                            <li class="selected">
                                <div class="album-name">Mustafa's Pics</div>
                                <div class="album-option">
                                    <a href="javascript:animatedcollapse.toggle('menu-stores2')"><img src="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>plus.png" width="30" height="30" border="0" /></a>
                                </div>
                                <div class="album-pop" id="menu-stores2">
                                    <div class="album-pop-arw"><img src="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>arw-album.png" border="0" /></div>
                                    <div class="album-pop-links">
                                        <a href="#">Rename</a>
                                        <a href="#">Delete</a>
                                        <a href="#">Share public</a>
                                        <a href="#">Share private</a>
                                        <a href="#">Pin</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="album-name">Mustafa's Pics</div>
                                <div class="album-option">
                                    <a href="javascript:animatedcollapse.toggle('menu-stores3')"><img src="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>plus.png" width="30" height="30" border="0" /></a>
                                </div>
                                <div class="album-pop" id="menu-stores3">
                                    <div class="album-pop-arw"><img src="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>arw-album.png" border="0" /></div>
                                    <div class="album-pop-links">
                                        <a href="#">Rename</a>
                                        <a href="#">Delete</a>
                                        <a href="#">Share public</a>
                                        <a href="#">Share private</a>
                                        <a href="#">Pin</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="album-name">Mustafa's Pics</div>
                                <div class="album-option">
                                    <a href="javascript:animatedcollapse.toggle('menu-stores4')"><img src="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>plus.png" width="30" height="30" border="0" /></a>
                                </div>
                                <div class="album-pop" id="menu-stores4">
                                    <div class="album-pop-arw"><img src="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>arw-album.png" border="0" /></div>
                                    <div class="album-pop-links">
                                        <a href="#">Rename</a>
                                        <a href="#">Delete</a>
                                        <a href="#">Share public</a>
                                        <a href="#">Share private</a>
                                        <a href="#">Pin</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="album-name">Mustafa's Pics</div>
                                <div class="album-option">
                                    <a href="javascript:animatedcollapse.toggle('menu-stores5')"><img src="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>plus.png" width="30" height="30" border="0" /></a>
                                </div>
                                <div class="album-pop" id="menu-stores5">
                                    <div class="album-pop-arw"><img src="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>arw-album.png" border="0" /></div>
                                    <div class="album-pop-links">
                                        <a href="#">Rename</a>
                                        <a href="#">Delete</a>
                                        <a href="#">Share public</a>
                                        <a href="#">Share private</a>
                                        <a href="#">Pin</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="album-name">Mustafa's Pics</div>
                                <div class="album-option">
                                    <a href="javascript:animatedcollapse.toggle('menu-stores6')"><img src="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>plus.png" width="30" height="30" border="0" /></a>
                                </div>
                                <div class="album-pop" id="menu-stores6">
                                    <div class="album-pop-arw"><img src="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>arw-album.png" border="0" /></div>
                                    <div class="album-pop-links">
                                        <a href="#">Rename</a>
                                        <a href="#">Delete</a>
                                        <a href="#">Share public</a>
                                        <a href="#">Share private</a>
                                        <a href="#">Pin</a>
                                    </div>
                                </div>
                            </li>
                        </ul></div>
                </div>
            </div>
        </div>
        <div class="profile-gallery">
            <div id="gallery" class="content">
                <div class="slideshow-container">
                    <div id="loading" class="loader"></div>
                    <div id="slideshow" class="slideshow"></div>
                    <div id="caption" class="caption-container"></div>
                </div>
                <div class="vote-select">
                    <div class="img-vote">
                        <div class="img-vote-tit">Vote for this picture:</div>
                        <div class="img-voteing"><a href="#"><img src="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>vote.jpg" width="130" height="23" border="0" /></a></div>
                    </div>
                    <a href=""><div class="img-select">SELECT THIS PICTURE</div></a>
                </div>
            </div>
            <div id="thumbs" class="navigation">
                <div class="album-tit-share">
                    <div class="album-title">Personal Pics</div>
                    <div class="album-share">
                        <div class="album-share-tit">Share Album</div>
                        <div class="album-share-items"><a href="#"><img src="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>album-share.jpg" width="124" height="21" border="0" /></a></div>
                    </div>
                </div>
                <ul class="thumbs noscript">
                    <li>
                        <a class="thumb" name="leaf" href="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>album-img.jpg" title="Title #0">
                            <img width="101" height="63" src="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>album-img.jpg" alt="Title #0" />
                        </a>
                        <div class="caption">
                            <div class="image-title">
                                <a href="#">MOVE</a>
                                <a href="#">COPY</a>
                                <a href="#">DELETE</a>
                                <a href="#">SHARE</a>
                            </div>
                            <div class="image-desc"><a href="#"><img src="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>album-share.jpg" width="124" height="21" border="0" /></a></div>
                        </div>
                    </li>
                    <li>
                        <a class="thumb" name="leaf" href="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>album-img.jpg" title="Title #0">
                            <img width="101" height="63" src="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>album-img.jpg" alt="Title #0" />
                        </a>
                        <div class="caption">
                            <div class="image-title">Title #0</div>
                            <div class="image-desc">Description</div>
                        </div>
                    </li>
                    <li>
                        <a class="thumb" name="leaf" href="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>album-img.jpg" title="Title #0">
                            <img width="101" height="63" src="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>album-img.jpg" alt="Title #0" />
                        </a>
                        <div class="caption">
                            <div class="image-title">Title #0</div>
                            <div class="image-desc">Description</div>
                        </div>
                    </li>
                    <li>
                        <a class="thumb" name="leaf" href="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>album-img.jpg" title="Title #0">
                            <img width="101" height="63" src="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>album-img.jpg" alt="Title #0" />
                        </a>
                        <div class="caption">
                            <div class="image-title">Title #0</div>
                            <div class="image-desc">Description</div>
                        </div>
                    </li>
                    <li>
                        <a class="thumb" name="leaf" href="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>album-img.jpg" title="Title #0">
                            <img width="101" height="63" src="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>album-img.jpg" alt="Title #0" />
                        </a>
                        <div class="caption">
                            <div class="image-title">Title #0</div>
                            <div class="image-desc">Description</div>
                        </div>
                    </li>
                    <li>
                        <a class="thumb" name="leaf" href="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>album-img.jpg" title="Title #0">
                            <img width="101" height="63" src="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>album-img.jpg" alt="Title #0" />
                        </a>
                        <div class="caption">
                            <div class="image-title">Title #0</div>
                            <div class="image-desc">Description</div>
                        </div>
                    </li>
                    <li>
                        <a class="thumb" name="leaf" href="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>album-img.jpg" title="Title #0">
                            <img width="101" height="63" src="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>album-img.jpg" alt="Title #0" />
                        </a>
                        <div class="caption">
                            <div class="image-title">Title #0</div>
                            <div class="image-desc">Description</div>
                        </div>
                    </li>
                    <li>
                        <a class="thumb" name="leaf" href="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>album-img.jpg" title="Title #0">
                            <img width="101" height="63" src="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>album-img.jpg" alt="Title #0" />
                        </a>
                        <div class="caption">
                            <div class="image-title">Title #0</div>
                            <div class="image-desc">Description</div>
                        </div>
                    </li>
                    <li>
                        <a class="thumb" name="leaf" href="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>album-img.jpg" title="Title #0">
                            <img width="101" height="63" src="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>album-img.jpg" alt="Title #0" />
                        </a>
                        <div class="caption">
                            <div class="image-title">Title #0</div>
                            <div class="image-desc">Description</div>
                        </div>
                    </li>
                    <li>
                        <a class="thumb" name="leaf" href="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>album-img.jpg" title="Title #0">
                            <img width="101" height="63" src="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>album-img.jpg" alt="Title #0" />
                        </a>
                        <div class="caption">
                            <div class="image-title">Title #0</div>
                            <div class="image-desc">Description</div>
                        </div>
                    </li>
                    <li>
                        <a class="thumb" name="leaf" href="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>album-img.jpg" title="Title #0">
                            <img width="101" height="63" src="<?php echo $this->Session->read('Setting.url') . '/img/front/'; ?>album-img.jpg" alt="Title #0" />
                        </a>
                        <div class="caption">
                            <div class="image-title">Title #0</div>
                            <div class="image-desc">Description</div>
                        </div>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</div>
