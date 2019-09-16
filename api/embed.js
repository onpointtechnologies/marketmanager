// document.write();



var scriptTags = $('script');
var userId;
for (var i = 0; i < scriptTags.length; i++) {
    var id = $(scriptTags[i]).attr('src').split('=');
    if (id.length > 1) {
        userId = id[1];
    }
}
// userId = 29
var formURL = 'https://arkitu.co/manager/forms/api_getuserpreference.php?id=' + userId;
$.ajax({
    url: formURL,
    type: "POST",
    data: {},
    datatype: "json",
    success: function (data, textStatus, jqXHR) {
        var record = JSON.parse(data);
        var showColumns = '';
        if (record.length > 0) {
            for (var i = 0; i < record.length; i++) {
                showColumns += record[i].value + ',';
            }

            CallGetJSON(showColumns);
        }
    },
    error: function (jqXHR, textStatus, errorThrown) {
        alert(jqXHR.status);
    }
});

$("#panel").css({
    'font-size': '10px',
    'width': '30px',
    'height': '10px'
});

function CallGetJSON(showColumns) {
    $.getJSON('https://arkitu.co/manager/forms/api_table.php?id=' + userId).then(res => {
        // document.write(res);
        var information = '<div style="margin:auto;width:470px;"><button style="background: #79C698; font-size: 16px; border-radius: 20px;" onclick="toggleList()">Vendors</button></div>'
        information += '<div id="dOX" style="display:none;"><br>';
        information += '<input type="text" id="search" placeholder="Enter keyword"><button onclick="search()">Find</button>'
        res.forEach(function (item) {
            information += '<p></p>';
            if (showColumns.indexOf("business_name") > -1) {
                information += '<div class="accordion vendor" style="clear: both;border-top: 1px dotted #C8D172;padding:6px 12px 6px 6px;font-family: Arial, Helvetica, sans-serif;font-size: 12px;line-height: 14px;"><a style="float:left" href="#" index="0">' + item.business_name + '</a><a style="float:right" href="#" index="0">+</a></div>';
            } else {
                information += '<div class="accordion vendor" style="clear: both;border-top: 1px dotted #C8D172;padding:6px 12px 6px 6px;font-family: Arial, Helvetica, sans-serif;font-size: 12px;line-height: 14px;"><a style="float:left" href="#" index="0">No Name</a><a style="float:right" href="#" index="0">+</a></div>';
            }
            information += '<div class="panel vendorinfo" style="display:none">';
            if (showColumns.indexOf("vendor_name") > -1) {
                information += '<b>' + item.name + '</b>';
            }

            if (showColumns.indexOf("phone") > -1) {
                information += '<br>';
                information += "<span style='font-weight:bold;'>Phone #:</span> " + "<span style='color:blue'>" + item.phone+"</span>";
            }

            if (showColumns.indexOf("email") > -1) {
                information += '<br>';
                information += "<span style='font-weight:bold;color:red;'><a href = 'mailto:" + item.email + "'>" + item.email + "</a></span> "

            }

            if (showColumns.indexOf("city") > -1) {
                information += '<br>';
                information += "<span style='font-weight:bold;'>City:</span> " + item.city;
            }

            if (showColumns.indexOf("facebook") > -1) {
                information += '<br>';
                information += "<span style='font-weight:bold;'><a href = 'https://www.facebook.com/" + item.facebook + "'>" + item.facebook + "</a></span> "
            }

            if (showColumns.indexOf("instagram") > -1) {
                information += '<br>';
                information += "<span style='font-weight:bold;'><a href = 'https://www.instagram.com/" + item.instagram + "'>" + item.instagram + "</a></span> "

            }

            if (showColumns.indexOf("website") > -1) {
                information += '<br>';
                information += "<span style='font-weight:bold;'><a href = '" + item.website + "'>" + item.website + "</a></span> "
            }

            if (showColumns.indexOf("type") > -1) {
                information += '<br>';
                information += item.type;
            }

            if (showColumns.indexOf("product_api") > -1) {
                information += '<br>';
                information += item.products_sold;
            }

            if (showColumns.indexOf("product_location") > -1) {
                information += '<br>';
                information += item.product_location;
            }

            information += '</div>';
            information += '<p></p>'
        });

        information += '</div>'

        var element = document.getElementById('vendors_api');
        element.innerHTML = information;
        // document.write(information + '</div>');

        // Include the css file on page
        var cssId = 'myCss';
        if (!document.getElementById(cssId)) {
            var head = document.getElementsByTagName('head')[0];
            var link = document.createElement('link');
            link.id = cssId;
            link.rel = 'stylesheet';
            link.type = 'text/css';
            link.href = 'https://arkitu.co/manager/css/embed.css';
            link.media = 'all';
            head.appendChild(link);
        }

        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function () {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                if (panel.style.display === "block") {
                    panel.style.display = "none";
                } else {
                    panel.style.display = "block";
                }
            });
        }
    });
}

function toggleList() {
    var list = $('#dOX')
    if ($(list).is(':visible')) {
        $(list).fadeOut('fast')
    } else {
        $(list).fadeIn('fast')
    }
}

function search() {
    var keyword = $('#search').val()

    $('.vendorinfo:visible').css('display', 'none')

    if (keyword == '') return


    var res = $('#dOX .vendorinfo').filter(function () {
        return $(this).text().toLowerCase().trim().includes(keyword.toLowerCase());
    })

    $.each(res, function (i, ele) {
        $(ele).css('display', 'block')
    })
}
