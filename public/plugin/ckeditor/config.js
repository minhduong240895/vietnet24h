/**
 * @license Copyright (c) 2003-2018, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
    // Define changes to default configuration here.
    // For complete reference see:
    // http://docs.ckeditor.com/#!/api/CKEDITOR.config

    // The toolbar groups arrangement, optimized for two toolbar rows.
    config.toolbarGroups = [
        { name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
        { name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
        { name: 'links' },
        { name: 'insert' },
        { name: 'forms' },
        { name: 'tools' },
        { name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
        { name: 'others' },
        '/',
        { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
        { name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
        { name: 'styles' },
        { name: 'colors' },
        { name: 'about' }
    ];
    config.toolbar = [
        [ 'Bold', 'Italic', '-', 'Link', 'Unlink', '-', 'Image', 'Image2', 'Html5video'],
        [ 'FontSize', 'TextColor', 'BGColor', 'Styles' ]
    ];
    config.extraPlugins = 'html5video,image2';
    config.language = 'en';

    // Remove some buttons provided by the standard plugins, which are
    // not needed in the Standard(s) toolbar.
    config.removeButtons = 'Underline,Subscript,Superscript';

    // Set the most common block elements.
    config.format_tags = 'p;h1;h2;h3;pre';

    // Simplify the dialog windows.
    config.removeDialogTabs = 'image:advanced;link:advanced';
};
CKEDITOR.on('dialogDefinition', function(ev) {
    // Take the dialog name and its definition from the event
    // data.
    var dialogName = ev.data.name;
    var dialogDefinition = ev.data.definition;

    // Check if the definition is from the dialog we're
    // interested on (the "Link" dialog).
    if (dialogName == 'link') {
        // Get a reference to the "Link Info" tab.
        var infoTab = dialogDefinition.getContents('info');

        // Get a reference to the link type
        var linkOptions = infoTab.get('linkType');

        // set the array to your preference
        linkOptions['items'] = [['URL', 'url']];
    }
});