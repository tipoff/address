<section class="tger-video">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="tger-video__bg"></div>
                <div class="tger-video__video-container">
                    <amp-youtube
                        data-videoid="{{ $id }}"
                        layout="responsive"
                        width="480"
                        height="270">
                        <amp-img
                            src="{{ $img }}"
                            placeholder
                            layout="fill"
                        />
                    </amp-youtube>
                </div>
            </div>
        </div>
    </div>
</section>