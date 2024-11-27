<div class="layout-wrapper layout-content-navbar  ">
    <div class="layout-container">
        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
            <div class="app-brand demo ">
                <a href="#" class="app-brand-link">
                    <span class="app-brand-logo">
                        <img src="<?= base_url() ?>assets/img/pgn_logo.png" class="img-fluid mt-2" style="max-height: 25px;" alt="Logo PGN" />
                    </span>
                </a>

                <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
                    <i class="ti menu-toggle-icon d-none d-xl-block align-middle"></i>
                    <i class="ti ti-x d-block d-xl-none ti-md align-middle"></i>
                </a>
            </div>

            <div class="menu-inner-shadow"></div>

            <ul class="menu-inner py-1">
                <!-- Dashboards -->
                <li class="menu-item <?= (service('uri')->getSegment(1) == '' || service('uri')->getSegment(1) == 'dashboard') ? 'active' : '' ?>">
                    <a href="<?= base_url() ?>dashboard" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-smart-home"></i>
                        <div data-i18n="Dashboards">Dashboards</div>
                    </a>
                </li>

                <!-- Apps & Pages -->
                <li class="menu-header small">
                    <span class="menu-header-text" data-i18n="Apps & Pages">
                        <?= session()->get('user')['role'] == '1' ? 'Admin' : (session()->get('user')['role'] == '2' ? 'Operator' : '') ?>
                    </span>
                </li>

                <?php if (session()->get('user')['role'] == '1') : ?>
                    <!-- Menu untuk Admin -->
                    <li class="menu-item <?= (service('uri')->getSegment(1) == 'Pelanggan' && service('uri')->getSegment(2) == 'inputPelanggan') ? 'active' : '' ?>">
                        <a href="<?= base_url('Pelanggan/inputPelanggan') ?>" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-database"></i>
                            <div data-i18n="Email">Entry Pelanggan</div>
                        </a>
                    </li>
                    <li class="menu-item <?= (service('uri')->getSegment(1) == 'Pelanggan' && service('uri')->getSegment(2) == 'listPelanggan') ? 'active' : '' ?>">
                        <a href="<?= base_url('Pelanggan/listPelanggan') ?>" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-list"></i>
                            <div data-i18n="Chat">List Pelanggan</div>
                        </a>
                    </li>
                    <li class="menu-item <?= (service('uri')->getSegment(1) == 'Pelanggan' && service('uri')->getSegment(2) == 'listPemakaian') ? 'active' : '' ?>">
                        <a href="<?= base_url('Pelanggan/listPemakaian') ?>" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-list"></i>
                            <div data-i18n="Chat">List Pemakaian</div>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if (session()->get('user')['role'] == '2') : ?>
                    <!-- Menu untuk Operator -->
                    <li class="menu-item <?= (service('uri')->getSegment(1) == 'Pelanggan' && service('uri')->getSegment(2) == 'inputPemakaian') ? 'active' : '' ?>">
                        <a href="<?= base_url('Pelanggan/inputPemakaian') ?>" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-database"></i>
                            <div data-i18n="Email">Entry Pemakaian</div>
                        </a>
                    </li>
                <?php endif; ?>

                <!-- Misc -->
                <li class="menu-header small">
                    <span class="menu-header-text" data-i18n="Misc">Misc</span>
                </li>

                <li class="menu-item">
                    <a href="#" target="_blank" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-lifebuoy"></i>
                        <div data-i18n="Support">Support</div>
                    </a>
                </li>

                <li class="menu-item">
                    <a href="#" target="_blank" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-file-description"></i>
                        <div data-i18n="Documentation">Documentation</div>
                    </a>
                </li>
            </ul>

        </aside>
        <!-- / Menu -->