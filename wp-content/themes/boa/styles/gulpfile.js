const gulp = require('gulp');
const configs = require('./gulpConfig').configs;
const requires = {};

var task, pipe, pipes, stream;

// Récupération des modules de chaque tâche pour les placer dans le tableau requires
for(task in configs){
    pipes = configs[task].pipes;
   for(pipe in pipes){
       requires[pipe] = require('gulp-'+pipe);
   }
}

// La tâche par défaut
gulp.task('default', function () {
    pipes = configs.default.pipes;
    var stream = gulp.src(configs.default.src);
    for(pipe in pipes){
        stream = stream.pipe(requires[pipe](pipes[pipe]));
        stream.on('error', function(error) {
            console.log(error);
            this.emit('end');
        });
    }
    stream.pipe(gulp.dest(configs.default.dest));
});

// Tâche pour la prod
gulp.task('prod', function () {
    pipes = configs.prod.pipes;
    var stream = gulp.src(configs.prod.src);
    for(pipe in pipes){
        stream = stream.pipe(requires[pipe](pipes[pipe]));
    }
    stream.pipe(gulp.dest(configs.prod.dest));
});



