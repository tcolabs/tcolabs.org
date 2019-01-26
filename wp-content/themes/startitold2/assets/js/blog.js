(function($) {
    "use strict";


    var blog = {};
    qodef.modules.blog = blog;

    blog.qodefInitAudioPlayer = qodefInitAudioPlayer;

    $(document).ready(function() {
        qodefInitAudioPlayer();
        qodefInitBlogMasonry();
        qodefInitBlogMasonryLoadMore();
    });

    function qodefInitAudioPlayer() {

        var players = $('audio.qodef-blog-audio');

        players.mediaelementplayer({
            audioWidth: '100%'
        });
    }


    function qodefInitBlogMasonry() {

        if($('.qodef-blog-holder.qodef-blog-type-masonry').length) {

            var container = $('.qodef-blog-holder.qodef-blog-type-masonry');

            container.isotope({
                itemSelector: 'article',
                resizable: false,
                masonry: {
                    columnWidth: '.qodef-blog-masonry-grid-sizer',
                    gutter: '.qodef-blog-masonry-grid-gutter'
                }
            });

            var filters = $('.qodef-filter-blog-holder');
            $('.qodef-filter').click(function() {
                var filter = $(this);
                var selector = filter.attr('data-filter');
                filters.find('.qodef-active').removeClass('qodef-active');
                filter.addClass('qodef-active');
                container.isotope({filter: selector});
                return false;
            });
        }
    }

    function qodefInitBlogMasonryLoadMore() {

        if($('.qodef-blog-holder.qodef-blog-type-masonry').length) {

            var container = $('.qodef-blog-holder.qodef-blog-type-masonry');

            if(container.hasClass('qodef-masonry-pagination-infinite-scroll')) {
                container.infinitescroll({
                        navSelector: '.qodef-blog-infinite-scroll-button',
                        nextSelector: '.qodef-blog-infinite-scroll-button a',
                        itemSelector: 'article',
                        loading: {
                            finishedMsg: qodefGlobalVars.vars.qodefFinishedMessage,
                            msgText: qodefGlobalVars.vars.qodefMessage
                        }
                    },
                    function(newElements) {
                        container.append(newElements).isotope('appended', $(newElements));
                        qodef.modules.blog.qodefInitAudioPlayer();
                        qodef.modules.common.qodefOwlSlider();
                        qodef.modules.common.qodefFluidVideo();
                        setTimeout(function() {
                            container.isotope('layout');
                        }, 400);
                    }
                );
            } else if(container.hasClass('qodef-masonry-pagination-load-more')) {
                var i = 1;
                $('.qodef-blog-load-more-button a').on('click', function(e) {
                    e.preventDefault();

                    var button = $(this);

                    var link = button.attr('href');
                    var content = '.qodef-masonry-pagination-load-more';
                    var anchor = '.qodef-blog-load-more-button a';
                    var nextHref = $(anchor).attr('href');
                    $.get(link + '', function(data) {
                        var newContent = $(content, data).wrapInner('').html();
                        nextHref = $(anchor, data).attr('href');
                        container.append(newContent).isotope('reloadItems').isotope({sortBy: 'original-order'});
                        qodef.modules.blog.qodefInitAudioPlayer();
                        qodef.modules.common.qodefOwlSlider();
                        qodef.modules.common.qodefFluidVideo();
                        setTimeout(function() {
                            $('.qodef-masonry-pagination-load-more').isotope('layout');
                        }, 400);
                        if(button.parent().data('rel') > i) {
                            button.attr('href', nextHref); // Change the next URL
                        } else {
                            button.parent().remove();
                        }
                    });
                    i++;
                });
            }
        }
    }




})(jQuery);