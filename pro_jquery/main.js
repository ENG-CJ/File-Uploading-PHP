let file=document.querySelector("#user_image");
let uploadBtn=document.querySelector("#upload");

const displayMessage=(type,message)=>{
    let messageArea=document.querySelector(".message-area");
    let __message=document.querySelector(".message");
    messageArea.innerHTML="";
    if (type=="error"){
        messageArea.classList.remove("hide");
        messageArea.classList.add("show");
        __message.classList.add("errorColor")
        messageArea.innerHTML=` <h5 class="message" style="color: rgb(240, 125, 87);">${message}</h5>`
        
        setTimeout(() => {
            messageArea.classList.remove("show");
            messageArea.classList.add("hide");
        }, 3000);
    }else if (type=="success"){
        messageArea.classList.remove("hide");
        messageArea.classList.add("show");

        messageArea.innerHTML=` <h5 class="message" style=" color: rgb(76, 232, 89);">${message}</h5>`
        setTimeout(() => {
            messageArea.classList.remove("show");
            messageArea.classList.add("hide");
        }, 3000);
    }
}
uploadBtn.addEventListener("click",(e)=>{
    e.preventDefault();
    if (file.files.length==0)
     {
        displayMessage("error","Image file is Required")
     }
    else
     {
        UploadFile();
     }
})

function UploadFile(){
    let formData = new FormData();
    formData.append("file",$("#user_image")[0].files[0])
    formData.append("action","upload");
  
    $.ajax({
        method: "POST",
        dataType : "json",
        data : formData,
        url : "./api.php",
        processData : false,
        contentType : false,
        success : (response)=>{
          var {message,success}=response;
         if (success)
           displayMessage("success",message);
        else
          displayMessage("error",message);

        },
        error : (response)=>{
            let server= response['responseText'];
            displayMessage("error",server);
        }
    })
}