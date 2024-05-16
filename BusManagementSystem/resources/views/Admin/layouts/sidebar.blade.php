<div class="vertical-menu">

    <div data-simplebar="" class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title"> {{__('admin.report')}}</li>
                <li>
                    <a href="{{route('admin.index')}}" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span>{{__('admin.dash')}}</span>
                    </a>

                </li>

                <li class="menu-title">{{__('admin.empmng')}}</li>
                
                <li>
                    <a href="{{route('registrationForm')}}" class=" waves-effect">
                        <i class="bx bx-calendar"></i>
                        <span>{{__('admin.register')}}</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('manageEmployee')}}" class=" waves-effect">
                        <i class="bx bx-calendar"></i>
                        <span>{{__('admin.manage')}}</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('attendances.index')}}" class=" waves-effect">
                        <i class="bx bx-calendar"></i>
                        <span>{{__('admin.attendcreate')}}</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('attendances.create')}}" class=" waves-effect">
                        <i class="bx bx-calendar"></i>
                        <span>{{__('admin.attendmng')}}</span>
                    </a>
                </li>
                <li class="menu-title">{{__('admin.routemgmt')}}</li>



                <li>
                    <a href="{{route('routeview')}}" class=" waves-effect">
                        <i class="bx bx-calendar"></i>
                        <span>{{__('admin.route')}}</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('manageRoute')}}" class=" waves-effect">
                        <i class="bx bx-chat"></i>
                        <span class="badge badge-pill badge-success float-right"></span>
                        <span>{{__('admin.routemng')}} </span>
                    </a>
                </li>

                <li>
                    <a href="{{route('tarrifView')}}" class=" waves-effect">
                        <i class="bx bx-chat"></i>
                        <span class="badge badge-pill badge-success float-right"></span>
                        <span>{{__('admin.createTarrif')}}</span>
                    </a>
                </li>
                


                <li>
                    <a href="{{route('manageTarrif')}}" class=" waves-effect">
                        <i class="bx bx-chat"></i>
                        <span class="badge badge-pill badge-success float-right"></span>
                        <span>{{__('admin.tarrifmng')}} </span>
                    </a>
                </li>

                <li class="menu-title">{{__('admin.asset')}}</li>
                <li>
                    <a href="{{route('assets')}}" class=" waves-effect">
                        <i class="bx bx-chat"></i>
                        <span>{{__('admin.showassets')}}</span>
                    </a>
                </li>



                <li class="menu-title">{{__('admin.userfeedback')}}</li>
                <li>
                    <a href="{{route('lostItems')}}" class=" waves-effect">
                        <i class="bx bx-chat"></i>
                        <span class="badge badge-pill badge-success float-right"></span>
                        <span>{{__('admin.lost')}}</span>
                    </a>
                </li>

                
                <li class="menu-title">{{__('admin.blog')}}</li>
                <li>
                    <a href="{{route('blogpost')}}" class=" waves-effect">
                        <i class="bx bx-chat"></i>
                        <span class="badge badge-pill badge-success float-right"></span>
                        <span>{{__('admin.post')}}</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('manageBlog')}}" class=" waves-effect">
                        <i class="bx bx-chat"></i>
                        <span class="badge badge-pill badge-success float-right"></span>
                        <span>{{__('admin.manageblogs')}}</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('contacts')}}" class=" waves-effect">
                        <i class="bx bx-chat"></i>
                        <span class="badge badge-pill badge-success float-right"></span>
                        <span>{{__('admin.contacts')}}</span>
                    </a>
                </li>



            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>