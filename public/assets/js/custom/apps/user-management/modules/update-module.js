"use strict"; var KTUsersUpdatePermission = function () {
    const t = document.getElementById("kt_modal_update_module"),
    e = t.querySelector("#kt_modal_update_module_form"),
    n=new bootstrap.Modal(t);
    return{
        init:function(){
            (()=>{
                var o=FormValidation.formValidation(e,
                    {
                        fields:{
                            module_name:{
                                validators:{
                                    notEmpty:{
                                        message:"Module name is required"
                                    }
                                }
                            },
                            module_description: {
                                validators: {
                                    notEmpty: {
                                        message: "Module description is required"
                                    }
                                }
                            }
                        }
                        ,plugins:{
                            trigger:new FormValidation.plugins.Trigger,
                            bootstrap:new FormValidation.plugins.Bootstrap5({
                                rowSelector:".fv-row",
                                eleInvalidClass:"",
                                eleValidClass:""
                            })
                        }
                    });
                    t.querySelector('[data-kt-permissions-modal-action="close"]').addEventListener("click",(t=>{
                        t.preventDefault(),
                        Swal.fire({
                            text:"Are you sure you would like to close?",
                            icon:"warning",
                            showCancelButton:!0,
                            buttonsStyling:!1,
                            confirmButtonText:"Yes, close it!",
                            cancelButtonText:"No, return",
                            customClass:{
                                confirmButton:"btn btn-primary",
                                cancelButton:"btn btn-active-light"
                            }
                        }).then((function(t){
                            t.value&&n.hide()}))})),
                            t.querySelector('[data-kt-permissions-modal-action="cancel"]').addEventListener("click",(t=>{
                                t.preventDefault(),
                                Swal.fire({
                                    text:"Are you sure you would like to cancel?",
                                    icon:"warning",
                                    showCancelButton:!0,
                                    buttonsStyling:!1,
                                    confirmButtonText:"Yes, cancel it!",
                                    cancelButtonText:"No, return",
                                    customClass:{
                                        confirmButton:"btn btn-primary",
                                        cancelButton:"btn btn-active-light"
                                    }
                                }).then((function(t){
                                    t.value?(e.reset(),
                                    n.hide()):"cancel"===t.dismiss&&Swal.fire({
                                        text:"Your form has not been cancelled!.",
                                        icon:"error",
                                        buttonsStyling:!1,
                                        confirmButtonText:"Ok, got it!",
                                        customClass:{
                                            confirmButton:"btn btn-primary"
                                        }
                                    })
                                }))}));
                                const i=t.querySelector('[data-kt-permissions-modal-action="submit"]');
                                i.addEventListener("click",(function(t){
                                    t.preventDefault(),o&&o.validate().then((function(t){
                                        console.log("validated!"),
                                        "Valid"==t?(i.setAttribute("data-kt-indicator","on"),
                                        i.disabled=!0,
                                        
                                            axios('/admin/moduleedit', {
                                                method: 'post',
                                                data: {
                                                    moduleid: e.moduleid.value,
                                                    modulename: e.module_name.value,
                                                    moduledescription: e.module_description.value
                                                },
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
                                            })):Swal.fire({
                                                text:"Sorry, looks like there are some errors detected, please try again.",
                                                icon:"error",
                                                buttonsStyling:!1,
                                                confirmButtonText:"Ok, got it!",
                                                customClass:{
                                                    confirmButton:"btn btn-primary"}})}))}))})()}}}();
                                                    KTUtil.onDOMContentLoaded((function(){KTUsersUpdatePermission.init()}));