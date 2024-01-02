
// auto reload functionalities
// here 5000 means 5 seconds

// setTimeout(function(){
//     window.location.reload();
//  }, 5000);

 
 let loader = document.getElementById("preloader");

 window.addEventListener("load", function () { 
    loader.style.display = "none"
  })

  console.log("connected js")
  

  // signup show password functionalities

  function signup_show_pass(){
    let signup_pass = document.getElementById("signup_pass");
    let signup_icon = document.getElementById("signup_pass_icon");

    if(signup_pass.type == 'password'){
      signup_pass.type = 'text';
      signup_icon.classList.remove('fa-eye')
      signup_icon.classList.add('fa-eye-slash')


    }else if(signup_pass.type == 'text'){
      signup_pass.type = 'password';
      signup_icon.classList.remove('fa-eye-slash')
      signup_icon.classList.add('fa-eye')



    }
  }
  function signup_show_cpass(){
    let signup_cpass = document.getElementById("signup_cpass");
    let signup_cicon = document.getElementById("signup_cpass_icon");

    if(signup_cpass.type == 'password'){
      signup_cpass.type = 'text';
      signup_cicon.classList.remove('fa-eye')
      signup_cicon.classList.add('fa-eye-slash')


    }else if(signup_cpass.type == 'text'){
      signup_cpass.type = 'password';
      signup_cicon.classList.remove('fa-eye-slash')
      signup_cicon.classList.add('fa-eye')



    }
  }

