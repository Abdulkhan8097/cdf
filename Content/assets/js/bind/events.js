var inprogress = false;

var pageindex = 2;

var skip = 0;

getEvents();

$(window).scroll(function () {

    if ($(window).scrollTop() > (Number($(".events").height() + 300) / 2) && !inprogress) {

        inprogress = true;

        getEvents();

    }


});


function getEvents() {
    var fileData = new FormData();
    fileData.append("pageindex", pageindex);
    fileData.append("skip", skip);


    $.ajax({
        url: '/access/getevents',
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
            inprogress = false;
            pageindex = pageindex + 1;
            skip = skip + 10;
            $(".events").append(result);
            //for (var i = 0; i < result.length; i++) {
            //    $(".caselist").append('<div class="col-sm-6 col-md-4 col-lg-4">' +
            //        '<div class="causes bg-lighter box-hover-effect effect1 maxwidth500 mb-30" >' +
            //        '<div class="thumb">' +
            //        '<img class="img-fullwidth" alt="" src="' + result[i].C_Image.replace('~', '') + '">' +
            //        '</div>' +
            //        '<div class="causes-details clearfix border-bottom p-15 pt-10">' +
            //        '<h5><a href="/case/' + result[i].C_SeoUrl + '">' + result[i].C_Title + '</a></h5>' +
            //        '<p>' + result[i].C_ShortDesc.substring(0, 70) + '</p>' +
            //        '<ul class="list-inline clearfix mt-20">' +
            //        '<li class="text-theme-colored pr-0">Goal: ₹ ' + result[i].C_Goal + '</li>' +
            //        '</ul>' +
            //        '<div class="mt-10">' +
            //        '<a class="btn btn-dark btn-theme-colored btn-flat btn-sm pull-left mt-10" href="#">Donate</a>' +
            //        '<div class="pull-right"><a class="btn btn-dark purple-btn btn-flat btn-sm pull-left mt-10" href="/case/' + result[i].C_SeoUrl + '">Read More</a></div>' +
            //        '</div>' +
            //        '</div>' +
            //        '</div>' +
            //        '</div >')
            //}


        },
        error: function (err) {
            alert(err);
        }
    });
}



function numkey(n) { var t = n.which ? n.which : event.keyCode; return t > 47 && t < 58 ? !0 : !1 }