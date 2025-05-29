@extends('Admin.layouts.app')


@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h4>Edit Product</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.product.update', $item->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Product Name</label>
                                <input type="text" name="name" class="form-control" required value="{{ old('name', $item->name) }}">
                                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="form-group">
                                <label for="category_id">Category</label>
                                <select name="category_id" class="form-control">
                                    @foreach($category as $categor)
                                        <option value="{{ $categor->id }}" {{ $item->category_id == $categor->id ? 'selected' : '' }}>{{ $categor->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" name="price" class="form-control" required value="{{ old('price', $item->price) }}">
                                @error('price') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="discount">Discount (%)</label>
                                <input type="number" name="discount" class="form-control" value="{{ old('discount', $item->discount) }}">
                                @error('discount') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="form-group">
                                <label for="auction_end_time">Auction End Time</label>
                                <input type="datetime-local" name="auction_end_time" class="form-control"
                                       value="{{ old('auction_end_time', $item->auction_end_time ? \Illuminate\Support\Carbon::parse($item->auction_end_time)->format('Y-m-d\TH:i') : '') }}">
                                @error('auction_end_time') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="form-group">
                                <label for="count">Stock Count</label>
                                <input type="number" name="count" class="form-control" value="{{ old('count', $item->count) }}">
                                @error('count') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" name="status">
                            <option value="active" {{ $item->status == 'active' ? 'selected' : '' }}>Publish</option>
                            <option value="inactive" {{ $item->status == 'inactive' ? 'selected' : '' }}>Draft</option>
                        </select>
                        @error('status') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Product Description</label>
                        <textarea name="description" class="form-control inputFields ncontent" rows="4">{{ old('description', $item->description) }}</textarea>
                        @error('description') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <section class="my-3">
                        <div class="row">
                            <!-- Images in description -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status">Best</label>
                                    <select class="form-control" name="best">
                                        <option value="active"  {{ $item->best == 'active' ? 'selected' : '' }}>Active</option>
                                        <option value="inactive"  {{ $item->best == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                    @error('best') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status">new</label>
                                    <select class="form-control" name="new">
                                        <option value="active" {{ $item->new == 'active' ? 'selected' : '' }} >Active</option>
                                        <option value="inactive"  {{ $item->new == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                    @error('new') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>
                        </div>
                    </section>
                    <h5>Remark</h5>
                    <section class="my-3">
                        <div class="row">
                            <!-- Images in description -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="imgText">Images in Description</label>
                                    <textarea name="imgText" id="imgText" class="form-control">{{ old('imgText', $other->imgText ?? '') }}</textarea>
                                    @error('imgText') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>

                            <!-- YouTube URL -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="youtubeUrl">YouTube URL</label>
                                    <input type="url" name="youtubUrl" id="youtubeUrl" class="form-control" value="{{ old('youtubeUrl', $other->youtubUrl ?? '') }}">
                                    @error('youtubeUrl') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>
                        </div>
                    </section>

                    <button type="submit" class="btn btn-primary mt-3">
                        Update Product
                    </button>
                </form>
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
