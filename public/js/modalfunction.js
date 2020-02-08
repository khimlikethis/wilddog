/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

(function () {
    var _alert = window.alert;                   // <-- Reference
    window.alert = function (str, vFunctionCallback) {
        // do something additional
        if (console)
            console.log(str);
        var _rand = Math.floor(Math.random() * 10000) + 1;
        //return _alert.apply(this, arguments);  // <-- The universal method
        alertModal(str, vFunctionCallback, _rand);                             // Suits for this case
    };

    window.confirm = function (message, callbackConfirm, callbackCancel, caption) {
        caption = caption || 'ยืนยัน';
        var _rand = Math.floor(Math.random() * 10000) + 1;
        return confirmModal(message, callbackConfirm, callbackCancel, caption, _rand);
    };

    table = $('.auto-activate').dataTable({
        "pageLength": 20
    });

})();

function alertModal(vMessage, vFunctionCallback, vElmName) {

    var _html;
    var _modal;
    var _size;

    _size = 'modal-sm';

    _html = '<div id="modal-' + vElmName + '" class="modal fade">';
    _html += '<div class="modal-dialog ' + _size + '">';
    _html += '<div class="modal-content" >';
    _html += '<div class="modal-header" style="padding: 10px;">';
    _html += '<h4 class="modal-title" >แจ้งเตือน</h4>';
    _html += '</div>';
    _html += '<div class="modal-body">';
    _html += vMessage;
    _html += '</div>';
    _html += '<div class="modal-footer" style="padding: 10px;">';
    _html += '<button type="button" id="btnOkay" class="btn btn-default btn-sm" data-dismiss="modal" autofocus>ตกลง</button>';
    _html += '</div>';
    _html += '</div>';
    _html += '</div>';
    _html += '</div>';

    _modal = $(_html);

    _modal.modal({show: true, backdrop: 'static'});
    _modal.find('.modal-footer .btn-default').on('click', function () {
        if (vFunctionCallback != null)
            vFunctionCallback();
        _modal.modal('hide');
        return true;
    });
    _modal.on('hidden.bs.modal', function (e) {
        $(this).remove();
        return false;
    });
}

function confirmModal(vMessage, vFunctionConfirm, vFuncCancel, vTitle, vElmName) {

    var _html;
    var _modal;
    var _size;

    _size = 'modal-sm';

    _html = '<div id="modal-' + vElmName + '" class="modal fade">';
    _html += '<div class="modal-dialog modal-danger ' + _size + '">';
    _html += '<div class="modal-content" >';
    _html += '<div class="modal-header" style="padding: 10px;">';
    _html += '<h4 class="modal-title" >' + vTitle + '</h4>';
    _html += '<button style="cursor: pointer;" type="button" class = "close" data-dismiss="modal" aria-label="Close" ><span aria-hidden="true" >&times;</span></button>';
    _html += '</div>';
    _html += '<div class="modal-body">';
    _html += vMessage;
    _html += '</div>';
    _html += '<div class="modal-footer" style="padding: 10px;">';
    _html += '<button type="button" id="btnConfirm" class="btn btn-danger btn-sm">ยืนยัน</button>';
    _html += '<button type="button" id="btnCancel" class="btn btn-default btn-sm" data-dismiss="modal">ยกเลิก</button>';
    _html += '</div>';
    _html += '</div>';
    _html += '</div>';
    _html += '</div>';

    _modal = $(_html);

    _modal.modal({show: true, backdrop: 'static'});
    _modal.find('.modal-footer .btn-danger').on('click', function () {
        if (vFunctionConfirm != null)
            vFunctionConfirm();
        _modal.modal('hide');
        return true;
    });
    _modal.find('.modal-footer .btn-default').on('click', function () {
        if (vFuncCancel != null)
            vFuncCancel();
        _modal.modal('hide');
        return true;
    });
    _modal.on('hidden.bs.modal', function (e) {
        $(this).remove();
        return false;
    });
}

function openModal(vTitle, vRemoteUrl, vSize, vFunction, vCloseCallback, vElmName) {

    var _html;
    var _modal;
    var _size;
    var width;

    if (vSize === 'lg') {
        _size = 'modal-lg';
        width = "style='max-width:1400px;'";
    } else if (vSize === 'sm') {
        _size = 'modal-sm';
    } else if (vSize === 'md') {
        _size = 'modal-md';
    } else {
        _size = 'modal-lg';
    }

    if (vElmName == null) {
        vElmName = 'modal-' + Math.floor(Math.random() * 10000) + 1;
    }

    _html = '<div id="' + vElmName + '" class="modal fade" tabindex="-1" role="dialog">';
    _html += '<div class="modal-dialog ' + _size + '" role="document" '+ width + '>';
    _html += '<div class="modal-content" >';
    _html += '<div class="modal-header" >';
    _html += '<button type="button" class = "close" data-dismiss="modal" aria-label="Close" ><span aria-hidden="true" >&times;</span></button>';
    _html += '<h4 class="modal-title" >' + vTitle + '</h4>';
    _html += '</div>';
    _html += '<div class="modal-body">';
    _html += '</div>';
    _html += '</div>';
    _html += '</div>';
    _html += '</div>';

    _modal = $(_html);

    _modal.find('.modal-body').load(vRemoteUrl, function (result) {
        _modal.modal({show: true, backdrop: 'static', focus: true});
        _modal.on('shown.bs.modal', function (e) {
            if (vFunction != null)
                vFunction();
        });
        _modal.on('hidden.bs.modal', function (e) {
            if (vCloseCallback != null)
                vCloseCallback();
            $(this).remove();
        });
    });

    return _modal;

}

function popupwindow(url, title, w, h) {
    var left = (screen.width / 2) - (w / 2);
    var top = (screen.height / 2) - (h / 2);
    return window.open(url, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);
}

/**
 * Number.prototype.numberFormat(n, x)
 *
 * @param integer n: length of decimal
 * @param integer x: length of sections
 */
Number.prototype.numberFormat = function (n, x) {
    var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\.' : '$') + ')';
    return this.toFixed(Math.max(0, ~~n)).replace(new RegExp(re, 'g'), '$&,');
};

function dateThaiToServiceFormat(date_string) {
    date_splited = date_string.split('/');
    return (date_splited[2] - 543) + "-" + date_splited[1] + "-" + date_splited[0];
}

function clearForm(formSelector) {
    $(formSelector).find("input[name!='_token']").val('');
    $(formSelector).find('select option').prop('selected', function () {
        return this.defaultSelected;
    });
    $(formSelector).find('textarea').val('');
}

function getToken() {
    return $('meta[name="csrf_token"]').attr('content');
}
