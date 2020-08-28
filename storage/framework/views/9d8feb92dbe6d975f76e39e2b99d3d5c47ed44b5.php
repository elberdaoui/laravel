<body class="cat__config--horizontal cat__menu-left--colorful cat__config--superclean">

<nav class="cat__menu-left">
    <div class="cat__menu-left__lock cat__menu-left__action--menu-toggle">
        <div class="cat__menu-left__pin-button">
            <div><!-- --></div>
        </div>
    </div>
    <div class="cat__menu-left__logo">
        <a href="<?php echo e(url('dashboard')); ?>">
            <img src="<?php echo asset('/dist/modules/dummy-assets/common/img/logo-Devosoft.jpg'); ?>" />
        </a>
    </div>
    <div class="cat__menu-left__inner">
        <ul class="cat__menu-left__list cat__menu-left__list--root">
            
            <li class="cat__menu-left__item cat__menu-left__submenu">
                <a href="javascript: void(0);">
                    <span class="cat__menu-left__icon icmn-users"></span>
                    Users
                </a>
                <ul class="cat__menu-left__list">
                    <li class="cat__menu-left__item">
                        <a href="<?php echo e(url('userCreate')); ?>">
                            <span class="cat__menu-left__icon icmn-user-plus"></span>
                            Add User
                        </a>
                    </li>
                    <li class="cat__menu-left__item">
                        <a href="<?php echo e(url('listUsers')); ?>">
                            <span class="cat__menu-left__icon icmn-users"></span>
                            List Users
                        </a>
                    </li>
                </ul>
            </li>
            <li class="cat__menu-left__item cat__menu-left__submenu">
                <a href="javascript: void(0);">
                    <span class="cat__menu-left__icon icmn-tree"></span>
                    Sectors
                </a>
                <ul class="cat__menu-left__list">
                    <li class="cat__menu-left__item">
                        <a href="<?php echo e(url('secteurCreate')); ?>">
                            <span class="cat__menu-left__icon icmn-plus"></span>
                            Add Sector
                        </a>
                    </li>
                    <li class="cat__menu-left__item">
                        <a href="<?php echo e(url('listSectors')); ?>">
                            <span class="cat__menu-left__icon icmn-list2"></span>
                            List Sector
                        </a>
                    </li>
                </ul>
            </li>

            <li class="cat__menu-left__item cat__menu-left__submenu">
                <a href="javascript: void(0);">
                    <span class="cat__menu-left__icon icmn-location2"></span>
                    City
                </a>
                <ul class="cat__menu-left__list">
                    <li class="cat__menu-left__item">
                        <a href="<?php echo e(url('villeCreate')); ?>">
                            <span class="cat__menu-left__icon icmn-plus"></span>
                            Add City
                        </a>
                    </li>
                    <li class="cat__menu-left__item">
                        <a href="<?php echo e(url('listVilles')); ?>">
                            <span class="cat__menu-left__icon icmn-list2"></span>
                            List City
                    </a>
                   </li>
               </ul>
                   <li class="cat__menu-left__item cat__menu-left__submenu">
                <a href="javascript: void(0);">
                    <span class="cat__menu-left__icon icmn-tree"></span>
                    Bricolers
                </a>
                <ul class="cat__menu-left__list">
                    <li class="cat__menu-left__item">
                        <a href="<?php echo e(url('bricoler/create')); ?>">
                            <span class="cat__menu-left__icon icmn-plus"></span>
                            Add Bricoler
                        </a>
                    </li>
                    <li class="cat__menu-left__item">
                        <a href="<?php echo e(url('bricoler')); ?>">
                            <span class="cat__menu-left__icon icmn-list2"></span>
                            List Bricoler

                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>