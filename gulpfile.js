// STANDARD PROGRAM (DON'T CHANGE IT)

const gulp = require('gulp');
const browserSync = require('browser-sync').create();
const twig = require('gulp-twig');

const paths = {
    html: 'views/**/*.html',
    php: [
        'controllers/**/*.php',
        'views/dashboard/**/*.php',  
        'views/registration/**/*.php'
    ],
    css: 'custom/css/*.css',
    moduleCss: 'custom/css/modules/**/*.*module.css',
    twig: [
        'views/registration/templates/**/*.twig',  
        'views/dashboard/**/templates/**/*.twig'
    ],
    js: 'views/**/*.js',
    dist: 'dist/'
};

function compileTwig() {
    return gulp.src(paths.twig)
        .pipe(twig())
        .pipe(gulp.dest(paths.dist))
        .on('end', function() {
            return gulp.src(paths.moduleCss)
                .pipe(gulp.dest(paths.dist + 'css'));
        });
}

function serve() {
    browserSync.init({
        proxy: {
            target: 'http://localhost/SUPERHERO-SYSTEM',
            middleware: function (req, res, next) {
                // Redirect to your local frontend.
                if (req.url.includes('/SUPERHERO-SYSTEM')) {
                    req.url = req.url.replace('/SUPERHERO-SYSTEM', '');
                }
                
                // Redirect /phpmyadmin to your local backend.
                if (req.url.includes('/phpmyadmin')) {
                    req.url = req.url.replace('/phpmyadmin', '/phpmyadmin');
                    req.headers.host = 'localhost';
                }
                
                next();
            }
        },
        notify: false
    });

    gulp.watch(paths.html).on('change', browserSync.reload);
    gulp.watch(paths.js).on('change', browserSync.reload);
    gulp.watch(paths.php).on('change', browserSync.reload);
    gulp.watch(paths.css).on('change', browserSync.reload);
    gulp.watch(paths.moduleCss, compileTwig).on('change', browserSync.reload);
    gulp.watch(paths.twig, compileTwig).on('change', browserSync.reload);
}

gulp.task('default', gulp.series(compileTwig, serve));
