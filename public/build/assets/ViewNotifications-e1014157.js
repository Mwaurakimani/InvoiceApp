import{_ as l,i as p,D as d,j as n,o as f,e as m,a as t,b as o,w as a,F as _,g as r,t as u}from"./app-0b3af78b.js";import{A as h}from"./AppCardHolder-797be531.js";import{V as x}from"./VehicleCard-28ce5e64.js";import{D as b}from"./DriverCard-e746b9a0.js";import D from"./DetailsComponent-88119923.js";import N from"./Payments-46cfbedd.js";/* empty css                                                                      *//* empty css                                                                 */const g={computed:{app_defaults(){return p}},props:["notification"],components:{Payment:N,DetailsComponent:D,DriverCard:b,VehicleCard:x,AppCardHolder:h},layout:d,data(){return{active_tab:"Details"}}},C={class:"p-[10px]"},y=t("div",{class:"heading my-[10px] md:my-[0px]"},[t("h1",null,"Add Notification")],-1),v={class:"flex mb-[20px] py-[10px]"},V={class:"flex gap-3"},A={class:"px-[10px]"},k={class:"small-text"};function w(i,L,e,B,H,F){const s=n("Link"),c=n("AppCardHolder");return f(),m(_,null,[t("section",C,[y,t("div",v,[t("ul",V,[o(s,{as:"button",href:i.route("notifications.ListNotifications"),class:"px-[10px] button-fill-blue"},{default:a(()=>[r(" Notifications ")]),_:1},8,["href"]),o(s,{as:"button",method:"delete",href:i.route("notifications.DeleteNotification",[e.notification.id]),class:"px-[10px] border-none bg-red-400 hover:bg-red-500 text-white"},{default:a(()=>[r("Delete Notification")]),_:1},8,["href"])])])]),t("section",A,[o(c,{title:e.notification.title,class:""},{default:a(()=>[t("p",k,u(e.notification.message),1)]),_:1},8,["title"])])],64)}const G=l(g,[["render",w]]);export{G as default};
