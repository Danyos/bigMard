@extends('Admin.layouts.app')

@section('content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <?php $acive=0 ?>
                                <ul class="list-group">
                                    <li class="list-group-item ">
                                        <a href="{{route('admin.product.coverImage',$id)}}" class="{{$acive==0?'badge badge-success':'' }}">Cover 1 նկար(580x650)</a>

                                    </li>
                                    <li class="list-group-item ">
                                        <a href="{{route('admin.product.carousel',$id)}}" class="{{$acive==1?'badge badge-success':'' }}">carousel  անսահմանփակ նկար(1080x1350)</a>

                                    </li>

                                </ul>
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

                        <form id="imageForm" class="p-5">
                            @csrf
                            <h5>Personal Info</h5>
                            <h5>Gallery</h5>
                            <section class=" my-3">



                                            <div class="form-group">
                                                <label>cover:</label>
                                                <input type="file" name="image" id="imageInput" class="form-control"/>
                                                @if($errors->has('cover'))
                                                    <em class="invalid-feedback">
                                                        {{ $errors->first('cover') }}
                                                    </em>
                                                @endif
                                                <img id="preview"src="{{asset($image->coverImages)}}" style="max-width: 300px;" class="mt-2"/>

                                            </div>


                            </section>
                            <button type="button" id="uploadBtn" class="btn btn-primary">Upload Image</button>


                        </form>
                    </div>
                </div>


            </div>
        </div>
        <script>
            document.getElementById('imageInput').addEventListener('change', function(event) {
                const file = event.target.files[0];
                if (!file) return;

                const reader = new FileReader();
                reader.readAsDataURL(file);

                reader.onload = function(event) {
                    const img = new Image();
                    img.src = event.target.result;
                    img.onload = function() {
                        const canvas = document.createElement('canvas');
                        const ctx = canvas.getContext('2d');

                        // Նոր չափսեր (580x650)
                        const maxWidth = 580;
                        const maxHeight = 650;
                        let width = img.width;
                        let height = img.height;

                        if (width > maxWidth || height > maxHeight) {
                            const scaleFactor = Math.min(maxWidth / width, maxHeight / height);
                            width = Math.floor(width * scaleFactor);
                            height = Math.floor(height * scaleFactor);
                        }

                        canvas.width = width;
                        canvas.height = height;
                        ctx.drawImage(img, 0, 0, width, height);

                        // Թեթև JPEG 40% որակով
                        const quality = 0.4;
                        const compressedDataUrl = canvas.toDataURL('image/jpeg', quality);

                        // Նախադիտում
                        const preview = document.getElementById('preview');
                        preview.src = compressedDataUrl;
                        preview.style.display = 'block';

                        // Պատրաստում ենք կոմպրեսված նկարը ուղարկելու համար
                        document.getElementById('uploadBtn').addEventListener('click', function() {
                            uploadImage(compressedDataUrl);
                        });
                    };
                };
            });

            // Ֆունկցիա՝ Base64 նկարը Laravel ուղարկելու համար
            function uploadImage(base64String) {
                const formData = new FormData();
                formData.append('image', base64String);

                const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

                fetch('{{ route("admin.product.imageUpload", $id) }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: formData
                })
                    .then(response => response.json())
                    .then(data => {
                        location.href = '{{ route("admin.product.carousel",$id) }}';
                    })
                    .catch(error => console.error('Error:', error));
            }

        </script>

@endsection
