$(document).ready(function(){
    $("#modal-banner").modal("show");
})
$(".modal-close").click(function(){
    $("#modal-banner").modal("hide");
})

$(".toggle-password").click(function() {
        $(this).toggleClass("icon-checkbox-unchecked icon-checkbox-checked");
        var input = $('#password');
        if (input.attr("type") == "password") {
        input.attr("type", "text");
        } else {
        input.attr("type", "password");
        }
    })
function showPassword(){
    var input = $('#password');
        if (input.attr("type") == "password") {
        input.attr("type", "text");
        } else {
        input.attr("type", "password");
        }
}

$(function(){
    let errorMessage = $('#error-message').text().trim();
    function error_message() {
        new PNotify({
            title: 'Error !!',
            text: errorMessage,
            addclass: 'bg-danger'
        });
    };
    if(errorMessage) error_message();
});


function maskingPassword(e){
    let pass = CryptoJSAesJson.encrypt($("#password").val(), $("input[name=_token]").val());
    $("#password-send").val(pass);
    // $("form").submit();
}

$('#btn-submit-form').click(function(){
    let pass = CryptoJSAesJson.encrypt($("#password").val(), $("input[name=_token]").val());
    $('#npp').val($('#npp-show').val());
    $('#password-send').val(pass);
    $('#form-login').submit();
});

$("#password").keypress(function(e){
    if(e.which == 13){
        $('#btn-submit-form').click();
    }
});

$("#npp-show").keypress(function(e){
    if(e.which == 13){
        $('#btn-submit-form').click();
    }
});

const env = JSON.parse(document.querySelector('meta[name="app-env"]').getAttribute('content'));
if (env.app_env === 'training') {
    const watermarkContainerAppTrain = document.querySelector('.watermark-container-dls-app-train');
    const watermarkTextAppTrain = 'APP TRAINING DLS';

    for (let i = 0; i < 10; i++) {
        for (let j = 0; j < 10; j++) {
            const watermarkTextNodeAppTrain = document.createElement('span');
            watermarkTextNodeAppTrain.textContent = watermarkTextAppTrain;
            watermarkTextNodeAppTrain.style.top = `${i * 300}px`;
            watermarkTextNodeAppTrain.style.right = `${j * 400}px`;
            watermarkTextNodeAppTrain.style.transform = `rotate(37deg) translate(${i * 20}px, ${j * 20}px)`;
            watermarkTextNodeAppTrain.style.width = `max-content`;
            watermarkContainerAppTrain.appendChild(watermarkTextNodeAppTrain);
            watermarkTextNodeAppTrain.classList.add('watermark-dls-app-train');
        }
    }
}

