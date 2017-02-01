module.exports.configs = {
    'default': {
        'src': 'scss/app.scss',
        'dest': 'css',
        'pipes': {
            'compass': {
                'config_file': './config.rb',
                'comments': true,
                'css': 'css',
                'sass': 'scss',
                'font': './fonts',
                // 'debug': true
            },
            'autoprefixer': {}
        }
    },
    'prod': {
        'src': 'scss/app.scss',
        'dest': 'css',
        'pipes': {
            'compass': {
                'config_file': './config.rb',
                'css': 'css',
                'sass': 'scss'
            },
            'autoprefixer': {},
            'uglifycss': {},
            'rename': 'app.min.css'
        }
    }
};