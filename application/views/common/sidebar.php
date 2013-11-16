   <?php   $controler_name =  get_instance()->uri->rsegments[1]; ?>    
   <?php  $method_name =  get_instance()->uri->rsegments[2]; ?>    
   <!-- start: SIDEBAR -->
    <div class="main-navigation navbar-collapse collapse">
        <!-- start: MAIN MENU TOGGLER BUTTON -->
        <div class="navigation-toggler">
            <i class="clip-chevron-left"></i>
            <i class="clip-chevron-right"></i>
        </div>
        <!-- end: MAIN MENU TOGGLER BUTTON -->
        <!-- start: MAIN NAVIGATION MENU -->
        <ul class="main-navigation-menu">
            <li<?php if($controler_name =='dashboard'):?> class="active open"<?php endif;?>>
                <a href="<?php echo site_url('dashboard'); ?>"><i class="clip-home-3"></i>
                    <span class="title"> Dashboard </span><span class="selected"></span>
                </a>
            </li>
            <li<?php if($controler_name =='user'):?> class="active open"<?php endif;?>>
                <a href="<?php echo site_url('user'); ?>"><i class="clip-facebook"></i>
                    <span class="title">Classmates</span><span class="selected"></span>
                </a>
            </li>
            <li<?php if($controler_name =='vocabulary'):?> class="active open"<?php endif;?>>
                <a href="<?php echo site_url('vocabulary'); ?>"><i class="clip-plus-circle-2"></i>
                    <span class="title">Vocabulary</span><span class="selected"></span>
                </a>
            </li>
            <li>
                <a href="javascript:;"><i class="clip-question"></i>
                    <span class="title">Questions &amp Answers </span><i class="icon-arrow"></i>
                    <span class="selected"></span>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="ui_elements.html">
                            <span class="title"> Ask A Question </span>
                        </a>
                    </li>
                    <li>
                        <a href="ui_buttons.html">
                            <span class="title"> Important Questions </span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>  
                <a href="javascript:void(0)"><i class="clip-grid-6"></i>
                    <span class="title"> Tables </span><i class="icon-arrow"></i>
                    <span class="selected"></span>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="<?php echo site_url('tables/scoreboard'); ?>">
                            <span class="title">Score Board</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('tables/exammarks'); ?>">
                            <span class="title">Exam Marks</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <span class="title">Work Charts</span> <i class="icon-arrow"></i>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="javascript:;">
                                    Ireggular Verbs 
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    Using "go" verb 
                                </a>
                           
                            </li>
                            <li>
                                <a href="#">
                                    Verbs without "-ing"
                                </a>
                            </li>
                        </ul>

                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0)"><i class="clip-file"></i>
                    <span class="title"> Documents </span><i class="icon-arrow"></i>
                    <span class="selected"></span>
                </a>
                <ul class="sub-menu">
                 <li>
                        <a href="<?php echo site_url('documents/all'); ?>">
                            <span class="title">All</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('documents/projects'); ?>">
                            <span class="title">Projects</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('documents/homeworks'); ?>">
                            <span class="title">Homeworks</span>
                        </a>
                    </li>
                </ul>
            </li>     
            <li>
                <a href="<?php echo site_url('tables/statistics'); ?>"><i class="clip-bars"></i>
                    <span class="title">Statistics</span>
                    <span class="selected"></span>
                </a>
            </li>
        </ul>
        <!-- end: MAIN NAVIGATION MENU -->
    </div>
    <!-- end: SIDEBAR -->