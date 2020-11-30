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
   console.log('陦後�霑ｽ蜉� -螢ｲ荳�');
  });

  $(document).on("click","#data_section_sales .remove_line",function(){
       if(1 < $(this).closest('article.sales_accordion_art').find('.itemList').length){
         $(this).closest('.itemList').remove();
         item_calculator();
         console.log('陦後�蜑企勁 -螢ｲ荳�');
       }
  });


  $(document).on('click','#data_section_outsource .add_item', function(){
   var itemEle = $('#data_section_outsource .itemList .item-group').eq(0).clone();
   itemEle.find('input, select').each(function(){
     $(this).val('');
   });
   itemEle.find('option').each(function(){
     $(this).removeAttr('selected');
   });
   $(this).parent().before(itemEle);
   outsource_autocomplete();
   console.log('陦後�霑ｽ蜉� -荳玖ｫ�');
  });

  $(document).on("click","#data_section_outsource .remove_line",function(){
   $(this).parents('.item-group').remove();
   item_calculator();
   console.log('陦後�蜑企勁 -荳玖ｫ�');
  });


  var DoSum = function(self){
  var GROUP = self.data('bunpai');
  var SUM = 0;

  $("[data-group='"+ GROUP +"']").each(function(index){
    SUM = SUM + Number($(this).val());
  });

  if($('#uriage').val() === SUM) {
    return true;
    }else {
      $('#data_section_sales .help-block.with-errors').prepend('<p class="">売上の金額に合わせてください</p>');
      return false;
    }
  };

$('#uriage_form').submit(function(){

  if(DoSum($('[data-group]')) == false){
      return false;
  }

  });

});
