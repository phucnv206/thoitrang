tinymce.init({
    selector: 'textarea#tiny-area',
    theme: 'modern',
    language: 'vi_VN',
    plugins: [
        'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
        'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
        'save table contextmenu directionality emoticons template paste textcolor responsivefilemanager'
    ],
    image_class_list: [
        {title: 'img-responsive', value: 'img-responsive'}
    ],
    toolbar: 'undo redo | fontsizeselect styleselect | bold italic | forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | print preview fullscreen',
    external_filemanager_path: '/js/filemanager/',
    external_plugins: {'filemanager': '/js/filemanager/plugin.min.js'},
    filemanager_title: 'Media Manager'
});
$('#browse-btn').click(function () {
    var url = '/js/filemanager/dialog.php?type=1&popup=1&field_id=browse-img';
    open_popup(url);

});
function open_popup(url)
{
    var w = 880;
    var h = 570;
    var l = Math.floor((screen.width - w) / 2);
    var t = Math.floor((screen.height - h) / 2);
    window.open(url, 'Media Manager', 'scrollbars=1,width=' + w + ',height=' + h + ',top=' + t + ',left=' + l);
}
function responsive_filemanager_callback(field_id) {
    var url = $('#' + field_id).val();
    $('.logo-preview').attr('src', url);
}