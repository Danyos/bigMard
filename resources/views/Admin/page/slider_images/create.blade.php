@extends('Admin.layouts.app')

@section('content')

    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="pd-20 card-box mb-30">
                    <form id="imageForm" class="p-5">
                        @csrf
                        <h5>Upload New Slider Image</h5>

                        <section class="my-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Title :</label>
                                        <input type="text" class="form-control" name="title" id="title" placeholder="Enter title"/>
                                    </div>

                                    <div class="form-group">
                                        <label>Description :</label>
                                        <textarea class="form-control" name="description" id="description" placeholder="Enter description"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>Image :</label>
                                        <input type="file" class="form-control-file" id="imageInput" accept="image/*" required/>
                                        <img id="preview" style="max-width: 300px; display: none;" class="mt-2"/>
                                    </div>

                                    <div class="form-group">
                                        <label>Link (Optional) :</label>
                                        <input type="text" class="form-control" name="link" id="link" placeholder="Enter link"/>
                                    </div>

                                    <div>
                                        <button class="btn btn-primary mt-2" type="button" id="uploadBtn">Submit</button>
                                    </div>

                                </div>
                            </div>
                        </section>
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

                    // Նոր չափսեր
                    const maxWidth = 1980;
                    const maxHeight = 1070;
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
            formData.append('title', document.getElementById('title').value);
            formData.append('description', document.getElementById('description').value);
            formData.append('link', document.getElementById('link').value);
            formData.append('image', base64String);

            const csrfToken = document.querySelector('meta[name="csrf-token"]');
            const tokenValue = csrfToken ? csrfToken.content : '';

            fetch('{{ route("admin.slider-images.store") }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': tokenValue
                },
                body: formData
            })
                .then(response => response.json())
                .then(data => {
                   location.href='{{ route("admin.slider-images.index") }}'
                })
                .catch(error => console.error('Error:', error));
        }
    </script>

@endsection
