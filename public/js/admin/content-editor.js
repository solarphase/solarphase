var parser = new commonmark.Parser();
var renderer = new commonmark.HtmlRenderer();
var $tabs = $('.js-content-tabs');
var $containers = $('.js-content-containers');

setActiveTab(0);

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
  $containers.children().addClass('hidden');
  $containers.find('*[data-tab-id="' + id + '"]').removeClass('hidden');
}

function refreshPreview() {
  var raw = $('.js-content').val();
  var parsed = parser.parse(raw);
  $('.js-content-preview').html(renderer.render(parsed));
}
