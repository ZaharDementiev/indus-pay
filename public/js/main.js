$(document).ready(function (){
    $('.copy').on('click', function () {
        var copyText = $($(this).prev('input'));
        copyText.select();
        document.execCommand("copy");
        $(this).text('Copied')
        setTimeout(()=>{
            $(this).text('Copy')
        }, 3000)

    });
    $('#step-1 .btn-next').on('click', function () {
        $('#step-1').removeClass('active')
        $('#step-2').addClass('active')
    });
    $('#step-2 .btn-back').on('click', function () {
        $('#step-2').removeClass('active')
        $('#step-1').addClass('active')
    });
    $('#trans_id').on('input', function () {
        if($(this).val()===''){
            $(this).parent().addClass('has-error')
        }else{
            $(this).parent().removeClass('has-error')
        }
    });
    $('#formStart').on('click', function () {
        let input = $('#trans_id')
        let formInput = $('#trans_id').parent()
        if(input.val()===''){
            formInput.addClass('has-error')
        }else{
            formInput.removeClass('has-error')
            input.attr('readonly',true)
            formInput.addClass('has-warning')
            setTimeout(()=>{
                formInput.removeClass('has-warning')
                formInput.addClass('has-success')
            }, 7000)
        }
    });

    $('.popups__bgClose').on('click', function () {
        $(this).parent().removeClass('active')
    });
    $('.popups .close').on('click', function () {
        $(this).parent().parent().removeClass('active')
    });
    $('.open-video').on('click', function () {
        $('#popupsVideo').addClass('active')
    });
});
