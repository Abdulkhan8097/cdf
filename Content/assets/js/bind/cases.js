var inprogress = false;

var pageindex = 2;

var skip = 0;

getCases();

$(window).scroll(function () {

    if ($(window).scrollTop() > (Number($(".cases").height() + 300) / 2) && !inprogress){

        inprogress = true;

        getCases();

    }


});


function getCases() {
    var fileData = new FormData();
    fileData.append("pageindex", pageindex);
    fileData.append("skip", skip);

    var u = window.location.pathname;
    var ajaxurl;
    if (u == "/cases"){
        ajaxurl = "/access/getcases";
    }
    else if(u == "/successcases") {
        ajaxurl = "/access/getsuccesscases";
    }

    $.ajax({
        url: ajaxurl,
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

            var cas = $(".caseslisttemp").val().toString();

            if (u == "/successcases"){
                for (var i = 0; i < result.length; i++) {

                    var castmp = String(cas).replace(/#casetitle/g, result[i].C_Title).replace(/#casesurl/g, result[i].C_SeoUrl).replace(/#casedesc/g, String(result[i].C_ShortDesc).substring(0, 70)).replace(/#caseimage/g, String(result[i].C_Image).replace('~', '')).replace(/#casegoal/g, result[i].C_Goal).replace(/#casecover/g, result[i].C_Pledged).replace(/#calcamount/g, ((parseFloat(result[i].C_Pledged) * 100) / parseFloat(result[i].C_Goal)) + "%");
                    $(".caselist").append(castmp);
                    //$(".caselist").append('<div class="col-sm-6 col-md-4 col-lg-4">' +
                    //    '<div class="causes bg-lighter effect1 maxwidth500 mb-30" >' +
                    //    '<div class="thumb">' +
                    //    '<a href="/case/' + result[i].C_SeoUrl + '"><img class="img-fullwidth" alt="" src="' + result[i].C_Image.replace('~', '') + '"></a>' +
                    //    '</div>' +
                    //    '<div class="causes-details clearfix border-bottom p-15 pt-10">' +
                    //    '<h5><a href="/case/' + result[i].C_SeoUrl + '">' + result[i].C_Title.substring(0, 56) + '</a></h5>' +
                    //    '<p>' + result[i].C_ShortDesc.substring(0, 70) + '</p>' +
                    //    '<ul class="list-inline clearfix mt-20">' +
                    //    '<li class="text-theme-colored pr-0">SUCCESSFULL</li>' +
                    //    '</ul>' +
                    //    '<div class="mt-10">' +
                    //    '<div class="pull-right"><a class="btn btn-dark purple-btn btn-flat btn-sm pull-left mt-10" href="/case/' + result[i].C_SeoUrl + '">Read More</a></div>' +
                    //    '</div>' +
                    //    '</div>' +
                    //    '</div>' +
                    //    '</div >')
                }
            }
            else {
                for (var i = 0; i < result.length; i++) {
                    var amt = parseInt(result[i].C_Goal.replace(/,/g, ""));
                    var castmp = String(cas).replace(/#casetitle/g, result[i].C_Title).replace(/#casesurl/g, result[i].C_SeoUrl).replace(/#casedesc/g, String(result[i].C_ShortDesc).substring(0, 70)).replace(/#caseimage/g, String(result[i].C_Image).replace('~', '')).replace(/#casegoal/g, result[i].C_Goal).replace(/#casecover/g, result[i].C_Pledged).replace(/#calcamount/g, ((parseInt(result[i].C_Pledged.replace(/,/g, "")) * 100) / parseInt(result[i].C_Goal.replace(/,/g, ""))).toFixed(0) + "%");
                    $(".caselist").append(castmp);

                    //$(".caselist").append('<div class="col-sm-6 col-md-4 col-lg-4">' +
                    //    '<div class="causes bg-lighter effect1 maxwidth500 mb-30" >' +
                    //    '<div class="thumb">' +
                    //    '<a href="/case/' + result[i].C_SeoUrl + '"><img class="img-fullwidth" alt="" src="' + result[i].C_Image.replace('~', '') + '"></a>' +
                    //    '</div>' +
                    //    '<div class="causes-details clearfix border-bottom p-15 pt-10">' +
                    //    '<h5><a href="/case/' + result[i].C_SeoUrl + '">' + result[i].C_Title + '</a></h5>' +
                    //    '<p>' + result[i].C_ShortDesc.substring(0, 70) + '</p>' +
                    //    '<ul class="list-inline clearfix mt-20">' +
                    //    '<li class="text-theme-colored pr-0">Goal: ₹ ' + result[i].C_Goal + '</li>' +
                    //    '</ul>' +
                    //    '<div class="mt-10">' +
                    //    '<a class="btn btn-dark btn-theme-colored btn-flat btn-sm pull-left mt-10" href="/donation">Donate</a>' +
                    //    '<div class="pull-right"><a class="btn btn-dark purple-btn btn-flat btn-sm pull-left mt-10" href="/case/' + result[i].C_SeoUrl + '">Read More</a></div>' +
                    //    '</div>' +
                    //    '</div>' +
                    //    '</div>' +
                    //    '</div >')
                }
            }
            


        },
        error: function (err) {
            alert(err);
        }
    });
}



function numkey(n) { var t = n.which ? n.which : event.keyCode; return t > 47 && t < 58 ? !0 : !1 }