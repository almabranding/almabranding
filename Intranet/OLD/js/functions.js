/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


$(window).load(function(){
   $('.sortable').sortable({
     start: function(event, ui) {
         $(ui.helper).addClass("sortable-drag-clone");
     },
     stop: function(event, ui) {
         $(ui.helper).removeClass("sortable-drag-clone");
     },
     update: function(event, ui) {
         updateListItem($(ui.item).attr('rel'), $(this).attr('rel'));
     },
     tolerance: "pointer",
     connectWith: ".sortable",
     placeholder: "sortable-draggable-placeholder",
     forcePlaceholderSize: true,
     appendTo: 'body',
     helper: 'clone',
     zIndex: 666
 }).disableSelection();  
});

function updateListItem(itemId, newStatus) {
    var sorted = $( ".sortable" ).sortable( "serialize" );
    $.post('',sorted+'&action=updateOrder').done(function(data) {});
  }