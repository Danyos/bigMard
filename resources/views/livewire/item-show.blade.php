<div>
    @if($ModalOpen===true)
        <div class="modal fade show" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-modal="true"
             style=" display: block">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-body">

                        <div class="row">
                            <button type="button" id="close" wire:click="closeModal()" class="close" data-dismiss="modal"
                                    aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <iframe src="{{route('item.popup',encrypt($items->id))}}" class="mainfram" frameborder="0"></iframe>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    @endif

</div>
<script>

    window.addEventListener('openModal', event => {

        $('#myModl').modal('show');

        let syncCont = $("#shop-dual-carousel");
        let syncCarousel = $("#syncCarousel.owl-carousel");

        if (syncCont) {
            syncCont.append('<div class="owl-carousel carousel-shop-detail-inner owl-theme" id="syncChild"></div>');
            let arrTotal = syncCarousel.find('.item').length - 1;
            let item = '';
            let syncChild = $("#syncChild");
            for (let i = 0; i <= arrTotal; i++) {
                item = syncCarousel.find('.item').eq(i).find('img').attr('src');
                syncChild.append('<!-- Item ' + (i + 1) + '--><div class="item"><img src="' + item + '" alt=""></div>');
            }
        }


        let syncChild = $("#syncChild.owl-carousel");

        syncCarousel.owlCarousel({
            singleItem: true,
            items: 1,
            dots: false,
            slideSpeed: 1000,
            mouseDrag: false,
            nav: true,
            pagination: false,
            afterAction: syncPosition(),
            responsiveRefreshRate: 200,
        });

        syncChild.owlCarousel({
            items: 4,
            pagination: false,
            margin: 0,
            dots: false,
            afterAction: syncPosition(),
        });

        function syncPosition() {
            setTimeout(function () {
                syncChild.find(".owl-item").first().addClass("synced");
            }, 300);
        }

        // Sync nav
        syncCarousel.on('click', '.owl-next', function () {
            let innerActive = syncChild.find('.owl-item.active:first').index();
            let innerActiveLast = syncChild.find('.owl-item.active:last').index();
            let innerActiveSynced = syncChild.find('.owl-item.active.synced').index();
            let innerSynced = syncChild.find('.owl-item.synced').index();
            if (innerActiveSynced === -1) {
                if (innerActive > innerSynced) {
                    while (innerActive > innerSynced) {
                        syncChild.trigger('prev.owl.carousel');
                        innerSynced++;
                    }
                } else if (innerActive < innerSynced) {
                    while (innerActive < innerSynced) {
                        syncChild.trigger('next.owl.carousel');
                        innerSynced--;
                    }
                }
            } else if (innerActiveSynced === innerActiveLast) {
                syncChild.trigger('next.owl.carousel');
            }
            let itemBottom = syncChild.find('.owl-item.synced');
            itemBottom.next().addClass('synced').siblings().removeClass('synced');
        });
        syncCarousel.on('click', '.owl-prev', function () {
            let innerActive = syncChild.find('.owl-item.active:first').index();
            let innerActiveSynced = syncChild.find('.owl-item.active.synced').index();
            let innerSynced = syncChild.find('.owl-item.synced').index();
            if (innerActiveSynced === -1) {
                if (innerActive > innerSynced) {
                    while (innerActive > innerSynced - 2) {
                        syncChild.trigger('prev.owl.carousel');
                        innerSynced++;
                    }
                } else if (innerActive < innerSynced) {
                    while (innerActive < innerSynced - 2) {
                        syncChild.trigger('next.owl.carousel');
                        innerSynced--;
                    }
                }
            } else if (innerActiveSynced === innerActive) {
                syncChild.trigger('prev.owl.carousel');
            }
            let itemBottom = syncChild.find('.owl-item.synced');
            itemBottom.prev().addClass('synced').siblings().removeClass('synced');
        });

        syncChild.on("click", ".owl-item", function () {
            let number = $(this).index();
            syncCarousel.trigger("to.owl.carousel", number, 300);
            $(this).siblings().removeClass('synced');
            $(this).addClass("synced");
        });
        var phoneInput = document.getElementById('phone');
        phoneInput.addEventListener('input', function() {
            var input = phoneInput.value;

            // Remove non-digit characters from the input
            var cleanedInput = input.replace(/\D/g, '');

            // Add the country code prefix if missing
            if (!cleanedInput.startsWith('374')) {
                cleanedInput = '374';
            }

            // Update the input field value
            phoneInput.value = '+' + cleanedInput;
        });
    })

</script>
