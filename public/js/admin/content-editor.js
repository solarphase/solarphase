var parser = new commonmark.Parser();
var renderer = new commonmark.HtmlRenderer();
var $tabs = $('.js-content-tabs');
var $containers = $('.js-content-containers');
var $content = $('.js-content');
var $preview = $('.js-content-preview');

var editor = ace.edit('js-content-editor');
editor.getSession().setMode('ace/mode/markdown');
editor.setTheme('ace/theme/github');
editor.setFontSize(16);

setActiveTab(0);

editor.on('change', function (e) {
  $content.html(editor.getValue());
});

$('.js-content-tabs a').on('click', function(e) {
  e.preventDefault();

  var $parent = $(this).parent();
  var id = $parent.data('tab-id');
  setActiveTab(id);
});

function setActiveTab(id) {
  refreshPreview();

  $tabs.find('li').removeClass('active');
  $tabs.find('li[data-tab-id="' + id + '"]').addClass('active');
  $containers.children().addClass('fake-hidden');
  $containers.find('*[data-tab-id="' + id + '"]').removeClass('fake-hidden');

  scrollPreview();
}

function scrollPreview() {
  var from = $containers.find('.ace_scrollbar-v').prop('scrollHeight');
  var to = $preview.prop('scrollHeight');
  var ratio = from / to;

  // Basically, we work out how many times bigger the editor scroll height is
  // than the preview scroll height. We then scroll the preview to the content
  // position divided by the calculated ratio. This means that both elements
  // will scroll equally, regardless of difference in height.
  $preview.scrollTop(editor.getSession().getScrollTop() / ratio);
}

function refreshPreview() {
  var parsed = parser.parse($content.val());
  $preview.html(renderer.render(parsed));
}
