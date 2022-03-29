
function sendRequest(url_type,json_data,json_type="POST") {
    return new Promise((resolve, reject) => {
        $.ajax({

            url: "../admin/framework/main_action.php"+url_type,
            type: json_type,
            data: json_data,
            success: function (data) {
                console.log("Send Request : "+data);
                resolve(data)
            },
            error: function (error) {
                console.log("Send Request error : "+error);
                reject(error)
            },
        })
    })
}