$(function()
{
  var cmCounter = 0;
  $('.codemirror').each(function()
  {
    $(this).attr('id', 'codemirror-' + cmCounter);
    useEditorOn($(this)[0]);
    cmCounter++;
  });

  function useEditorOn(id)
  {
    CodeMirror.fromTextArea(id, {
      theme: 'monokai',
      lineNumbers: true,
      mode: 'application/x-httpd-php'
    });
  }
});

