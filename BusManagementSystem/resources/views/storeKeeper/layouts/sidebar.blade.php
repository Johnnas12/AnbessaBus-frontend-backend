<div class="vertical-menu">

    <div data-simplebar="" class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Report and Analytics</li>

                <li>
                    <a href="{{route('storekeeper.index')}}" class="waves-effect">
                        <i class="bx bx-home-circle"></i><span class="badge badge-pill badge-info float-right"></span>
                        <span>Dashboards</span>
                    </a>
                </li>

                <li class="menu-title">Bus Management</li>
                <li>
                    <a href="{{route('storekeeper.register')}}" class=" waves-effect">
                        <i class="bx bx-calendar"></i>
                        <span>Register Buses</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('storekeeper.busManage')}}" class=" waves-effect">
                        <i class="bx bx-chat"></i>
                        <span class="badge badge-pill badge-success float-right"></span>
                        <span>Manage Buses </span>
                    </a>
                </li>


                <li class="menu-title">Spare Parts Management</li>
                
                <li>
                    <a href="{{route('storekeeper.registerSpares')}}" class=" waves-effect">
                        <i class="bx bx-chat"></i>
                        <span class="badge badge-pill badge-success float-right"></span>
                        <span>Register SpareParts</span>
                    </a>
                </li>



                <li>
                    <a href="{{route('storekeeper.useSpare')}}" class=" waves-effect">
                        <i class="bx bx-chat"></i>
                        <span class="badge badge-pill badge-success float-right"></span>
                        <span>Use Spare Parts </span>
                    </a>
                </li>

                <li>
                    <a href="{{route('storekeeper.spareManage')}}" class=" waves-effect">
                        <i class="bx bx-chat"></i>
                        <span class="badge badge-pill badge-success float-right"></span>
                        <span>Manage Spare Parts </span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>