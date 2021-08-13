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

    var errors = [];

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
        
}