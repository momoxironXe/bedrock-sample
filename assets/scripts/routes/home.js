import Swiper from "swiper";

export default {
    init() {
        // JavaScript to be fired on the home page
        $("body").data("loading", "loading!");
        
        $("#section_id").waypoint({
            handler: function(direction) {
                const $thisElm = $(this.element);
                $thisElm.data("alert", "ding");
                if (direction === "down") {
                    $thisElm.find(".col-left")
                            .addClass("fadeInUp");
                    $thisElm.find(".col-right")
                            .addClass("fadeInUp");
                }
            },
            offset: "50%"
        });
        
        $(window).on("load", function() {
            const $heroVideo = $("#hero video");
            if ($heroVideo.length > 0) {
                $heroVideo[0].play();
            }
        });
        
        var newswiper = new Swiper("#hero .swiper-container", {});
    },
    finalize() {
        // JavaScript to be fired on the home page, after the init JS
    },
};
