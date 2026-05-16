const input = document.getElementById('chat-input');

input.addEventListener('keypress',function(e){

if(e.key === 'Enter'){

fetch('/chat/send',{
method:'POST',
headers:{
'Content-Type':'application/json',
'X-CSRF-TOKEN':document.querySelector('meta[name="csrf-token"]').content
},
body:JSON.stringify({
message:input.value
})
});

input.value='';

}

});