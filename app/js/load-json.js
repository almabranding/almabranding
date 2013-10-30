var URL = 'http://almabranding.com/';

$(document).ready(function() {
    setTimeout('afterFiveSeconds()',5000);
    var output = $('#output');
    $.ajax({
        url: URL + 'app/getProjects',
        dataType: 'jsonp',
        jsonp: 'jsoncallback',
        timeout: 5000,
        success: function(data, status) {
            $.each(data, function(i, item) {
                var landmark = '<li class="ui-li-has-thumb ui-btn ui-btn-icon-right ui-li ui-btn-down-c ui-btn-up-c"><div class="ui-btn-inner"><a href="#page2" onclick="rellena(\'' + item.project_id + '\')" class="ui-link-inherit"><div class="ui-btn-img"><img src="' + URL + 'uploads/images/' + idToRute(item.id) +'thumb_m_'+ item.file_name + '" alt="'+item.caption+'"/></div><div class="ui-btn-text"><h3>' + item.name + '</h3>'
                        + '<p class="ui-li-desc"></p><div></a><span class="ui-icon ui-icon-arrow-r"></span></li>';

                output.append(landmark);
            });
        },
        error: function() {
            output.text('Hubo un error al cargar los datos');
        }
    });
});
function afterFiveSeconds(){
     window.location="index.html#works";
}
this.rellena = function(id) {
    var gallery = $('#page2 #Gallery');
    var projectInfo = $('#projectInfo');
    projectInfo.html('');
    gallery.html('');
    $.ajax({
        url: URL + 'app/getGallery/' + id,
        dataType: 'jsonp',
        jsonp: 'jsoncallback',
        timeout: 5000,
        success: function(data, status) {
            var list='';
            $.each(data, function(i, item) {
                list = list+'<li><a href="' + URL + 'uploads/images/' + idToRute(item.id) +'m_'+ item.file_name + '" rel="external"><img src="' + URL + 'uploads/images/' + idToRute(item.id) +'m_'+ item.file_name + '" alt="'+item.caption+'" /></a></li>';
            });
            gallery.append(list);
            $('#Gallery a').unbind('click');
            $('#Gallery a').click(function(e) {
                return false;
            });
            var myPhotoSwipe = $("#Gallery a").photoSwipe({enableMouseWheel: false, enableKeyboard: false});
        },
        error: function() {
            gallery.text('Hubo un error al cargar los datos');
        }
    });
    $.ajax({
        url: URL + 'app/getProject/' + id,
        dataType: 'jsonp',
        jsonp: 'jsoncallback',
        timeout: 5000,
        success: function(data, status) {
            $.each(data, function(i, item) {
                var project = '<div class="project-info">'+item.content_EN+'</div><div id="work-info" class="project-list cast">'+item.content_list_EN+'</div>';
                projectInfo.append(project);
                $('.gallery-page .header h1').html(item.name);
            });  
        },
        error: function() {
            output.text('Hubo un error al cargar los datos');
        }
    });
};