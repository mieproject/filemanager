<div class="app-file-sidebar-content">
  <!-- App File Left Sidebar - Drive Content Starts -->
  <span class="app-file-label">My Drive</span>
  <div class="collection file-manager-drive mt-3">
    <a href="#" class="collection-item file-item-action active">
      <div class="fonticon-wrap display-inline mr-3">
        <i class="material-icons">folder_open</i>
      </div>
      <span>All Files</span>
      <span class="chip red lighten-5 float-right red-text">2</span>
    </a>
    <a href="#" class="collection-item file-item-action">
      <div class="fonticon-wrap display-inline mr-3">
        <i class="material-icons">computer</i>
      </div>
      <span>My Devices</span>
    </a>
    <a href="#" class="collection-item file-item-action">
      <div class="fonticon-wrap display-inline mr-3">
        <i class="material-icons">schedule</i>
      </div>
      <span>Recents</span>
    </a>
    <a href="#" class="collection-item file-item-action">
      <div class="fonticon-wrap display-inline mr-3">
        <i class="material-icons">star_border</i>
      </div>
      <span>Important</span>
    </a>
    <a href="#" class="collection-item file-item-action">
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
    <a href="#" class="collection-item file-item-action">
      <div class="fonticon-wrap display-inline mr-3">
        <i class="material-icons">content_paste</i>
      </div>
      <span> Documents</span>
    </a>
    <a href="#" class="collection-item file-item-action">
      <div class="fonticon-wrap display-inline mr-3">
        <i class="material-icons">filter</i>
      </div>
      <span>Images</span>
    </a>
    <a href="#" class="collection-item file-item-action">
      <div class="fonticon-wrap display-inline mr-3">
        <i class="material-icons">ondemand_video</i>
      </div>
      <span>Videos</span>
    </a>
    <a href="#" class="collection-item file-item-action">
      <div class="fonticon-wrap display-inline mr-3">
        <i class="material-icons">music_note</i>
      </div>
      <span> Audio</span>
    </a>
    <a href="#" class="collection-item file-item-action">
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
      <small>19.5GB used of 25GB</small>
      <div class="progress pink lighten-5 mt-0">
        <div class="determinate" style="width: 70%"></div>
      </div>
    </div>
  </div>
  <a href="#" class="font-weight-900">Upgrade Storage</a>
  <!-- App File Left Sidebar - Storage Content Ends -->
</div>
<ul class="nav nav-pills flex-column hide">
  @foreach($root_folders as $root_folder)
    <li class="nav-item">
      <a class="nav-link" href="#" data-type="0" data-path="{{ $root_folder->url }}">
        <i class="fa fa-folder fa-fw"></i> {{ $root_folder->name }}
      </a>
    </li>
    @foreach($root_folder->children as $directory)
    <li class="nav-item sub-item">
      <a class="nav-link" href="#" data-type="0" data-path="{{ $directory->url }}">
        <i class="fa fa-folder fa-fw"></i> {{ $directory->name }}
      </a>
    </li>
    @endforeach
  @endforeach
</ul>
