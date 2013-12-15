updatePreview = ->
  $.post previewUrl, $('form').serialize(), (data) ->
    $('.article-preview').html data
    lookForCodemirror()

if articleId?
  updatePreview()
  $('input, textarea').on 'keyup', ->
    updatePreview()

