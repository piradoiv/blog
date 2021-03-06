// Generated by CoffeeScript 1.6.2
(function() {
  var canUpdatePreview, cm, lookForCodemirror, updatePreview, useEditorOn;

  useEditorOn = function(id) {
    return CodeMirror.fromTextArea(id, {
      theme: 'monokai',
      lineNumbers: true,
      mode: 'application/x-httpd-php',
      lineWrapping: false,
      tabSize: 2,
      indentWithTabs: false
    });
  };

  lookForCodemirror = function() {
    var cmCounter;

    cmCounter = 0;
    return $('.codemirror').each(function() {
      var identifier;

      $(this).attr('id', "codemirror-" + cmCounter);
      identifier = $(this)[0];
      useEditorOn(identifier);
      return cmCounter++;
    });
  };

  lookForCodemirror();

  canUpdatePreview = true;

  updatePreview = function() {
    if (!canUpdatePreview) {
      return false;
    }
    canUpdatePreview = false;
    return $.post(previewUrl, $('form').serialize(), function(data) {
      $('.article-preview').html(data);
      lookForCodemirror();
      return canUpdatePreview = true;
    });
  };

  if (typeof articleId !== "undefined" && articleId !== null) {
    cm = CodeMirror.fromTextArea($('.article-contents')[0], {
      theme: 'monokai',
      lineNumbers: false,
      mode: 'application/x-httpd-php',
      lineWrapping: true,
      tabSize: 2,
      indentWithTabs: false
    });
    cm.on("change", function(cm, change) {
      return $('.article-contents').val(cm.getValue());
    });
    updatePreview();
    $('input, textarea').on('keyup', function() {
      return updatePreview();
    });
  }

}).call(this);
