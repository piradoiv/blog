useEditorOn = (id) ->
  CodeMirror.fromTextArea id,
    theme:       'monokai',
    lineNumbers: true,
    mode:        'application/x-httpd-php'

lookForCodemirror = ->
  cmCounter = 0
  $('.codemirror').each ->
    $(this).attr 'id', "codemirror-#{cmCounter}"
    identifier = $(this)[0]
    useEditorOn identifier
    cmCounter++

lookForCodemirror()

