module.exports = function(grunt) {

    // Project configuration.
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        // CONFIG ===================================/
        watch: {
            compass: {
                files: ['../css/**/*.scss'],
                tasks: ['compass:dev']
            },
            concat: {
                files: ['../js/modules/*.js'],
                tasks: ['concat']
            }
        },
        compass: {
            dev: {
                options: {
                    sassDir: ['../css/scss'],
                    cssDir: ['../css'],
                    environment: 'development',
                    sourcemap: true
                    //outputStyle: 'compressed'
                }
            }
            //prod: {
            //    options: {
            //        sassDir: ['css/scss'],
            //        cssDir: ['css'],
            //        environment: 'production'
            //    }
            //}
        },
        uglify: {
            all: {
                files: {
                    '../js/modules.min.js': ['../js/modules.js'],
                    '../js/blog.min.js': ['../js/blog.js'],
                    '../js/like.min.js': ['../js/like.js'],
                    '../js/third-party.min.js': ['../js/third-party.js']
                }
            }
        },
        cssmin: {
            options: {
                shorthandCompacting: false,
                roundingPrecision: -1
            },
            target: {
                files: {
                    '../css/blog.min.css': ['../css/blog.css'],
                    '../css/blog-responsive.min.css': ['../css/blog-responsive.css'],
                    '../css/modules.min.css': ['../css/modules.css'],
                    '../css/modules-responsive.min.css': ['../css/modules-responsive.css'],
                    '../css/plugins.min.css': ['../css/plugins.css'],
                    '../css/woocommerce.min.css': ['../css/woocommerce.css'],
                    '../css/woocommerce-responsive.min.css': ['../css/woocommerce-responsive.css'],
                    '../css/ie9_stylesheet.min.css': ['../css/ie9_stylesheet.css']
                }
            }
        },
        concat: {
            all: {
                src: [
                    '../js/modules/global.js',
                    '../js/modules/common.js',
                    '../js/modules/headers.js',
                    '../js/modules/title.js',
                    '../js/modules/shortcodes.js',
                    '../js/modules/woocommerce.js',
                    '../js/modules/portfolio.js'
                ],
                dest: '../js/modules.js'
            },
            third_party: {
                src: [
                    '../js/modules/plugins/jquery.appear.js',
                    '../js/modules/plugins/modernizr.custom.85257.js',
                    '../js/modules/plugins/jquery.appear.js',
                    '../js/modules/plugins/jquery.hoverIntent.min.js',
                    '../js/modules/plugins/jquery.plugin.js',
                    '../js/modules/plugins/jquery.countdown.min.js',
                    '../js/modules/plugins/owl.carousel.min.js',
                    '../js/modules/plugins/parallax.min.js',
                    '../js/modules/plugins/select2.min.js',
                    '../js/modules/plugins/easypiechart.js',
                    '../js/modules/plugins/jquery.waypoints.min.js',
                    '../js/modules/plugins/Chart.min.js',
                    '../js/modules/plugins/counter.js',
                    '../js/modules/plugins/fluidvids.min.js',
                    '../js/modules/plugins/jquery.prettyPhoto.js',
                    '../js/modules/plugins/jquery.nicescroll.min.js',
                    '../js/modules/plugins/ScrollToPlugin.min.js',
                    '../js/modules/plugins/TweenLite.min.js',
                    '../js/modules/plugins/jquery-scrollspy.js',
                    '../js/modules/plugins/jquery.mixitup.min.js',      
                    '../js/modules/plugins/jquery.waitforimages.js',     
                    '../js/modules/plugins/jquery.infinitescroll.min.js',
                    '../js/modules/plugins/jquery.easing.1.3.js',
                    '../js/modules/plugins/particles.min.js',
                    '../js/modules/plugins/skrollr.js',
                    '../js/modules/plugins/bootstrapCarousel.js',
                    '../js/modules/plugins/jquery.touchSwipe.min.js',
                    '../js/modules/plugins/absoluteCounter.min.js'
                ],
                dest: '../js/third-party.js'
            }
        }
    });


    grunt.util.linefeed = '\n';
    grunt.util.normalizelf('\n');

    // DEPENDENT PLUGINS =========================/

    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-compass');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-cssmin');

    // TASKS =====================================/

    grunt.registerTask('default', ['compass:dev', 'concat:all', 'concat:third_party']);
};