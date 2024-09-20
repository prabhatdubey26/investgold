function cdtime(container,targetdate,currentdate){if(!document.getElementById||!document.getElementById(container))return
this.container=document.getElementById(container)
this.currentTime=new Date(currentdate)
this.targetdate=new Date(targetdate)
this.timesup=false
this.updateTime()}
cdtime.prototype.updateTime=function(){var thisobj=this
this.currentTime.setSeconds(this.currentTime.getSeconds()+1)
setTimeout(function(){thisobj.updateTime()},1000)}
cdtime.prototype.displaycountdown=function(baseunit,functionref){this.baseunit=baseunit
this.formatresults=functionref
this.showresults()}
cdtime.prototype.showresults=function(){var thisobj=this
var timediff=(this.targetdate-this.currentTime)/1000
if(timediff<0){this.timesup=true
this.container.innerHTML=this.formatresults()
return}
var oneMinute=60
var oneHour=60*60
var oneDay=60*60*24
var dayfield=Math.floor(timediff/oneDay)
var hourfield=Math.floor((timediff-dayfield*oneDay)/oneHour)
var minutefield=Math.floor((timediff-dayfield*oneDay-hourfield*oneHour)/oneMinute)
var secondfield=Math.floor((timediff-dayfield*oneDay-hourfield*oneHour-minutefield*oneMinute))
if(this.baseunit=="hours"){hourfield=dayfield*24+hourfield
dayfield="n/a"}
else if(this.baseunit=="minutes"){minutefield=dayfield*24*60+hourfield*60+minutefield
dayfield=hourfield="n/a"}
else if(this.baseunit=="seconds"){var secondfield=timediff
dayfield=hourfield=minutefield="n/a"}
this.container.innerHTML=this.formatresults(dayfield,hourfield,minutefield,secondfield)
setTimeout(function(){thisobj.showresults()},1000)}
function formatresults(){if(this.timesup==false){var displaystring=arguments[2]+" Min "+arguments[3]+" Sec "}
else{var displaystring=""}
return displaystring}