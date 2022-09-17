<div class="sidebar sidebar-mode">
    <div class="logo ">
        {{-- <img src={{ asset('media/logo'.'/'.$setting_check->medias->first()->id.'/'.$setting_check->medias->first()->file_name) }} style="display: block; margin: auto"
            width="150" height="130"> --}}
        <a href="{{ url('/') }}" class="simple-text logo-normal text-success">
            {{ $setting_check->name }}
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
                <a class="nav-link nav-link-mode " href="{{ route('home') }}">
                    <i class="fa fa-tachometer {{ $activePage == 'dashboard' ? '' : '' }}" aria-hidden="true"></i>
                    <p>{{ __('translation.website.sidebar.Dashboard') }}</p>
                </a>
            </li>
            <li
                class="nav-item {{ $activePage == 'allProducts' || $activePage == 'showProduct' || $activePage == 'editProduct' || $activePage == 'productHistory' || $activePage == 'allCategories' || $activePage == 'createCategory' || $activePage == 'editCategory' || $activePage == 'allBrands' || $activePage == 'createBrand' || $activePage == 'editBrand' ? ' active' : '' }}">
                <a class="nav-link nav-link-mode" data-toggle="collapse" href="#Product" aria-expanded="false">
                    <i class="fa fa-shopping-cart " aria-hidden="true"></i>
                    <p>{{ __('translation.website.sidebar.Stock') }}
                        <b class="caret"
                            style="{{ app()->getLocale() == 'ar' ? 'margin-right: 180px;' : '' }}"></b>
                    </p>
                </a>
                <div class="collapse {{ $activePage == 'allProducts' || $activePage == 'showProduct' || $activePage == 'editProduct' || $activePage == 'productHistory' || $activePage == 'allCategories' || $activePage == 'createCategory' || $activePage == 'editCategory' || $activePage == 'allBrands' || $activePage == 'createBrand' || $activePage == 'editBrand' ? ' show' : '' }}"
                    id="Product">
                    <ul class="nav">
                        <li class="nav-item ml-3 {{ $activePage == 'allProducts' ? ' active' : '' }}">
                            <a class="nav-link nav-link-mode" href="{{ route('products.index') }}">
                                <i class="fa fa-th-list {{ $activePage == 'allProducts' ? '' : '' }}"
                                    aria-hidden="true"></i>
                                {{ __('translation.website.sidebar.All Products') }}
                            </a>
                        </li>
                        <li
                            class="nav-item ml-3 {{ $activePage == 'allCategories' || $activePage == 'createCategory' || $activePage == 'editCategory' ? ' active' : '' }}">
                            <a class="nav-link nav-link-mode" href="{{ route('categories.index') }}">
                                <i
                                    class="material-icons  {{ $activePage == 'allCategories' || $activePage == 'createCategory' || $activePage == 'editCategory' ? '' : '' }}">dashboard</i>
                                {{ __('translation.website.sidebar.All Categories') }}
                            </a>
                        </li>
                        <li
                            class="nav-item ml-3{{ $activePage == 'allBrands' || $activePage == 'createBrand' || $activePage == 'editBrand' ? ' active' : '' }}">
                            <a class="nav-link nav-link-mode" href="{{ route('brands.index') }}">
                                <i class="fa fa-car  {{ $activePage == 'allBrands' || $activePage == 'createBrand' || $activePage == 'editBrand' ? '' : '' }}"
                                    aria-hidden="true"></i>
                                {{ __('translation.website.sidebar.All Brands') }}
                            </a>
                        </li>

                    </ul>
                </div>
            </li>
            <li
                class="nav-item {{ $activePage == 'all-clients' || $activePage == 'createclient' || $activePage == 'edit-clients' || $activePage == 'show-clients' || $activePage == 'createclientWalletTransaction' || $activePage == 'walletclientTransaction' || $activePage == 'editclientwalletTransaction' || $activePage == 'showwalletclientTransaction' || $activePage == 'wallet-clients' ? ' active' : '' }}">
                <a class="nav-link nav-link-mode" data-toggle="collapse" href="#clients" aria-expanded="false">
                    <i><i class="fa fa-users " aria-hidden="true"></i></i>
                    <p>{{ __('translation.website.sidebar.Clients') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse{{ $activePage == 'all-clients' || $activePage == 'createclient' || $activePage == 'edit-clients' || $activePage == 'show-clients' || $activePage == 'createclientWalletTransaction' || $activePage == 'walletclientTransaction' || $activePage == 'showwalletclientTransaction' || $activePage == 'showwalletclientTransaction' || $activePage == 'wallet-clients' ? ' show' : '' }} "
                    id="clients">
                    <ul class="nav">
                        <li
                            class="nav-item ml-3 {{ $activePage == 'all-clients' || $activePage == 'createclient' || $activePage == 'edit-clients' || $activePage == 'show-clients' ? ' active' : '' }}">
                            <a class="nav-link nav-link-mode" href="{{ route('clients.index') }}">

                                <i class="fa fa-th-list {{ $activePage == 'all-clients' ? '' : '' }}"
                                    aria-hidden="true"></i>
                                {{ __('translation.website.sidebar.all Clients') }}
                            </a>
                        </li>
                        <li
                            class="nav-item ml-3 {{ $activePage == 'wallet-clients' || $activePage == 'createclientWalletTransaction' || $activePage == 'showwalletclientTransaction' || $activePage == 'editclientwalletTransaction' || $activePage == 'showwalletclientTransaction' || $activePage == 'wallet-clients' ? ' active' : '' }}">
                            <a class="nav-link nav-link-mode" href="{{ route('get.client.wallet') }}">

                                <i class="fa fa-credit-card-alt {{ $activePage == 'wallet-clients' ? '' : '' }} "
                                    aria-hidden="true"></i>
                                {{ __('translation.website.sidebar.Client Wallets') }}
                            </a>
                        </li>
                    </ul>

                </div>
            </li>
            <li
                class="nav-item {{ $activePage == 'all-suppliers' || $activePage == 'createsupplier' || $activePage == 'edit-suppliers' || $activePage == 'show-suppliers' || $activePage == 'wallet-suppliers' || $activePage == 'createSupplierWalletTransaction' || $activePage == 'walletsupplierTransaction' || $activePage == 'editwalletTransaction' || $activePage == 'showwalletsupplierTransaction' || $activePage == 'createpricelist' || $activePage == 'allpricelists' || $activePage == 'editpricelist' ? ' active' : '' }}">
                <a class="nav-link nav-link-mode" data-toggle="collapse" href="#suppliers" aria-expanded="false">
                    <i><i class="fa fa-users " aria-hidden="true"></i></i>
                    <p>{{ __('translation.website.sidebar.Suppliers') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse{{ $activePage == 'all-suppliers' || $activePage == 'createsupplier' || $activePage == 'edit-suppliers' || $activePage == 'show-suppliers' || $activePage == 'wallet-suppliers' || $activePage == 'createSupplierWalletTransaction' || $activePage == 'walletsupplierTransaction' || $activePage == 'editwalletTransaction' || $activePage == 'showwalletsupplierTransaction' || $activePage == 'createpricelist' || $activePage == 'allpricelists' || $activePage == 'editpricelist' ? ' show' : '' }} "
                    id="suppliers">
                    <ul class="nav">
                        <li
                            class="nav-item ml-3{{ $activePage == 'all-suppliers' || $activePage == 'createsupplier' || $activePage == 'edit-suppliers' || $activePage == 'show-suppliers' || $activePage == 'createpricelist' || $activePage == 'allpricelists' || $activePage == 'editpricelist' ? ' active' : '' }}">
                            <a class="nav-link nav-link-mode" href="{{ route('suppliers.index') }}">
                                <i class="fa fa-th-list {{ $activePage == 'all-suppliers' ? '' : '' }}"
                                    aria-hidden="true"></i>
                                {{ __('translation.website.sidebar.all Suppliers') }}
                            </a>
                        </li>
                        <li
                            class="nav-item ml-3{{ $activePage == 'wallet-suppliers' || $activePage == 'createSupplierWalletTransaction' || $activePage == 'walletsupplierTransaction' || $activePage == 'editwalletTransaction' || $activePage == 'showwalletsupplierTransaction' ? ' active' : '' }}">
                            <a class="nav-link nav-link-mode" href="{{ route('get.supplier.wallet') }}">
                                <i class="fa fa-credit-card-alt  {{ $activePage == 'wallet-suppliers' ? '' : '' }}"
                                    aria-hidden="true"></i>
                                <span class="sidebar-normal"> {{ __('translation.website.sidebar.Supplier Wallet') }}
                                </span>
                            </a>
                        </li>
                    </ul>

                </div>
            </li>



            @role('Super Admin')
            <li
                class="nav-item {{ $activePage == 'all-users' || $activePage == 'createUser' || $activePage == 'edit-users' || $activePage == 'show-users' || $activePage == 'wallet-users' || $activePage == 'createUserwalletTransaction' || $activePage == 'allUserTransactions' || $activePage == 'edituserwalletTransaction' || $activePage == 'allPermissions' || $activePage == 'createPermission' || $activePage == 'editPermission' || $activePage == 'allRoles' || $activePage == 'createRole' || $activePage == 'editRole' ? ' active' : '' }}">
                <a class="nav-link nav-link-mode" data-toggle="collapse" href="#User" aria-expanded="false">
                    <i><i class="fa fa-users " aria-hidden="true"></i></i>
                    <p>{{ __('translation.website.sidebar.My Employees') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div id="User"
                    class="collapse {{ $activePage == 'all-users' || $activePage == 'createUser' || $activePage == 'edit-users' || $activePage == 'show-users' || $activePage == 'wallet-users' || $activePage == 'createUserwalletTransaction' || $activePage == 'allUserTransactions' || $activePage == 'edituserwalletTransaction' || $activePage == 'allPermissions' || $activePage == 'createPermission' || $activePage == 'editPermission' || $activePage == 'allRoles' || $activePage == 'createRole' || $activePage == 'editRole' ? ' show' : '' }}">
                    <ul class="nav">
                        <li class="nav-item ml-3 {{ $activePage == 'all-users' ? ' active' : '' }}">
                            <a class="nav-link nav-link-mode" href="{{ route('users.index') }}">
                                <i class="fa fa-th-list {{ $activePage == 'all-users' ? '' : '' }}"
                                    aria-hidden="true"></i>
                                {{ __('translation.website.sidebar.My Employees') }}
                            </a>
                        </li>
                        <li
                            class="nav-item ml-3 {{ $activePage == 'allRoles' || $activePage == 'createRole' || $activePage == 'editRole' ? ' active' : '' }}">
                            <a class="nav-link nav-link-mode" href="{{ route('roles.index') }}">
                                <i class="fa fa-briefcase  {{ $activePage == 'allRoles' || $activePage == 'createRole' || $activePage == 'editRole' ? '' : '' }}"
                                    aria-hidden="true"></i>
                                {{ __('translation.website.sidebar.All Roles') }}
                            </a>
                        </li>
                        <li
                            class="nav-item ml-3 {{ $activePage == 'allPermissions' || $activePage == 'createPermission' || $activePage == 'editPermission' ? ' active' : '' }}">
                            <a class="nav-link nav-link-mode" href="{{ route('permissions.index') }}">
                                <i class="fa fa-exclamation-triangle  {{ $activePage == 'allPermissions' || $activePage == 'createPermission' || $activePage == 'editPermission' ? '' : '' }}"
                                    aria-hidden="true"></i>
                                {{ __('translation.website.sidebar.All Permissions') }}
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            @endrole
            <li
                class="nav-item {{ $activePage == 'addSale' || $activePage == 'allSales' || $activePage == 'editSale' || $activePage == 'SaleOrder' ? ' active' : '' }}">
                <a class="nav-link nav-link-mode" data-toggle="collapse" href="#sales" aria-expanded="false">
                    <i><i class="fa fa-money  " aria-hidden="true"></i></i>
                    <p>{{ __('translation.website.sidebar.Sales') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse {{ $activePage == 'addSale' || $activePage == 'allSales' || $activePage == 'editSale' || $activePage == 'SaleOrder' ? ' show' : '' }} "
                    id="sales">
                    <ul class="nav">
                        <li
                            class="nav-item ml-3 {{ $activePage == 'addSale' || $activePage == 'allSales' || $activePage == 'editSale' ? ' active' : '' }}">
                            <a class="nav-link nav-link-mode" href="{{ route('sales.index') }}">
                                <i class="fa fa-th-list {{ $activePage == 'addSale' || $activePage == 'allSales' || $activePage == 'editSale' ? '' : '' }}"
                                    aria-hidden="true"></i>
                                {{ __('translation.website.sidebar.All Sales') }}
                            </a>
                        </li>

                        <li class="nav-item ml-3 {{ $activePage == 'SaleOrder' ? ' active' : '' }}">
                            <a class="nav-link nav-link-mode" href="{{ route('pre.sale') }}">
                                <i class="fa fa-th-list {{ $activePage == 'SaleOrder' ? '' : '' }}"
                                    aria-hidden="true"></i>
                                {{ __('translation.website.sidebar.Sale Orders') }}
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li
                class="nav-item {{ $activePage == 'addPurchase' || $activePage == 'allPurchases' || $activePage == 'editPurchase' || $activePage == 'purchaseOrder' || $activePage == 'addpurchaseOrder' || $activePage == 'allPurchasesOrder' || $activePage == 'editPurchaseOrder' ? ' active' : '' }}">
                <a class="nav-link nav-link-mode" data-toggle="collapse" href="#Purchases" aria-expanded="false">
                    <i><i class="fa fa-cart-plus  " aria-hidden="true"></i></i>
                    <p>{{ __('translation.website.sidebar.Purchases') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse {{ $activePage == 'addPurchase' || $activePage == 'allPurchases' || $activePage == 'editPurchase' || $activePage == 'purchaseOrder' || $activePage == 'addpurchaseOrder' || $activePage == 'allPurchasesOrder' || $activePage == 'editPurchaseOrder' ? ' show' : '' }} "
                    id="Purchases">
                    <ul class="nav">
                        <li
                            class="nav-item ml-3 {{ $activePage == 'addPurchase' || $activePage == 'allPurchases' || $activePage == 'editPurchase' ? ' active' : '' }}">
                            <a class="nav-link nav-link-mode" href="{{ route('purchases.index') }}">
                                <i class="fa fa-th-list {{ $activePage == 'addPurchase' || $activePage == 'allPurchases' || $activePage == 'editPurchase' ? '' : '' }}"
                                    aria-hidden="true"></i>
                                {{ __('translation.website.sidebar.All Purchases') }}
                            </a>
                        </li>

                        <li
                            class="nav-item ml-3 {{ $activePage == 'addpurchaseOrder' || $activePage == 'allPurchasesOrder' || $activePage == 'editPurchaseOrder' ? ' active' : '' }}">
                            <a class="nav-link nav-link-mode" href="{{ route('purchasesOrder.index') }}">
                                <i class="fa fa-th-list {{ $activePage == 'addpurchaseOrder' || $activePage == 'allPurchasesOrder' || $activePage == 'editPurchaseOrder' ? '' : '' }}"
                                    aria-hidden="true"></i>
                                {{ __('translation.website.sidebar.All Purchase Orders') }}
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li
                class="nav-item {{ $activePage == 'addExpense' || $activePage == 'allExpense' || $activePage == 'editexpense' || $activePage == 'createexpensetype' || $activePage == 'allexpensestypes' || $activePage == 'editexpensetype' ? ' active' : '' }}">
                <a class="nav-link nav-link-mode" data-toggle="collapse" href="#expenses" aria-expanded="false">
                    <i><i class="fa fa-minus-circle  " aria-hidden="true"></i></i>
                    <p>{{ __('translation.website.sidebar.Expenses') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse {{ $activePage == 'addExpense' || $activePage == 'allExpense' || $activePage == 'editexpense' || $activePage == 'createexpensetype' || $activePage == 'allexpensestypes' || $activePage == 'editexpensetype' ? ' show' : '' }} "
                    id="expenses">
                    <ul class="nav">
                        <li class="nav-item ml-3 {{ $activePage == 'allExpense' ? ' active' : '' }}">
                            <a class="nav-link nav-link-mode" href="{{ route('expenses.index') }}">
                                <i class="fa fa-th-list {{ $activePage == 'allExpense' ? '' : '' }}"
                                    aria-hidden="true"></i>
                                {{ __('translation.website.sidebar.ALL Expenses') }}
                            </a>
                        </li>

                        <li class="nav-item ml-3 {{ $activePage == 'allexpensestypes' ? ' active' : '' }}">
                            <a class="nav-link nav-link-mode" href="{{ route('expensesTypes.index') }}">
                                <i class="fa fa-th-list {{ $activePage == 'allexpensestypes' ? '' : '' }}"
                                    aria-hidden="true"></i>
                                {{ __('translation.website.sidebar.All Expenses Types') }}
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li
                class="nav-item  {{ $activePage == 'addInstallment' || $activePage == 'allInstallments' || $activePage == 'editInstallment' ? ' active' : '' }}">
                <a class="nav-link nav-link-mode" href="{{ route('installments.index') }}">
                    <i class="fa fa-th-list  {{ $activePage == 'addInstallment' || $activePage == 'allInstallments' || $activePage == 'editInstallment' ? '' : '' }}"
                        aria-hidden="true"></i>
                    {{ __('translation.website.sidebar.All Installments') }}
                </a>
            </li>

            <li class="nav-item  {{ $activePage == 'allnotifications' ? ' active' : '' }}">
                <a class="nav-link nav-link-mode" href="{{ route('notifications.index') }}">
                    <i class="fa fa-bell {{ $activePage == 'allnotifications' ? '' : '' }}" aria-hidden="true"></i>
                    {{ __('translation.website.sidebar.All Notifications') }}
                </a>
            </li>
            <li
                class="nav-item {{ $activePage == 'mostSaleProducts' || $activePage == 'monthlyProfits' || $activePage == 'totalCapital' || $activePage == 'bestCustomers' || $activePage == 'bestSuppliers' || $activePage == 'frquentcustomers' || $activePage == 'frquentSuppliers' || $activePage == 'installmentandsales' || $activePage == 'installmentandpurchases' || $activePage == 'receivablesandpayments' ? ' active' : '' }}">
                <a class="nav-link nav-link-mode" data-toggle="collapse" href="#reports" aria-expanded="false">
                    <i><i class="fa fa-bar-chart " aria-hidden="true"></i></i>
                    <p>{{ __('translation.website.sidebar.Reports') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse {{ $activePage == 'mostSaleProducts' || $activePage == 'monthlyProfits' || $activePage == 'totalCapital' || $activePage == 'bestCustomers' || $activePage == 'bestSuppliers' || $activePage == 'frquentcustomers' || $activePage == 'frquentSuppliers' || $activePage == 'installmentandsales' || $activePage == 'installmentandpurchases' || $activePage == 'receivablesandpayments' ? ' show' : '' }} "
                    id="reports">
                    <ul class="nav">
                        <li class="nav-item ml-3 {{ $activePage == 'mostSaleProducts' ? ' active' : '' }}">
                            <a class="nav-link nav-link-mode" href="{{ route('most-sold-products') }}">
                                <i class="fa fa-line-chart {{ $activePage == 'mostSaleProducts' ? '' : '' }}"
                                    aria-hidden="true"></i>
                                {{ __('translation.website.sidebar.Most Sold Products') }}
                            </a>
                        </li>
                        <li class="nav-item ml-3 {{ $activePage == 'monthlyProfits' ? ' active' : '' }}">
                            <a class="nav-link nav-link-mode" href="{{ route('monthly-profits') }}">
                                <i class="fa fa-line-chart {{ $activePage == 'monthlyProfits' ? '' : '' }}"
                                    aria-hidden="true"></i>
                                {{ __('translation.website.sidebar.Monthly Profits') }}
                            </a>
                        </li>
                        <li class="nav-item ml-3 {{ $activePage == 'totalCapital' ? ' active' : '' }}">
                            <a class="nav-link nav-link-mode" href="{{ route('total-capital') }}">
                                <i class="fa fa-line-chart {{ $activePage == 'totalCapital' ? '' : '' }}"
                                    aria-hidden="true"></i>
                                {{ __('translation.website.sidebar.Total Capital') }}
                            </a>
                        </li>
                        <li class="nav-item ml-3 {{ $activePage == 'bestCustomers' ? ' active' : '' }}">
                            <a class="nav-link nav-link-mode" href="{{ route('best-customers') }}">
                                <i class="fa fa-line-chart {{ $activePage == 'bestCustomers' ? '' : '' }}"
                                    aria-hidden="true"></i>
                                {{ __('translation.website.sidebar.bestCustomers') }}
                            </a>
                        </li>
                        <li class="nav-item ml-3 {{ $activePage == 'bestSuppliers' ? ' active' : '' }}">
                            <a class="nav-link nav-link-mode" href="{{ route('best-suppliers') }}">
                                <i class="fa fa-line-chart {{ $activePage == 'bestSuppliers' ? '' : '' }}"
                                    aria-hidden="true"></i>
                                {{ __('translation.website.sidebar.bestSuppliers') }}
                            </a>
                        </li>
                        <li class="nav-item ml-3 {{ $activePage == 'frquentcustomers' ? ' active' : '' }}">
                            <a class="nav-link nav-link-mode" href="{{ route('frequent-customers') }}">
                                <i class="fa fa-line-chart {{ $activePage == 'frquentcustomers' ? '' : '' }}"
                                    aria-hidden="true"></i>
                                {{ __('translation.website.sidebar.frquent customers') }}
                            </a>
                        </li>
                        <li class="nav-item ml-3 {{ $activePage == 'frquentSuppliers' ? ' active' : '' }}">
                            <a class="nav-link nav-link-mode" href="{{ route('frequent-suppliers') }}">
                                <i class="fa fa-line-chart {{ $activePage == 'frquentSuppliers' ? '' : '' }}"
                                    aria-hidden="true"></i>
                                {{ __('translation.website.sidebar.frquent Suppliers') }}
                            </a>
                        </li>
                        <li class="nav-item ml-3 {{ $activePage == 'installmentandsales' ? ' active' : '' }}">
                            <a class="nav-link nav-link-mode" href="{{ route('Installments-and-sales') }}">
                                <i class="fa fa-line-chart {{ $activePage == 'installmentandsales' ? '' : '' }}"
                                    aria-hidden="true"></i>
                                {{ __('translation.website.sidebar.installment and sales') }}
                            </a>
                        </li>
                        <li class="nav-item ml-3 {{ $activePage == 'installmentandpurchases' ? ' active' : '' }}">
                            <a class="nav-link nav-link-mode" href="{{ route('installments-and-purchases') }}">
                                <i class="fa fa-line-chart {{ $activePage == 'installmentandpurchases' ? '' : '' }}"
                                    aria-hidden="true"></i>
                                {{ __('translation.website.sidebar.installment and purchases') }}
                            </a>
                        </li>
                        <li class="nav-item ml-3 {{ $activePage == 'receivablesandpayments' ? ' active' : '' }}">
                            <a class="nav-link nav-link-mode" href="{{ route('receivables-and-payments') }}">
                                <i class="fa fa-line-chart {{ $activePage == 'receivablesandpayments' ? '' : '' }}"
                                    aria-hidden="true"></i>
                                {{ __('translation.website.sidebar.receivables and payments') }}
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li
                class="nav-item {{ $activePage == 'allPartners' || $activePage == 'createPartner' || $activePage == 'editPartner' || $activePage == 'dividendIncome' || $activePage == 'dividendIncomeDetails' ? ' active' : '' }}">
                <a class="nav-link nav-link-mode " data-toggle="collapse" href="#profits" aria-expanded="false">
                    <i class="fa fa-usd " aria-hidden="true"></i>
                    <p>{{ __('translation.website.sidebar.Profits') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse {{ $activePage == 'allPartners' || $activePage == 'createPartner' || $activePage == 'editPartner' || $activePage == 'dividendIncome' || $activePage == 'dividendIncomeDetails' ? ' show' : '' }} "
                    id="profits">
                    <ul class="nav">
                        <li
                            class="nav-item ml-3 {{ $activePage == 'dividendIncome' || $activePage == 'dividendIncomeDetails' ? ' active' : '' }}">
                            <a class="nav-link nav-link-mode " href="{{ route('dividend-income') }}">
                                <i class="fa fa-percent " aria-hidden="true"></i>
                                <span class="sidebar-normal" style="font-size: 15px;">
                                    {{ __('translation.website.sidebar.Dividend Income') }} </span>
                            </a>
                        </li>
                        <li
                            class="nav-item ml-3 {{ $activePage == 'allPartners' || $activePage == 'createPartner' || $activePage == 'editPartner' ? ' active' : '' }}">
                            <a class="nav-link nav-link-mode " href="{{ route('partners.index') }}">
                                <i class="fa fa-handshake-o " aria-hidden="true"></i>
                                <span class="sidebar-normal" style="font-size: 15px;">
                                    {{ __('translation.website.sidebar.Partners') }} </span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>
            <li class="nav-item{{ $activePage == 'website' ? ' active' : '' }}">
                <a class="nav-link nav-link-mode " href="{{ route('general.settings') }}">
                    <i class="fa fa-cog " aria-hidden="true"></i>
                    <span class="sidebar-normal" style="font-size: 15px;">
                        {{ __('translation.website.sidebar.Website Info') }} </span>
                </a>
            </li>
    </div>
</div>
