function setRegistryStatus(registryId) {

    event.preventDefault();
    var params = new Object();
    params._token = $('meta[name=csrf-token]').attr('content');
    params.registry_id = registryId;
    ajaxRequest("POST", set_status_url, params, "setRegistryStatusResponse");
}

function setRegistryStatusResponse(data) {

    var btn = $('#registry_status_icon_' + data.registry_id);
    if (data.status > 0) {
        btn.css('color', '#a7d158');
    } else {
        btn.css('color', '#343a40');
    }
}
