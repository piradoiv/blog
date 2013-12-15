updatePreview = ->
  $.post previewUrl, $('form').serialize(), (data) ->
    $('.article-preview').html data
    lookForCodemirror()

if articleId?
  cm = CodeMirror.fromTextArea $('.article-contents')[0],
    theme:          'monokai',
    lineNumbers:    false,
    mode:           'application/x-httpd-php',
    lineWrapping:   true,
    tabSize:        2,
    indentWithTabs: false

  cm.on "change", (cm, change) ->
    $('.article-contents').val(cm.getValue())

  updatePreview()
  $('input, textarea').on 'keyup', ->
    updatePreview()

