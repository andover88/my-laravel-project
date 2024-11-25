import{T as _,e as d,b as t,u as o,w as m,F as b,o as n,Z as x,t as k,f as u,a,c as y,g as f,j as V,n as v,i as $}from"./app-DTMb1IFV.js";import{A as B}from"./AuthenticationCard-DVOkeF4L.js";import{_ as h}from"./AuthenticationCardLogo-DuNAQPSw.js";import{_ as C}from"./Checkbox-BWqjHlPh.js";import{_ as c,a as p}from"./TextInput-DAItp8_-.js";import{_ as g}from"./InputLabel-NMrTc75s.js";import{_ as F}from"./PrimaryButton-CfjKkySU.js";import"./_plugin-vue_export-helper-DlAUqK2U.js";const N={key:0,class:"mb-4 font-medium text-sm text-green-600"},q={class:"mt-4"},L={class:"block mt-4"},P={class:"flex items-center"},R={class:"flex items-center justify-end mt-4"},M={__name:"Login",props:{canResetPassword:Boolean,status:String},setup(l){const e=_({email:"",password:"",remember:!1}),w=()=>{e.transform(i=>({...i,remember:e.remember?"on":""})).post(route("login"),{onFinish:()=>e.reset("password")})};return(i,s)=>(n(),d(b,null,[t(o(x),{title:"Log in"}),t(B,null,{logo:m(()=>[t(h)]),default:m(()=>[l.status?(n(),d("div",N,k(l.status),1)):u("",!0),a("form",{onSubmit:$(w,["prevent"])},[a("div",null,[t(g,{for:"email",value:"Email"}),t(c,{id:"email",modelValue:o(e).email,"onUpdate:modelValue":s[0]||(s[0]=r=>o(e).email=r),type:"email",class:"mt-1 block w-full",required:"",autofocus:"",autocomplete:"username"},null,8,["modelValue"]),t(p,{class:"mt-2",message:o(e).errors.email},null,8,["message"])]),a("div",q,[t(g,{for:"password",value:"Password"}),t(c,{id:"password",modelValue:o(e).password,"onUpdate:modelValue":s[1]||(s[1]=r=>o(e).password=r),type:"password",class:"mt-1 block w-full",required:"",autocomplete:"current-password"},null,8,["modelValue"]),t(p,{class:"mt-2",message:o(e).errors.password},null,8,["message"])]),a("div",L,[a("label",P,[t(C,{checked:o(e).remember,"onUpdate:checked":s[2]||(s[2]=r=>o(e).remember=r),name:"remember"},null,8,["checked"]),s[3]||(s[3]=a("span",{class:"ms-2 text-sm text-gray-600"},"Remember me",-1))])]),a("div",R,[l.canResetPassword?(n(),y(o(V),{key:0,href:i.route("password.request"),class:"underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"},{default:m(()=>s[4]||(s[4]=[f(" Forgot your password? ")])),_:1},8,["href"])):u("",!0),t(F,{class:v(["ms-4",{"opacity-25":o(e).processing}]),disabled:o(e).processing},{default:m(()=>s[5]||(s[5]=[f(" Log in ")])),_:1},8,["class","disabled"])])],32)]),_:1})],64))}};export{M as default};
