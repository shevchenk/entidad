<ul class="sidebar-menu">
    <?php /*
    @if (isset($menus))
        @foreach ( $menus as $key => $val)
            <li class="treeview">
                <a href="#">
                    <i class="fa {{ $val[0]->icon }}"></i>
                    <span>{{ $key }}</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @foreach ( $val as $k )
                    <li><a href="{{ $k->proyecto }}.{{ $k->ruta }}"><i class="fa fa-circle-o"></i> {{ $k->opcion }}</a></li>
                    @endforeach
                </ul>
            </li>
        @endforeach
    @endif
    */
    ?>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-cogs"></i>
            <span>Mantenimiento</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="basicmanage.cargo.cargo"><i class="fa fa-sitemap"></i> Mantenimiento - Cargos</a></li>
            <li><a href="expertmanage.cargo.cargo"><i class="fa fa-sitemap"></i> Mantenimiento - Cargos</a></li>
            <li><a href="secureaccess.inicio"><i class="fa fa-circle-o"></i> Inicio</a></li>
            <li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
            <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-table"></i> <span>Mis datos</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="pages/tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>
            <li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>
        </ul>
    </li>
</ul>
