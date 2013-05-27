window.onload = function() {
       
};
function showPop(id){
    $('#white_full').css('display','block');
    $('#'+id).css('display','block');    
}
$(document).ready(function() {
    
    CKEDITOR.replace( 'ckeditor' );
    CKEDITOR.disableAutoInline = true;
    var editable=CKEDITOR.inline( 'editable' );

    
});