/* empty css                                                                 */import{_ as n,j as a,o as r,c as _,w as d,a as t,t as s,p,q as u}from"./app-0b3af78b.js";const h={setup(){return{currency:new Intl.NumberFormat("en-US",{style:"currency",currency:"Ksh"})}},name:"TripCard",props:["trip"]},o=c=>(p("data-v-4fdc1405"),c=c(),u(),c),f={class:"trip-id"},m=o(()=>t("div",{class:"pill"},[t("p",null,"Active")],-1)),x={class:"driver"},k={class:"card-body small-text flex"},v={class:"flex"},y=o(()=>t("label",null,"From:",-1)),b={class:"flex"},I=o(()=>t("label",null,"To:",-1)),T={class:"flex"},w=o(()=>t("label",null,"Date:",-1)),C={class:"flex"},S=o(()=>t("label",null,"Return:",-1)),B={class:"cash"};function N(c,g,e,i,D,L){const l=a("Link");return r(),_(l,{as:"div",href:c.route("booking.ViewBooking",[1]),class:"trip-holder app-card"},{default:d(()=>[t("p",f,"ID: "+s(e.trip.id),1),m,t("div",x,"Client Name:"+s(e.trip.clientName),1),t("ul",k,[t("li",v,[y,t("p",null,s(e.trip.pickUpLocation),1)]),t("li",b,[I,t("p",null,s(e.trip.destination),1)]),t("li",T,[w,t("p",null,s(e.trip.pickUpTime),1)]),t("li",C,[S,t("p",null,s(e.trip.returnTime),1)])]),t("p",B,s(i.currency.format(e.trip.price)),1)]),_:1},8,["href"])}const V=n(h,[["render",N],["__scopeId","data-v-4fdc1405"]]);export{V as T};
