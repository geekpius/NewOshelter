
// messages
function getMessageCount(){
    $.ajax({
        url: $(".myMessageCount").data('url'),
        type: "GET",
        success: function(resp){
            $(".myMessageCount").text(resp);
        },
        error: function(resp){
            console.log("Something went wrong with request");
        }
    });

    setTimeout(getMessageCount, 10000);
}

// getMessageCount();


// notifications
function getNotificationCount(){
    $.ajax({
        url: $(".myNotificationCount").data('url'),
        type: "GET",
        success: function(resp){
            $(".myNotificationCount").text(resp);
        },
        error: function(resp){
            console.log("Something went wrong with request");
        }
    });

    setTimeout(getNotificationCount, 10000);
}


function getNotification(){
    $.ajax({
        url: $(".myNotifications").data('url'),
        type: "GET",
        success: function(resp){
            $(".myNotifications").html(resp);
        },
        error: function(resp){
            console.log("Something went wrong with request");
        }
    });

    setTimeout(getNotification, 10000);
}

// getNotificationCount();
// getNotification();

$(".btnHeart").on("click", function(e){
    e.preventDefault();
    e.stopPropagation();
    var $this = $(this);
    //login before saving
    var data={
        property_id : $this.data('id')
    }
    $.ajax({
        url: $this.data('url'),
        type: 'POST',
        data: data,
        statusCode: {
            401: function() {
                window.location.href = "/login";
            }
        },
        success: function (resp) {
            if(resp=='success'){
                $this.children().removeClass('text-primary').addClass('text-pink');
            }else if(resp=='exist'){
                $this.children().removeClass('text-pink').addClass('text-primary');
            }else{
                console.log('Something went wrong');
            }
        },
        error: function(resp){
            console.log('Something went wrong with request');
        }

    });
    return false;
});
