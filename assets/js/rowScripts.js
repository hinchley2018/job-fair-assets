/**
 * Created by jhinchley on 11/23/16.
 */
$(function(){
    // Enables popover #1
    $("[data-toggle=popover]").popover();

    /*
     // Enables popover #2
     $("#popover-2").popover({
     html : true,
     content: function() {
     return $("#popover-content").html();
     },
     title: function() {
     return $("#popover-title").html();
     }
     });
     */
});

//http://stackoverflow.com/questions/26103285/find-selected-item-in-datalist-in-html
$(function() {
    $("#companyInput").on("input", function () {

        //get selected option from the input event
        var opt = $('option[value="' + $(this).val() + '"]');

        //alert(opt.length ? opt.attr("id") : "NO OPTION" );

        var selectedID = opt.attr('id');

        //set all elements beginning with box to background none
        //$('div[id^="' + selectedID + '"]').css({'background': 'none'});

        //color the div based off id that was hovered
        $("#" + selectedID+"booth").css({'background': 'blue'});
    });
});

//http://jsfiddle.net/2Frrr/1/
$(".light").on("hover", function(){

    //get the id from the hovered element
    var id = $(this).attr('id');

    //set all elements beginning with box to background none
    $('div[id^="box"]').css({'background':'none'});

    //color the div based off id that was hovered
    $("#"+id).css({'background':'blue'});
});