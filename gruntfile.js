module.exports = function(grunt) {

    grunt.initConfig({

        // Load project information for package.json
        pkg: '<json:package.json>',

        watch:{
            options:{
                livereload: true
            },
            css:{
                files: ["public/sass/**/*.scss"],
                tasks: ["css"] 
            },
            // js:{
            //  files: ["js/**/*.js"],
            //  tasks: ["js"]
            // },
            php:{
                files: ["resources/views/**/*.php"]
            },
            grunt: { 
                files: ['gruntfile.js']
            }
            
        }, 


        sass: {
            options: {
                includePaths: [
                    'public/bower_components/foundation/scss',
                    require('node-bourbon').includePaths
                ]
            },
            dev: { 
                options: {
                    imagesPath: "public/uploads",
                    outputStyle: "nested",
                    sourceComments: "normal"
                },
                files: {
                  'public/sass/compiled_css/dev_lara5.css': 'public/sass/lara5.scss'
                }     
            },
        },

        copy:{  //Copies the sass files to into the deploy folder ready for the llive site      
            css:{
                    files : {
                        'public/deploy_css/lara5.min.css' : 'public/sass/compiled_css/dev_lara5.css'
                    }
            },
        },
        cssmin:{
            dist:{
                files: {
                    'public/deploy_css/lara5.min.css' : 'public/sass/compiled_css/dev_lara5.css'
                }
            },
            target: {
                files: [{
                  expand: true,
                  cwd: 'public/sass/compiled_css',
                  src: ['*.css', '!*.min.css'], 
                  dest: 'public/deploy_css',
                  ext: '.min.css'
                }]
            }
        },
    });


    grunt.loadNpmTasks('grunt-sass');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-cssmin');

    grunt.registerTask('css', ['sass:dev', 'copy:css']);



    grunt.registerTask('js', ['copy:js']);
    grunt.registerTask('deploy', ['cssmin']); //'concat:js', 'closurecompiler:main', 'sass:dist', 'sass:dist',  
    grunt.registerTask('deploy-css', ['cssmin']);
};


   