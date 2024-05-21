$(document).ready(function() {

    $('#message_list').scrollTop($('#chat_end').position().top);

    $('#new_chat_btn').click(function() {
        $('#doctor_list').show();
        $('#recent_chats').hide();
        $('#new_chat_btn').hide();
    });

    $('#image_icon').click(function(){
        $('#image_input').trigger('click');
    });

    $('#send_btn').click(function(){
        $('#message_list').scrollTop($('#chat_end').position().top);
    });

    $('#image_input').change(function(){
        var input = this;
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#preview').attr('src', e.target.result);
                $('#preview_div').show();
            }
            reader.readAsDataURL(input.files[0]);
        }
    });

    $('#cancel_img_icon').click(function() {
        $('#image_input').val('');
        $('#preview').attr('src','');
        $('#preview_div').hide();
    });
});

