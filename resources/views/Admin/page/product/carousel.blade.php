@extends('Admin.layouts.app')

@section('content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <?php $acive=1 ?>
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
                                    </li> <li class="breadcrumb-item active" aria-current="page">
                                        <a href="{{route('admin.product.edit',$id)}}">Edit</a>
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

                        <form id="imageForm" class="p-5" method="post" action=""
                              enctype="multipart/form-data">
                            @csrf
                            <h5>Personal Info Gallery</h5>
                            <section class=" my-3">

                                            <div class="form-group">
                                                <label>mony images :</label>
                                                <input type="file" name="images" id="imageInput"  required multiple
                                                       class="form-control"/>
                                                @if($errors->has('productImages'))
                                                    <em class="invalid-feedback">
                                                        {{ $errors->first('productImages') }}
                                                    </em>
                                                @endif
                                            </div>

                                <div id="previewContainer"></div>

                            </section>
                            <h5>Save</h5>
                            <section>
                                <button class="btn btn-primary my-3" id="uploadBtn" type="submit">Submit</button>
                            </section>
                        </form>
                        <div class="row" id="imageGallery">
                            @foreach($images as $image)
                                <div class="col-md-3 image-container" data-id="{{ $image->id }}" style="position:relative;">
                                    <img src="{{ asset($image->image_path) }}" width="100%">
                                    <i class="fa fa-trash delete-image" aria-hidden="true"
                                       style="position:absolute; top: 20px;right: 20px;font-size: 30px;color:red; cursor:pointer;"></i>
                                </div>
                            @endforeach
                        </div>



                    </div>
                </div>



            </div>
        </div>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                document.querySelectorAll(".delete-image").forEach(button => {
                    button.addEventListener("click", function () {
                        const imageContainer = this.closest(".image-container");
                        const imageId = imageContainer.getAttribute("data-id");

                        if (!confirm("Are you sure you want to delete this image?")) {
                            return;
                        }

                        fetch(`/admin/products/carousel/image/trash/${imageId}`, {
                            method: "DELETE",
                            headers: {
                                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                                "Content-Type": "application/json",
                            }
                        })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    imageContainer.remove(); // Ջնջում ենք HTML-ից
                                } else {
                                    alert("Error deleting image");
                                }
                            })
                            .catch(error => console.error("Error:", error));
                    });
                });
            });

            document.getElementById('imageInput').addEventListener('change', function(event) {
                const files = event.target.files;
                if (!files || files.length === 0) return;

                const previewContainer = document.getElementById('previewContainer');
                previewContainer.innerHTML = ''; // Մաքրում ենք նախորդ նախադիտումները

                const imagesArray = []; // Պահպանում ենք կոմպրեսված Base64 նկարները

                Array.from(files).forEach((file, index) => {
                    const reader = new FileReader();
                    reader.readAsDataURL(file);

                    reader.onload = function(event) {
                        const img = new Image();
                        img.src = event.target.result;
                        img.onload = function() {
                            const canvas = document.createElement('canvas');
                            const ctx = canvas.getContext('2d');

                            // Նոր չափսեր (580x650)
                            const maxWidth = 1080;
                            const maxHeight = 1350;
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

                            // Պահպանում ենք կոմպրեսված նկարը զանգվածում
                            imagesArray.push(compressedDataUrl);

                            // Նախադիտում ավելացնում ենք էջին
                            const imgPreview = document.createElement('img');
                            imgPreview.src = compressedDataUrl;
                            imgPreview.classList.add("preview-img");
                            previewContainer.appendChild(imgPreview);
                        };
                    };
                });

                // Վերբեռնելու կոճակի վրա Event Listener
                document.getElementById('uploadBtn').addEventListener('click', function() {
                    uploadImages(imagesArray);
                });
            });

            // Ֆունկցիա՝ Base64 նկարները Laravel ուղարկելու համար
            function uploadImages(base64Images) {
                const formData = new FormData();
                base64Images.forEach((image, index) => {
                    formData.append(`images[${index}]`, image);
                });

                const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

                fetch('{{ route("admin.product.carouselImageUpload", $id) }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: formData
                })
                    .then(response => response.json())
                    .then(data => {
                       location.reload()
                    })
                    .catch(error => console.error('Error:', error));
            }
        </script>

@endsection
