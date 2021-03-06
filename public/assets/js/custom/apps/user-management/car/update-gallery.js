"use strict"; var KTUsersUpdatePermission = function () {
    const t = document.getElementById("kt_gallery_update_module"),
        e = t.querySelector("#kt_modal_update_gallery_form"),
        n = new bootstrap.Modal(t);
        let formData;
    return {
        init: function () {
            (() => {
                var o = FormValidation.formValidation(e,
                    {
                        fields: {
                            gallery: {
                                validators: {
                                    notEmpty: {
                                        message: 'Please select an image'
                                    },
                                    file: {
                                        extension: 'jpeg,jpg,png,gif',
                                        type: 'image/jpeg,image/png,image/jpg,image/gif',
                                        maxSize: 2097152,   // 2048 * 1024
                                        message: 'The selected file is not valid'
                                    },
                                }
                            }
                        }
                        , plugins: {
                            trigger: new FormValidation.plugins.Trigger,
                            bootstrap: new FormValidation.plugins.Bootstrap5({
                                rowSelector: ".fv-row",
                                eleInvalidClass: "",
                                eleValidClass: ""
                            })
                        }
                    });
                t.querySelector('[data-kt-gallery-modal-action="close"]').addEventListener("click", (t => {
                    t.preventDefault(),
                        Swal.fire({
                            text: "Are you sure you would like to close?",
                            icon: "warning",
                            showCancelButton: !0,
                            buttonsStyling: !1,
                            confirmButtonText: "Yes, close it!",
                            cancelButtonText: "No, return",
                            customClass: {
                                confirmButton: "btn btn-primary",
                                cancelButton: "btn btn-active-light"
                            }
                        }).then((function (t) {
                            t.value && n.hide()
                        }))
                })),
                    t.querySelector('[data-kt-gallery-modal-action="cancel"]').addEventListener("click", (t => {
                        t.preventDefault(),
                            Swal.fire({
                                text: "Are you sure you would like to cancel?",
                                icon: "warning",
                                showCancelButton: !0,
                                buttonsStyling: !1,
                                confirmButtonText: "Yes, cancel it!",
                                cancelButtonText: "No, return",
                                customClass: {
                                    confirmButton: "btn btn-primary",
                                    cancelButton: "btn btn-active-light"
                                }
                            }).then((function (t) {
                                t.value ? (e.reset(),
                                    n.hide()) : "cancel" === t.dismiss && Swal.fire({
                                        text: "Your form has not been cancelled!.",
                                        icon: "error",
                                        buttonsStyling: !1,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: {
                                            confirmButton: "btn btn-primary"
                                        }
                                    })
                            }))
                    }));
                const i = t.querySelector('[data-kt-gallery-modal-action="submit"]');
                i.addEventListener("click", (function (t) {
                    t.preventDefault(), o && o.validate().then((function (t) {
                        
                            "Valid" == t ? (i.setAttribute("data-kt-indicator", "on"),
                                i.disabled = !0,
                            formData = new FormData(document.getElementById("kt_modal_update_gallery_form")),
                                console.log(formData),
                                axios({
                                    
                                    method: 'post',
                                    url: '/admin/editgallery',
                                    data: formData
                                    
                                }).then(function (response) {
                                    e.reset();
                                    setTimeout((function () {
                                        i.removeAttribute("data-kt-indicator"),
                                            i.disabled = !1,
                                            Swal.fire({
                                                text: response.data.success,
                                                icon: "success", buttonsStyling: !1,
                                                confirmButtonText: "Ok, got it!",
                                                customClass: { confirmButton: "btn btn-primary" }
                                            })
                                                .then((function (t) {
                                                    t.isConfirmed && n.hide();
                                                    location.reload();
                                                }))

                                    }), 2e3);
                                }).catch(function (error) {
                                    console.log(error);
                                })) : Swal.fire({
                                    text: "Sorry, looks like there are some errors detected, please try again.",
                                    icon: "error",
                                    buttonsStyling: !1,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn btn-primary"
                                    }
                                })
                    }))
                }))
            })()
        }
    }
}();
KTUtil.onDOMContentLoaded((function () { KTUsersUpdatePermission.init() }));