import{_ as b,i as P,D as y,T as x,j as v,o as c,e as f,a as e,b as m,w as p,k as d,c as F,f as A,g as h,t as n,l,v as a,m as U}from"./app-0b3af78b.js";import V from"./BookingFrom-78e6966c.js";import{V as C}from"./VehicleCard-28ce5e64.js";import{A as N}from"./AppCardHolder-797be531.js";import"./lodash-b37a624c.js";/* empty css                                                                      */const k={methods:{updateImage(r){this.userFrom.profilePicture=r.target.files[0];const s=document.getElementById("imagePreview"),i=new FileReader;i.readAsDataURL(this.userFrom.profilePicture),i.onload=w=>{s.src=w.target.result}},saveUser(){this.userFrom.post(route("accounts.putAccount",[this.account.id]))},updatePassword(){this.securityForm.put(route("accounts.putPassword",[this.account.id]))}},computed:{app_defaults(){return P}},components:{AppCardHolder:N,VehicleCard:C,BookingFrom:V},layout:y,data(){return{active_tab:"Details",userFrom:x({first_name:this.account.first_name,last_name:this.account.last_name,national_id:this.account.national_id,phone:this.account.phone,email:this.account.email,designation:this.account.designation[0].id,profilePicture:null}),securityForm:x({currentPassword:null,newPassword:null,confirmNewPassword:null})}},props:["account"],mounted(){console.clear(),console.log()}},D={class:"p-[10px]"},S=e("div",{class:"heading my-[10px] md:my-[0px]"},[e("h1",null,"Add Account")],-1),B={class:"flex mb-[20px] py-[10px]"},I={class:"flex gap-3"},L={class:"flex flex-wrap md:gap-[20px]"},E={class:"w-[100%] flex flex-wrap xl:w-[68%]"},M={class:"flex flex-wrap gap-3"},H={class:"w-[100%]"},R=["src"],T=["src"],j={class:"input-group-default"},q=e("label",null,"Update Image",-1),z={class:"text-red-400"},G={class:"md:flex md:gap-1"},J={class:"input-group-default"},K=e("label",null,"First Name",-1),O={class:"text-red-500"},Q={class:"input-group-default"},W=e("label",null,"Last Name",-1),X={class:"text-red-500"},Y={class:"md:flex gap-1"},Z={class:"input-group-default"},$=e("label",null,"National ID",-1),ee={class:"text-red-500"},se={class:"input-group-default"},te=e("label",null,"Phone",-1),oe={class:"text-red-500"},re={class:"input-group-default"},ne=e("label",null,"Email",-1),le={class:"text-red-500"},ae={class:"input-group-default"},ie=e("label",null,"Designation",-1),ue=e("option",{value:"2"},"Moderator",-1),pe=e("option",{value:"1"},"Admin",-1),de=e("option",{value:"3"},"Driver",-1),ce=e("option",{value:"4"},"Client",-1),me=[ue,pe,de,ce],_e={class:"text-red-500"},fe={class:"input-group-default"},he=e("label",null,"Current Password",-1),we={class:"text-red-500"},ge={class:"input-group-default"},xe=e("label",null,"New Password",-1),ve={class:"text-red-500"},be={class:"input-group-default"},Pe=e("label",null,"Confirm New Password",-1),ye={class:"text-red-500"};function Fe(r,s,i,w,o,u){const _=v("Link"),g=v("AppCardHolder");return c(),f("section",D,[S,e("div",B,[e("ul",I,[m(_,{as:"button",href:r.route("accounts.ListAccounts"),class:"px-[10px] button-fill-blue"},{default:p(()=>[h("Accounts ")]),_:1},8,["href"]),m(_,{as:"button",href:r.route("accounts.CreateAccount"),class:"px-[10px] button-fill-blue"},{default:p(()=>[h("Add New ")]),_:1},8,["href"]),e("button",{onClick:s[0]||(s[0]=d((...t)=>u.saveUser&&u.saveUser(...t),["prevent","stop"])),class:"px-[10px] button-fill-blue"},"Save"),m(_,{href:r.route("accounts.ViewAccount",[i.account.id]),as:"button",class:"px-[10px] hover:bg-red-600 bg-red-500 text-white border-none"},{default:p(()=>[h("Cancel")]),_:1},8,["href"])])]),e("section",L,[e("article",E,[m(g,{title:"About",class:"w-[100%] mb-[20px]"},{default:p(()=>[e("div",M,[e("form",{onSubmit:s[2]||(s[2]=d(()=>{},["prevent"])),class:"p-[10px] w-[100%] md:w-[200px]"},[e("div",H,[i.account.profile_photo_path?(c(),f("img",{key:0,id:"imagePreview",class:"w-[100%] h-[auto] mb-[10px]",src:u.app_defaults.profilePictures+i.account.profile_photo_path},null,8,R)):(c(),f("img",{key:1,id:"imagePreview",class:"w-[100%] h-[auto] mb-[10px]",src:u.app_defaults.systemImages+"User.png"},null,8,T)),e("div",j,[q,e("input",{accept:"image/*",type:"file",onChange:s[1]||(s[1]=t=>u.updateImage(t))},null,32),e("span",z,n(r.$page.props.errors.profilePicture),1)])])],32),e("form",{onSubmit:s[9]||(s[9]=d(()=>{},["prevent"])),class:"mb-[20px] w-[100%] md:w-[420px] lg:w-[48%]"},[e("div",G,[e("div",J,[K,l(e("input",{type:"text","onUpdate:modelValue":s[3]||(s[3]=t=>o.userFrom.first_name=t)},null,512),[[a,o.userFrom.first_name]]),e("span",O,n(r.$page.props.errors.first_name),1)]),e("div",Q,[W,l(e("input",{type:"text","onUpdate:modelValue":s[4]||(s[4]=t=>o.userFrom.last_name=t)},null,512),[[a,o.userFrom.last_name]]),e("span",X,n(r.$page.props.errors.last_name),1)])]),e("div",Y,[e("div",Z,[$,l(e("input",{type:"text","onUpdate:modelValue":s[5]||(s[5]=t=>o.userFrom.national_id=t)},null,512),[[a,o.userFrom.national_id]]),e("span",ee,n(r.$page.props.errors.national_id),1)]),e("div",se,[te,l(e("input",{type:"text","onUpdate:modelValue":s[6]||(s[6]=t=>o.userFrom.phone=t)},null,512),[[a,o.userFrom.phone]]),e("span",oe,n(r.$page.props.errors.phone),1)])]),e("div",re,[ne,l(e("input",{type:"email","onUpdate:modelValue":s[7]||(s[7]=t=>o.userFrom.email=t)},null,512),[[a,o.userFrom.email]]),e("span",le,n(r.$page.props.errors.email),1)]),e("div",ae,[ie,l(e("select",{"onUpdate:modelValue":s[8]||(s[8]=t=>o.userFrom.designation=t)},me,512),[[U,o.userFrom.designation]]),e("span",_e,n(r.$page.props.errors.designation),1)])],32)])]),_:1}),i.account.id==r.$page.props.auth.user.id?(c(),F(g,{key:0,title:"Security",class:"w-[100%] mb-[20px] md:m-[0px]"},{default:p(()=>[e("form",{onSubmit:s[14]||(s[14]=d(()=>{},["prevent"])),class:"mb-[20px] w-[100%] md:w-[420px] lg:w-[48%]"},[e("div",fe,[he,l(e("input",{type:"text","onUpdate:modelValue":s[10]||(s[10]=t=>o.securityForm.currentPassword=t)},null,512),[[a,o.securityForm.currentPassword]]),e("span",we,n(r.$page.props.errors.currentPassword),1)]),e("div",ge,[xe,l(e("input",{type:"text","onUpdate:modelValue":s[11]||(s[11]=t=>o.securityForm.newPassword=t)},null,512),[[a,o.securityForm.newPassword]]),e("span",ve,n(r.$page.props.errors.newPassword),1)]),e("div",be,[Pe,l(e("input",{type:"text","onUpdate:modelValue":s[12]||(s[12]=t=>o.securityForm.confirmNewPassword=t)},null,512),[[a,o.securityForm.confirmNewPassword]]),e("span",ye,n(r.$page.props.errors.confirmNewPassword),1)]),e("button",{onClick:s[13]||(s[13]=d((...t)=>u.updatePassword&&u.updatePassword(...t),["prevent","stop"])),class:"px-[10px]"},"Update Password")],32)]),_:1})):A("",!0)])])])}const De=b(k,[["render",Fe]]);export{De as default};
