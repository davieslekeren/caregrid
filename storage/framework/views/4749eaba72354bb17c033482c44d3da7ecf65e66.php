<?php
    $admin_logo = getSettingsValByName('company_logo');
    $ids = parentId();
    $authUser = \App\Models\User::find($ids);
    $subscription = \App\Models\Subscription::find($authUser->subscription);
    $routeName = \Request::route()->getName();
    $pricing_feature_settings = getSettingsValByIdName(1, 'pricing_feature');
?>
<nav class="pc-sidebar">
    <div class="navbar-wrapper">
        <div class="m-header">
            <a href="#" class="b-brand text-primary">
                <img src="<?php echo e(asset(Storage::url('upload/logo/')) . '/' . (isset($admin_logo) && !empty($admin_logo) ? $admin_logo : 'logo.png')); ?>"
                    alt="" class="logo logo-lg" />
            </a>
        </div>
        <div class="navbar-content">
            <ul class="pc-navbar">
                <li class="pc-item pc-caption">
                    <label><?php echo e(__('Home')); ?></label>
                    <i class="ti ti-dashboard"></i>
                </li>
                <li class="pc-item <?php echo e(in_array($routeName, ['dashboard', 'home', '']) ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('dashboard')); ?>" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-dashboard"></i></span>
                        <span class="pc-mtext"><?php echo e(__('Dashboard')); ?></span>
                    </a>
                </li>
                <?php if(\Auth::user()->type == 'super admin'): ?>
                    <?php if(Gate::check('manage user')): ?>
                        <li class="pc-item <?php echo e(in_array($routeName, ['users.index', 'users.show']) ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('users.index')); ?>" class="pc-link">
                                <span class="pc-micon"><i class="ti ti-user-plus"></i></span>
                                <span class="pc-mtext"><?php echo e(__('Customers')); ?></span>
                            </a>
                        </li>
                    <?php endif; ?>
                <?php else: ?>
                    <?php if(Gate::check('manage user') || Gate::check('manage role') || Gate::check('manage logged history')): ?>
                        <li
                            class="pc-item pc-hasmenu <?php echo e(in_array($routeName, ['users.index', 'logged.history', 'role.index', 'role.create', 'role.edit']) ? 'pc-trigger active' : ''); ?>">
                            <a href="#!" class="pc-link">
                                <span class="pc-micon">
                                    <i class="ti ti-users"></i>
                                </span>
                                <span class="pc-mtext"><?php echo e(__('Staff Management')); ?></span>
                                <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                            </a>
                            <ul class="pc-submenu"
                                style="display: <?php echo e(in_array($routeName, ['users.index', 'logged.history', 'role.index', 'role.create', 'role.edit']) ? 'block' : 'none'); ?>">
                                <?php if(Gate::check('manage user')): ?>
                                    <li class="pc-item <?php echo e(in_array($routeName, ['users.index']) ? 'active' : ''); ?>">
                                        <a class="pc-link" href="<?php echo e(route('users.index')); ?>"><?php echo e(__('Users')); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(Gate::check('manage role')): ?>
                                    <li
                                        class="pc-item  <?php echo e(in_array($routeName, ['role.index', 'role.create', 'role.edit']) ? 'active' : ''); ?>">
                                        <a class="pc-link" href="<?php echo e(route('role.index')); ?>"><?php echo e(__('Roles')); ?> </a>
                                    </li>
                                <?php endif; ?>
                                <?php if($pricing_feature_settings == 'off' || $subscription->enabled_logged_history == 1): ?>
                                    <?php if(Gate::check('manage logged history')): ?>
                                        <li
                                            class="pc-item  <?php echo e(in_array($routeName, ['logged.history']) ? 'active' : ''); ?>">
                                            <a class="pc-link"
                                                href="<?php echo e(route('logged.history')); ?>"><?php echo e(__('Logged History')); ?></a>
                                        </li>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </ul>
                        </li>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if(Gate::check('manage contact') || Gate::check('manage note')): ?>
                    <li class="pc-item pc-caption">
                        <label><?php echo e(__('Business Management')); ?></label>
                        <i class="ti ti-chart-arcs"></i>
                    </li>

                    <?php if(Gate::check('manage client')): ?>
                        <li
                            class="pc-item pc-hasmenu <?php echo e(in_array($routeName, ['client.index', 'client.show']) ? 'active' : ''); ?>">
                            <a href="#!" class="pc-link" href="<?php echo e(route('client.index')); ?>">
                                <span class="pc-micon"><i data-feather="user-check"></i></span>
                                <span class="pc-mtext"><?php echo e(__('Client')); ?></span>
                                <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                            </a>
                                <ul class="pc-submenu"
                                style="display: <?php echo e(in_array($routeName, ['client.index', 'client.show']) ? 'active' : ''); ?>">
                                <?php if(Gate::check('manage client')): ?>
                                    <li class="pc-item pc-hasmenu <?php echo e(in_array($routeName, ['client.index', 'client.show']) ? 'active' : ''); ?>">
                                        <a class="pc-link" href="<?php echo e(route('client.index')); ?>"><?php echo e(__('AAR Healthcare')); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(Gate::check('manage client')): ?>
                                    <li class="pc-item pc-hasmenu <?php echo e(in_array($routeName, ['client.index', 'client.show']) ? 'active' : ''); ?>">
                                        <a class="pc-link" href="<?php echo e(route('client.index')); ?>"><?php echo e(__('Fidelity Insurance')); ?></a>
                                    </li>
                                <?php endif; ?>
                                
                            </ul>
                        </li>
                    <?php endif; ?>
                    <?php if(Gate::check('manage service & part')): ?>
                        <li
                            class="pc-item <?php echo e(in_array($routeName, ['services-parts.index', 'services-parts.show']) ? 'active' : ''); ?>">
                            <a class="pc-link" href="<?php echo e(route('services-parts.index')); ?>">
                                <span class="pc-micon"><i data-feather="list"></i></span>
                                <span class="pc-mtext"><?php echo e(__('Services & Parts')); ?></span>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if(Gate::check('manage asset')): ?>
                        <li class="pc-item <?php echo e(in_array($routeName, ['asset.index']) ? 'active' : ''); ?>">
                            <a class="pc-link" href="<?php echo e(route('asset.index')); ?>">
                                <span class="pc-micon"><i data-feather="shopping-cart"></i></span>
                                <span class="pc-mtext"><?php echo e(__('Asset')); ?></span>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if(Gate::check('manage wo request')): ?>
                        <li class="pc-item <?php echo e(in_array($routeName, ['wo-request.index']) ? 'active' : ''); ?>">
                            <a class="pc-link" href="<?php echo e(route('wo-request.index')); ?>">
                                <span class="pc-micon"><i data-feather="navigation"></i></span>
                                <span class="pc-mtext"><?php echo e(__('WO Request')); ?></span>
                            </a>
                        </li>
                    <?php endif; ?>
                    <!--<?php if(Gate::check('manage estimation')): ?>-->
                    <!--    <li-->
                    <!--        class="pc-item <?php echo e(in_array($routeName, ['estimation.index', 'estimation.create', 'estimation.edit', 'estimation.show']) ? 'active' : ''); ?>">-->
                    <!--        <a class="pc-link" href="<?php echo e(route('estimation.index')); ?>">-->
                    <!--            <span class="pc-micon"><i data-feather="file-text"></i></span>-->
                    <!--            <span class="pc-mtext"><?php echo e(__('Estimation')); ?></span>-->
                    <!--        </a>-->
                    <!--    </li>-->
                    <!--<?php endif; ?>-->

                    <?php if(Gate::check('manage work order')): ?>
                        <li
                            class="pc-item <?php echo e(in_array($routeName, ['workorder.index', 'workorder.create', 'workorder.edit', 'workorder.show']) ? 'active' : ''); ?>">
                            <a class="pc-link" href="<?php echo e(route('workorder.index')); ?>">
                                <span class="pc-micon"><i data-feather="award"></i></span>
                                <span class="pc-mtext"><?php echo e(__('Work Order')); ?></span>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if(Gate::check('manage invoice')): ?>
                        <li
                            class="pc-item <?php echo e(in_array($routeName, ['invoice.index', 'invoice.show']) ? 'active' : ''); ?>">
                            <a class="pc-link" href="<?php echo e(route('invoice.index')); ?>">
                                <span class="pc-micon"><i data-feather="file-plus"></i></span>
                                <span class="pc-mtext"><?php echo e(__('Invoice')); ?></span>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if(Gate::check('manage contact')): ?>
                        <li class="pc-item <?php echo e(in_array($routeName, ['contact.index']) ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('contact.index')); ?>" class="pc-link">
                                <span class="pc-micon"><i class="ti ti-phone-call"></i></span>
                                <span class="pc-mtext"><?php echo e(__('Contact Diary')); ?></span>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if(Gate::check('manage note')): ?>
                        <li class="pc-item <?php echo e(in_array($routeName, ['note.index']) ? 'active' : ''); ?> ">
                            <a href="<?php echo e(route('note.index')); ?>" class="pc-link">
                                <span class="pc-micon"><i class="ti ti-notebook"></i></span>
                                <span class="pc-mtext"><?php echo e(__('Notice Board')); ?></span>
                            </a>
                        </li>
                    <?php endif; ?>
                <?php endif; ?>


                <?php if(Gate::check('manage notification')): ?>
                    <li class="pc-item pc-caption">
                        <label><?php echo e(__('System Configuration')); ?></label>
                        <i class="ti ti-chart-arcs"></i>
                    </li>

                    <?php if(Gate::check('manage wo type')): ?>
                        <li class="pc-item <?php echo e(in_array($routeName, ['wo-type.index']) ? 'active' : ''); ?>">
                            <a class="pc-link" href="<?php echo e(route('wo-type.index')); ?>">
                                <span class="pc-micon"><i data-feather="sliders"></i></span>
                                <span class="pc-mtext"><?php echo e(__('WO Type')); ?></span>
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php if(Gate::check('manage notification')): ?>
                        <li class="pc-item <?php echo e(in_array($routeName, ['notification.index']) ? 'active' : ''); ?> ">
                            <a href="<?php echo e(route('notification.index')); ?>" class="pc-link">
                                <span class="pc-micon"><i class="ti ti-bell"></i></span>
                                <span class="pc-mtext"><?php echo e(__('Email Notification')); ?></span>
                            </a>
                        </li>
                    <?php endif; ?>
                <?php endif; ?>


                <?php if(Gate::check('manage pricing packages') ||
                        Gate::check('manage pricing transation') ||
                        Gate::check('manage account settings') ||
                        Gate::check('manage password settings') ||
                        Gate::check('manage general settings') ||
                        Gate::check('manage email settings') ||
                        Gate::check('manage payment settings') ||
                        Gate::check('manage company settings') ||
                        Gate::check('manage seo settings') ||
                        Gate::check('manage google recaptcha settings')): ?>
                    <li class="pc-item pc-caption">
                        <label><?php echo e(__('System Settings')); ?></label>
                        <i class="ti ti-chart-arcs"></i>
                    </li>

                    <?php if(Gate::check('manage FAQ') || Gate::check('manage Page')): ?>
                        <li
                            class="pc-item pc-hasmenu <?php echo e(in_array($routeName, ['homepage.index', 'FAQ.index', 'pages.index', 'footerSetting']) ? 'active' : ''); ?>">
                            <a href="#!" class="pc-link">
                                <span class="pc-micon">
                                    <i class="ti ti-layout-rows"></i>
                                </span>
                                <span class="pc-mtext"><?php echo e(__('CMS')); ?></span>
                                <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                            </a>
                            <ul class="pc-submenu"
                                style="display: <?php echo e(in_array($routeName, ['homepage.index', 'FAQ.index', 'pages.index', 'footerSetting']) ? 'block' : 'none'); ?>">
                                <?php if(Gate::check('manage home page')): ?>
                                    <li
                                        class="pc-item <?php echo e(in_array($routeName, ['homepage.index']) ? 'active' : ''); ?> ">
                                        <a href="<?php echo e(route('homepage.index')); ?>"
                                            class="pc-link"><?php echo e(__('Home Page')); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(Gate::check('manage Page')): ?>
                                    <li class="pc-item <?php echo e(in_array($routeName, ['pages.index']) ? 'active' : ''); ?> ">
                                        <a href="<?php echo e(route('pages.index')); ?>"
                                            class="pc-link"><?php echo e(__('Custom Page')); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(Gate::check('manage FAQ')): ?>
                                    <li class="pc-item <?php echo e(in_array($routeName, ['FAQ.index']) ? 'active' : ''); ?> ">
                                        <a href="<?php echo e(route('FAQ.index')); ?>" class="pc-link"><?php echo e(__('FAQ')); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(Gate::check('manage footer')): ?>
                                    <li
                                        class="pc-item <?php echo e(in_array($routeName, ['footerSetting']) ? 'active' : ''); ?> ">
                                        <a href="<?php echo e(route('footerSetting')); ?>"
                                            class="pc-link"><?php echo e(__('Footer')); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(Gate::check('manage auth page')): ?>
                                    <li
                                        class="pc-item <?php echo e(in_array($routeName, ['authPage.index']) ? 'active' : ''); ?> ">
                                        <a href="<?php echo e(route('authPage.index')); ?>"
                                            class="pc-link"><?php echo e(__('Auth Page')); ?></a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </li>
                    <?php endif; ?>
                    <?php if(Auth::user()->type == 'super admin' || $pricing_feature_settings == 'on'): ?>
                        <?php if(Gate::check('manage pricing packages') || Gate::check('manage pricing transation')): ?>
                            <li
                                class="pc-item pc-hasmenu <?php echo e(in_array($routeName, ['subscriptions.index', 'subscriptions.show', 'subscription.transaction']) ? 'pc-trigger active' : ''); ?>">
                                <a href="#!" class="pc-link">
                                    <span class="pc-micon">
                                        <i class="ti ti-package"></i>
                                    </span>
                                    <span class="pc-mtext"><?php echo e(__('Pricing')); ?></span>
                                    <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                                </a>
                                <ul class="pc-submenu"
                                    style="display: <?php echo e(in_array($routeName, ['subscriptions.index', 'subscriptions.show', 'subscription.transaction']) ? 'block' : 'none'); ?>">
                                    <?php if(Gate::check('manage pricing packages')): ?>
                                        <li
                                            class="pc-item <?php echo e(in_array($routeName, ['subscriptions.index', 'subscriptions.show']) ? 'active' : ''); ?>">
                                            <a class="pc-link"
                                                href="<?php echo e(route('subscriptions.index')); ?>"><?php echo e(__('Packages')); ?></a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if(Gate::check('manage pricing transation')): ?>
                                        <li
                                            class="pc-item <?php echo e(in_array($routeName, ['subscription.transaction']) ? 'active' : ''); ?>">
                                            <a class="pc-link"
                                                href="<?php echo e(route('subscription.transaction')); ?>"><?php echo e(__('Transactions')); ?></a>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </li>
                        <?php endif; ?>
                    <?php endif; ?>
                    <?php if(Gate::check('manage coupon') || Gate::check('manage coupon history')): ?>
                        <li
                            class="pc-item pc-hasmenu <?php echo e(in_array($routeName, ['coupons.index', 'coupons.history']) ? 'active' : ''); ?>">
                            <a href="#!" class="pc-link">
                                <span class="pc-micon">
                                    <i class="ti ti-shopping-cart-discount"></i>
                                </span>
                                <span class="pc-mtext"><?php echo e(__('Coupons')); ?></span>
                                <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                            </a>
                            <ul class="pc-submenu"
                                style="display: <?php echo e(in_array($routeName, ['coupons.index', 'coupons.history']) ? 'block' : 'none'); ?>">
                                <?php if(Gate::check('manage coupon')): ?>
                                    <li class="pc-item <?php echo e(in_array($routeName, ['coupons.index']) ? 'active' : ''); ?>">
                                        <a class="pc-link"
                                            href="<?php echo e(route('coupons.index')); ?>"><?php echo e(__('All Coupon')); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(Gate::check('manage coupon history')): ?>
                                    <li
                                        class="pc-item <?php echo e(in_array($routeName, ['coupons.history']) ? 'active' : ''); ?>">
                                        <a class="pc-link"
                                            href="<?php echo e(route('coupons.history')); ?>"><?php echo e(__('Coupon History')); ?></a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </li>
                    <?php endif; ?>
                    <?php if(Gate::check('manage account settings') ||
                            Gate::check('manage password settings') ||
                            Gate::check('manage general settings') ||
                            Gate::check('manage email settings') ||
                            Gate::check('manage payment settings') ||
                            Gate::check('manage company settings') ||
                            Gate::check('manage seo settings') ||
                            Gate::check('manage google recaptcha settings')): ?>
                        <li class="pc-item <?php echo e(in_array($routeName, ['setting.index']) ? 'active' : ''); ?> ">
                            <a href="<?php echo e(route('setting.index')); ?>" class="pc-link">
                                <span class="pc-micon"><i class="ti ti-settings"></i></span>
                                <span class="pc-mtext"><?php echo e(__('Settings')); ?></span>
                            </a>
                        </li>
                    <?php endif; ?>

                <?php endif; ?>
            </ul>
            <div class="w-100 text-center">
                <div class="badge theme-version badge rounded-pill bg-light text-dark f-12"></div>
            </div>
        </div>
    </div>
</nav>
<?php /**PATH /home/carecifn/public_html/preprod/resources/views/admin/menu.blade.php ENDPATH**/ ?>