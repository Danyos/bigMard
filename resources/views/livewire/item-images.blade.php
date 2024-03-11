
    @foreach($items as $ItemsGalleries)

        <!--Item 1-->

        <div class="item" >
            <a href="{{asset($ItemsGalleries->image_path)}}" data-fancybox="gallery{{$ItemsGalleries->id}}"
               title="Zoom In">
                <img src="{{asset($ItemsGalleries->image_path)}}"
                     alt="LatestDaniel jan">
            </a>
        </div>
    @endforeach

