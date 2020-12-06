$(function(){

  $(document).on('click','#data_section_sales .add_item',function(){
   var itemEle = $(this).closest('article.sales_accordion_art').find('.itemList').eq(0).clone();
   itemEle.find('input, select').each(function(){
     $(this).val('');
   });
   itemEle.find('option').each(function(){
     $(this).removeAttr('selected');
   });
   $(this).parent().before(itemEle);
  });

  $(document).on("click","#data_section_sales .remove_line",function(){
       if(1 < $(this).closest('article.sales_accordion_art').find('.itemList').length){
         $(this).closest('.itemList').remove();
         DoSum($('#data_section_sales [data-group]'));
       }
  });

/*
  $(document).on('click','#data_section_outsource .add_item', function(){
   var itemEle = $('#data_section_outsource .itemList .item-group').eq(0).clone();
   itemEle.find('input, select').each(function(){
     $(this).val('');
   });
   itemEle.find('option').each(function(){
     $(this).removeAttr('selected');
   });
   $(this).parent().before(itemEle);
  });

  $(document).on("click","#data_section_outsource .remove_line",function(){
   $(this).parents('.item-group').remove();
  });
*/

  var DoSum = function(self){
     var GROUP = self.data('group');
     var SUM = 0;

     $("[data-group='"+ GROUP +"']").each(function(index){
          SUM = SUM + Number($(this).val());
     });
     $('#uriage').val(SUM);
  };
  $('#data_section_sales').on('change', '[data-group]', function(){
      DoSum($(this));
  });

});
