@extends('mie-ui::layouts.contentLayoutMaster')
@section('title', __('laravel-filemanager::lfm.title-page'))

@section('page-style')
  <link rel="shortcut icon" type="image/png" href="{{ asset('vendor/laravel-filemanager/img/72px color.png') }}">
{{--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">--}}
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.css">
  <link rel="stylesheet" href="{{ asset('vendor/laravel-filemanager/css/cropper.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/laravel-filemanager/css/dropzone.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/laravel-filemanager/css/mime-icons.min.css') }}">
  <style>{!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/css/lfm.css')) !!}</style>

  <link rel="stylesheet" type="text/css" href="{{asset('css/pages/app-file-manager.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/pages/widget-timeline.css')}}">
@endsection
@section('content')
  <div id="alerts"></div>
{{--  <nav aria-label="breadcrumb" class="hide d-lg-block" id="breadcrumbs">--}}
{{--    <ol class="breadcrumb">--}}
{{--      <li class="breadcrumb-item invisible">Home</li>--}}
{{--    </ol>--}}
{{--  </nav>--}}

  <nav id="breadcrumbs">
    <div class="nav-wrapper">
      <div class="col s12">
        <a href="#!" class="breadcrumb">First</a>
        <a href="#!" class="breadcrumb">Second</a>
        <a href="#!" class="breadcrumb">Third</a>
      </div>
    </div>
  </nav>

  <div class="section app-file-manager-wrapper">
    <!-- File Manager app overlay -->
    <div class="app-file-overlay"></div>
{{--    <nav class="navbar sticky-top navbar-expand-lg navbar-dark" id="nav">--}}
{{--      <a class="navbar-brand invisible-lg hide d-lg-inline" id="to-previous">--}}
{{--        <i class="fas fa-arrow-left fa-fw"></i>--}}
{{--        <span class="hide d-lg-inline">{{ trans('laravel-filemanager::lfm.nav-back') }}</span>--}}
{{--      </a>--}}
{{--      <a class="navbar-brand d-block d-lg-none" id="show_tree">--}}
{{--        <i class="fas fa-bars fa-fw"></i>--}}
{{--      </a>--}}
{{--      <a class="navbar-brand d-block d-lg-none" id="current_folder"></a>--}}
{{--      <a id="loading" class="navbar-brand"><i class="fas fa-spinner fa-spin"></i></a>--}}
{{--      <div class="ml-auto px-2">--}}
{{--        <a class="navbar-link hide" id="multi_selection_toggle">--}}
{{--          <i class="fa fa-check-double fa-fw"></i>--}}
{{--          <span class="hide d-lg-inline">{{ trans('laravel-filemanager::lfm.menu-multiple') }}</span>--}}
{{--        </a>--}}
{{--      </div>--}}
{{--      <a class="navbar-toggler collapsed border-0 px-1 py-2 m-0" data-toggle="collapse" data-target="#nav-buttons">--}}
{{--        <i class="fas fa-cog fa-fw"></i>--}}
{{--      </a>--}}
{{--      <div class="collapse navbar-collapse flex-grow-0" id="nav-buttons">--}}
{{--        <ul class="navbar-nav">--}}
{{--          <li class="nav-item">--}}
{{--            <a class="nav-link" data-display="grid">--}}
{{--              <i class="fas fa-th-large fa-fw"></i>--}}
{{--              <span>{{ trans('laravel-filemanager::lfm.nav-thumbnails') }}</span>--}}
{{--            </a>--}}
{{--          </li>--}}
{{--          <li class="nav-item">--}}
{{--            <a class="nav-link" data-display="list">--}}
{{--              <i class="fas fa-list-ul fa-fw"></i>--}}
{{--              <span>{{ trans('laravel-filemanager::lfm.nav-list') }}</span>--}}
{{--            </a>--}}
{{--          </li>--}}
{{--          <li class="nav-item dropdown">--}}
{{--            <a class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">--}}
{{--              <i class="fas fa-sort fa-fw"></i>{{ trans('laravel-filemanager::lfm.nav-sort') }}--}}
{{--            </a>--}}
{{--            <div class="dropdown-menu dropdown-menu-right border-0"></div>--}}
{{--          </li>--}}
{{--        </ul>--}}
{{--      </div>--}}
{{--    </nav>--}}

    <a id="loading" class="navbar-brand"><i class="fas fa-spinner fa-spin"></i></a>



    <!-- sidebar left start -->
    <div class="sidebar-left">
      <!--left sidebar of file manager start -->
      <div class="app-file-sidebar display-flex">
        <!-- App File sidebar - Left section Starts -->
        <div class="app-file-sidebar-left">
          <!-- sidebar close icon starts -->
          <span class="app-file-sidebar-close hide-on-med-and-up"><i class="material-icons">close</i></span>
          <!-- sidebar close icon ends -->
          <div class="input-field add-new-file mt-0">
            <!-- Add File Button -->
            <button class="add-file-btn btn btn-block waves-effect waves-light mb-10">
              <i class="material-icons">add</i>
              <span>Add File</span>
            </button>
            <!-- file input  -->
            <div class="getfileInput">
              <input type="file" id="getFile">
            </div>
          </div>
          <div class="app-file-sidebar-content" id="tree"></div>
        </div>
      </div>
      <!--left sidebar of file manager start -->
    </div>
    <!--/ sidebar left end -->
    <!-- content-right start -->
    <div class="content-right">
      <!-- file manager main content start -->
      <div class="app-file-area">
        <!-- File App Content Area -->
        <!-- App File Header Starts -->
        <div class="app-file-header">
          <!-- Header search bar starts -->
          <div class="sidebar-toggle show-on-medium-and-down mr-1 ml-1">
            <i class="material-icons">menu</i>
          </div>
          <div class="app-file-header-search">
            <div class="input-field m-0">
              <i class="material-icons prefix">search</i>
              <input type="search" id="email-search" placeholder="Search files and media">
            </div>
          </div>
          <!-- Header search bar Ends -->

          <!-- Header Icons Starts -->
          <div class="app-file-header-icons display-flex align-items-center" id="nav-buttons">
            <div class="fonticon-wrap display-inline">
              <a class="nav-link" data-display="grid">
                <i class="fas fa-th-large fa-fw"></i>
                <span>{{ trans('laravel-filemanager::lfm.nav-thumbnails') }}</span>
              </a>
            </div>
            <div class="fonticon-wrap display-inline">
              <a class="nav-link" data-display="list">
                <i class="fas fa-list-ul fa-fw"></i>
                <span>{{ trans('laravel-filemanager::lfm.nav-list') }}</span>
              </a>
            </div>
            <div class="fonticon-wrap display-inline">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-sort fa-fw"></i>{{ trans('laravel-filemanager::lfm.nav-sort') }}
              </a>
              <div class="dropdown-menu dropdown-menu-right border-0"></div>
            </div>
          </div>
          <!-- Header Icons Ends -->
        </div>
        <!-- App File Header Ends -->

        <!-- App File Content Starts -->
        <div class="app-file-content">
          <h6 class="font-weight-700 mb-3">All Files</h6>

{{--          <!-- App File - Recent Accessed Files Section Starts -->--}}
{{--          <span class="app-file-label">Recently Accessed Files</span>--}}
{{--          <div class="row app-file-recent-access mb-3">--}}
{{--            <div class="col xl3 l6 m3 s12">--}}
{{--              <div class="card box-shadow-none mb-1 app-file-info">--}}
{{--                <div class="card-content">--}}
{{--                  <div class="app-file-content-logo grey lighten-4">--}}
{{--                    <div class="fonticon">--}}
{{--                      <i class="material-icons">more_vert</i>--}}
{{--                    </div>--}}
{{--                    <img class="recent-file" src="{{asset('images/icon/pdf.png')}}" height="38" width="30"--}}
{{--                         alt="Card image cap">--}}
{{--                  </div>--}}
{{--                  <div class="app-file-recent-details">--}}
{{--                    <div class="app-file-name font-weight-700">Felecia_Resume.pdf</div>--}}
{{--                    <div class="app-file-size">12.85kb</div>--}}
{{--                    <div class="app-file-last-access">Last accessed : 3 hours ago</div>--}}
{{--                  </div>--}}
{{--                </div>--}}
{{--              </div>--}}
{{--            </div>--}}
{{--            <div class="col xl3 l6 m3 s12">--}}
{{--              <div class="card box-shadow-none mb-1 app-file-info">--}}
{{--                <div class="card-content">--}}
{{--                  <div class="app-file-content-logo grey lighten-4">--}}
{{--                    <div class="fonticon"><i class="material-icons">more_vert</i></div>--}}
{{--                    <img class="recent-file" src="{{asset('images/icon/psd.png')}}" height="38" width="30"--}}
{{--                         alt="Card image cap">--}}
{{--                  </div>--}}
{{--                  <div class="app-file-content-details">--}}
{{--                    <div class="app-file-name font-weight-700">Logo_design.psd</div>--}}
{{--                    <div class="app-file-size">15.60mb</div>--}}
{{--                    <div class="app-file-last-access">Last accessed : 3 hours ago</div>--}}
{{--                  </div>--}}
{{--                </div>--}}
{{--              </div>--}}
{{--            </div>--}}
{{--            <div class="col xl3 l6 m3 s12">--}}
{{--              <div class="card box-shadow-none mb-1 app-file-info">--}}
{{--                <div class="card-content">--}}
{{--                  <div class="app-file-content-logo grey lighten-4">--}}
{{--                    <div class="fonticon"> <i class="material-icons">more_vert</i></div>--}}
{{--                    <img class="recent-file" src="{{asset('images/icon/doc.png')}}" height="38" width="30"--}}
{{--                         alt="Card image cap">--}}
{{--                  </div>--}}
{{--                  <div class="app-file-content-details">--}}
{{--                    <div class="app-file-name font-weight-700">Music_Two.xyz</div>--}}
{{--                    <div class="app-file-size">1.2gb</div>--}}
{{--                    <div class="app-file-last-access">Last accessed : 3 hours ago</div>--}}
{{--                  </div>--}}
{{--                </div>--}}
{{--              </div>--}}
{{--            </div>--}}
{{--            <div class="col xl3 l6 m3 s12">--}}
{{--              <div class="card box-shadow-none mb-1 app-file-info">--}}
{{--                <div class="card-content">--}}
{{--                  <div class="app-file-content-logo grey lighten-4">--}}
{{--                    <div class="fonticon">--}}
{{--                      <i class="material-icons">more_vert</i>--}}
{{--                    </div>--}}
{{--                    <img class="recent-file" src="{{asset('images/icon/sketch.png')}}" height="38" width="30"--}}
{{--                         alt="Card image cap">--}}
{{--                  </div>--}}
{{--                  <div class="app-file-content-details">--}}
{{--                    <div class="app-file-name font-weight-700">Application.sketch</div>--}}
{{--                    <div class="app-file-size">92.83kb</div>--}}
{{--                    <div class="app-file-last-access">Last accessed : 3 hours ago</div>--}}
{{--                  </div>--}}
{{--                </div>--}}
{{--              </div>--}}
{{--            </div>--}}
{{--          </div>--}}
{{--          <!-- App File - Recent Accessed Files Section Ends -->--}}

          <!-- App File - Folder Section Starts -->
          <span class="app-file-label">Folder</span>
          <div class="row app-file-folder mb-3">
            <div class="col xl3 l6 m4 s6">
              <div class="card box-shadow-none mb-1 app-file-info">
                <div class="card-content">
                  <div class="app-file-folder-content cursor-pointer display-flex align-items-center">
                    <div class="app-file-folder-logo mr-3">
                      <i class="material-icons">folder_open</i>
                    </div>
                    <div class="app-file-folder-details">
                      <div class="app-file-folder-name font-weight-700">Project</div>
                      <div class="app-file-folder-size">2 files, 14.05mb</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- App File - Folder Section Ends -->

          <!-- App File - Files Section Starts -->
          <label class="app-file-label">Files</label>
          <div class="row app-file-files" id="content"></div>
          <div  class="col xl3 l6 m3 s6 hide" id="item-template">
            <div class="card box-shadow-none mb-1 app-file-info">
              <div class="card-content">
                <div class="app-file-content-logo grey lighten-4 square">
                  <div class="fonticon">
                    <i class="material-icons">more_vert</i>
                  </div>
                  <img class="recent-file preview-file" src="{{asset('images/icon/pdf.png')}}" height="80"  alt="file">
                </div>
                <div class="app-file-details">
                  <div class="app-file-name font-weight-700 item_name text-truncate">file.jpg</div>
                  <div class="app-file-size">0kb</div>
                  <div class="app-file-type text-muted font-weight-light text-truncate">Image File</div>
                </div>
              </div>
            </div>
          </div>
          <!-- App File - Files Section Ends -->
        </div>
      </div>

      <div id="pagination"></div>
      <!-- file manager main content end  -->
    </div>
    <!-- content-right end -->
    <!-- App File sidebar - Right section Starts -->
    <div class="app-file-sidebar-info">
      <div class="card box-shadow-none m-0 pb-1">
        <div class="card-header display-flex justify-content-between align-items-center">
          <h6 class="m-0 info--filename">Document.pdf</h6>
          <div class="app-file-action-icons display-flex align-items-center">
            <i class="material-icons mr-10">delete</i>
            <i class="material-icons close-icon">close</i>
          </div>
        </div>
        <div class="card-content">
          <ul class="tabs tabs-fixed-width mb-1">
            <li class="tab mr-1 pr-1">
              <a class="active display-flex align-items-center" id="details-tab" href="#details">
                <i class="material-icons mr-1">content_paste</i>
                <span>Details</span>
              </a>
            </li>
            <li class="tab">
              <a class="display-flex align-items-center" id="activity-tab" href="#file-activity">
                <i class="material-icons mr-1">timeline</i>
                <span>Activity</span>
              </a>
            </li>
          </ul>
          <div class="tab-content">
            <div class="details-tab active" id="details">
              <div class="display-flex align-items-center flex-column pb-2 pt-4">
{{--                <img src="{{asset('images/icon/pdf.png')}}" alt="PDF" height="42" width="35" class="mt-5 mb-5">--}}
                <img  src="{{asset('images/icon/pdf.png')}}" alt="PDF"  width="100%" class="mt-5 mb-5 info--preview">
                <p class="mt-4 info--size">0.00mb</p>
              </div>
              <div class="divider mt-5 mb-5"></div>
              <div class="pt-6">
                <span class="app-file-label">Setting</span>
                <div class="display-flex justify-content-between align-items-center mt-6">
                  <p>File Sharing</p>
                  <div class="switch">
                    <label>
                      <input type="checkbox" id="customSwitchGlow1">
                      <span class="lever"></span>
                    </label>
                  </div>
                </div>
                <div class="display-flex justify-content-between align-items-center mt-6">
                  <p>Synchronization</p>
                  <div class="switch">
                    <label>
                      <input type="checkbox" id="customSwitchGlow2" checked>
                      <span class="lever"></span>
                    </label>
                  </div>
                </div>
                <div class="display-flex justify-content-between align-items-center mt-6 mb-8">
                  <p>Backup</p>
                  <div class="switch">
                    <label>
                      <input type="checkbox" id="customSwitchGlow3">
                      <span class="lever"></span>
                    </label>
                  </div>
                </div>
                <span class="app-file-label">Info</span>
                <div class="display-flex justify-content-between align-items-center mt-6">
                  <p>Type</p>
                  <p class="font-weight-700 info--type uppercase">FILE</p>
                </div>
                <div class="display-flex justify-content-between align-items-center mt-6">
                  <p>Size</p>
                  <p class="font-weight-700 info--size uppercase">0kb</p>
                </div>
                <div class="display-flex justify-content-between align-items-center mt-6">
                  <p>Location</p>
                  <p class="font-weight-700 info--location">Files > Documents</p>
                </div>
                <div class="display-flex justify-content-between align-items-center mt-6">
                  <p>Owner</p>
                  <p class="font-weight-700">@egyjs</p>
                </div>
                <div class="display-flex justify-content-between align-items-center mt-6">
                  <p>Modified</p>
                  <p class="font-weight-700 info--modified">September 4 2019</p>
                </div>
                <div class="display-flex justify-content-between align-items-center mt-6">
                  <p>Opened</p>
                  <p class="font-weight-700 info--opened">July 8, 2019</p>
                </div>
                <div class="display-flex justify-content-between align-items-center mt-6">
                  <p>Created</p>
                  <p class="font-weight-700 info--created">July 1, 2019</p>
                </div>
              </div>
            </div>
            <div class="activity-tab" id="file-activity">
              <ul class="widget-timeline mb-0">
                <li class="timeline-items timeline-icon-green active">
                  <div class="timeline-time">Today</div>
                  <h6 class="timeline-title">You added an item to</h6>
                  <p class="timeline-text">You added an item</p>
                  <div class="timeline-content">
                    <img src="{{asset('images/icon/psd.png')}}" alt="PSD" height="30" width="25" class="mr-1">Mockup.psd
                  </div>
                </li>
                <li class="timeline-items timeline-icon-cyan active">
                  <div class="timeline-time">10 min ago</div>
                  <h6 class="timeline-title">You shared 2 times</h6>
                  <p class="timeline-text">Emily Bennett edited an item</p>
                  <div class="timeline-content">
                    <img src="{{asset('images/icon/sketch.png')}}" alt="Sketch" height="30" width="25"
                         class="mr-1">Template_Design.sketch
                  </div>
                </li>
                <li class="timeline-items timeline-icon-red active">
                  <div class="timeline-time">Mon 10:20 PM</div>
                  <h6 class="timeline-title">You edited an item</h6>
                  <p class="timeline-text">You edited an item</p>
                  <div class="timeline-content">
                    <img src="{{asset('images/icon/pdf.png')}}" alt="document" height="30" width="25"
                         class="mr-1">Information.doc
                  </div>
                </li>
                <li class="timeline-items timeline-icon-indigo active">
                  <div class="timeline-time">Jul 13 2019</div>
                  <h6 class="timeline-title">You edited an item</h6>
                  <p class="timeline-text">John Keller edited an item</p>
                  <div class="timeline-content">
                    <img src="{{asset('images/icon/pdf.png')}}" alt="document" height="30" width="25"
                         class="mr-1">Documentation.doc
                  </div>
                </li>
                <li class="timeline-items timeline-icon-orange">
                  <div class="timeline-time">Apr 18 2019</div>
                  <h6 class="timeline-title">You added an item to</h6>
                  <p class="timeline-text">You edited an item</p>
                  <div class="timeline-content">
                    <img src="{{asset('images/icon/pdf.png')}}" alt="document" height="30" width="25"
                         class="mr-1">Resume.pdf
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- App File sidebar - Right section Ends -->

    <div id="fab"></div>

    <div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">{{ trans('laravel-filemanager::lfm.title-upload') }}</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aia-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            <form action="{{ route('unisharp.lfm.upload') }}" role='form' id='uploadForm' name='uploadForm' method='post' enctype='multipart/form-data' class="dropzone">
              <div class="form-group" id="attachment">
                <div class="controls text-center">
                  <div class="input-group w-100">
                    <a class="btn btn-primary w-100 text-white" id="upload-button">{{ trans('laravel-filemanager::lfm.message-choose') }}</a>
                  </div>
                </div>
              </div>
              <input type='hidden' name='working_dir' id='working_dir'>
              <input type='hidden' name='type' id='type' value='{{ request("type") }}'>
              <input type='hidden' name='_token' value='{{csrf_token()}}'>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary w-100" data-dismiss="modal">{{ trans('laravel-filemanager::lfm.btn-close') }}</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="notify" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-body"></div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary w-100" data-dismiss="modal">{{ trans('laravel-filemanager::lfm.btn-close') }}</button>
            <button type="button" class="btn btn-primary w-100" data-dismiss="modal">{{ trans('laravel-filemanager::lfm.btn-confirm') }}</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="dialog" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title"></h4>
          </div>
          <div class="modal-body">
            <input type="text" class="form-control">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary w-100" data-dismiss="modal">{{ trans('laravel-filemanager::lfm.btn-close') }}</button>
            <button type="button" class="btn btn-primary w-100" data-dismiss="modal">{{ trans('laravel-filemanager::lfm.btn-confirm') }}</button>
          </div>
        </div>
      </div>
    </div>

    <div id="carouselTemplate" class="hide carousel slide bg-light" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#previewCarousel" data-slide-to="0" class="active"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <a class="carousel-label"></a>
          <div class="carousel-image"></div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#previewCarousel" role="button" data-slide="prev">
        <div class="carousel-control-background" aria-hidden="true">
          <i class="fas fa-chevron-left"></i>
        </div>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#previewCarousel" role="button" data-slide="next">
        <div class="carousel-control-background" aria-hidden="true">
          <i class="fas fa-chevron-right"></i>
        </div>
        <span class="sr-only">Next</span>
      </a>
    </div>

{{--    <nav class="fixed-bottom border-top hide" id="actions">--}}
{{--      <a data-action="open" data-multiple="false"><i class="material-icons">folder_open</i>{{ trans('laravel-filemanager::lfm.btn-open') }}</a>--}}
{{--      <a data-action="preview" data-multiple="true"><i class="fas fa-images"></i>{{ trans('laravel-filemanager::lfm.menu-view') }}</a>--}}
{{--      <a data-action="use" data-multiple="true"><i class="fas fa-check"></i>{{ trans('laravel-filemanager::lfm.btn-confirm') }}</a>--}}
{{--    </nav>--}}
  </div>

@endsection

@section('page-script')
{{--  new--}}
<script src="{{asset('js/scripts/app-file-manager.js')}}"></script>

{{--  old--}}
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
  <script src="{{ asset('vendor/laravel-filemanager/js/cropper.min.js') }}"></script>
  <script src="{{ asset('vendor/laravel-filemanager/js/dropzone.min.js') }}"></script>
  <script>
    var lang = {!! json_encode(trans('laravel-filemanager::lfm')) !!};
    var actions = [
      // {
      //   name: 'use',
      //   icon: 'check',
      //   label: 'Confirm',
      //   multiple: true
      // },
      {
        name: 'rename',
        icon: 'edit',
        label: lang['menu-rename'],
        multiple: false
      },
      {
        name: 'download',
        icon: 'download',
        label: lang['menu-download'],
        multiple: true
      },
      // {
      //   name: 'preview',
      //   icon: 'image',
      //   label: lang['menu-view'],
      //   multiple: true
      // },
      {
        name: 'move',
        icon: 'paste',
        label: lang['menu-move'],
        multiple: true
      },
      {
        name: 'resize',
        icon: 'arrows-alt',
        label: lang['menu-resize'],
        multiple: false
      },
      {
        name: 'crop',
        icon: 'crop',
        label: lang['menu-crop'],
        multiple: false
      },
      {
        name: 'trash',
        icon: 'trash',
        label: lang['menu-delete'],
        multiple: true
      },
    ];

    var sortings = [
      {
        by: 'alphabetic',
        icon: 'sort-alpha-down',
        label: lang['nav-sort-alphabetic']
      },
      {
        by: 'time',
        icon: 'sort-numeric-down',
        label: lang['nav-sort-time']
      }
    ];
  </script>
  <script>{!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/script.js')) !!}</script>
  {{-- Use the line below instead of the above if you need to cache the script. --}}
  {{-- <script src="{{ asset('vendor/laravel-filemanager/js/script.js') }}"></script> --}}
  <script>
    Dropzone.options.uploadForm = {
      paramName: "upload[]", // The name that will be used to transfer the file
      uploadMultiple: false,
      parallelUploads: 5,
      timeout:0,
      clickable: '#upload-button',
      dictDefaultMessage: lang['message-drop'],
      init: function() {
        var _this = this; // For the closure
        this.on('success', function(file, response) {
          if (response == 'OK') {
            loadFolders();
          } else {
            this.defaultOptions.error(file, response.join('\n'));
          }
        });
      },
      headers: {
        'Authorization': 'Bearer ' + getUrlParam('token')
      },
      acceptedFiles: "{{ implode(',', $helper->availableMimeTypes()) }}",
      maxFilesize: ({{ $helper->maxUploadSize() }} / 1000)
    }
  </script>
@endsection