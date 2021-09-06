"use strict";
var KTSubscriptionsList = function () {

    var t, e, n, o, c, carid, inputval, carstatus,
        r = function () {
            t.querySelectorAll('[data-kt-subscriptions-table-filter="delete_row"]').forEach((t => {
                t.addEventListener("click", (function (t) {
                    t.preventDefault();
                    const n = t.target.closest("tr"),
                        o = n.querySelectorAll("td")[2].innerText;
                        carid = n.querySelectorAll("td")[0].getElementsByTagName('input')[0].value;
                        carstatus = n.querySelectorAll("td")[1].getElementsByTagName('input')[0].value;
                

                    Swal.fire({
                        text: "Are you sure you want to change status " + o + "?",
                        icon: "warning",
                        showCancelButton: !0,
                        buttonsStyling: !1,
                        confirmButtonText: "Yes!",
                        cancelButtonText: "No, cancel",
                        customClass: {
                            confirmButton: "btn fw-bold btn-warning",
                            cancelButton: "btn fw-bold btn-active-light-primary"
                        }
                    }).then((function (t) {
                        t.value ? axios('/admin/carstatus', {
                            method: 'post',
                            data: {
                                carid: carid,
                                carstatus: carstatus,
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
                        }) : "cancel" === t.dismiss && Swal.fire({
                            text: o + " status was not changed.",
                            icon: "error", buttonsStyling: !1,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn fw-bold btn-primary"
                            }
                        })
                    }))
                }))
            }))
        },
        l = () => {
            const r = t.querySelectorAll('[type="checkbox"]');
            n = document.querySelector('[data-kt-subscription-table-toolbar="base"]'),
                o = document.querySelector('[data-kt-subscription-table-toolbar="selected"]'),
                c = document.querySelector('[data-kt-subscription-table-select="selected_count"]');
            const a = document.querySelector('[data-kt-subscription-table-select="delete_selected"]');
            r.forEach((t => {
                t.addEventListener("click", (function () {

                    setTimeout((function () { i() }), 50)
                }))
            }))
        };
    const i = () => {
        const e = t.querySelectorAll('tbody [type="checkbox"]');
        let r = !1, l = 0;
        e.forEach((t => {
            t.checked && (r = !0, l++)
        })),
            r ? (c.innerHTML = l,
                n.classList.add("d-none"),
                o.classList.remove("d-none")) : (n.classList.remove("d-none"),
                    o.classList.add("d-none"))
    };
    return {
        init: function () {
            (t = document.getElementById("kt_subscriptions_table")) && (t.querySelectorAll("tbody tr").forEach((t => {
                const e = t.querySelectorAll("td"),
                    n = moment(e[7].innerHTML, "DD MMM YYYY, LT").format();
                e[7].setAttribute("data-order", n)
            })),
                (e = $(t).DataTable(
                    {
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
                                targets: 7
                            }
                        ]
                    })).on("draw", (function () { l(), r(), i() })), l(),
                document.querySelector('[data-kt-subscription-table-filter="search"]').addEventListener("keyup", (function (t) {
                    e.search(t.target.value).draw()
                })),
                r(), function () {
                    //const t = document.querySelector('[data-kt-subscription-table-filter="form"]'),
                    // n = t.querySelector('[data-kt-subscription-table-filter="filter"]'),
                    //o = t.querySelector('[data-kt-subscription-table-filter="reset"]'),
                    // c = t.querySelectorAll("select");
                    // n.addEventListener("click", (function () {
                    //     var t = "";
                    //     c.forEach(((e, n) => {
                    //         e.value && "" !== e.value && (0 !== n && (t += " "),
                    //             t += e.value)
                    //     })),
                    //         e.search(t).draw()
                    // })),
                    // o.addEventListener("click", (function () {
                    //     c.forEach(((t, e) => { $(t).val(null).trigger("change") })),
                    //         e.search("").draw()
                    // }))
                }())
        }
    }
}();
KTUtil.onDOMContentLoaded((function () { KTSubscriptionsList.init() }));