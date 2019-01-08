$(document).ready(function(){
    $('.social-feed-container').socialfeed({
        // FACEBOOK
        facebook:{
            accounts: ['@ngkrobotics'],
            limit: 8,                                   //Integer: max number of posts to load
            access_token: '###########|##############################'
        },

        // GENERAL SETTINGS
        length:200,
        show_media:true,                                //Boolean: if false, doesn't display any post images

        moderation: function(content) {                 //Function: if returns false, template will have class hidden
            return  (content.text) ? content.text.indexOf('fuck') == -1 : true;
        },
        callback: function() {                          //Function: This is a callback function which is evoked when all the posts are collected and displayed
            console.log("All posts collected!");
        }
    });
});
