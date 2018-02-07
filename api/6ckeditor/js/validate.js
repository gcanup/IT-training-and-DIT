function validateForm(frm){
    var std_name=frm.std_name.value;  
    var std_age=frm.std_age.value;  
    var gender=frm.gender.value;  
    //var mobile=frm.mobile.value;  
    if(std_name==''){
        alert('Name is Empty !!');
        frm.std_name.focus();
        return false;
    }
    if(std_age=='' || isNaN(std_age)){
        alert('Invalid Age !!');
        frm.std_age.focus();
        return false;
    }
    if(gender==''){
        alert('Gender is Empty !!');
        frm.gender.focus();
        return false;
    }
    //  if(mobile.length>10){
    //     alert('Mobile No. Must be Less than equal to 10 digits !!');
    //     return false; 
    //  }
    return true;
}
function calculateResult(){
    var maths=document.getElementById('maths').value;  
    var science=document.getElementById('science').value;  
    var nepali=document.getElementById('nepali').value;  
    var computer=document.getElementById('computer').value;
    if(maths=='' || isNaN(maths) || maths>100){
        alert('Invalid Marks in Maths !!');
        document.getElementById('maths').focus();
        return false;
    }
    if(science=='' || isNaN(science) || science>100){
        alert('Invalid Marks in Science !!');
        document.getElementById('science').focus();
        return false;
    }
    if(nepali=='' || isNaN(nepali) || nepali>100){
        alert('Invalid Marks in Nepali !!');
        document.getElementById('nepali').focus();
        return false;
    }
    if(computer=='' || isNaN(computer) || computer>100){
        alert('Invalid Marks in Computer !!');
        document.getElementById('computer').focus();
        return false;
    }
    var total=parseFloat(maths)+parseFloat(science)+parseFloat(nepali)+parseFloat(computer);
    var per=(total/4);
    var result=null;
    if(maths>=32 && science>=32 && nepali>=32 && computer>=32){
        result="Pass";
    }else{
        result="Fail";
    }
    var division=null;
    if(result=="Fail"){
        division="None"; 
    }else{
        if(per>=80){
            division="Distinction";
        }else if(per>=60){
            division="First";
        }else if(per>=45){
            division="Second";
        }else if(per>=32){
            division="Third";
        }else{
            division="None";
        }   
    }  
    document.getElementById('total_marks').value=total;
    document.getElementById('per').value=per;
    document.getElementById('result').value=result;
    document.getElementById('division').value=division;
  
}

