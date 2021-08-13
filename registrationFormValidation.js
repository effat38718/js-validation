window.onload = function()
{
    document.getElementById("myBtn").addEventListener("click", submitOnclick);
}

function submitOnclick()
{
    // var fname = document.getElementById("fname").value;
    // var lname = document.getElementById("lname").value;
    var fname = document.forms["registrationForm"]["fname"].value
    var lname = document.forms["registrationForm"]["lname"].value

    var mGender = document.forms["registrationForm"]["male"]
    var fGender = document.forms["registrationForm"]["female"]

    var dob = document.forms["registrationForm"]["dob"].value
    var religion = document.forms["registrationForm"]["religion"].value
    var email = document.forms["registrationForm"]["email"].value

    var username = document.forms["registrationForm"]["username"].value
    var password = document.forms["registrationForm"]["password"].value

    if(fname == "")
    {
        document.getElementById("fname").style.borderColor="#f44336";
        alert("Please Fill up your First name")
    }
    if(lname == "")
    {
        document.getElementById("lname").style.borderColor="#f44336";
        alert("Please Fill up your Last name");
    }
    if(!(mGender.checked || fGender.checked))
    {
        alert("Please Select your gender");
    }
    if(dob == "")
    {
        document.getElementById("dob").style.borderColor="#f44336";
        alert("Please Select your Date of Birth");
    }
    if(religion == "--none" || religion == "")
    {
        document.getElementById("religion").style.borderColor="#f44336";
        alert("Please Select your Religion");
    }
    if(email == "")
    {
        document.getElementById("email").style.borderColor="#f44336";
        alert("Please Enter your Email");
    }
    if(username == "")
    {
        document.getElementById("username").style.borderColor="#f44336";
        alert("Please Set your UserName");
    }
    if(password == "")
    {
        document.getElementById("password").style.borderColor="#f44336";
        alert("Please Set your Password");
    }

        
}