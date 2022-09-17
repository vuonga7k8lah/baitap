jQuery(document).ready(function () {
    alert("xxx");
    jQuery("#btn-Revoke-Purchase-Code").click(function () {
        let status = confirm("Are you sure you want to revoke the Purchase Code?");
        if (status) {
            jQuery.ajax({
                type: "POST",
                url: ajaxurl,
                data: {
                    action: "wookit_revokePurchaseCode",
                    purchaseCode: BADGES_GLOBAL.purchaseCode,
                },
                success: function (response) {
                    location.reload();
                },
                error: function (jqXHR, error, errorThrown) {
                    alert(jqXHR.responseJSON.message);
                },
            });
        }
    });
});