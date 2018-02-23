<div data-scroll-to-active="true" class="main-menu menu-fixed menu-light menu-accordion">
    <div class="main-menu-content ps-container ps-theme-dark ps-active-y" data-ps-id="f6ca0921-1660-f505-a49a-140ec09d8b32">
        <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
            <li class="nav-item">
                <a href="<?php echo base_url(); ?>dashboard.html">
                    <i class="ft-home"></i>
                    <span data-i18n="" class="menu-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo base_url(); ?>listings.html">
                    <i class="ft-layers"></i>
                    <span data-i18n="" class="menu-title">Listings</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo base_url(); ?>campaigns.html">
                    <i class="ft-zap"></i>
                    <span data-i18n="" class="menu-title">Campaigns</span>
                </a>
            </li>
            <li class="nav-item disabled">
                <a href="<?php echo base_url(); ?>inbox.html">
                    <i class="ft-inbox"></i>
                    <span data-i18n="" class="menu-title">Inbox</span>
                </a>
            </li>
            <li class="nav-item disabled">
                <a href="<?php echo base_url(); ?>outbox.html">
                    <i class="fa fa-paper-plane-o"></i>
                    <span data-i18n="" class="menu-title">Outbox</span>
                </a>
            </li>
            <?php
            if($this->session->userdata('isadmin')==1):?>
                <li class="nav-item">
                    <a href="<?php echo base_url(); ?>countries.html">
                        <i class="fa fa-globe"></i>
                        <span data-i18n="" class="menu-title">Countries</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?php echo base_url(); ?>campaign-numbers.html">
                        <i class="fa fa-phone-square"></i>
                        <span data-i18n="" class="menu-title">Campaign Numbers</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?php echo base_url(); ?>users.html">
                        <i class="ft-user"></i>
                        <span data-i18n="" class="menu-title">Users</span>
                    </a>
                </li>
            <?php endif;?>
        </ul>
        <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: -45px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 48px; height: 661px; right: 3px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 13px; height: 189px;"></div></div></div>
</div>