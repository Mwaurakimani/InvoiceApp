import{_ as p,i as h,D as m,T as u,j as o,o as _,e as d,a as e,b as t,w as a,k as f,F as v,g as i}from"./app-0b3af78b.js";import x from"./VehicleFrom-41e5ee4e.js";const V={methods:{saveVehicle(){this.vehicleForm.post(route("vehicle.postVehicle"))}},computed:{app_defaults(){return h}},components:{VehicleFrom:x},layout:m,data(){return{active_tab:"Details",vehicleForm:u({Name:"Nisan Sunny",Registration_number:"KAG 333Y",make:"2014",engine_size:"2200",transmission:"Automatic",fuel_capacity:"500",odometer_reading:"300000",seats:"14",status:"Active",Notes:"None"})}}},b={class:"p-[10px]"},F=e("div",{class:"heading my-[10px] md:my-[0px]"},[e("h1",null,"Add Booking")],-1),k={class:"flex mb-[20px] py-[10px]"},g={class:"flex gap-3"};function y(c,N,C,A,n,l){const s=o("Link"),r=o("VehicleFrom");return _(),d(v,null,[e("section",b,[F,e("div",k,[e("ul",g,[t(s,{as:"button",href:c.route("vehicle.ListVehicles"),class:"px-[10px] button-fill-blue"},{default:a(()=>[i("Vehicles")]),_:1},8,["href"]),t(s,{as:"button",href:"'/'",class:"px-[10px] button-fill-blue",onClick:f(l.saveVehicle,["prevent","stop"])},{default:a(()=>[i("Save")]),_:1},8,["onClick"])])])]),t(r,{vehicleForm:n.vehicleForm},null,8,["vehicleForm"])],64)}const w=p(V,[["render",y]]);export{w as default};