<div class="app-file-sidebar-content">
    <!-- App File Left Sidebar - Drive Content Starts -->
    <span class="app-file-label">My Drive</span>

    <div class="collection file-manager-drive mt-3">
        @foreach($root_folders as $root_folder)
        <a href="javascript:void(0)" data-path="{{ $root_folder->url }}" class="collection-item file-item-action">
            <div class="fonticon-wrap display-inline mr-3">
                <i class="material-icons">folder</i>
            </div>
            <span>{{ $root_folder->name }}</span>
            @if(count($root_folder->children))<span class="chip red lighten-5 float-right red-text">{{ count($root_folder->children) }}</span>@endif
        </a>
        @endforeach
        <a href="javascript:void(0)" class="collection-item file-item-action">
            <div class="fonticon-wrap display-inline mr-3">
                <i class="material-icons">computer</i>
            </div>
            <span>My Devices</span>
        </a>
        <a href="javascript:void(0)" class="collection-item file-item-action">
            <div class="fonticon-wrap display-inline mr-3">
                <i class="material-icons">schedule</i>
            </div>
            <span>Recents</span>
        </a>
        <a href="javascript:void(0)" class="collection-item file-item-action">
            <div class="fonticon-wrap display-inline mr-3">
                <i class="material-icons">star_border</i>
            </div>
            <span>Important</span>
        </a>
        <a href="javascript:void(0)" class="collection-item file-item-action">
            <div class="fonticon-wrap display-inline mr-3">
                <i class="material-icons">delete</i>
            </div>
            <span> Deleted Files</span>
        </a>
    </div>
    <!-- App File Left Sidebar - Drive Content Ends -->

    <!-- App File Left Sidebar - Labels Content Starts -->
    <span class="app-file-label">Labels</span>
    <div class="collection file-manager-drive mt-3">
        <a href="javascript:void(0)" class="collection-item file-item-action">
            <div class="fonticon-wrap display-inline mr-3">
                <i class="material-icons">content_paste</i>
            </div>
            <span> Documents</span>
        </a>
        <a href="javascript:void(0)" class="collection-item file-item-action">
            <div class="fonticon-wrap display-inline mr-3">
                <i class="material-icons">filter</i>
            </div>
            <span>Images</span>
        </a>
        <a href="javascript:void(0)" class="collection-item file-item-action">
            <div class="fonticon-wrap display-inline mr-3">
                <i class="material-icons">ondemand_video</i>
            </div>
            <span>Videos</span>
        </a>
        <a href="javascript:void(0)" class="collection-item file-item-action">
            <div class="fonticon-wrap display-inline mr-3">
                <i class="material-icons">music_note</i>
            </div>
            <span> Audio</span>
        </a>
        <a href="javascript:void(0)" class="collection-item file-item-action">
            <div class="fonticon-wrap display-inline mr-3">
                <i class="material-icons">storage</i>
            </div>
            <span>Zip Files</span>
        </a>
    </div>
    <!-- App File Left Sidebar - Labels Content Ends -->

    <!-- App File Left Sidebar - Storage Content Starts -->
    <span class="app-file-label">Storage Status</span>
    <div class="display-flex mb-1 mt-3">
        <div class="fonticon-wrap mr-3">
            <i class="material-icons storage-icon">sd_card</i>
        </div>
        <div class="file-manager-progress">
            <?php
            try {
                $diskStatus = new UniSharp\LaravelFilemanager\DiskStatus('/home/'.get_current_user().'/');
//                $diskStatus = new UniSharp\LaravelFilemanager\DiskStatus('/');

                $freeSpace = $diskStatus->freeSpace();
                $totalSpace = $diskStatus->totalSpace();
                $usedSpace = $diskStatus->usedSpace();
                $barWidth = ($diskStatus->usedSpacePercentage()/100) * 400;

            } catch (Exception $e) {
                echo 'Error ('.$e->getMessage().')';
//                exit();
            }
            ?>
{{--            <small>19.5GB used of {{25GB}}</small>--}}
            <small>{{ $usedSpace }} used of {{$totalSpace}}</small>
            <div class="progress pink lighten-5 mt-0">
                <div class="determinate" style="width: {{$barWidth}}%"></div>
            </div>
        </div>
    </div>
    <a href="javascript:void(0)" class="font-weight-900">Upgrade Storage</a>
    <!-- App File Left Sidebar - Storage Content Ends -->
</div>
{{--<ul class="nav nav-pills flex-column ">--}}
{{--    @foreach($root_folders as $root_folder)--}}
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" href="javascript:void(0)" data-type="0" data-path="{{ $root_folder->url }}">--}}
{{--                <i class="fa fa-folder fa-fw"></i> {{ $root_folder->name }}--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        @foreach($root_folder->children as $directory)--}}
{{--            <li class="nav-item sub-item">--}}
{{--                <a class="nav-link" href="javascript:void(0)" data-type="0" data-path="{{ $directory->url }}">--}}
{{--                    <i class="fa fa-folder fa-fw"></i> {{ $directory->name }}--}}
{{--                </a>--}}
{{--            </li>--}}
{{--        @endforeach--}}
{{--    @endforeach--}}
{{--</ul>--}}
