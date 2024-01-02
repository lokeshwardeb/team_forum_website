
function delete_alert(){
    Swal.fire({
      title: "Are you sure?",
      text: "You won't be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "black",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, delete it!",
      loader: '...',

    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire({
          title: "Deleted!",
          text: "Your file has been deleted.",
          icon: "success",
          confirmButtonColor: "green",
          showCancelButton: false,
          


        })
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