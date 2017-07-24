
function displayCurrentDateTime(showPosition, showTime, showSecond) {
    var refresh = 1000; // Refresh rate in milli seconds
    var dateString = '';
    var now = new Date();
    var day = now.getDay();
    var today = now.getDate();
    var month = now.getMonth();
    var year = now.getFullYear();

    var dayName = new Array(6);
    dayName[0] = "Chủ nhật";
    dayName[1] = "Thứ hai";
    dayName[2] = "Thứ ba";
    dayName[3] = "Thứ tư";
    dayName[4] = "Thứ năm";
    dayName[5] = "Thứ sáu";
    dayName[6] = "Thứ bảy";


    var monthName = new Array(12)
    monthName[0] = "01";
    monthName[1] = "02";
    monthName[2] = "03";
    monthName[3] = "04";
    monthName[4] = "05";
    monthName[5] = "06";
    monthName[6] = "07";
    monthName[7] = "08";
    monthName[8] = "09";
    monthName[9] = "10";
    monthName[10] = "11";
    monthName[11] = "12";



    var hour = now.getHours();
    if (parseInt(hour) < 10) {
        hour = '0' + hour;
    }

    var minute = now.getMinutes();
    if (parseInt(minute) < 10) {
        minute = '0' + minute;
    }



    dateString += " " + dayName[day] + ', ' + today + "/" + monthName[month] + "/" + year;

    if (showTime) {
        dateString += ' | ' + hour + ":" + minute;

        if (showSecond) {
            dateString += ":" + now.getSeconds();
        }
    }
    document.getElementById(showPosition).innerHTML = dateString;
    setTimeout('displayCurrentDateTime(' + showSecond + ')', refresh);
}









// hàm gán tooltip trên vào textbox
function assignToolTipBootStrapToTextBox(arrayInput, title) {
    // nếu là mảng thì lặp từng đối tượng
    if (Object.prototype.toString.call(arrayInput) === '[object Array]') {
        for (var i = 0; i < arrayInput.length; ++i) {
            var input = arrayInput[i];
            input.attr('title', title);
            input.tooltip('show');
            input.tooltip({
                placement: "auto top"
            });
        }
    } else {
        arrayInput.attr('title', title);
        arrayInput.tooltip('show');
        arrayInput.tooltip({
            placement: "auto top"
        });
    }
}


// hàm hủy tooltip trên trên textbox
function destroyToolTipBootStrapFromTextBox(arrayInput) {
    // nếu là mảng thì lặp từng đối tượng
    if (Object.prototype.toString.call(arrayInput) === '[object Array]') {
        for (var i = 0; i < arrayInput.length; ++i) {
            var input = arrayInput[i];
            input.tooltip('destroy');
        }
    } else {
        arrayInput.tooltip('destroy');

    }
}






// check empty value
function validateEmptyValue(arrayInput) {
    var hasError = false;

    // nếu là mảng thì lập từng đối tượng
    if (Object.prototype.toString.call(arrayInput) === '[object Array]') {

        for (var i = 0; i < arrayInput.length; ++i) {
            var input = arrayInput[i];
            if (input.val() == '0' || input.val() == '') {
                highlightInput(input);
                hasError = true;
            } else {
                input.css('background-color', '#FFF');
            }
        }
    } else {
        if (arrayInput.val() == '0' || arrayInput.val() == '') {
            highlightInput(arrayInput);
            hasError = true;
        } else {
            arrayInput.css('background-color', '#FFF');
        }
    }
    return hasError;
}




// hàm tô đỏ nền các input
function highlightInput(arrayInput) {
    // nếu là mảng thì lập từng đối tượng
    if (Object.prototype.toString.call(arrayInput) === '[object Array]') {
        for (var i = 0; i < arrayInput.length; ++i) {
            var input = arrayInput[i];
            input.css('background-color', '#FFEDEF');
        }
    } else {
        arrayInput.css('background-color', '#FFEDEF');
    }
}



// hàm bỏ tô đỏ nền các input
function unHighlightInput(arrayInput) {
    // nếu là mảng thì lập từng đối tượng
    if (Object.prototype.toString.call(arrayInput) === '[object Array]') {
        for (var i = 0; i < arrayInput.length; ++i) {
            var input = arrayInput[i];
            input.css('background-color', '');
        }
    } else {
        arrayInput.css('background-color', '');
    }
}




function loading_show() {
    // $('.d_loading').fadeIn('fast');
    $('.d_loading').show();
}

function loading_hide() {
    // $('.d_loading').fadeOut('fast');
    $('.d_loading').hide();
}






function showMessage(text, div, timeOut, isError) {
    div.html(text);
    div.show();
    // if message is error
    // set background is red
    if (isError) {
        div.addClass("alert-danger");
        div.removeClass("alert-success");
    } else {
        div.addClass("alert-success");
        div.removeClass("alert-danger");
    }
    if (timeOut > 0) {
        setTimeout(function () {
            div.fadeOut();
        }, timeOut);
    }
}





function keypress(e) {
    var keypressed = null;
    if (window.event) {
        keypressed = window.event.keyCode; // IE
    } else
    {
        keypressed = e.which; // NON-IE, Standard
    }

    if (keypressed < 48 || keypressed > 57) {

        //CharCode của 0 là 48 (Theo bảng mã ASCII)
        //CharCode của 9 là 57 (Theo bảng mã ASCII)


        if (keypressed == 8 || keypressed == 127) {
            return;
        }
        return false;
    }
}





function compareStartDateAndEndDate(txtStartDate, slStartHour, slStartMinute, txtEndDate, slEndHour, slEndMinute) {

//    var strStartDate = txtStartDate.val();
//    var strStartHour = slStartHour.val();
//    var strStartMinute = slStartMinute.val();
//
//    var strEndDate = txtEndDate.val();
//    var strEndHour = slEndHour.val();
//    var strEndMinute = slEndMinute.val();


    var strStartDate = $.trim(txtStartDate);
    var strStartHour = $.trim(slStartHour);
    var strStartMinute = $.trim(slStartMinute);

    var strEndDate = $.trim(txtEndDate);
    var strEndHour = $.trim(slEndHour);
    var strEndMinute = $.trim(slEndMinute);



    var mdyEnableDate = strStartDate.split('/');
    var startDate = new Date(mdyEnableDate[2], mdyEnableDate[1], mdyEnableDate[0], strStartHour, strStartMinute);

    var mdyDisableDate = strEndDate.split('/');
    var endDate = new Date(mdyDisableDate[2], mdyDisableDate[1], mdyDisableDate[0], strEndHour, strEndMinute);



    if (endDate <= startDate) {
        return false;
    } else {
        return true;
    }
}






function onblurTextInput(input, textValue) {
    if (input.value == '') {
        input.value = textValue;
    }

}


function onFocus(input, textValue) {
    if (input.value == textValue)
        input.value = '';
}




function isEmail(email) {

    var text = email.val();

    if (text.indexOf(" ") > 0) {
        highlightInput(email);
        return false;
    }

    if (text.indexOf("@") == -1) {
        highlightInput(email);
        return false;
    }

    var strLength = text.length;

    if (text.indexOf(".") == -1 || text.indexOf(".") == strLength - 1) {
        highlightInput(email);
        return false;
    }
    if (text.indexOf("..") != -1) {
        highlightInput(email);
        return false;
    }
    if (text.indexOf("@") != text.lastIndexOf("@")) {
        highlightInput(email);
        return false;
    }

    // những ký tự cho phép đối với một email
    var str = "abcdefghijklmnopqrstuvwxyz1234567890@-._ABCDEFGHIJKLMNOPQRSTUVWXYZ";

    for (var j = 0; j < strLength; j++) {
        if (str.indexOf(text.charAt(j)) == -1) {
            highlightInput(email);
            return false;
        }
    }


    return true;
}






//function isEmail(s) {
//    if (s == "")
//        return false;
//    if (s.indexOf(" ") > 0)
//        return false;
//    if (s.indexOf("@") == -1)
//        return false;
//    var i = 1;
//    var slen = s.length;
//    if (s.indexOf(".") == -1 || s.indexOf(".") == s.length - 1)
//        return false;
//    if (s.indexOf("..") != -1)
//        return false;
//    if (s.indexOf("@") != s.lastIndexOf("@"))
//        return false;
//    var str = "abcdefghijklmnopqrstuvwxyz1234567890@-._ABCDEFGHIJKLMNOPQRSTUVWXYZ";
//    for (var j = 0; j < s.length; j++)
//        if (str.indexOf(s.charAt(j)) == -1)
//            return false;
//    return true;
//}


function isNumeric(str) {
    var validStr = "0123456789";
    for (var i = 0; i < str.length; i++) {
        if (validStr.indexOf(str.charAt(i)) == -1)
            return false;
    }
    return true;
}


function isTelephone(str) {
    var validStr = "+- ().0123456789";
    for (var i = 0; i < str.length; i++) {
        if (validStr.indexOf(str.charAt(i)) == -1)
            return false;
    }
    return true;
}

function redirect(url) {
    window.location = url;
}



/*function checkAll(n, cbAll, form, fldName) {



    if (!fldName) {
        fldName = 'cb';
    }

    if (!form) {
        form = document.phpForm;
    }

    if (!cbAll) {
        cbAll = form.cbAll;
    }




    var checked = cbAll.checked;

    var n2 = 0;

    // check each checkbox
    for (i = 1; i <= n; i++) {


        cb = eval('form.' + fldName + '' + i);

        if (cb) {
//            alert(cb.name);
            cb.checked = checked;
            n2++;
        }

    }


    if (checked) {
        form.boxchecked.value = n2;
    } else {
        form.boxchecked.value = 0;
    }
//    alert();
}*/



/*function isChecked(checked, form) {

    if (!form) {
        form = document.phpForm;
    }

    if (checked == true) {
        form.boxchecked.value++;
    } else {
        form.boxchecked.value--;
    }
}

*/




function removeSigns(text) {
    var str = text;
    str = str.toLowerCase();
    str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
    str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
    str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
    str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
    str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
    str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
    str = str.replace(/đ/g, "d");
    str = str.replace(/!|@|\$|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\'| |\"|\&|\#|\[|\]|~/g, "-");
    str = str.replace(/-+-/g, "-"); //thay thế 2- thành 1-
    str = str.replace(/^\-+|\-+$/g, "");//cắt bỏ ký tự - ở đầu và cuối chuỗi
    str = str.replace(/[&\/\\#,+()$~%.'":*?“”<>{}]/g, "");
    return str;
}



function BrowseServer(path) {
//     var finder = new CKFinder();
//     finder.BasePath = '../lib/ckfinder/';
// //    finder.RememberLastFolder = true;
//     if (path) {
//         finder.StartupPath = path + ":/";
//         finder.ResourceType = path;
//     } else {
//         finder.StartupPath = "Images:/";
//         finder.ResourceType = 'Images';
//     }
//     finder.SelectFunction = SetFileField;
//     finder.Popup();
    CKFinder.popup({
        language: 'vi',
        chooseFiles: true,
        chooseFilesOnDblClick: true,
        onInit:function( finder ) {
            finder.on( 'files:choose', function( evt ) {
                var file = evt.data.files.first();
                SetFileField(file.getUrl());
            } );
        }
    });
}

function postAjax(postPage, dataString, divLoadingName, async) {
    var result = false;
    var asynchronous = false;

    if (async != null) {
        asynchronous = async;
    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: postPage,
        type: "POST",
        data: dataString,
        async: asynchronous,
        beforeSend: function () {
            if (divLoadingName != null) {
                $('.' + divLoadingName).show();
            }
        },
        success: function (data) {
            result = $.trim(data);
        },
        complete: function () {
            if (divLoadingName != null) {
                $('.' + divLoadingName).hide();
            }
        }
    });
    return result;
}



function postAjaxForGetList(postPage, data_save, loadingDIV, containerDIV) {
    $.ajax({
        url: postPage,
        type: "POST",
        data: data_save,
        async: true,
        beforeSend: function () {
            if (loadingDIV != null) {
                $(loadingDIV).show();
            }
        },
        success: function (data) {
            $(containerDIV).html($.trim(data));
        },
        complete: function () {
            if (loadingDIV != null) {
                $(loadingDIV).hide();
            }
            assignSortIcon('.table', currentSortColumn, sortColumnState);
        },
        error: function (error) {
            $(containerDIV).html(error);
        }
    });
}




// hàm thêm lượt truy cập
function addVisitCounter() {
    var postPage = './components/visitcounter/index.php';
    var resolution = screen.width + 'x' + screen.height;
    var data_save = {
        hdAction: 'addVisitCounter',
        hdPostAjax: 1,
        hdResolution: resolution
    };
    $.ajax({
        url: postPage,
        type: "POST",
        data: data_save,
        async: true,
        beforeSend: function () {
        },
        success: function (data) {
        },
        complete: function () {
        },
        error: function (error) {
            alert(error);
        }
    });


//    var result = postAjax(postPage, data_save);
//    alert(result);
}


// hàm set lại thời gian sống của session
function setLifeTime() {
    var postPage = './components/visitcounter/index.php';
    var data_save = {
        hdAction: 'setLifeTime',
        hdPostAjax: 1
    };
    var result = postAjax(postPage, data_save);
    // alert(result);
}






function removeItemFromCart(ID) {
    var postPage = './components/cart/index.php';
    var data_save = {
        hdAction: 'removeItemFromCart',
        hdPostAjax: 1,
        hdID: ID
    };
    return postAjax(postPage, data_save);
}

function addItemToCart(hdItemID, txtQuantity, arrItemProperty, hdPrice) {
    var postPage = './components/cart/index.php';
    var data_save = {
        hdAction: 'addToCart',
        hdPostAjax: 1,
        hdItemID: hdItemID,
        txtQuantity: txtQuantity,
        hdPrice: hdPrice,
        arrItemProperty: arrItemProperty
    };
    return postAjax(postPage, data_save);
}


function plusQuantity(ID) {
    var postPage = './components/cart/index.php';
    var data_save = {
        hdAction: 'plusQuantity',
        hdPostAjax: 1,
        hdID: ID,
    };
    return postAjax(postPage, data_save);
}

function minusQuantity(ID) {
    var postPage = './components/cart/index.php';
    var data_save = {
        hdAction: 'minusQuantity',
        hdPostAjax: 1,
        hdID: ID,
    };
    return postAjax(postPage, data_save);
}



function showCartBlock(element) {
    var cartBlockElement = '.d_cart_block';
    if (element) {
        cartBlockElement = element;
    }
    var postPage = './components/cart/index.php';
    var result = false;

    var data_save = {
        hdAction: 'loadCartBlock',
        hdPostAjax: 1,
    };
    result = postAjax(postPage, data_save);
    $(cartBlockElement).html(result);
}




function logout() {

    var postPage = './components/com_login/index.php';
    var result = false;

    var data_save = {
        hdAction: 'logout',
        hdPostAjax: 1,
    };

    result = postAjax(postPage, data_save);

    if (result == 'OK') {
        // nếu đăng nhập thành công thì cập nhật lại giỏ hàng với giả tương ứng với tài khoản
        var resultUpdateCart = updateCartByUserID();
        if (resultUpdateCart == 'OK') {
            window.location.reload();
        } else {
            alert(resultUpdateCart);
        }

    } else {
        alert(result);
    }
}







function updateCartByUserID() {

    var postPage = './components/com_cart/index.php';
    var result = false;

    var data_save = {
        hdAction: 'updateCartByUserID',
        hdPostAjax: 1
    };

    result = postAjax(postPage, data_save);
    return result;
}

// hàm chèn sort icon trên bảng
function assignSortIcon(tableClass, currentSortColumn, sortColumnState) {
    var thArray = $(tableClass + ' thead tr').children('th');
    thArray.each(function () {
        var a = $(this).find('a[id="' + currentSortColumn + '"]');
        if (sortColumnState == 'ASC') {
            a.append('<i class="glyphicon glyphicon-arrow-down pull-right"></i>');
        } else {
            a.append('<i class="glyphicon glyphicon-arrow-up  pull-right"></i>');
        }
    });
}








