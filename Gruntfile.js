/*global module:false*/
module.exports = function (grunt) {

    // Load multiple grunt tasks using globbing patterns
    require('load-grunt-tasks')(grunt);

    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        clean: {
            deploy: [
                'dist/*'
            ]
        },
        curl: {
            // Images
            // Source: https://github.com/schmich/hearthstone-card-images
            'dist/images.json': 'https://raw.githubusercontent.com/schmich/hearthstone-card-images/master/images.json',
            // Cards
            // Source: https://api.hearthstonejson.com/v1/latest/
            'dist/deDE/cards.json': 'https://api.hearthstonejson.com/v1/30103/deDE/cards.json',
            'dist/enUS/cards.json': 'https://api.hearthstonejson.com/v1/30103/enUS/cards.json',
            'dist/esES/cards.json': 'https://api.hearthstonejson.com/v1/30103/esES/cards.json',
            'dist/frFR/cards.json': 'https://api.hearthstonejson.com/v1/30103/frFR/cards.json',
            'dist/itIT/cards.json': 'https://api.hearthstonejson.com/v1/30103/itIT/cards.json',
            'dist/ptBR/cards.json': 'https://api.hearthstonejson.com/v1/30103/ptBR/cards.json',
            'dist/ruRU/cards.json': 'https://api.hearthstonejson.com/v1/30103/ruRU/cards.json',
            'dist/zhCN/cards.json': 'https://api.hearthstonejson.com/v1/30103/zhCN/cards.json'
        }
    });

    // Download coards
    grunt.registerTask( 'download', [ 'clean', 'curl' ] );
};