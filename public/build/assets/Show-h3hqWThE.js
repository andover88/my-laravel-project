import{_ as c}from"./AppLayout-Dr69Lq8F.js";import l from"./DeleteUserForm-BDlEWk5q.js";import f from"./LogoutOtherBrowserSessionsForm-DQzVUlxV.js";import{S as s}from"./SectionBorder-N84nGE9o.js";import u from"./TwoFactorAuthenticationForm-DjaCSKJT.js";import d from"./UpdatePasswordForm-SLA1qsG4.js";import _ from"./UpdateProfileInformationForm-BELNNKuM.js";import{c as h,w as p,o,a as i,e as r,b as t,f as a,F as g}from"./app-DTMb1IFV.js";import"./_plugin-vue_export-helper-DlAUqK2U.js";import"./DialogModal-CDs-Ur63.js";import"./SectionTitle-CjCwv5Pl.js";import"./DangerButton-ON7HA4a9.js";import"./TextInput-DAItp8_-.js";import"./SecondaryButton-BRoAlveD.js";import"./ActionMessage-Dz07hqvN.js";import"./PrimaryButton-CfjKkySU.js";import"./InputLabel-NMrTc75s.js";import"./FormSection-CW0iNCY6.js";const $={class:"max-w-7xl mx-auto py-10 sm:px-6 lg:px-8"},w={key:0},k={key:1},y={key:2},M={__name:"Show",props:{confirmsTwoFactorAuthentication:Boolean,sessions:Array},setup(m){return(e,n)=>(o(),h(c,{title:"Profile"},{header:p(()=>n[0]||(n[0]=[i("h2",{class:"font-semibold text-xl text-gray-800 leading-tight"}," Profile ",-1)])),default:p(()=>[i("div",null,[i("div",$,[e.$page.props.jetstream.canUpdateProfileInformation?(o(),r("div",w,[t(_,{user:e.$page.props.auth.user},null,8,["user"]),t(s)])):a("",!0),e.$page.props.jetstream.canUpdatePassword?(o(),r("div",k,[t(d,{class:"mt-10 sm:mt-0"}),t(s)])):a("",!0),e.$page.props.jetstream.canManageTwoFactorAuthentication?(o(),r("div",y,[t(u,{"requires-confirmation":m.confirmsTwoFactorAuthentication,class:"mt-10 sm:mt-0"},null,8,["requires-confirmation"]),t(s)])):a("",!0),t(f,{sessions:m.sessions,class:"mt-10 sm:mt-0"},null,8,["sessions"]),e.$page.props.jetstream.hasAccountDeletionFeatures?(o(),r(g,{key:3},[t(s),t(l,{class:"mt-10 sm:mt-0"})],64)):a("",!0)])])]),_:1}))}};export{M as default};