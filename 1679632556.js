(async function fuzzer(n){
let a =[],b=[]
for(var x = 0; x <n; x++){
if(x%2===0){
a.push(x)
}else{
await b.push(x)
}
}
})(20);