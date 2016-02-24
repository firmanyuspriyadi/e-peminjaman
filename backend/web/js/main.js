$(function(){
   $('#modalButton').click(function() {
       $('#modal').modal('show')
               .find('#modalContent')
               .load($(this).attr('value'));
   });
   
   $('#modalButton3').click(function() {
       $('#modal3').modal('show')
               .find('#modalContent3')
               .load($(this).attr('value'));
   });
   
   $('#modalButton6').click(function() {
       $('#modal6').modal('show')
               .find('#modalContent6')
               .load($(this).attr('value'));
   });
   
    $('#modalButton8').click(function() {
       $('#modal8').modal('show')
               .find('#modalContent8')
               .load($(this).attr('value'));
   });
   $('#modalButton9').click(function() {
       $('#modal9').modal('show')
               .find('#modalContent9')
               .load($(this).attr('value'));
   });
 
});