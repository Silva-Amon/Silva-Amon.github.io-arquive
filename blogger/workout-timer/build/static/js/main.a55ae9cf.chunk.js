(this["webpackJsonpworkout-timer"]=this["webpackJsonpworkout-timer"]||[]).push([[0],{19:function(e,t,a){e.exports=a(33)},29:function(e,t,a){},32:function(e,t,a){},33:function(e,t,a){"use strict";a.r(t);var n=a(0),r=a.n(n),l=a(16),c=a.n(l),u=a(5),o=a(4),m=a(9),i=a(13);a(29);function s(){var e=Object(n.useState)(!1),t=Object(u.a)(e,2),a=t[0],l=t[1],c=Object(n.useState)("00"),s=Object(u.a)(c,2),E=s[0],p=s[1],d=Object(n.useState)("00"),f=Object(u.a)(d,2),b=f[0],I=f[1],v=Object(n.useState)("00"),j=Object(u.a)(v,2),O=j[0],g=j[1],k=Object(o.g)().timeId;return Object(n.useEffect)((function(){if(!0===a){var e=setInterval((function(){g((function(e){return 59===e?(I((function(e){return 59===e?(p((function(e){return parseInt(e)<9?"0"+(parseInt(e)+1):parseInt(e)+1})),"00"):parseInt(e)<9?"0"+(parseInt(e)+1):parseInt(e)+1})),"00"):parseInt(e)<9?"0"+(parseInt(e)+1):parseInt(e)+1}))}),1e3);return function(){return clearInterval(e)}}}),[a]),r.a.createElement("div",{className:"timer"},r.a.createElement("h3",null,"Timer id ",r.a.createElement("span",{className:"timeId"},k)),r.a.createElement("p",{className:"time"},r.a.createElement("span",{className:"hour"},E,":"),r.a.createElement("span",{className:"minute"},b,":"),r.a.createElement("span",{className:"second"},O)),a?r.a.createElement("button",{className:"pause",onClick:function(){return l(!1)}},r.a.createElement(m.a,{icon:i.a})):r.a.createElement("button",{className:"play",onClick:function(){return l(!0)}},r.a.createElement(m.a,{icon:i.b})))}a(32);var E=a(7),p="/blogger/workout-timer/build/";function d(){var e=Object(o.f)();function t(t){localStorage.setItem(t,"{}"),console.log("Time id created"),function(t){e.push(p+"timer/"+t)}(t)}var a=Object(n.useState)(""),l=Object(u.a)(a,2),c=l[0],m=l[1];return r.a.createElement("div",null,r.a.createElement("label",null,"Time id:"),r.a.createElement("input",{type:"text",value:c,onChange:function(e){return m(e.target.value)}}),localStorage.getItem(c)?r.a.createElement("div",null,r.a.createElement("small",null,"Time id found. Do you want do load it?"),r.a.createElement(E.b,{to:p+"timer/"+c},r.a.createElement("button",{className:"btn-main",onClick:function(){return console.log(c)}},"Load Timer"))):null===c||""===c?r.a.createElement("small",null,"You must type a key for your time id"):r.a.createElement("div",null,r.a.createElement("small",null,"Time id don't found. Do you want to create one?"),r.a.createElement("button",{className:"btn-main",onClick:function(){return t(c)}},"Create Timer")))}var f=function(){return r.a.createElement("div",{className:"appMain"},r.a.createElement("h1",null,"Time Workout"),r.a.createElement(E.a,null,r.a.createElement(o.c,null,r.a.createElement(o.a,{exact:!0,path:p},r.a.createElement(d,null)),r.a.createElement(o.a,{exact:!0,path:p+"timer/:timeId",component:s}))))};c.a.render(r.a.createElement(r.a.StrictMode,null,r.a.createElement(f,null)),document.getElementById("root"))}},[[19,1,2]]]);
//# sourceMappingURL=main.a55ae9cf.chunk.js.map