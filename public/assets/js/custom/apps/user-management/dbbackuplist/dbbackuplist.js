"use strict";
var KTUsersPermissionsList = function () {
    var e;
    return {
        init: function () {
            (e = document.querySelector("#kt_permissions_table")) && (e.querySelectorAll("tbody tr").forEach((t => {
            
            })),

               
                e.querySelectorAll('[data-kt-permissions-table-filter="delete_row"]').forEach((e => {
                    e.addEventListener("click", (function (e) {
                        e.preventDefault();
                        const n = e.target.closest("tr"),
                            o = n.querySelectorAll("td")[1].innerText;
                        Swal.fire({
                            text: "Are you sure you want to delete " + o + "?",
                            icon: "warning",
                            showCancelButton: !0,
                            buttonsStyling: !1,
                            confirmButtonText: "Yes, delete!",
                            cancelButtonText: "No, cancel",
                            customClass: {
                                confirmButton: "btn fw-bold btn-danger",
                                cancelButton: "btn fw-bold btn-active-light-primary"
                            }
                        }).then((function (e) {

                            e.value ? axios('/admin/deletedbbackup', {
                                method: 'post',
                                data: {
                                    filename: o
                                }
                            }).then(function (response) {
                                Swal.fire({
                                    text: response.data.success,
                                    icon: "success", buttonsStyling: !1,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn fw-bold btn-primary"
                                    }
                                }).then((function () {
                                    location.reload();

                                }))
                            }) : "cancel" === e.dismiss && Swal.fire({
                                text: customerName + " was not deleted.",
                                icon: "error",
                                buttonsStyling: !1,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn fw-bold btn-primary"
                                }
                            })




                        }))
                    }))
                })))
        }
    }
}(); KTUtil.onDOMContentLoaded((function () { KTUsersPermissionsList.init() }));