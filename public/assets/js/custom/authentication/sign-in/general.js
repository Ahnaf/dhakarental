"use strict";
var KTSigninGeneral=function(){
    var t,e,i;
    return{
        init:function(){
            t=document.querySelector("#kt_sign_in_form"),
            e=document.querySelector("#kt_sign_in_submit"),
                // alert(new FormData(this));
                i = FormValidation.formValidation(t, {
                    fields: {
                        email: {
                            validators: {
                                notEmpty: { message: "Email address is required" }, stringLength: {
                                    max: 70,
                                    message: 'The email must not be greater than 70 characters'
                                },
            emailAddress:{message:"The value is not a valid email address"}}},
                password: {
                    validators: {
                        notEmpty: { message: "The password is required" }, 
                        stringLength: {
                            min: 8,
                            max: 32,
                            message: 'The password must be between 8 to 32 characters'
                        }}}},
            plugins:{trigger:new FormValidation.plugins.Trigger,
            bootstrap:new FormValidation.plugins.Bootstrap5({rowSelector:".fv-row"})}})
            }}}();
                KTUtil.onDOMContentLoaded((function(){KTSigninGeneral.init()}));