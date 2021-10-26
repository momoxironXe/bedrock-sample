<div class="ft-video">
    <img class="bg-img" src="{{bg-img}}" alt="{{bg-alt}}" />
    <div class="ft-video-inner">

        <div class="ft-video-content">
            <h2 class="page-heading light">{{title}}</h2>
            <p class="copy light">{{text}}</p>

        </div>
        <div class="ft-video-play-wrapper">
            <button class="ft-video-play" data-micromodal-trigger="{{modal-id}}">
                {{play-icon}}
            </button>
        </div>
    </div>

    <div class="ft-video__modal" id="{{modal-id}}" aria-hidden="true">

        <div class="overlay" tabindex="-1" data-video-close>

            <div role="dialog" aria-modal="true" aria-label="{{modal-id}}" class="dialog">
                <header>
                    <button class="modal-close" aria-label="Close modal">
                        <span data-video-close class="modal-close__btn"></span>
                    </button>
                    </h2>
                </header>

                <div id="{{modal-id}}" class="content">
                    <div class="ft-video-wrapper">
                        <iframe src="{{yt-link}}" title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen class="video-embed"></iframe>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
