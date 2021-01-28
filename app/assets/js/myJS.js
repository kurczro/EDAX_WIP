function checkPass() {
    const pass1 = document.getElementById('pass1').value;
    const pass2 = document.getElementById('pass2').value;
    if(pass1 === pass2)
    {
        return true;
    }
    else{
            alert("Parolele introduse nu sunt la fel!");
            return false;
    }
}