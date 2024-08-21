function BrowseServer(startupPath, elementId) {
    CKFinder.modal({
        chooseFiles: true,
        width: 800,
        height: 600,
        startupPath: startupPath,
        startupFolderExpanded: true,
        resourceType: 'Images',
        onInit: function (finder) {
            finder.on('files:choose', function (evt) {
                var file = evt.data.files.first();
                var output = document.getElementById(elementId);
                output.value = file.getUrl();
                output.dispatchEvent(new Event("change"));
            });

            finder.on('file:choose:resizedImage', function (evt) {
                var output = document.getElementById(elementId);
                output.value = evt.data.resizedUrl;
                output.dispatchEvent(new Event("change"));
            });
        }
    });
}

function escapeHtml(unsafe) {
    return unsafe
            .replace(/&/g, "&amp;")
            .replace(/</g, "&lt;")
            .replace(/>/g, "&gt;")
            .replace(/"/g, "&quot;")
            .replace(/'/g, "&#039;");
}

function BrowseServerThumb(startupPath, elementId) {
    CKFinder.modal({
        chooseFiles: true,
        width: 800,
        height: 600,
        startupPath: startupPath,
        startupFolderExpanded: true,
        resourceType: 'Images',
        onInit: function (finder) {
            finder.on('files:choose', function (evt) {
                var file = evt.data.files.first();
                var output = document.getElementById('thumbnails');
                if (document.getElementById(escapeHtml(file.getUrl())) == null) {
                    output.innerHTML +=
                            '<li id="' + escapeHtml(file.getUrl()) + '" class="thumb">' +
                            '<div class="_boxthumb"><img src="' + escapeHtml(file.getUrl()) + '" /></div>' +
                            '<div class="text-center removeimg"><a href="javascript:;" class="btn default btn-sm" onclick="removeValue(\'' + escapeHtml(file.getUrl()) + '\',\'' + elementId + '\');return false;"><i class="fa fa-times"></i> Remove </a></div>' +
                            '</li>';
                    document.getElementById(elementId).value += escapeHtml(file.getUrl()) + ",";
                    return true;
                }
            });

            finder.on('file:choose:resizedImage', function (evt) {
                var output = document.getElementById('thumbnails');
                if (document.getElementById(escapeHtml(evt.data.resizedUrl)) == null) {
                    output.innerHTML +=
                            '<li id="' + escapeHtml(evt.data.resizedUrl) + '" class="thumb">' +
                            '<img src="' + escapeHtml(evt.data.resizedUrl) + '" />' +
                            '<div class="text-center removeimg"><a href="javascript:;" class="btn default btn-sm" onclick="removeValue(\'' + escapeHtml(evt.data.resizedUrl) + '\',\'' + elementId + '\');return false;"><i class="fa fa-times"></i> Remove </a></div>' +
                            '</li>';
                    document.getElementById(elementId).value += escapeHtml(evt.data.resizedUrl) + ",";
                    return true;
                }
            });
        }
    });
}

function removeValue(value, elementId) {
    var list = $('#' + elementId).val();
    var separator = separator || ",";
    var values = list.split(separator);
    for (var i = 0; i < values.length; i++) {
        if (values[i] == value) {
            $('.thumb').each(function () {
                if ($(this).attr("id") == values[i]) {
                    $(this).remove();
                }
            });
            values.splice(i, 1);
        }
    }

    $('#' + elementId).val(values);
}

function selectFileWithCKFinder(startupPath, elementId) {
    CKFinder.modal({
        chooseFiles: true,
        width: 800,
        height: 600,
        startupPath: startupPath,
        startupFolderExpanded: true,
        resourceType: 'Files',
        onInit: function (finder) {
            finder.on('files:choose', function (evt) {
                var file = evt.data.files.first();
                var output = document.getElementById(elementId);
                output.value = file.getUrl();
                output.dispatchEvent(new Event("change"));
            });

            finder.on('file:choose:resizedImage', function (evt) {
                var output = document.getElementById(elementId);
                output.value = evt.data.resizedUrl;
                output.dispatchEvent(new Event("change"));
            });
        }
    });
}