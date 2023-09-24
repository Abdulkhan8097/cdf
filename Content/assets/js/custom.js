$(document).ready(function () {

    $(".sticky-share-btns a").click(function () {
        debugger;
        //$(this+" input[type=hidden]").attr("disabled", "disabled");


        createshare(this.children[0].value);

    });

});

function createshare(urls) {

    var fileData = new FormData();
    fileData.append("val", urls);

    $.ajax({
        url: "/access/GenShareUrl",
        type: "POST",
        contentType: false, // Not to set any content header  
        processData: false, // Not to process data  
        data: fileData,
        beforeSend: function () {
            //$.dialog({
            //    title: false,
            //    content: '<p>Saving Data...<i class="fas fa-circle-notch fa-w-16 fa-spin fa-lg"></i></p>',
            //    closeIconClass: 'invisible-close',
            //});
            //$("button[type=submit]").attr("disabled");
            //$("button[type=submit]").html("<span><i class='fas fa-circle-notch fa-w-16 fa-spin fa-lg' ></i><span>Saving</span></span>");
        },
        success: function (result) {

            window.open(result, 'blank', 'width:400,height:500');

        },
        error: function (err) {
            alert(err);
        }
    });
}