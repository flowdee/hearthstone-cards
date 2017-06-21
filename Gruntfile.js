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
            'dist/images.json': 'https://github.com/schmich/hearthstone-card-images/blob/master/images.json',
            // Cards
            'dist/deDE/cards.json': 'https://api.hearthstonejson.com/v1/19632/deDE/cards.json',
            'dist/enUS/cards.json': 'https://api.hearthstonejson.com/v1/19632/enUS/cards.json',
            'dist/esES/cards.json': 'https://api.hearthstonejson.com/v1/19632/esES/cards.json',
            'dist/frFR/cards.json': 'https://api.hearthstonejson.com/v1/19632/frFR/cards.json',
            'dist/ptBR/cards.json': 'https://api.hearthstonejson.com/v1/19632/ptBR/cards.json',
            'dist/ruRU/cards.json': 'https://api.hearthstonejson.com/v1/19632/ruRU/cards.json',
            'dist/zhCN/cards.json': 'https://api.hearthstonejson.com/v1/19632/zhCN/cards.json'
        }
    });

    // Download coards
    grunt.registerTask( 'download', [ 'clean', 'curl' ] );
};