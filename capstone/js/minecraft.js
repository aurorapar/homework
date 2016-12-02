window.onload = init;

function init()
{
    document.getElementById("showInstallForm").addEventListener("click",showForm);    
    document.getElementById("settingsinput").onsubmit = checkSettings;
    
    document.getElementById("installserver").addEventListener("click",installLink);
    document.getElementById("bootserver").addEventListener("click", bootLink);
    document.getElementById("serverstatus").addEventListener("click",statusLink);
    document.getElementById("serverconsole").addEventListener("click",consoleLink);
    
}

function installLink()
{
    alert("rawr");
    window.open("install.php","_self");
}

function bootLink()
{
    window.open("boot.php","_self");
}

function statusLink()
{
    window.open("status.php","_self");
}

function consoleLink()
{
    window.open("console.php","_self");
}

function showForm()
{
    document.getElementById('settingsinput').style.display = "block";
    hideInstallation();    
}

function hideForm()
{
    document.getElementById('settingsinput').style.display = "none";
}

function hideInstallation()
{
    document.getElementById('installation').style.display = "none";
}

function checkSettings(event)
{
    var serviceName = document.getElementById('serviceName').value;
    var installPath = document.getElementById('installPath').value;
    var installVersion = document.getElementById('installVersion').value;
    var dialogue = "Are these the proper settings?" + "\nService Name:     " + serviceName + "\nInstall Path:        " + installPath + "\nInstall Version:     " + installVersion;
    
    var r = confirm(dialogue);
    if(r != true)
    {
        return false;
    }        
}

