$ ->
  updatePreview = ->
    $.post previewUrl, $('form').serialize(), (data) ->
      $('.article-preview').html data

  if articleId?
    updatePreview()
    $('input, textarea').on 'keyup', ->
      updatePreview()

