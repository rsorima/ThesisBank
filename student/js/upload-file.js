$(document).ready(function(){

    $('.report-type').on('change', function(){
        var type = $(this).val();

        if(type == "Manuscript")
        {
            $('.shareable-container').removeClass('hide-element'); 
            $('.file-upload').addClass('hide-element');
            $('.btn-submit').addClass('hide-element'); 
        }
        else
        {
            $('.shareable-container').addClass('hide-element'); 
            $('.file-upload').removeClass('hide-element');
            $('.btn-submit').removeClass('hide-element');
        }
    });


    $('.send-link').click(function(){
        var link = $('.input-link').val();
        var title = $('.input-document-title').val();

        if(link == "" || title == "")
        {
            alert("Please fill up all fields");
        }
        else
        {
            $.ajax({
                url: "php/send-manuscript.php?link="+link+"&title="+title,
                type: "GET",
                dataType: "json",
                success: function(data){
                    alert("Link Sent!");
                    location.reload();
                },
                error: function(err){
                    console.log(err.responseText)
                }
            });
        }
    });
});