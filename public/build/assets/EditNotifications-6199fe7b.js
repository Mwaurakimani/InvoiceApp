import{_ as c,i as p,D as l,j as d,o as r,e as u,a as t,b as e,w as a,k as _,F as f,g as i}from"./app-0b3af78b.js";import x from"./BookingFrom-78e6966c.js";import"./lodash-b37a624c.js";const m={computed:{app_defaults(){return p}},components:{BookingFrom:x},layout:l,data(){return{active_tab:"Details"}}},h={class:"p-[10px]"},b=t("div",{class:"heading my-[10px] md:my-[0px]"},[t("h1",null,"Add Notification")],-1),N={class:"flex mb-[20px] py-[10px]"},g={class:"flex gap-3"},v={class:"px-[10px]"},k=t("h5",null,"Notification Details",-1),y=t("div",{class:"input-group-default"},[t("input",{type:"text",placeholder:"Title"})],-1),w=t("div",{class:"input-group-default"},[t("textarea",{class:"h-[100px]",placeholder:"Notification"})],-1),B=[k,y,w];function D(n,o,L,$,F,V){const s=d("Link");return r(),u(f,null,[t("section",h,[b,t("div",N,[t("ul",g,[e(s,{as:"button",href:n.route("notifications.ListNotifications"),class:"px-[10px] button-fill-blue"},{default:a(()=>[i("Notifications")]),_:1},8,["href"]),e(s,{as:"button",href:"'/'",class:"px-[10px] button-fill-blue"},{default:a(()=>[i("Save Notification")]),_:1})])])]),t("section",v,[t("form",{onSubmit:o[0]||(o[0]=_(()=>{},["prevent"])),class:"mb-[20px] p-[10px] app-card md:w-[100%] lg:w-[48%]"},B,32)])],64)}const T=c(m,[["render",D]]);export{T as default};
