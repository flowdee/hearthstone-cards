/*global module:false*/
module.exports = function (grunt) {

    // Load multiple grunt tasks using globbing patterns
    require('load-grunt-tasks')(grunt);

    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        downloadfile: {
            files: [
                {
                    url: 'https://api.hearthstonejson.com/v1/14830/deDE/cards.json',
                    port: 80,
                    dest: 'dist/deDE/',
                    name: 'cards.json',
                    overwrite: true
                },
                {
                    url: 'https://api.hearthstonejson.com/v1/14830/enUS/cards.json',
                    port: 80,
                    dest: 'dist/enUS/',
                    name: 'cards.json',
                    overwrite: true
                },
                {
                    url: 'https://api.hearthstonejson.com/v1/14830/esES/cards.json',
                    port: 80,
                    dest: 'dist/esES/',
                    name: 'cards.json',
                    overwrite: true
                },
                {
                    url: 'https://api.hearthstonejson.com/v1/14830/frFR/cards.json',
                    port: 80,
                    dest: 'dist/frFR/',
                    name: 'cards.json',
                    overwrite: true
                },
                {
                    url: 'https://api.hearthstonejson.com/v1/14830/ptBR/cards.json',
                    port: 80,
                    dest: 'dist/ptBR/',
                    name: 'cards.json',
                    overwrite: true
                },
                {
                    url: 'https://api.hearthstonejson.com/v1/14830/ruRU/cards.json',
                    port: 80,
                    dest: 'dist/ruRU/',
                    name: 'cards.json',
                    overwrite: true
                },
                {
                    url: 'https://api.hearthstonejson.com/v1/14830/zhCN/cards.json',
                    port: 80,
                    dest: 'dist/zhCN/',
                    name: 'cards.json',
                    overwrite: true
                }
            ]
        },
    });

    // Download coards
    grunt.registerTask( 'download', [ 'downloadfile' ] );
};