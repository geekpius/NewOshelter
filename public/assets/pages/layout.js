
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

function getMessageNotification(){
    $.ajax({                   
        url: $(".myMessages").data('url'),
        type: "GET",
        success: function(resp){
            $(".myMessages").html(resp);
        },
        error: function(resp){
            console.log("Something went wrong with request");
        }
    });

    setTimeout(getMessageNotification, 10000);
}

getMessageCount();
getMessageNotification();


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

getNotificationCount();
getNotification();