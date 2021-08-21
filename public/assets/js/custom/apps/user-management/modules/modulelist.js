"use strict";
var KTUsersPermissionsList = function () {
    var t, e;
    return {
        init: function () {
            (e = document.querySelector("#kt_permissions_table")) && (e.querySelectorAll("tbody tr").forEach((t => {
                const e = t.querySelectorAll("td"),
                n = moment(e[2].innerHTML, "DD MMM YYYY, LT").format();
                e[2].setAttribute("data-order", n)
            })),
                t = $(e).DataTable({
                    "paging": false,
                    "ordering": false,
                    "info": false,
                    columnDefs: [
                        {
                            orderable: !1,
                            targets: 0
                        },
                        {
                            orderable: !1,
                            targets: 2
                        }
                    ]
                }),
                document.querySelector('[data-kt-permissions-table-filter="search"]').addEventListener("keyup",
                    (function (e) {
                        t.search(e.target.value).draw()
                    })),
                e.querySelectorAll('[data-kt-permissions-table-filter="delete_row"]').forEach((e => {
                    e.addEventListener("click", (function (e) {
                        e.preventDefault();
                        const n = e.target.closest("tr"),
                            o = n.querySelectorAll("td")[0].innerText;
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

                            e.value ? axios('/admin/moduledelete', {
                                method: 'post',
                                data: {
                                    moduleid: o
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
                                    t.row($(n)).remove().draw()

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