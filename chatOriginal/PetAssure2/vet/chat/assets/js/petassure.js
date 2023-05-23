$(document).ready(function (){
    // search button header
    $("#search_text_input").focus(function (){
        // console.log('focus');
        if (window.matchMedia("(max-width: 1000px)").matches){
            $(this).animate({width:'250px'}, 500);
        }
    });
    $('.button_holder').on('click', function (){
        console.log('hi');
        document.search_form.submit();
    });


});

function getDropdownData(user, type){

    if ($(".dropdwon_data_window").css("height") == "0px"){

        var pageName;
        if (type === 'notifications'){
            pageName = "ajax_load_notifications.php";
            $("span").remove("#unread_notify");
        }else if (type === 'message'){
            pageName = "ajax_load_messages.php";
            $("span").remove("#unread_message");
        }

        var ajaxreq = $.ajax({
            url: "includes/handlers/"+pageName,
            type: "POST",
            data: "page=1&user="+user,
            cache:false,

            success: function (response){
                $(".dropdwon_data_window").html(response);
                $(".dropdwon_data_window").css({"padding":"0px", "height":"280px", "border": "1px solid #dadada"});
                $("#dropdown_data_type").val(type);
            }
        });

    }else{
        $(".dropdwon_data_window").html('');
        $(".dropdwon_data_window").css({"padding":"0px", "height":"0", "border": "none"});
    }

}

function getLiveSearchUsers(value, user){
    $.post("includes/handlers/ajax_search.php", {query: value, userLoggedIn: user}, function (data){

      

        $('.search_result').html(data);
        

        if (data == ""){
            $('.search_result_footer').html("");
           
        }

    });
}





