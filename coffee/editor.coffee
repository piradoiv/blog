updatePreview = ->
  $.post previewUrl, $('form').serialize(), (data) ->
    $('.article-preview').html data
    lookForCodemirror()

if articleId?
  useEditorOn $('.article-contents')[0]
  updatePreview()
  $('input, textarea').on 'keyup', ->
    updatePreview()

