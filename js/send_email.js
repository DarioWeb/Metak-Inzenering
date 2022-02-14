function send_email(){

    let name = $("#name_email").val();
    let email = $("#email_email").val();
    let phone = $("#phone_email").val();
    let msg = $("#msg_email").val();

    $.post("actions/send_email.php",
        {
            name: name,
            email: email,
            phone: phone,
            msg: msg,
            submit: true,
        },
        function(data){
            $("#mail_error").html(data);
            setTimeout(()=>{
                $("#mail_error").html("");
            },6000)
        });


}