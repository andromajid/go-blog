var event = nama = primary_id = tempat2 = tempat1 ="";
var x = 0;
function ajax_send(nama,primary_id,tempat)
{
    alert('nama = '+ primary_id+" tempat = "+tempat);
     $.ajax({
        type: "POST",
        data: "widget_id="+primary_id+"&widget_location="+tempat,
        url:  "http://127.0.0.1/esoftdream/21-sept-2010/admin/widget/ajax_change_widget",
        success: function(response){
        $('#tulis').html(response);
            },
        dataType:"html"
        });
     return false;
//    $.post("http://127.0.0.1/esoftdream/21-sept-2010/admin/widget/ajax_change_widget", {order:tempat}, function(data){
//         $('#tulis').html(data);
//    });
}
$(function(){
    $(".connect").sortable({
       handle: '.portlet-header',
       connectWith: '.connect',
       receive : function(event,ui)
       {
            var nama = ui.item.attr('name');
            var primary_id = ui.item.attr('primary');
            var tempat = $(this).attr('tempat');
            ajax_send(nama, primary_id, tempat);
       }
    }).disableSelection();
    $(".portlet").addClass("ui-widget ui-widget-content ui-helper-clearfix ui-corner-all")
    .find(".portlet-header").addClass("ui-widget-header ui-corner-all")
    .prepend('<span class="ui-icon ui-icon-minusthick"></span>').end().find(".portlet-content");

    $(".portlet-header .ui-icon").click(function() {
            $(this).toggleClass("ui-icon-minusthick").toggleClass("ui-icon-plusthick");
            $(this).parents(".portlet:first").find(".portlet-content").toggle();
    });
    //click buat munculin dialog buat edit widget
    $('.click').click(function(e){
        $('#dialog').html("");//hancurkan isi data
        //ambil primary key dari widget tersebut
        var primary_key = $(this).attr('isi');
        $('#woyo').attr('widget_id',primary_key);
        var header = $(this).attr('title');
        $.ajax({
        type: "POST",
        data: "widget_id="+primary_key,
        url:  "http://127.0.0.1/esoftdream/21-sept-2010/admin/widget/ajax_get_widget",
        success: function(response){
        $('#dialog').append(response);
        $('#dialog').attr('title',header);
         $('#dialog').dialog();
            },
        dataType:"html"
        });
        return false;
    });
    //klik buat update submit button
     $('#woyo').click(function(){
//        var isi_data = $('#isi_data').val();
//        var primary_key = $(this).attr('widget_id');
//         $.ajax({
//            type: "POST",
//            data: "widget_id="+primary_key+"&widget_content=".isi_data,
//            url:  "http://127.0.0.1/esoftdream/21-sept-2010/admin/widget/ajax_update_widget",
//            success: function(response){
//                    if(response == "TRUE")
//                    {
//                        $('#dialog').html("data berhasil diupdate");
//                    }
//                    else
//                    {
//                        $('#dialog').append("data gagal diupdate");
//                    }
//                },
//            dataType:"html"
//            });
//        return false;
alert('ehllo');
    });
});

