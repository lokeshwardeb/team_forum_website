
// function delete_alert(msg_title1, msg1, msg_title2, msg2, delete_blog_id){
//     Swal.fire({
//       title: msg_title1,
//       text: msg1,
//       icon: "warning",
//       showCancelButton: true,
//       confirmButtonColor: "black",
//       cancelButtonColor: "#d33",
//       confirmButtonText: "Yes, delete it!",
//       loader: '...',

//     }).then((result) => {
//       if (result.isConfirmed) {
//         document.cookie = "delete_blog_id=" + delete_blog_id + "; expires=Thu, 01 Jan 1970 00:00:00 UTC;";


//         Swal.fire({
//           title: msg_title2,
//           text: msg2,
//           icon: "success",
//           confirmButtonColor: "green",
//           showCancelButton: false,
          


//         })
//       }
//     });
//   }
function delete_alert(delete_blog_id, msg_title1, msg1){
    Swal.fire({
      title: msg_title1,
      text: msg1,
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "black",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, delete it!",
      loader: '...',

    }).then((result) => {
      if (result.isConfirmed) {
        // document.cookie = "delete_blog_id=" + delete_blog_id + "; expires=Thu, 01 Jan 1970 00:00:00 UTC;";
        // document.cookie = "delete_blog_id=2" + delete_blog_id + ";";
        document.cookie = "'delete_blog_id="+ delete_blog_id + "'; ";


        // Swal.fire({
        //   title: msg_title2,
        //   text: msg2,
        //   icon: "success",
        //   confirmButtonColor: "green",
        //   showCancelButton: false,
          


        // })
      }
    });
  }

  function success_alert(msg_title, msg){
    Swal.fire({
        title: msg_title,
        text: msg,
        icon: "success",
        showCancelButton: false,
        confirmButtonColor: "green",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ok",
        loader: '...',
  
      })
  }
  function danger_alert(msg_title, msg){
    Swal.fire({
        title: msg_title,
        text: msg,
        icon: "error",
        showCancelButton: false,
        confirmButtonColor: "red",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ok",
        loader: '...',
  
      })
  }

  function warning_alert(msg_title, msg){
    Swal.fire({
        title: msg_title,
        text: msg,
        icon: "warning",
        showCancelButton: false,
        // confirmButtonColor: "#B68C5A",
        confirmButtonColor: "red",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ok",
        loader: '...',
  
      })
  }

  console.log("alert connected");