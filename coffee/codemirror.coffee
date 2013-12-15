useEditorOn = (id) ->
  cm = CodeMirror.fromTextArea id,
    theme:          'monokai',
    lineNumbers:    true,
    mode:           'application/x-httpd-php',
    lineWrapping:   true,
    tabSize:        2,
    indentWithTabs: false

  cm.on "change", (cm, change) ->
    id.innerHTML = cm.getValue()

lookForCodemirror = ->
  cmCounter = 0
  $('.codemirror').each ->
    $(this).attr 'id', "codemirror-#{cmCounter}"
    identifier = $(this)[0]
    useEditorOn identifier
    cmCounter++

lookForCodemirror()

