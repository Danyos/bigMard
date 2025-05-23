@extends('Admin.layouts.app')

@section('content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Add product</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{route('admin.home')}}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        <a href="{{route('admin.product.index')}}">Product page</a>
                                    </li>
                                </ol>
                            </nav>
                        </div>

                    </div>
                </div>

                <div class="pd-20 card-box mb-30">
                    <div class="clearfix">
                        <h4 class="text-blue h4">Start</h4>

                    </div>
                    <div class="">

                        <form class="p-5" method="post" action="{{route('admin.product.store')}}" enctype="multipart/form-data">
                            @csrf
                            <h5>Personal Info</h5>
                            <section class=" my-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>name :</label>
                                            <input type="text" class="form-control" name="name" required/>
                                            @if($errors->has('name'))
                                                <em class="invalid-feedback">
                                                    {{ $errors->first('name') }}
                                                </em>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label>Category :</label>
                                            <select name="category_id" class="form-control" >
                                                @foreach($category as $categores)
                                                    <option value="{{$categores->id}}" selected>{{$categores->name}}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('title'))
                                                <em class="invalid-feedback">
                                                    {{ $errors->first('title') }}
                                                </em>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>price :</label>
                                            <input type="number" name="price" class="form-control" required/>
                                            @if($errors->has('price'))
                                                <em class="invalid-feedback">
                                                    {{ $errors->first('price') }}
                                                </em>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label>discount :</label>
                                            <input type="number" name="discount" class="form-control"/>
                                            @if($errors->has('discount'))
                                                <em class="invalid-feedback">
                                                    {{ $errors->first('discount') }}
                                                </em>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Interview Date :</label>
                                            <input
                                                type="datetime-local" name="auction_end_time"
                                                class="form-control date-picker"
                                                placeholder="Select Date"
                                            />
                                            @if($errors->has('date'))
                                                <em class="invalid-feedback">
                                                    {{ $errors->first('date') }}
                                                </em>
                                            @endif
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Count:</label>
                                            <input
                                                type="number" name="count"
                                                class="form-control"
                                                placeholder="Select count"
                                                value="1"
                                            />
                                            @if($errors->has('count'))
                                                <em class="invalid-feedback">
                                                    {{ $errors->first('count') }}
                                                </em>
                                            @endif
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="status">
                                        <option value="active" >publish</option>
                                        <option value="inactive" selected>draft</option>
                                    </select>
                                    @if($errors->has('status'))
                                        <em class="invalid-feedback">
                                            {{ $errors->first('status') }}
                                        </em>
                                    @endif
                                </div>

                            </section>

                            <!-- Step 2 -->
                            <h5>Main Description</h5>
                            <section class=" my-3">
                               <textarea name="description"
                                         class="form-control inputFields ncontent"></textarea>

                                @if($errors->has('contextBig'))
                                    <em class="invalid-feedback">
                                        {{ $errors->first('contextBig') }}
                                    </em>
                                @endif
                            </section>
                            <!-- Step 3 -->
                            <!-- Step 3 -->
                            <h5>Remark</h5>
                            <section class=" my-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Images in descritpion</label>
                                            <textarea name="imgText" class="form-control " required> </textarea>
                                            @if($errors->has('imgText'))
                                                <em class="invalid-feedback">
                                                    {{ $errors->first('imgText') }}
                                                </em>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>youtube url</label>
                                            <input type="url" name="youtubUrl" class="form-control"/>
                                            @if($errors->has('youtubUrl'))
                                                <em class="invalid-feedback">
                                                    {{ $errors->first('youtubUrl') }}
                                                </em>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                            </section>
                            <!-- Step 4 -->
                            <!-- Step 4 -->

                            <h5>Save</h5>
                            <section>
                                <button class="btn btn-primary my-3" type="submit">Submit</button>
                            </section>
                        </form>
                    </div>
                </div>


            </div>
        </div>

@endsection
        @section('js')
            <script src="{{asset('admin/vendors/tinymce/tinymce.min.js')}}"></script>
            <script>


                $(function () {
                    $("#date").datetime({value: '+1min'});
                    $("#update_cmd").button();
                    $("#status").buttonset();
                    $("#top_fut").buttonset();
                    $("#lang").buttonset();
                    $("#catList").buttonset();
                });
                tinymce.init({
                    selector: '.ncontent',
                    menubar: false,
                    plugins: [
                        "advlist autolink link image lists charmap print preview hr anchor pagebreak fullscreen",
                        "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking spellchecker",
                        "table contextmenu directionality emoticons paste textcolor responsivefilemanager code"
                    ],
                    relative_urls: false,
                    image_advtab: true,
                    filemanager_title: "Responsive Filemanager",
                    file_picker_types: 'file image media',
                    external_filemanager_path: "/admin/filemanager/",
                    toolbar1: "bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent blockquote | formatselect removeformat | fullscreen",
                    toolbar2: "undo redo | cut copy paste pastetext | forecolor backcolor | searchreplace  | responsivefilemanager | image | media | link unlink  | code",
                    file_picker_callback: function (cb, value, meta) {
                        var width = window.innerWidth - 30;
                        var height = window.innerHeight - 60;
                        if (width > 1800) width = 1800;
                        if (height > 1200) height = 1200;
                        if (width > 600) {
                            var width_reduce = (width - 20) % 138;
                            width = width - width_reduce + 10;
                        }
                        var urltype = 2;
                        if (meta.filetype == 'image') {
                            urltype = 1;
                        }
                        if (meta.filetype == 'media') {
                            urltype = 3;
                        }
                        let title = "RESPONSIVE FileManager";
                        if (typeof this.settings.filemanager_title !== "undefined" && this.settings.filemanager_title) {
                            title = this.settings.filemanager_title;
                        }
                        let akey = "key";
                        if (typeof this.settings.filemanager_access_key !== "undefined" && this.settings.filemanager_access_key) {
                            akey = this.settings.filemanager_access_key;
                        }
                        let sort_by = "";
                        if (typeof this.settings.filemanager_sort_by !== "undefined" && this.settings.filemanager_sort_by) {
                            sort_by = "&sort_by=" + this.settings.filemanager_sort_by;
                        }
                        let descending = "false";
                        if (typeof this.settings.filemanager_descending !== "undefined" && this.settings.filemanager_descending) {
                            descending = this.settings.filemanager_descending;
                        }
                        let fldr = "";
                        if (typeof this.settings.filemanager_subfolder !== "undefined" && this.settings.filemanager_subfolder) {
                            fldr = "&fldr=" + this.settings.filemanager_subfolder;
                        }
                        let crossdomain = "";
                        if (typeof this.settings.filemanager_crossdomain !== "undefined" && this.settings.filemanager_crossdomain) {
                            crossdomain = "&crossdomain=1";

                            // Add handler for a message from ResponsiveFilemanager
                            if (window.addEventListener) {
                                window.addEventListener('message', filemanager_onMessage, false);
                            } else {
                                window.attachEvent('onmessage', filemanager_onMessage);
                            }
                        }
                        tinymce.activeEditor.windowManager.open({
                            title: title,
                            file: this.settings.external_filemanager_path + 'dialog.php?type=' + urltype + '&descending=' + descending + sort_by + fldr + crossdomain + '&lang=' + this.settings.language + '&akey=' + akey,
                            width: width,
                            height: height,
                            resizable: true,
                            maximizable: true,
                            inline: 1
                        }, {
                            setUrl: function (url) {
                                cb(url);
                            }
                        });
                    },
                });
            </script>


@endsection

