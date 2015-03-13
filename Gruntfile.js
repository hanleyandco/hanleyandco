module.exports = function(grunt) {

    var shelljs = require('shelljs');

    grunt.loadNpmTasks('grunt-composer');
    grunt.loadNpmTasks('grunt-contrib-compass');
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-jshint');
    grunt.loadNpmTasks('grunt-karma');
    grunt.loadNpmTasks('grunt-contrib-requirejs');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-phpcs');
    grunt.loadNpmTasks('grunt-phpunit');

    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        compass: {
            dist: {
                options: {
                    config: 'app/assets/scss/compass_config.rb',
                    outputStyle: 'compressed',
                    bundleExec: true
                }
            },
            dev: {
                options: {
                    config: 'app/assets/scss/compass_config.rb',
                    bundleExec: true
                }
            }
        },
        composer: {
            options: {
                composerLocation: './composer.phar'
            }
        },
        copy: {
            jsVendor: {
                expand: true,
                cwd: "app/assets/js/",
                src: "vendors/*",
                dest: "static/js/"
            },
            nonSpriteableImages: {
                expand: true,
                cwd: "app/assets/images/",
                src: "non-spriteable-images/*",
                dest: "static/images/"
            },
            content: {
                expand: true,
                cwd: "vendor/xepps/hanleyandco-content/pages/",
                src: "*",
                dest: "static/content/"
            },
            contentImages: {
                expand:true,
                cwd: "vendor/xepps/hanleyandco-content/images/",
                src: "*",
                dest: "static/images/"
            },
            bootstrapCss: {
                expand: true,
                cwd: "vendor/twbs/bootstrap/dist/css/",
                src: "*.min.css",
                dest: "static/css/vendor/bootstrap/"
            },
            bootstrapJs: {
                expand: true,
                cwd: "vendor/twbs/bootstrap/dist/js/",
                src: "bootstrap.min.js",
                dest: "static/js/vendor/bootstrap/"
            },
            bootstrapFonts: {
                expand: true,
                cwd: "vendor/twbs/bootstrap/dist/fonts/",
                src: "*",
                dest: "static/fonts/vendor/bootstrap/"
            },
            jQuery: {
                expand: true,
                cwd: "vendor/components/jquery/",
                src: "jquery.min.js",
                dest: "static/js/vendor/jquery/"
            },
            requireJS: {
                expand: true,
                cwd: "node_modules/requirejs/",
                src: "require.js",
                dest: "static/js/vendor/requirejs/"
            }
        },
        jshint: {
            all: ['app/assets/js/modules/**/*.js']
        },
        karma: {
            unit: {
                options: {
                    configFile: 'karma.conf.js'
                }
            }
        },
        phpcs: {
            application: {
                dir: ['app']
            },
            options: {
                bin: 'vendor/bin/phpcs',
                standard: 'PSR2',
                ignore: ['views/*.php', 'app/assets']
            }
        },
        phpunit: {
            classes: {
                dir: 'app/tests'
            },
            options: {
                configuration: 'app/tests/phpunit.xml',
                colors: true,
                bin: 'php -dapc.enable_cli=1 vendor/phpunit/phpunit/composer/bin/phpunit'
            }
        },
        requirejs: {
            compile: {
                options: {
                    baseUrl: "app/assets/js/modules",
                    paths: {},
                    keepBuildDir: true,
                    name: "hanleyandco/controller",
                    out: "static/js/controller.js"
                }
            },
            "compile-dev": {
                options: {
                    baseUrl: "app/assets/js/modules",
                    paths: {},
                    keepBuildDir: true,
                    name: "hanleyandco/controller",
                    out: "static/js/controller.js",
                    optimize: "none"
                }
            }
        },
        watch: {
            css: {
                options: {
                    livereload: true
                },
                files: ['app/assets/scss/**/*.scss'],
                tasks: ['compass:dev', 'copy:nonSpriteableImages']
            },
            js: {
                files: ['app/assets/js/modules/**/*.js', 'app/assets/js/modules-test/*.js'],
                tasks: ['requirejs:compile-dev', 'karma:unit', 'jshint']
            },
            jsVendor: {
                files: ['app/assets/js/vendors/*.js'],
                tasks: ['copy:jsVendor']
            },
            contentVendorPages: {
                files: ['vendor/xepps/hanleyandco-content/pages/*'],
                tasks: ['copy:content']
            },
            contentVendorImages: {
                files: ['vendor/xepps/hanleyandco-content/images/*'],
                tasks: ['copy:contentImages']
            }
        }
    });

    grunt.registerTask("bundle", 'Do bundle install', function () {
        // This task will try to use the local caches first
        // If that fails, it will just run bundle normally
        if (shelljs.exec('bundle --local --path=vendor/bundle').code !== 0) {
            return shelljs.exec('bundle --path=vendor/bundle').code === 0;
        } else {
            return true;
        }
    });

    grunt.registerTask(
        'default',
        [
            'install-deps',
            'build-assets-dist'
//            'run-tests'
        ]
    );

    grunt.registerTask(
        'dev',
        [
            'install-deps',
            'build-assets-dev',
            'watch'
        ]
    );

    grunt.registerTask(
        'install-deps',
        [
            'composer:install',
            'bundle',
            'install-bootstrap',
            'copy:jQuery',
            'copy:requireJS'
        ]
    );

    grunt.registerTask(
        'install-bootstrap',
        [
            'copy:bootstrapCss',
            'copy:bootstrapJs',
            'copy:bootstrapFonts'
        ]
    );

    grunt.registerTask(
        'build-assets-dev',
        [
            'requirejs:compile-dev',
            'copy:jsVendor',
            'copy:nonSpriteableImages',
            'copy:content',
            'copy:contentImages',
            'compass:dev'
        ]
    );

    grunt.registerTask(
        'build-assets-dist',
        [
            'requirejs:compile',
            'copy:jsVendor',
            'copy:nonSpriteableImages',
            'copy:content',
            'copy:contentImages',
            'compass:dist'
        ]
    );

    grunt.registerTask(
        'run-tests',
        [
            'phpunit',
            'phpcs',
            'karma:unit',
            'jshint'
        ]
    );


};