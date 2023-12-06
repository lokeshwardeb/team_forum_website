function change_ac(){
    var joint_second_user = document.getElementById("joint_second_user");
// let joint_second_user_value = joint_second_user.value;
var main_submit = document.getElementById('main_submit');


var account_type = document.getElementById('account_type').value;

console.log('the value is' . joint_second_user_value)
if(account_type == "Joint Account"){
    joint_second_user.classList.remove('d-none');
    main_submit.classList.add('d-none');
    
}else{
    joint_second_user.classList.add('d-none');
    main_submit.classList.remove('d-none');

}
// joint_second_user.classList.add('d-none');

}