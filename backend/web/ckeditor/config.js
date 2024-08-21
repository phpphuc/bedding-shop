/**
 * @license Copyright (c) 2003-2018, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function (config) {
    // Define changes to default configuration here. For example:
    config.language = 'vi';
    config.uiColor = '#cccccc';
    config.extraPlugins = 'toc,eqneditor,html5video,preview,autocorrect,codemirror,btgrid,glyphicons,collapsibleItem,bt_table,lineheight,youtube,widgetbootstrap,widgettemplatemenu,bootstrapTabs,contents';
    config.codemirror = {

        // Set this to the theme you wish to use (codemirror themes)
        theme: 'rubyblue',

        // Whether or not you want to show line numbers
        lineNumbers: true,

        // Whether or not you want to use line wrapping
        lineWrapping: true,

        // Whether or not you want to highlight matching braces
        matchBrackets: true,

        // Whether or not you want tags to automatically close themselves
        autoCloseTags: true,

        // Whether or not you want Brackets to automatically close themselves
        autoCloseBrackets: true,

        // Whether or not to enable search tools, CTRL+F (Find), CTRL+SHIFT+F (Replace), CTRL+SHIFT+R (Replace All), CTRL+G (Find Next), CTRL+SHIFT+G (Find Previous)
        enableSearchTools: true,

        // Whether or not you wish to enable code folding (requires 'lineNumbers' to be set to 'true')
        enableCodeFolding: true,

        // Whether or not to enable code formatting
        enableCodeFormatting: true,

        // Whether or not to automatically format code should be done when the editor is loaded
        autoFormatOnStart: true,

        // Whether or not to automatically format code should be done every time the source view is opened
        autoFormatOnModeChange: true,

        // Whether or not to automatically format code which has just been uncommented
        autoFormatOnUncomment: true,

        // Define the language specific mode 'htmlmixed' for html including (css, xml, javascript), 'application/x-httpd-php' for php mode including html, or 'text/javascript' for using java script only
        mode: 'htmlmixed',

        // Whether or not to show the search Code button on the toolbar
        showSearchButton: true,

        // Whether or not to show Trailing Spaces
        showTrailingSpace: true,

        // Whether or not to highlight all matches of current word/selection
        highlightMatches: true,

        // Whether or not to show the format button on the toolbar
        showFormatButton: true,

        // Whether or not to show the comment button on the toolbar
        showCommentButton: true,

        // Whether or not to show the uncomment button on the toolbar
        showUncommentButton: true,

        // Whether or not to show the showAutoCompleteButton button on the toolbar
        showAutoCompleteButton: true,
        // Whether or not to highlight the currently active line
        styleActiveLine: true
    };
    config.contentsCss = [
        '//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css',
        '/webadmin/ckeditor/fontawesome/css/all.min.css',
        '/webadmin/ckeditor/contents.css'
    ];
    config.height = 300;
    config.toolbarCanCollapse = true;
    config.allowedContent = true;
    config.font_names = 'Roboto Regular/Roboto-Regular;' + config.font_names;
    config.font_names = 'Roboto Medium/Roboto-Medium;' + config.font_names;
    config.font_names = 'Roboto Bold/Roboto-Bold;' + config.font_names;

    config.font_names = 'AvertaStdCY BlackItalic/AvertaStdCY-BlackItalic;' + config.font_names;
    config.font_names = 'AvertaStdCY Bold/AvertaStdCY-Bold;' + config.font_names;
    config.font_names = 'AvertaStdCY Regular/AvertaStdCY-Regular;' + config.font_names;
    config.font_names = 'AvertaStdCY Semibold/AvertaStdCY-Semibold;' + config.font_names;

    config.font_names = 'UTM Avo/UTM Avo;' + config.font_names;
    config.font_names = 'UTM Avo Bold/UTM AvoBold;' + config.font_names;
    config.font_names = 'UTM HelvetIns/UTM HelvetIns;' + config.font_names;
    config.font_names = 'Tahoma/Tahoma;' + config.font_names;
    config.font_names = 'Tahoma Bold/TahomaBold;' + config.font_names;
    config.font_names = 'Muli Regular/Muli-Regular;' + config.font_names;
    config.font_names = 'Muli Bold/Muli-Bold;' + config.font_names;
    config.font_names = 'Shelia VNF Regular/Shelia VNF Regular;' + config.font_names;
    config.filebrowserUploadMethod = 'form';
    config.filebrowserBrowseUrl = '/webadmin/ckfinder/ckfinder.html';
    config.filebrowserImageBrowseUrl = '/webadmin/ckfinder/ckfinder.html?type=Images';
    config.filebrowserFlashBrowseUrl = '/webadmin/ckfinder/ckfinder.html?type=Flash';
    config.filebrowserUploadUrl = '/webadmin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
    config.filebrowserImageUploadUrl = '/webadmin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
    config.filebrowserFlashUploadUrl = '/webadmin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
};

jQuery(document).ready(function () {
    CKEDITOR.on('instanceReady', function (event) {
        loadBootstrap(event);
    });
});

function loadBootstrap(event) {
    if (event.name == 'mode' && event.editor.mode == 'source')
        return;
    var jQueryScriptTag = document.createElement('script');
    var bootstrapScriptTag = document.createElement('script');

    jQueryScriptTag.src = 'https://code.jquery.com/jquery-1.11.3.min.js';
    bootstrapScriptTag.src = 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js';

    var editorHead = event.editor.document.$.head;

    editorHead.appendChild(jQueryScriptTag);
    jQueryScriptTag.onload = function () {
        editorHead.appendChild(bootstrapScriptTag);
    };
}
CKEDITOR.dtd.$removeEmpty['span'] = false;
CKEDITOR.dtd.$removeEmpty['i'] = false;