<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        
        <div class="navbar nav_title" style="border: 0;">
            <a href="#" class="site_title"><i class="fa fa-paw"></i> <span>Inventory.ph</span></a>
        </div>
        <div class="clearfix"></div>

        <!-- menu prile quick info -->
        <div class="profile">
            <div class="profile_pic">
                <img src="{{ asset('img/default.gif') }}" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{ ucwords(Auth::User()->fname.' '.Auth::User()->lname) }}</h2>
            </div>
        </div>
        <!-- /menu prile quick info -->

        <br />

        <?php 

             $subscription_modules  = $controller->subscription_modules();
             $access_rights  = $controller->access_rights();

             $_deliveries = '';
             $_received = '';
             $_returnitems = '';
             $_receivinghistories = '';
             $_employees = '';
             $_clients = '';
             $_suppliers = '';
             $_discounttypes = '';
             $_distributors = '';
             $_sales = '';
             $_returns = '';
             $_cancelled = '';
             $_reports = '';
             $_purchaseorders = '';
             $_users = '';
             $_posusers = '';
             $_positions = '';
             $_accesstypes = '';
             $_merchantusers = '';
             $_merchantinventories = '';
             $_products = '';
             $_categories = '';
             $_departments = '';
             $_brands = '';
             $_productbundles = '';
             $_inventories = '';
             $_zones = '';
             $_drmodules = '';
             $_postransactionsmodules = '';
             $_accounts = '';
             $_usermanagement = '';
             $_merchant = '';
             $_inventory = '';
             
             $_deliveries_access = '';
             $_received_access = '';
             $_returnitems_access = '';
             $_receivinghistories_access = '';
             $_employees_access = '';
             $_clients_access = '';
             $_suppliers_access = '';
             $_discounttypes_access = '';
             $_distributors_access = '';
             $_sales_access = '';
             $_returns_access = '';
             $_cancelled_access = '';
             $_reports_access = '';
             $_purchaseorders_access = '';
             $_users_access = '';
             $_posusers_access = '';
             $_positions_access = '';
             $_accesstypes_access = '';
             $_merchantusers_access = '';
             $_merchantinventories_access = '';
             $_products_access = '';
             $_categories_access = '';
             $_departments_access = '';
             $_brands_access = '';
             $_productbundles_access = '';
             $_inventories_access = '';
             $_zones_access = '';
             $_drmodules_access = '';
             $_postransactionsmodules_access = '';
             $_accounts_access = '';
             $_usermanagement_access = '';
             $_merchant_access = '';
             $_inventory_access = '';

             $hold = [];
             $hold_access = [];

            foreach ($subscription_modules as $key => $value) {

                array_push($hold, $value->module_name) ;

            }

            if(Auth::User()->position_id != 0){

                
                foreach ($access_rights as $key => $value) {
                    array_push($hold_access, $value->module) ;

                    if($value->module == 'deliveries'){
                        if($value->to_view == '0'){
                            $_deliveries_access = 'display: none';
                        }
                    }


                    if($value->module == 'received'){
                        if($value->to_view == '0'){
                            $_received_access = 'display: none';
                        }
                    }


                    if($value->module == 'returns'){
                        if($value->to_view == '0'){
                            $_returnitems_access = 'display: none';
                        }
                    }

                    if($value->module == 'receivinghistories'){
                        if($value->to_view == '0'){
                            $_receivinghistories_access = 'display: none';
                        }
                    }


                    if($value->module == 'employees'){
                        if($value->to_view == '0'){
                            $_employees_access = 'display: none';
                        }
                    }

                    if($value->module == 'clients'){
                        if($value->to_view == '0'){
                            $_clients_access = 'display: none';
                        }
                    }

                    if($value->module == 'suppliers'){
                        if($value->to_view == '0'){
                            $_suppliers_access = 'display: none';
                        }
                    }

                    if($value->module == 'discounttypes'){
                        if($value->to_view == '0'){
                            $_discounttypes_access = 'display: none';
                        }
                    }

                    if($value->module == 'departments'){
                        if($value->to_view == '0'){
                            $_departments_access = 'display: none';
                        }
                    }

                    if($value->module == 'distributors'){
                        if($value->to_view == '0'){
                            $_distributors_access = 'display: none';
                        }
                    }

                    if($value->module == 'salesindex'){
                        if($value->to_view == '0'){
                            $_sales_access = 'display: none';
                        }
                    }

                    if($value->module == 'returnsindex'){
                        if($value->to_view == '0'){
                            $_returns_access = 'display: none';
                        }
                    }

                    if($value->module == 'cancelledindex'){
                        if($value->to_view == '0'){
                            $_cancelled_access = 'display: none';
                        }
                    }

                    if($value->module == 'reports'){
                        if($value->to_view == '0'){
                            $_reports_access = 'display: none';
                        }
                    }

                    if($value->module == 'purchaseorders'){
                        if($value->to_view == '0'){
                            $_purchaseorders_access = 'display: none';
                        }
                    }

                    if($value->module == 'users'){
                        if($value->to_view == '0'){
                            $_users_access = 'display: none';
                        }
                    }

                    if($value->module == 'posusers'){
                        if($value->to_view == '0'){
                            $_posusers_access = 'display: none';
                        }
                    }

                    if($value->module == 'positions'){
                        if($value->to_view == '0'){
                            $_positions_access = 'display: none';
                        }
                    }

                    if($value->module == 'accesstypes'){
                        if($value->to_view == '0'){
                            $_accesstypes_access = 'display: none';
                        }
                    }

                    if($value->module == 'merchantusers'){
                        if($value->to_view == '0'){
                            $_merchantusers_access = 'display: none';
                        }
                    }

                    if($value->module == 'merchantinventories'){
                        if($value->to_view == '0'){
                            $_merchantinventories_access = 'display: none';
                        }
                    }

                    if($value->module == 'products'){
                        if($value->to_view == '0'){
                            $_products_access = 'display: none';
                        }
                    }

                    if($value->module == 'categories'){
                        if($value->to_view == '0'){
                            $_categories_access = 'display: none';
                        }
                    }


                    if($value->module == 'brands'){
                        if($value->to_view == '0'){
                            $_brands_access = 'display: none';
                        }
                    }

                    if($value->module == 'productbundles'){
                        if($value->to_view == '0'){
                            $_productbundles_access = 'display: none';
                        }
                    }

                    if($value->module == 'inventories'){
                        if($value->to_view == '0'){
                            $_inventories_access = 'display: none';
                        }
                    }

                    if($value->module == 'locations'){
                        if($value->to_view == '0'){
                            $_zones_access = 'display: none';
                        }
                    }


                }
                   if(!in_array('deliveries', $hold_access)){ $_deliveries_access = 'display: none'; }
                   if(!in_array('received', $hold_access)){ $_received_access = 'display: none'; }
                   if(!in_array('returns', $hold_access)){ $_returnitems_access = 'display: none'; }
                   if(!in_array('receivinghistories', $hold_access)){ $_receivinghistories_access = 'display: none';}
                   if(!in_array('employees', $hold_access)){ $_employees_access = 'display: none';}
                   if(!in_array('clients', $hold_access)){ $_clients_access = 'display: none'; }
                   if(!in_array('suppliers', $hold_access)){ $_suppliers_access = 'display: none'; }
                   if(!in_array('discounttypes', $hold_access)){ $_discounttypes_access = 'display: none'; }
                   if(!in_array('departments', $hold_access)){ $_departments_access = 'display: none'; }
                   if(!in_array('distributors', $hold_access)){ $_distributors_access = 'display: none'; }
                   if(!in_array('salesindex', $hold_access)){ $_sales_access = 'display: none'; }
                   if(!in_array('returnsindex', $hold_access)){ $_returns_access = 'display: none'; }
                   if(!in_array('cancelledindex', $hold_access)){ $_cancelled_access = 'display: none'; }
                   if(!in_array('reports', $hold_access)){ $_reports_access = 'display: none'; }
                   if(!in_array('purchaseorders', $hold_access)){ $_purchaseorders_access = 'display: none'; }
                   if(!in_array('users', $hold_access)){ $_users_access = 'display: none'; }
                   if(!in_array('posusers', $hold_access)){ $_posusers_access = 'display: none'; }
                   if(!in_array('positions', $hold_access)){ $_positions_access = 'display: none'; }
                   if(!in_array('accesstypes', $hold_access)){ $_accesstypes_access = 'display: none'; }
                   if(!in_array('merchantusers', $hold_access)){ $_merchantusers_access = 'display: none'; }
                   if(!in_array('merchantinventories', $hold_access)){ $_merchantinventories_access = 'display: none'; }
                   if(!in_array('products', $hold_access)){ $_products_access = 'display: none'; }
                   if(!in_array('categories', $hold_access)){ $_categories_access = 'display: none'; }
                   if(!in_array('deparments', $hold_access)){ $_deparments_access = 'display: none'; }
                   if(!in_array('brands', $hold_access)){ $_brands_access = 'display: none'; }
                   if(!in_array('productbundles', $hold_access)){ $_productbundles_access = 'display: none'; }
                   if(!in_array('inventories', $hold_access)){ $_inventories_access = 'display: none'; }
                   if(!in_array('locations', $hold_access)){ $_zones_access = 'display: none'; }


                   if($_sales_access == "display: none" && $_returns_access == "display: none" && $_cancelled_access == "display: none"){
                        $_postransactionsmodules_access = 'display: none';
                   }

                   if($_deliveries_access == "display: none" && $_received_access == "display: none" && $_returnitems_access == "display: none" && $_receivinghistories_access == "display: none"){
                        $_drmodules_access = 'display: none';
                   }

                   if($_employees_access == "display: none" && $_clients_access == "display: none" && $_suppliers_access == "display: none" && $_discounttypes_access == "display: none" && $_distributors_access == "display: none"){
                        $_accounts_access = 'display: none';
                   }

                   if($_users_access == "display: none" && $_posusers_access == "display: none" && $_positions_access == "display: none" && $_accesstypes_access == "display: none"){
                        $_usermanagement_access = 'display: none';
                   }

                   if($_merchantusers_access == "display: none" && $_merchantinventories_access == "display: none"){
                        $_merchant_access = 'display: none';
                   }

                   if($_products_access == "display: none" && $_categories_access == "display: none" && $_departments_access == "display: none" && $_brands_access == "display: none" && $_productbundles_access == "display: none" && $_inventories_access == "display: none" && $_zones_access == "display: none"){
                        $_inventory_access = 'display: none';
                   }
            }

               if(!in_array('deliveries', $hold)){ $_deliveries = 'display: none'; }
               if(!in_array('received', $hold)){ $_received = 'display: none'; }
               if(!in_array('returns', $hold)){ $_returnitems = 'display: none'; }
               if(!in_array('receivinghistories', $hold)){ $_receivinghistories = 'display: none';}
               if(!in_array('employees', $hold)){ $_employees = 'display: none';}
               if(!in_array('clients', $hold)){ $_clients = 'display: none'; }
               if(!in_array('suppliers', $hold)){ $_suppliers = 'display: none'; }
               if(!in_array('discounttypes', $hold)){ $_discounttypes = 'display: none'; }
               if(!in_array('departments', $hold)){ $_departments = 'display: none'; }
               if(!in_array('distributors', $hold)){ $_distributors = 'display: none'; }
               if(!in_array('salesindex', $hold)){ $_sales = 'display: none'; }
               if(!in_array('returnsindex', $hold)){ $_returns = 'display: none'; }
               if(!in_array('cancelledindex', $hold)){ $_cancelled = 'display: none'; }
               if(!in_array('reports', $hold)){ $_reports = 'display: none'; }
               if(!in_array('purchaseorders', $hold)){ $_purchaseorders = 'display: none'; }
               if(!in_array('users', $hold)){ $_users = 'display: none'; }
               if(!in_array('posusers', $hold)){ $_posusers = 'display: none'; }
               if(!in_array('positions', $hold)){ $_positions = 'display: none'; }
               if(!in_array('accesstypes', $hold)){ $_accesstypes = 'display: none'; }
               if(!in_array('merchantusers', $hold)){ $_merchantusers = 'display: none'; }
               if(!in_array('merchantinventories', $hold)){ $_merchantinventories = 'display: none'; }
               if(!in_array('products', $hold)){ $_products = 'display: none'; }
               if(!in_array('categories', $hold)){ $_categories = 'display: none'; }
               if(!in_array('deparments', $hold)){ $_deparments = 'display: none'; }
               if(!in_array('brands', $hold)){ $_brands = 'display: none'; }
               if(!in_array('productbundles', $hold)){ $_productbundles = 'display: none'; }
               if(!in_array('inventories', $hold)){ $_inventories = 'display: none'; }
               if(!in_array('locations', $hold)){ $_zones = 'display: none'; }


               if($_sales == "display: none" && $_returns == "display: none" && $_cancelled == "display: none"){
                    $_postransactionsmodules = 'display: none';
               }

               if($_deliveries == "display: none" && $_received == "display: none" && $_returnitems == "display: none" && $_receivinghistories == "display: none"){
                    $_drmodules = 'display: none';
               }

               if($_employees == "display: none" && $_clients == "display: none" && $_suppliers == "display: none" && $_discounttypes == "display: none" && $_distributors == "display: none"){
                    $_accounts = 'display: none';
               }

               if($_users == "display: none" && $_posusers == "display: none" && $_positions == "display: none" && $_accesstypes == "display: none"){
                    $_usermanagement = 'display: none';
               }

               if($_merchantusers == "display: none" && $_merchantinventories == "display: none"){
                    $_merchant = 'display: none';
               }

               if($_products == "display: none" && $_categories == "display: none" && $_departments == "display: none" && $_brands == "display: none" && $_productbundles == "display: none" && $_inventories == "display: none" && $_zones == "display: none"){
                    $_inventory = 'display: none';
               }


         ?>

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">

                    <?php if (Auth::User()->subscriber_id == 1): ?>
                            <li><a href="{{ url('/') }}"><i class="fa fa-laptop" ></i>Dashboard</a></li>
                            <li><a href="{{ url('/subscribers') }}"><i class="fa fa-users"></i> Subscribers</a></li>
                            <li><a href="{{ url('/posmanager') }}"><i class="fa fa-users"></i> Pos Manager</a></li>
                            <!-- <li><a href="{{ url('/subscriptions') }}"><i class="fa fa-users"></i> Subscriptions</a></li> -->
                    <?php else: ?>
                        <li ><a href="{{ url('/') }}"><i class="fa fa-laptop"></i> Dashboard</a></li>
                        <li style="{{ $_accounts }} {{ $_accounts_access }}"><a><i class="fa fa-home"></i> Accounts <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li style="{{ $_employees }} {{ $_employees_access }}">
                                    <a href='{{ url("employees") }}'>Employees List</a>
                                </li>
                                <li style="{{ $_clients }} {{ $_clients_access }}">
                                    <a href='{{ url("clients") }}'>Clients List</a>
                                </li>
                                <li style="{{ $_suppliers }} {{ $_suppliers_access }}">
                                    <a href='{{ url("suppliers") }}'>Supplier List</a>
                                </li>


                                <!-- <li>
                                    <a href='{{ url("companies") }}'>Companies List</a>
                                </li> -->

                                <li style="{{ $_discounttypes }} {{ $_discounttypes_access }}">
                                    <a href='{{ url("discounttypes") }}'>Discount Types List</a>
                                </li>

                                <li style="{{ $_distributors }} {{ $_distributors_access }}">
                                    <a href='{{ url("distributors") }}'>Distributors List</a>
                                </li>


                            </ul>
                        </li>

                        <li style="{{ $_inventory }} {{ $_inventory_access }}"><a><i class="fa fa-home"></i> Inventory <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu" style="display: none">
                                <li style="{{ $_products }} {{ $_products_access }}">
                                    <a href='{{ url("products") }}'>Products</a>
                                </li>

                                <li style="{{ $_categories }} {{ $_categories_access }}">
                                    <a href='{{ url("categories") }}'>Categories</a>
                                </li>

                                <li style="{{ $_departments }} {{ $_departments_access }}">
                                    <a href='{{ url("departments") }}'>Departments</a>
                                </li>
                                <li style="{{ $_brands }} {{ $_brands_access }}">
                                    <a href='{{ url("brands") }}'>Brands</a>
                                </li>

                                <li style="{{ $_productbundles }} {{ $_productbundles_access }}">
                                    <a href='{{ url("productbundles") }}'>Product Bundles</a>
                                </li>
                                <li style="{{ $_inventories }} {{ $_inventories_access }}">
                                    <a href='{{ url("inventories") }}'>Inventory List</a>
                                </li>
                                <li style="{{ $_zones }} {{ $_zones_access }}">
                                    <a href='{{ url("locations") }}'>Locations & Zones</a>
                                </li>

                            </ul>
                        </li>

                        <li style="{{ $_postransactionsmodules }} {{ $_postransactionsmodules_access }}"><a><i class="fa fa-home"></i> Transactions <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu" style="display: none">
                                <li style="{{ $_sales }} {{ $_sales_access }}">
                                    <a href='{{ url("postransactions/salesindex") }}'>Sales</a>
                                </li>
                                <li style="{{ $_returns }} {{ $_returns_access }}">
                                    <a href='{{ url("postransactions/returnsindex") }}'>Returns</a>
                                </li>
                                <li style="{{ $_cancelled }} {{ $_cancelled_access }}">
                                    <a href='{{ url("postransactions/cancelledindex") }}'>Cancelled</a>
                                </li>
        
                            </ul>
                        </li>
                        
                        <li style="{{ $_reports }} {{ $_reports_access }}"><a href="{{ url('reports') }}"><i class="fa fa-laptop"></i> Reporting</a></li>

                        <li style="{{ $_purchaseorders }} {{ $_purchaseorders_access }}"><a href="{{ url('purchaseorders') }}"><i class="fa fa-laptop"></i> Purchase Order</a></li>
                        <li style="{{ $_usermanagement }} {{ $_usermanagement_access }}"><a><i class="fa fa-home"></i> User Management <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu" style="display: none">
                                <li style="{{ $_users }} {{ $_users_access }}">
                                    <a href='{{ url("users") }}'>System Users</a>
                                </li>

                                <li style="{{ $_posusers }} {{ $_posusers_access }}">
                                    <a href='{{ url("posusers") }}'>POS User List</a>
                                </li>
                                <li style="{{ $_positions }} {{ $_positions_access }}">
                                    <a href='{{ url("positions") }}'>Position List</a>
                                </li>

                                <li style="{{ $_accesstypes }} {{ $_accesstypes_access }}">
                                    <a href='{{ url("accesstypes") }}'>Access Types</a>
                                </li>
        
                            </ul>
                        </li>

                        <li style="{{ $_merchant }} {{ $_merchant_access }} "><a><i class="fa fa-home"></i> Merchant Management <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu" style="display: none">
                                <li style="{{ $_merchantusers }} {{ $_merchantusers_access}}">
                                    <a href='{{ url("merchantusers") }}'>Merchant Users</a>
                                </li>

                                <li style="{{ $_merchantinventories }} {{ $_merchantinventories_access }}">
                                    <a href='{{ url("merchantinventories") }}'>Merchant Inventories</a>
                                </li>
                            </ul>
                        </li>

                        <li style="{{ $_drmodules }} {{ $_drmodules_access }}"><a><i class="fa fa-home"></i> Deliveries <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu" style="display: none">
                                <li  style="{{ $_deliveries }} {{ $_deliveries_access }}" >
                                    <a href='{{ url("deliveries") }}'>Deliveries</a>
                                </li>

                                <!-- <li>
                                    <a href='{{ url("internaldeliveries") }}'>Internal Deliveries</a>
                                </li> -->
                                
                                <li style="{{ $_received }} {{ $_received_access }}">
                                    <a href='{{ url("received") }}'>Receiving</a>
                                </li>

                                <li style="{{ $_returnitems }} {{ $_returnitems_access }}">
                                    <a href='{{ url("returns") }}'>Returned Items</a>
                                </li>

                                <li style="{{ $_receivinghistories }} {{ $_receivinghistories_access }}">
                                    <a href='{{ url("receivinghistories") }}'>Receiving Histories</a>
                                </li>

                            </ul>
                        </li>

                    <?php endif; ?>

                </ul>
            </div>

        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">   
            <a href="{{ url('settings') }}" data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>
