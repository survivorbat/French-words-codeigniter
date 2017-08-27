module.exports = function(grunt) {
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    sass: {
      dist: {
        files: {
          'css/style.css':'src/Sass/style.scss',
        }
      }
    },
    watch: {
      css: {
        files: ['src/Sass/*'],
        tasks: ['sass','cssmin']
      },
      js: {
        files: ['src/js/*'],
        tasks: ['jshint','uglify']
      },
      img: {
        files: ['src/img/*'],
        tasks: ['imagemin']
      }
    },
  uglify: {
  	options: {
        // the banner is inserted at the top of the output
        banner: '/*! <%= pkg.name %> <%= grunt.template.today("dd-mm-yyyy") %> */\n',
        mangle:false
      },
    dist: {
      files: [{
        expand: true,
        cwd: 'src/js/',
        src: ['*.js'],
        dest: 'js',
        ext: '.js'
      }]
    }
  },
  cssmin: {
    target: {
      files: [{
        expand: true,
        cwd: 'css',
        src: ['*.css'],
        dest: 'css',
        ext: '.css'
      }]
    }
  },
  coffee: {
    compile: {
      files: [{
        expand: true,
        cwd: 'src/JS/',
        src: ['*.coffee'],
        dest: 'js',
        ext: '.js'
      }]
    },
    options: {
      bare: false
    }
  },
  imagemin: {
        dynamic: {
            files: [{
                expand: true,
                cwd: 'src/img/',
                src: ['*.{png,jpg,gif}'],
                dest: 'img/'
            }]
        }
    },
  jshint: {
      all: ['Gruntfile.js', 'src/js/*.js']
    },
  });
  grunt.loadNpmTasks('grunt-sass');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-cssmin');
  grunt.loadNpmTasks('grunt-contrib-imagemin');

  grunt.registerTask('default', ['jshint','uglify','sass','cssmin','imagemin']);

};
